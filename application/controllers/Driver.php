<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 09 - July - 2020
 * Author : TheDevs
 * Driver Controller controlls the The Drivers
 */

include 'Authorization.php';

class Driver extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin','driver'], true);//admin,owner,customer,driver
    }

    // index function responsible for showing the index page.
    function index()
    {
          // ADMIN ACCESS ONLY AUTHENTICITY
          $authenticity = $this->driver_model->admin_authentication_only();
          if (!$authenticity) {
              error(get_phrase('your_are_not_authorized'), site_url('/'));
          }
        
        $page_data['status'] = isset($_GET['status']) ? sanitize($_GET['status']) : 1;
        $page_data['page_name'] = 'driver/index';
        $page_data['page_title'] = get_phrase("drivers");

        /**PAGINATION STARTS**/
        if($page_data['status'] == 1){
            $drivers =  $this->driver_model->get_approved_drivers();
        }else if($page_data['status'] == 2){
            $drivers = $this->driver_model->get_suspend_drivers();
        }else{
            $drivers = $this->driver_model->get_pending_drivers();
        }
        
        $total_rows = count($drivers);
        $page_size = 12;
        $config = pagintaion($total_rows, $page_size, site_url('driver'));
        $current_page = sanitize($this->input->get('page', 0));
        $this->pagination->initialize($config);
        $conditions = array(
            'role_id' => 4,
            'status'  => $page_data['status']
        );
        $page_data['drivers'] = $this->driver_model->merger($this->driver_model->paginate($page_size, $current_page, $conditions, "id", "asc"));
        /**PAGINATION ENDS**/

        $this->load->view('backend/index', $page_data);
    }

    // create function is responsible for showing driver adding view
    function create()
    {
          // ADMIN ACCESS ONLY AUTHENTICITY
          $authenticity = $this->driver_model->admin_authentication_only();
          if (!$authenticity) {
              error(get_phrase('your_are_not_authorized'), site_url('/'));
          }

        $page_data['page_name'] = 'driver/create';
        $page_data['page_title'] = get_phrase("register_new_driver");
        $this->load->view('backend/index', $page_data);
    }

    // store function is responsible for storing driver's data
    function store()
    {
          // ADMIN ACCESS ONLY AUTHENTICITY
          $authenticity = $this->driver_model->admin_authentication_only();
          if (!$authenticity) {
              error(get_phrase('your_are_not_authorized'), site_url('/'));
          }

        $response = $this->driver_model->store_driver();
        if ($response) {
            success(get_phrase('driver_added_successfully'), site_url('driver'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('driver'));
        }
    }

    // profile function is responsible for showing the profile page of a driver
    function profile($id, $active_tab = "activity")
    {
        $page_data['status'] = isset($_GET['status']) ? sanitize($_GET['status']) : "delivered";

        // ADMIN ACCESS ONLY AUTHENTICITY
         $authenticity = $this->driver_model->admin_authentication_only();
         if (!$authenticity) {
             error(get_phrase('your_are_not_authorized'), site_url('/'));
         }
        
        if (isset($_GET['date_range']) && !empty($_GET['date_range'])) {
            $date_range                   = sanitize($this->input->get('date_range'));
            $date_range                   = explode(" - ", $date_range);
            $page_data['starting_timestamp'] = strtotime($date_range[0] . ' 00:00:00');
            $page_data['ending_timestamp']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:00';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $page_data['starting_timestamp']   = strtotime($first_day_of_month);
            $page_data['ending_timestamp']     = strtotime($last_day_of_month);
        }
        $page_data['page_name'] = 'driver/profile';
        $page_data['tab'] = $active_tab;
        $page_data['page_title'] = get_phrase("driver_profile");
        $page_data['driver'] = $this->driver_model->get_by_id($id);

        $page_data['orders'] = $this->order_model->get_by_condition(['driver_id' => $id, 'order_status' => $page_data['status'], 'order_placed_at >=' => $page_data['starting_timestamp'], 'order_placed_at <=' => $page_data['ending_timestamp']]);
        $this->load->view('backend/index', $page_data);
    }

     // earning function is responsible for showing the earning page of a driver
    function earnings($id="", $active_tab = "Earnings")
    {
        $page_data['status'] = isset($_GET['status']) ? sanitize($_GET['status']) : "delivered";

        if (empty($id)) {
            $id = $this->logged_in_user_id;
        }

        if (isset($_GET['date_range']) && !empty($_GET['date_range'])) {
            $date_range                   = sanitize($this->input->get('date_range'));
            $date_range                   = explode(" - ", $date_range);
            $page_data['starting_timestamp'] = strtotime($date_range[0] . ' 00:00:00');
            $page_data['ending_timestamp']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:00';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $page_data['starting_timestamp']   = strtotime($first_day_of_month);
            $page_data['ending_timestamp']     = strtotime($last_day_of_month);
        }
        $page_data['page_name'] = 'driver/earnings';
        $page_data['tab'] = $active_tab;
        $page_data['page_title'] = get_phrase("driver_earnings");
        $page_data['driver'] = $this->driver_model->get_by_id($id);
        $page_data['orders'] = $this->order_model->get_by_condition(['driver_id' => $id, 'order_status' => $page_data['status'], 'order_placed_at >=' => $page_data['starting_timestamp'], 'order_placed_at <=' => $page_data['ending_timestamp']]);
        $this->load->view('backend/index', $page_data);
    }

  

    // Update function is responsible for updating the profile data of a driver
    function update()
    {
          // ADMIN ACCESS ONLY AUTHENTICITY
          $authenticity = $this->driver_model->admin_authentication_only();
          if (!$authenticity) {
              error(get_phrase('your_are_not_authorized'), site_url('/'));
          }

        $response = $this->driver_model->update_driver();
        if ($response) {
            success(get_phrase('driver_updated_successfully'), site_url('driver'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('driver'));
        }
    }

    // Update function is responsible for updating the phone of a driver
    function update_phone()
    {
         // ADMIN ACCESS ONLY AUTHENTICITY
         $authenticity = $this->driver_model->admin_authentication_only();
         if (!$authenticity) {
             error(get_phrase('your_are_not_authorized'), site_url('/'));
         }
       
        $response = $this->driver_model->update_driver_phone();
        if ($response) {
            success(get_phrase('driver_updated_successfully'), site_url('driver'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('driver'));
        }
    }

    // Delete function is responsible for deleting the profile data of a driver
    function delete($id)
    {
          // ADMIN ACCESS ONLY AUTHENTICITY
          $authenticity = $this->driver_model->admin_authentication_only();
          if (!$authenticity) {
              error(get_phrase('your_are_not_authorized'), site_url('/'));
          }
        
        $response = $this->driver_model->delete_driver($id);
        if ($response) {
            success(get_phrase('driver_deleted_successfully'), site_url('driver'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('driver'));
        }
    }

    // UPDATE DRIVER STATUS
    function update_status($id)
    {
          // ADMIN ACCESS ONLY AUTHENTICITY
          $authenticity = $this->driver_model->admin_authentication_only();
          if (!$authenticity) {
              error(get_phrase('your_are_not_authorized'), site_url('/'));
          }
        
        $response = $this->driver_model->update_driver_status($id);
        if ($response) {
            success(get_phrase('driver_updated_successfully'), site_url('driver/profile/' . $id));
        } else {
        }
    }

    // UPDATE DRIVER ONLINE/OFFLINE STATUS
    function mode()
    {
        $response = $this->driver_model->mode();
        if ($response) {
            $arr = array('code'=> 200);
            echo json_encode($arr);
        }
    }
}

/* End of file Driver.php */
