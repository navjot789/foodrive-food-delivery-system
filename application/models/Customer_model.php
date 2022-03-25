<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 09 - June - 2020
 * Author : TheDevs
 * Customer model handles all the database queries of Customer
 */

class Customer_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    /**
     * GET ONLY APPROVED CUSTOMERS. 
     */
    public function get_approved_customers($role)
    {
        $this->db->where('status', 1);
        $this->db->where_in('role_id', $role);
        return $this->merger($this->db->get($this->table));
    }

    /**
     * GET ONLY PENDING CUSTOMERS. 
     */
    public function get_pending_customers($role)
    {
        $this->db->where('status', 0);
        $this->db->where_in('role_id', $role);
        return $this->merger($this->db->get($this->table));
    }

    /**
     * GET ONLY Suspend CUSTOMERS. 
     */
    public function get_suspend_customers($role)
    {
        $this->db->where('status', 2);
        $this->db->where_in('role_id', $role);
        return $this->merger($this->db->get($this->table));
    }

    /**
     * GET CUSTOMER BY ID
     */
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->where_in('role_id', [2, 3]);
        $customer = $this->db->get('users');
        return $this->merger($customer, true);
    }

    /**
     * GET CUSTOMER ADDRESS BY ID
     */
    public function get_address_by_id($id)
    {
        $this->db->where('user_id', $id);
        $customer = $this->db->get('customers');
        return $customer->row(); //return single address of user
    }

    /**
     * CUSTOMER MERGER
     */
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $customers = $query_obj->result_array();
            foreach ($customers as $key => $customer) {
                $customer_data = $this->db->get_where('customers', array('user_id' => $customer['id']))->row_array();
                $customers[$key]['address_1']  = $customer_data['address_1'];
                $customers[$key]['coordinate_1']    = $customer_data['coordinate_1'] ? json_decode($customer_data['coordinate_1'], true) : ['latitude' => '', 'longitude' => ''];
               
            }
            return $customers;
        } else {
            $customer = $query_obj->row_array();
            if (isset($customer) && !empty($customer)) { 
                $customer_data = $this->db->get_where('customers', array('user_id' => $customer['id']))->row_array();
                $customer['address_1']  = (!empty($customer_data['address_1'])) ? $customer_data['address_1'] : '';
                $customer['coordinate_1']    = (!empty($customer_data['coordinate_1'])) ? json_decode($customer_data['coordinate_1'], true) : ['latitude' => '', 'longitude' => ''];
         
                return $customer;
            }
        }
    }

    /**
     * STORE CUSTOMER DATA
     *
     * @return boolean
     */
    public function store_customer()
    {
        $email = required(sanitize($this->input->post('email')));
        $phone = required(sanitize($this->input->post('phone')));
        if (email_duplication($email)) {

            if (phone_verify($phone)) {

                $data['name'] = required(sanitize($this->input->post('name')));
                $data['email'] = $email;
                $data['password'] = sha1(required($this->input->post('password')));
                $data['phone'] = $phone;
                $data['role_id'] = 2; // 2 for Customer
                $data['status'] = 1;
                $data['created_at'] = strtotime(date('d-m-y'));

                // UPLOAD THUMBNAIL
                if (!empty($_FILES['image']['name'])) {

                    $imageExtention = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                   
                    if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                       
                            $data['thumbnail']  = $this->upload('user', $_FILES['image']);

                    } else {

                        $this->session->set_flashdata('error_message', get_phrase('invalid_image_format'));
                        redirect(site_url('/customer'));
                       
                    }

                   
                }

                $this->db->insert('users', $data);
                //adding space for address using userid in customer table
                $user_id = $this->db->insert_id();
                $customer_data['user_id'] = $user_id;
                $this->db->insert('customers', $customer_data);

               // $customer_data = $this->update_customer_address();
              //  $customer_data['user_id'] = $this->db->insert_id();
              //  $this->db->insert('customers', $customer_data);

                return true;
            }else{

                  $this->session->set_flashdata('error_message', get_phrase('Invalid_number'));
                  redirect(site_url($_SERVER['PHP_SELF'], 'refresh'));

            }
        }
        
    }

    /**
     * UPDATE CUSTOMER DATA
     *
     * @return boolean
     */
    public function update_customer()
    {
        $id = required(sanitize($this->input->post('id'))); 
        $data['name'] = required(sanitize($this->input->post('name')));
        $data['updated_at'] = strtotime(date('d-m-y'));

        $previous_data = $this->get_by_id($id);

         
            // UPLOAD THUMBNAIL
            if (!empty($_FILES['image']['name'])) {

                $imageExtention = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
               
                if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                   
                        $data['thumbnail']  = $this->upload('user', $_FILES['image'], $previous_data["thumbnail"]);

                } else {

                    $this->session->set_flashdata('error_message', get_phrase('invalid_image_format'));
                   redirect(site_url($_SERVER['PHP_SELF'], 'refresh'));
                   
                }

               
            }


            $this->db->where('id', $id);
            $this->db->update('users', $data);

            return true;
     

    }

    /**
     * UPDATE CUSTOMER'S ADDRESS
     */
    public function update_customer_address()
    {   
        $id = required(sanitize($this->input->post('id')));

        $latitude_1 = sanitize($this->input->post('latitude_1'));
        $longitude_1 = sanitize($this->input->post('longitude_1'));
        $coordinate_1 = array('latitude' => $latitude_1, 'longitude' => $longitude_1);

        $address_data['street_no'] = required(sanitize($this->input->post('strNumber')));
        $address_data['street_name'] = required(sanitize($this->input->post('strName')));
        $address_data['city'] = required(sanitize($this->input->post('cityName')));

        $address_data['address_1'] = required(sanitize($this->input->post('address_1')));
        $address_data['coordinate_1'] = json_encode($coordinate_1); 

            $this->db->where('user_id', $id);
            $this->db->update('customers', $address_data);

                //loadup customer current address into session when update, get the updated address
                $user_id = array('user_id' => $id);
                $location = $this->db->get_where('customers', $user_id)->row(); //return single row
                if (!empty($location->address_1)) {
                  
                        //LOAD NEW ADDRESS INTO SESSION 
                        $this->session->set_userdata('streetNumber',  $location->street_no);
                        $this->session->set_userdata('streetName',  $location->street_name);
                        $this->session->set_userdata('cityName',  $location->city);
                        $this->session->set_userdata('fullAddress',  $location->address_1); 

                        //RESET CART IF USER TRYING TO ORDER FROM DIFFERENT CITY
                         if($this->cart_model->total_cart_items() > 0) {
                             $restaurant_id = $this->cart_model->get_restaurant_ids(); //CART RESTAURNT ID
                             $restaurant_data = $this->restaurant_model->get_by_id($restaurant_id[0]);
                              if ($address_data['city'] !== $restaurant_data['city']) {
                                $this->cart_model->clearing_cart();
                                //success('Cart reset due to restaurant unavailability in the given address.', 'settings/profile');
                              }
                         }
              
                 }

                

            return true;
    }

    /**
     * UPDATE CUSTOMER'S PHONE
     */
    public function update_customer_phone()
    {   
        $id = required(sanitize($this->input->post('id')));
        $data['phone'] = required(sanitize($this->input->post('phone')));
        $data['updated_at'] = strtotime(date('d-m-y'));

        if(phone_verify($data['phone'])) {
            $this->db->where('id', $id);
            $this->db->update('users', $data);
      
            return true;
        }else {

               $this->session->set_flashdata('error_message', get_phrase('Invalid_number'));
                redirect(site_url($_SERVER['PHP_SELF'], 'refresh'));

        }
            
    }

    /**
     * UPDATE CUSTOMER DATA STATUS
     * @return boolean
     */
    public function update_customer_status($id)
    {
        $previous_data = $this->get_by_id($id);
        if ($previous_data['status'] == 1) {
            $data['status'] = 2; //suspend
        }else if ($previous_data['status'] == 2) { 
            $data['status'] = 1; //approved
        } else { //pre:0
            $data['status'] = 1;
        }

        $this->db->where('id', $id);
        $this->db->update('users', $data);

        return true;
    }

    /**
     * DELETE CUSTOMER DATA
     * @return boolean
     */
    public function delete_customer($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');

        $this->db->where('user_id', $id);
        $this->db->delete('customers');

        return true;
    }
}
