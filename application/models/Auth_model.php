<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth_model for authenticate users
 */
class Auth_model extends CI_Model
{
    /**
     * CHECKS LOGIN CREDENTIALS. IF USER IS FOUND RETURN TRUE OTHERWISE RETURN FALSE
     */
    public function validate_login()
    {
        $email = required(sanitize($this->input->post('email')));
        $password = required($this->input->post('password')); // DID NOT SANITIZE THE PASSWORD BECAUSE IT CAN TAKE SPECIAL CHARS
        $credential = array('email' => $email, 'password' => sha1($password));

        $query = $this->db->get_where('users', $credential);

        if ($query->num_rows() > 0) {
            
            $row = $query->row();
                if ($row->status == 1) {


                        $this->session->set_userdata('is_logged_in', 1);
                        $this->session->set_userdata('user_id', $row->id);
                        $this->session->set_userdata('user_role_id', $row->role_id);
                        $this->session->set_userdata('user_role', get_user_role('user_role', $row->id));
                    
                            if ($row->role_id == 1) {
                                $this->session->set_userdata('admin_login', 1);
                            } else if ($row->role_id == 2) {
                                $this->session->set_userdata('customer_login', 1);
                                
                                //loadup customer current address into session
                                $user_id = array('user_id' => $row->id);
                                $location = $this->db->get_where('customers', $user_id)->row(); //return single row
                                if (!empty($location->address_1)) {
                                
                                        $this->session->set_userdata('streetNumber',  $location->street_no);
                                        $this->session->set_userdata('streetName',  $location->street_name);
                                        $this->session->set_userdata('cityName',  $location->city);
                                        $this->session->set_userdata('fullAddress',  $location->address_1);
                            
                                } 


                            } else if ($row->role_id == 3) {
                                $this->session->set_userdata('owner_login', 1);
                            } else if ($row->role_id == 4) {
                                $this->session->set_userdata('driver_login', 1);
                            }

                    return true;

                }else if ($row->status == 2) {
                    error(get_phrase('Account_suspended'), site_url('auth'));
                }else {
                    error(get_phrase('please_confirm_email_first_incase_check_under_spam_folder'), site_url('auth'));
                }

            }

        return false;
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR REGISTERING USERS
     */
    public function registration()
    {
        $role = required(sanitize($this->input->post('role')));
        if ($role == "customer" || $role == "owner" || $role == "driver") {
            $user_data['name'] = required(sanitize($this->input->post('name')));
            $user_data['email'] = required(sanitize($this->input->post('email')));
            $user_data['phone'] = required(sanitize($this->input->post('phone')));
            $user_data['password'] = sha1(required($this->input->post('password'))); // DID NOT SANITIZE THE PASSWORD BECAUSE IT CAN TAKE SPECIAL CHARS

            // GET THE ROLE DETAILS
            $role_details = $this->db->get_where('role', ['type' => $role])->row_array();
            $user_data['role_id'] = $role_details['id'];
            $user_data['created_at'] = strtotime(date("Y-m-d H:i:s"));

            if (email_duplication($user_data['email'])) {

                if (phone_verify($user_data['phone'])) {

                    if ($role == "driver") {
                        $this->db->insert('users', $user_data);
                        $user_id = $this->db->insert_id();
                        $driver_data['user_id'] = $user_id;
                        $this->db->insert('drivers', $driver_data);
                        success(get_phrase('your_registration_has_been_done') . '. ' . get_phrase('please_wait_till_admin_approves_your_registration'), site_url('login'));
                    } else {
                        $user_data['verify_token']  = $this->generateRandomString();
                        $this->db->insert('users', $user_data);
                        
                         $user_id = $this->db->insert_id();
                        //$customer_data['user_id'] = $user_id;
                        //$this->db->insert('customers', $customer_data); //adding space for address

                        //<--add here email verification-->
                        $this->email_verification($user_id, $user_data['email']);
                       
                        //$this->auto_login('customer', $user_id); //auto login
                    }


                } else {
                    error(get_phrase("Invlaid_phone"), site_url('auth/registration/customer'));
                }        

            } else {
                notice(get_phrase("Email_already_exists"), site_url('auth/registration/customer'));
            }
        } else {
            error(get_phrase("invalid_user_role"), site_url('auth/roles'));
        }
    }

    /**
     * THIS FUNCTION HELPS TO LOGIN A USER AFTER REGISTRATION HAS BEEN DONE
     */
    public function auto_login($role, $user_id)
    {
        $user_data = $this->user_model->get_user_by_id($user_id);
        if (count($user_data) > 0 && $user_data['status']) {
            $this->session->set_userdata('is_logged_in', 1);
            $this->session->set_userdata('user_id', $user_data['id']);
            $this->session->set_userdata('user_role_id', $user_data['role_id']);
            $this->session->set_userdata('user_role', get_user_role('user_role', $user_data['id']));
            if ($user_data['role_id'] == 1) {
                $this->session->set_userdata('admin_login', 1);
            } else if ($user_data['role_id'] == 2) {
                $this->session->set_userdata('customer_login', 1);
            } else if ($user_data['role_id'] == 3) {
                $this->session->set_userdata('owner_login', 1);
            } else if ($user_data['role_id'] == 4) {
                $this->session->set_userdata('driver_login', 1);
            }

            success(get_phrase('congratulations_your_registration_has_been_done_successfully'), site_url('dashboard'));
        } else {
            redirect(site_url('auth'), 'refresh');
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SENDING EMAIL FOR VERFICATION
     * IT WILL SEND AN EMAIL TO CUSTOMER
     */
    public function email_verification($user_id, $email)
    {
        $this->db->where('id', $user_id);
        $user_data = $this->db->get('users')->row_array();
        if (count($user_data) > 0) {
            //sending and updating
            $response = $this->email_model->send_verification($email, $user_data['verify_token']);
            if ($response) {
                success(get_phrase('Please_confirm_your_email_first_by_clicking_on_the_link_sent_on_your_email_please_check_your_spam_folder_if_could_not_find_email'), site_url('auth'));
            } else {
                error(get_phrase('error_occurred_during_sending_mail'), site_url('auth'));
            }
        } else {
            error(get_phrase('invalid_email_or_no_email_found'), site_url('auth'));
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GENERATING RANDOM STRING 
     */
    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    /**
     * THIS FUNCTION IS RESPONSIBLE FOR RESETTING THE PASSWORD
     * IT WILL SEND AN EMAIL
     */
    public function reset_password()
    {
        $email = required(sanitize($this->input->post('email')));
        $this->db->where('email', $email);
        $user_data = $this->db->get('users')->row_array();
        if (count($user_data) > 0) {
            //resetting user password here
            $new_password = substr(sha1(rand(100000000, 20000000000)), 0, 7);
            $response = $this->email_model->password_reset($email, $new_password);
            if ($response) {
                $updater['password'] = sha1($new_password);
                $this->db->where('email', $email);
                $this->db->update('users', $updater);
                
                success(get_phrase('please_check_your_mail'), site_url('auth'));
            } else {
                error(get_phrase('error_occurred_during_sending_mail'), site_url('auth'));
            }
        } else {
            error(get_phrase('invalid_email'), site_url('auth/forget_password'));
        }
    }
}
