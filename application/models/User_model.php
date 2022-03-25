<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 09 - June - 2020
 * Author : TheDevs
 * User model handles all the database queries of Users
 */

class User_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    // GET USER BY ID
    public function get_user_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    // GET ADMIN DETAILS
    public function get_admin_details()
    {
        return $this->db->get_where($this->table, ['role_id' => 1])->row_array();
    }

    // GET ONLY APPROVED USERS, EXCEPT FOR ROLE 4 WHICH IS DRIVER ROLE
    public function get_approved_users()
    {
        $this->db->where('status', 1);
        $this->db->where('role_id !=', 4);
        return $this->db->get($this->table)->result_array();
    }

    // GET ONLY PENDING USERS, EXCEPT FOR ROLE 4 WHICH IS DRIVER ROLE
    public function get_pending_users()
    {
        $this->db->where('role_id !=', 4);
        $this->db->where('status', 0);
        return $this->db->get($this->table)->result_array();
    }

    // UPDATE LOGGED IN USER PROFILE INFO
    public function update_profile()
    {
        if (get_user_role('user_role', $this->session->userdata('user_id')) == "admin") {
            return $this->update_admin_profile();
        } elseif (get_user_role('user_role', $this->session->userdata('user_id')) == "customer" || get_user_role('user_role', $this->session->userdata('user_id')) == "owner") {
            return $this->update_customer_profile();
        } else {
            return $this->update_driver_profile();
        }
    }

    // UPDATE ADMIN PROFILE
    public function update_admin_profile()
    {
        $logged_in_user_id = $this->session->userdata('user_id');
        $previous_data = $this->get_user_by_id($logged_in_user_id);
        $email = required(sanitize($this->input->post('email')));
        if (email_duplication($email, $logged_in_user_id)) {
            $profile['email'] = $email;
            $profile['name'] = required(sanitize($this->input->post('name')));
            $profile['phone'] = required(sanitize($this->input->post('phone')));
            $profile['updated_at'] = strtotime(date('d-m-y'));
            // UPLOAD THUMBNAIL
            if (!empty($_FILES['user_image']['name'])) {
                $profile['thumbnail']  = $this->upload('user', $_FILES['user_image'], $previous_data["thumbnail"]);
            }

            $this->db->where('id', $logged_in_user_id);
            $this->db->update('users', $profile);

            return true;
        }
    }
    // UPDATE CUSTOMER PROFILE
    public function update_customer_profile()
    {
            $updater = sanitize($this->input->post('updater'));
            if ($updater == 'profile') {
              return $this->customer_model->update_customer();
            }
            else if ($updater == 'profile_address') {
              return $this->customer_model->update_customer_address();
            }
            else if ($updater == 'phone') {
              return $this->customer_model->update_customer_phone();
            }
    }
    // UPDATE DRIVER PROFILE
    public function update_driver_profile()
    {
        
            $updater = sanitize($this->input->post('updater'));
            if ($updater == 'profile') {
              return $this->driver_model->update_driver();
            }
            else if ($updater == 'phone') {
               return $this->driver_model->update_driver_phone();
             }
    }

   

   
    // UPDATE LOGGED IN USERS PASSWORD
    public function update_password()
    {
        $logged_in_user_id = $this->session->userdata('user_id');
        $previous_data = $this->get_user_by_id($logged_in_user_id);

        // DO NOT SANITIZE PASSWORDS, IT CAN CARRY SPECIAL CHARACTERS
        $current_password = sha1(required($this->input->post('current_password')));
        $new_password = sha1(required($this->input->post('new_password')));
        $confirm_password = sha1(required($this->input->post('confirm_password')));

        // CHECK PASSWORDS
        if ($previous_data['password'] == $current_password && $new_password == $confirm_password) {
            $data['password'] = $new_password;
            $this->db->where('id', $logged_in_user_id);
            $this->db->update('users', $data);
            return true;
        }
        return false;
    }
}
