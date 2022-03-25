<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 20 - June - 2020
 * Author : TheDevs
 * Owner model handles all the database queries of Owner
 */

class Owner_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    // GET ALL OWNERS, WHICH IS ROLE ID 3
    public function get_all()
    {
        $this->db->where('role_id', 3);
        return $this->owner_merger($this->db->get($this->table));
    }

    // GET ONLY APPROVED OWNERS, WHICH IS ROLE ID 3
    public function get_approved_owners()
    {
        $this->db->where('status', 1);
        $this->db->where('role_id', 3);
        return $this->owner_merger($this->db->get($this->table));
    }

    // GET ONLY PENDING OWNERS, WHICH IS ROLE ID 3
    public function get_pending_owners()
    {
        $this->db->where('role_id', 3);
        $this->db->where('status', 0);
        return $this->owner_merger($this->db->get($this->table));
    }


    // GET OWNER BY ID
    public function get_owner_by_id($id)
    {
        $owner = $this->db->get_where($this->table, array('id' => $id, 'role_id' => 3));
        return $this->owner_merger($owner, true);
    }



    // owner MERGER
    public function owner_merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $owners = $query_obj->result_array();
            foreach ($owners as $key => $owner) {
                $owner_data = $this->db->get_where('customers', array('user_id' => $owner['id']))->row_array();
                $owners[$key]['address_1']  = $owner_data['address_1'];
                $owners[$key]['address_2']  = $owner_data['address_2'];
                $owners[$key]['address_3']  = $owner_data['address_3'];
                $owners[$key]['coordinate_1']    = $owner_data['coordinate_1'] ? json_decode($owner_data['coordinate_1'], true) : ['latitude' => '', 'longitude' => ''];
                $owners[$key]['coordinate_2']    = $owner_data['coordinate_2'] ? json_decode($owner_data['coordinate_2'], true) : ['latitude' => '', 'longitude' => ''];
                $owners[$key]['coordinate_3']    = $owner_data['coordinate_3'] ? json_decode($owner_data['coordinate_3'], true) : ['latitude' => '', 'longitude' => ''];

                $approved_restaurants = $this->restaurant_model->get_restaurants_by_condition(['owner_id' => $owner['id'], 'status' => 1]);
                $pending_restaurants  = $this->restaurant_model->get_restaurants_by_condition(['owner_id' => $owner['id'], 'status' => 0]);

                $owners[$key]['number_of_approved_restaurants'] = count($approved_restaurants) ? count($approved_restaurants) : 0;
                $owners[$key]['number_of_pending_restaurants']  = count($pending_restaurants) ? count($pending_restaurants) : 0;
            }
            return $owners;
        } else {
            $owner = $query_obj->row_array();
            $owner_data = $this->db->get_where('customers', array('user_id' => $owner['id']))->row_array();
            $owner['address_1']  = $owner_data['address_1'];
            $owner['address_2']  = $owner_data['address_2'];
            $owner['address_3']  = $owner_data['address_3'];
            $owner['coordinate_1']    = $owner_data['coordinate_1'] ? json_decode($owner_data['coordinate_1'], true) : ['latitude' => '', 'longitude' => ''];
            $owner['coordinate_2']    = $owner_data['coordinate_2'] ? json_decode($owner_data['coordinate_2'], true) : ['latitude' => '', 'longitude' => ''];
            $owner['coordinate_3']    = $owner_data['coordinate_3'] ? json_decode($owner_data['coordinate_3'], true) : ['latitude' => '', 'longitude' => ''];

            $approved_restaurants = $this->restaurant_model->get_restaurants_by_condition(['owner_id' => $owner['id'], 'status' => 1]);
            $pending_restaurants  = $this->restaurant_model->get_restaurants_by_condition(['owner_id' => $owner['id'], 'status' => 0]);

            $owner['number_of_approved_restaurants'] = count($approved_restaurants) ? count($approved_restaurants) : 0;
            $owner['number_of_pending_restaurants']  = count($pending_restaurants) ? count($pending_restaurants) : 0;
            return $owner;
        }
    }


    //UPDATE owner profile DATA
    public function update_owner()
    {

        $id = required(sanitize($this->input->post('id')));  
        $data['name'] = required(sanitize($this->input->post('name')));
        $data['updated_at'] = strtotime(date('d-m-y'));

        $previous_data = $this->get_owner_by_id($id);
          
            // UPLOAD THUMBNAIL
            if (!empty($_FILES['image']['name'])) {

                $imageExtention = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
               
                if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                   
                        $data['thumbnail']  = $this->upload('user', $_FILES['image'], $previous_data["thumbnail"]);

                } else {

                    $this->session->set_flashdata('error_message', get_phrase('invalid_image_format'));
                    redirect(site_url('/customer/profile/'.$id.'/profile'));
                  
                }

               
            }


            $this->db->where('id', $id);
            $this->db->update($this->table, $data);

            return true;
         
    }

    // UPDATE owner'S ADDRESS
    public function update_owner_address()
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
            return true;
    }


    /**
     * UPDATE OWNER'S PHONE
     */
    public function update_owner_phone()
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


    //UPDATE owner DATA STATUS
    public function update_owner_status($id)
    {
        $previous_data = $this->get_owner_by_id($id);
        if ($previous_data['status']) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return true;
    }

    // DELETE owner DATA
    public function delete_owner($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);

        $this->db->where('user_id', $id);
        $this->db->delete('customers');

        return true;
    }

    // UPDATE THIS RESTAURANT OWNER ROLE TO CUSTOMER
    public function become_customer($user_id)
    {
        $previous_data = $this->user_model->get_user_by_id($user_id);
        if ($previous_data['role_id'] != 1 && $previous_data['role_id'] != 4) {
            $this->db->where('id', $user_id);
            $this->db->update('users', ['role_id' => 2]);
            return true;
        }
        return false;
    }

    // UPDATE CUSTOMER ROLE TO RESTAURANT OWNER ROLE MEANS UPDATE TOT 2 -> 3
    public function become_restaurant_owner($user_id)
    {
        $previous_data = $this->user_model->get_user_by_id($user_id);
        if ($previous_data['role_id'] != 1 && $previous_data['role_id'] != 4) {
            $this->db->where('id', $user_id);
            $this->db->update('users', ['role_id' => 3]);
            return true;
        }
        return false;
    }

    /**
     * LIVE ORDERS USER WISE
     */

    /**
     * THIS FUNCTION IS ONLY APPLICABLE FOR DRIVERS ORDERS. IT WILL BE CALLED INTERNALLY
     *
     * @return object
     */
    public function get_live_orders() 
    {
        $todays_starting_time = strtotime(date('D, d-M-Y') . ' 00:00:01');
        $todays_ending_time = strtotime(date('D, d-M-Y') . ' 23:59:59');

        // CHECK THE LOGGED IN USER ROLE IS OWNER
        if ($this->logged_in_user_role == "owner") {
            // AT FIRST CHECK IF THE OWNER HAS ANY RESTAURANT
            $restaurant_ids = $this->restaurant_model->get_approved_restaurant_ids_by_owner_id($this->logged_in_user_id);
            if (count($restaurant_ids)) {
                $order_codes = $this->get_order_code_by_restaurant_id($restaurant_ids);
            } else {
                return array('pending' => array(), 'approved' => array(), 'preparing' => array(), 'prepared' => array(), 'delivered' => array());
            }
        }

        // PENDING ORDERS
        $this->db->where('order_placed_at >=', $todays_starting_time);
        $this->db->where('order_placed_at <=', $todays_ending_time);
        // CHECK USER ROLES
        if ($this->logged_in_user_role == "driver") {
            $this->db->where('driver_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "customer") {
            $this->db->where('customer_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "owner") {
            if ($order_codes && count($order_codes)) {
                $this->db->where_in('code', $order_codes);
            } else {
                return array();
            }
        }
        $this->db->order_by("id", "asc");
        $this->db->where('order_status', 'pending');
        $obj = $this->db->get('orders');
        $orders['pending'] = $this->order_merger($obj);

        // APPROVED ORDERS
        $this->db->where('order_placed_at >=', $todays_starting_time);
        $this->db->where('order_placed_at <=', $todays_ending_time);
        // CHECK USER ROLES
        if ($this->logged_in_user_role == "driver") {
            $this->db->where('driver_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "customer") {
            $this->db->where('customer_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "owner") {
            if ($order_codes && count($order_codes)) {
                $this->db->where_in('code', $order_codes);
            } else {
                return array();
            }
        }
        $this->db->order_by("id", "asc");
        $this->db->where('order_status', 'approved');
        $obj = $this->db->get('orders');
        $orders['approved'] = $this->order_merger($obj);

        // PREPARING
        $this->db->where('order_placed_at >=', $todays_starting_time);
        $this->db->where('order_placed_at <=', $todays_ending_time);
        // CHECK USER ROLES
        if ($this->logged_in_user_role == "driver") {
            $this->db->where('driver_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "customer") {
            $this->db->where('customer_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "owner") {
            if ($order_codes && count($order_codes)) {
                $this->db->where_in('code', $order_codes);
            } else {
                return array();
            }
        }
        $this->db->order_by("id", "asc");
        $this->db->where('order_status', 'preparing');
        $obj = $this->db->get('orders');
        $orders['preparing'] = $this->order_merger($obj);

        // PREPARED ORDERS
        $this->db->where('order_placed_at >=', $todays_starting_time);
        $this->db->where('order_placed_at <=', $todays_ending_time);
        // CHECK USER ROLES
        if ($this->logged_in_user_role == "driver") {
            $this->db->where('driver_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "customer") {
            $this->db->where('customer_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "owner") {
            if ($order_codes && count($order_codes)) {
                $this->db->where_in('code', $order_codes);
            } else {
                return array();
            }
        }
        $this->db->order_by("id", "asc");
        $this->db->where('order_status', 'prepared');
        $obj = $this->db->get('orders');
        $orders['prepared'] = $this->order_merger($obj);

        // DELIVERED ORDERS
        $this->db->where('order_placed_at >=', $todays_starting_time);
        $this->db->where('order_placed_at <=', $todays_ending_time);
        // CHECK USER ROLES
        if ($this->logged_in_user_role == "driver") {
            $this->db->where('driver_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "customer") {
            $this->db->where('customer_id', $this->logged_in_user_id);
        } elseif ($this->logged_in_user_role == "owner") {
            if ($order_codes && count($order_codes)) {
                $this->db->where_in('code', $order_codes);
            } else {
                return array();
            }
        }
        $this->db->order_by("id", "asc");
        $this->db->where('order_status', 'delivered');
        $obj = $this->db->get('orders');
        $orders['delivered'] = $this->order_merger($obj);

        return $orders;
    }
}
