<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 09 - June - 2020
 * Author : TheDevs
 * Driver model handles all the database queries of Drivers
 */

class Driver_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    /**
     * GET ONLY APPROVED DRIVERS
     *
     */
    public function get_approved_drivers()
    {
        $this->db->where('status', 1);
        $this->db->where('role_id', 4);
        return $this->merger($this->db->get($this->table));
    }

    /**
     * GET ONLY PENDING DRIVERS
     */
    public function get_pending_drivers()
    {
        $this->db->where('status', 0);
        $this->db->where('role_id', 4);
        return $this->merger($this->db->get($this->table));
    }

    /**
     * GET ONLY SUSPENDED DRIVERS
     */
    public function get_suspend_drivers()
    {
        $this->db->where('status', 2);
        $this->db->where('role_id', 4);
        return $this->merger($this->db->get($this->table));
    }

    /**
     * GET DRIVER BY ID
     */
    public function get_by_id($id)
    {
        $driver = $this->db->get_where('users', array('id' => $id, 'role_id' => 4));
        return $this->merger($driver, true);
    }

    /**
     * GET DRIVER DATA WITH ID (ONLINE-OFFLINE)
     *
     */
    public function get_drivers_data_by_id($id)
    {
        return  $this->db->get_where('drivers', array('user_id' => $id))->row_array();
    }
 
     /**
     * GET DRIVER YESTERDAY ORDERS
     *
     */
    public function get_yesterday_orders()
    {
         
        $yesterday = strtotime(date("D, d-M-Y H:i:s",strtotime('yesterday 23:59:00'))); //Day end yesterday
        $this->db->where('driver_id', $this->session->userdata('user_id'));
         $this->db->where('order_placed_at <=', $yesterday);
         $where = '(order_status <> "delivered" AND order_status <> "refunded" AND order_status <> "canceled")';
         $this->db->where($where);
         return $this->db->get("orders")->result_array();
        
    }

    /**
     * DRIVER MERGER
     */
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $drivers = $query_obj->result_array();
            foreach ($drivers as $key => $driver) {
                $driver_data = $this->db->get_where('drivers', array('user_id' => $driver['id']))->row_array();
                $drivers[$key]['vehicle_type']  = $driver_data['vehicle_type'];
                $drivers[$key]['address']  = $driver_data['address'];
            }
            return $drivers;
        } else {
            $driver = $query_obj->row_array();
            $driver_data = $this->db->get_where('drivers', array('user_id' => $driver['id']))->row_array();
            $driver['vehicle_type'] = $driver_data['vehicle_type'];
            $driver['address'] = $driver_data['address'];
            return $driver;
        }
    }


     // Admin authentication
     public function admin_authentication_only()
     {
         $user_id = $this->logged_in_user_id;
         if ($this->logged_in_user_role == "admin") {
             return true;
         }
         return false;
     }

    /**
     * STORE DRIVER DATA
     */
    public function store_driver()
    {
        $email = required(sanitize($this->input->post('email')));
        $phone = required(sanitize($this->input->post('phone')));
        if (email_duplication($email)) {

         if(phone_verify($phone)) {

            $data['name'] = required(sanitize($this->input->post('name')));
            $data['email'] = $email;
            $data['password'] = sha1(required($this->input->post('password')));
            $data['phone'] = $phone;
            $data['role_id'] = 4; // 4 for drivers
            $data['status'] = $this->session->userdata('admin_login') ? 1 : 0;
            $data['created_at'] = strtotime(date('d-m-y'));

               // UPLOAD THUMBNAIL
            if (!empty($_FILES['image']['name'])) {

                $imageExtention = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
               
                if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                   
                        $data['thumbnail']  = $this->upload('user', $_FILES['image']);

                } else {

                    $this->session->set_flashdata('error_message', get_phrase('invalid_image_format'));
                    redirect($_SERVER['HTTP_REFERER'], 'refresh');
                   
                }

               
            }
           
            $this->db->insert('users', $data);

            $driver_data['user_id'] = $this->db->insert_id();
            $driver_data['vehicle_type'] = sanitize($this->input->post('vehicle_type'));
            $driver_data['address'] = sanitize($this->input->post('address'));
            $this->db->insert('drivers', $driver_data);

            return true;

         }else{
                 $this->session->set_flashdata('error_message', get_phrase('Invalid_number'));
               redirect($_SERVER['HTTP_REFERER'], 'refresh');
             }
        }
    }

    /**
     * UPDATE DRIVER DATA
     */
    public function update_driver()
    {
        $id = required(sanitize($this->input->post('id')));
        $previous_data = $this->get_by_id($id);

            $data['name'] = required(sanitize($this->input->post('name')));
            $data['updated_at'] = strtotime(date('d-m-y'));

            // UPLOAD THUMBNAIL
            if (!empty($_FILES['image']['name'])) {

                $imageExtention = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
               
                if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                   
                        $data['thumbnail']  = $this->upload('user', $_FILES['image'], $previous_data["thumbnail"]);

                } else {

                    $this->session->set_flashdata('error_message', get_phrase('invalid_image_format'));
                   redirect($_SERVER['HTTP_REFERER'], 'refresh');
                   
                }
            }


            $this->db->where('id', $id);
            $this->db->update('users', $data);

            $driver_data['vehicle_type'] = sanitize($this->input->post('vehicle_type'));
            $driver_data['address'] = sanitize($this->input->post('address'));

            $this->db->where('user_id', $id);
            $this->db->update('drivers', $driver_data);

            return true;
        
    }

    // UPDATE DRIVER PHONE
    public function update_driver_phone()
    {
        $id = required(sanitize($this->input->post('id')));
        $data['phone'] = required(sanitize($this->input->post('phone')));
        $data['updated_at'] = strtotime(date('d-m-y'));
        if (phone_verify($data['phone'])) {
         
             $this->db->where('id', $id);
             $this->db->update('users', $data);
        return true;
        }else {

               $this->session->set_flashdata('error_message', get_phrase('Invalid_number'));
               redirect($_SERVER['HTTP_REFERER'], 'refresh');

        }
        
    }


    /**
     * UPDATE DRIVER DATA STATUS
     */
    public function update_driver_status($id)
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
     * DELETE DRIVER DATA
     */
    public function delete_driver($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');

        $this->db->where('user_id', $id);
        $this->db->delete('drivers');

        return true;
    }


    /**
     * GET DRIVER'S DELIVERED ORDER DATA FOR THIS WEEK (MON-SUN)
     */

    public function get_this_week_delivered_order_data($driver_id = null)
    {
        $driver_id = $driver_id ? $driver_id : $this->logged_in_user_id;
        $conditions['driver_id'] = $driver_id;

       // $day = date('w');
        $week_start = date('D, d-M-Y', strtotime('monday this week')) . ' 00:00:01';
        $week_end = date('D, d-M-Y', strtotime('sunday this week')) . ' 23:59:59';
        $conditions['order_delivered_at >=']   = strtotime($week_start);
        $conditions['order_delivered_at <=']     = strtotime($week_end);
        return $this->order_model->get_by_condition($conditions);
    }

    /**
     * GET DRIVER'S DELIVERED ORDER DATA FOR THIS MONTH
     */

    public function get_this_month_delivered_order_data($driver_id = null)
    {
        $driver_id = $driver_id ? $driver_id : $this->logged_in_user_id;
        $conditions['driver_id'] = $driver_id;

        $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:00';
        $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
        $conditions['order_delivered_at >=']   = strtotime($first_day_of_month);
        $conditions['order_delivered_at <=']     = strtotime($last_day_of_month);
        return $this->order_model->get_by_condition($conditions);
    }

    /**
     * GET DRIVER'S TOTAL DELIVERED ORDER DATA
     */

    public function get_total_delivered_order_data($driver_id = null)
    {
        $driver_id = $driver_id ? $driver_id : $this->logged_in_user_id;
        $conditions['driver_id'] = $driver_id;
        $conditions['order_status'] = "delivered";
        return $this->order_model->get_by_condition($conditions);
    }

    /**
     * CHECK IF DRIVER IS IN A RIDE NOW
     */

    public function in_ride($driver_id = null)
    {
        $driver_id = $driver_id ? $driver_id : $this->logged_in_user_id;
        $conditions['driver_id'] = $driver_id;

        $driver_data = $this->driver_model->get_drivers_data_by_id($conditions['driver_id']); //CHECKING ONLINE STATUS
        if ($driver_data['status'] == 1) { 
            //online
                $starting_time = date('D, d-M-Y') . ' 00:00:00';
                $ending_time = date('D, d-M-Y') . ' 23:59:59';
                $conditions['order_placed_at >='] = strtotime($starting_time);
                $conditions['order_placed_at <='] = strtotime($ending_time);
                $todays_orders = $this->order_model->get_by_condition($conditions);

                $conditions['order_status'] = "delivered";
                $todays_delivered_orders = $this->order_model->get_by_condition($conditions);
                if (count($todays_orders) !== count($todays_delivered_orders)) {
                    return 2; //driver is  bussy
                } else {
                    return 3; //driver is free
               } 
            
            }else {
                return 0; //driver is offline
            }
    }

    /**
     * DRIVER ONLINE-OFFLINE MODE
     */

    public function mode()
    {
        $data['status'] =  required(sanitize($this->input->post('status')));
        $this->db->where('user_id', $this->logged_in_user_id);
        $result = $this->db->update('drivers', $data);
        if($result){
            $this->session->set_userdata('driver_mode', $data['status']);
            return true;
        }
        return false;
    }
}
