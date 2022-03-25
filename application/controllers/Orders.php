<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 22 - August - 2020
 * Author : TheDevs
 * Orders Controller controlls the task for orders
 */

include 'Authorization.php';
class Orders extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin', 'owner', 'customer', 'driver'], true);
    }

    /**
     * index function responsible for showing the index page of order
     *
     * @return void
     */
    public function index()
    {
        $page_data['restaurant_id'] = isset($_GET['restaurant_id']) ? sanitize($_GET['restaurant_id']) : "all";
        $page_data['customer_id'] = isset($_GET['customer_id']) ? sanitize($_GET['customer_id']) : "all";
        $page_data['driver_id'] = isset($_GET['driver_id']) ? sanitize($_GET['driver_id']) : "all";
        $page_data['status'] = isset($_GET['status']) ? sanitize($_GET['status']) : "all";

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

        $page_data['restaurants'] = $this->restaurant_model->get_all_approved();
        $page_data['customers'] = $this->customer_model->get_approved_customers(2);
        $page_data['drivers'] = $this->driver_model->get_approved_drivers();

        $page_data['page_name'] = 'orders/index';
        $page_data['order_type'] = 'all';
        $page_data['page_title'] = get_phrase("all_orders");
        $page_data['orders'] = $this->order_model->filter();
        $this->load->view('backend/index', $page_data);
    }

    // TODAYS ORDERS
    public function today()
    {
        $page_data['restaurant_id'] = isset($_GET['restaurant_id']) ? sanitize($_GET['restaurant_id']) : "all";
        $page_data['customer_id'] = isset($_GET['customer_id']) ? sanitize($_GET['customer_id']) : "all";
        $page_data['driver_id'] = isset($_GET['driver_id']) ? sanitize($_GET['driver_id']) : "all";
        $page_data['status'] = isset($_GET['status']) ? sanitize($_GET['status']) : "all";

        $page_data['restaurants'] = $this->restaurant_model->get_all_approved();
        $page_data['customers'] = $this->customer_model->get_approved_customers(2);
        $page_data['drivers'] = $this->driver_model->get_approved_drivers();

        $page_data['page_name'] = 'orders/index';
        $page_data['order_type'] = 'today';
        $page_data['page_title'] = get_phrase("todays_orders");
        $page_data['orders'] = $this->order_model->get_todays_orders();
        $this->load->view('backend/index', $page_data);
    }

    // GET DETAILS OF AN ORDER
    public function details($order_code)
    {
        if (!$this->order_model->is_valid($order_code)) {
            error(get_phrase('invalid_order'), site_url('orders'));
        }

        $page_data['page_name'] = 'orders/details';
        $page_data['page_title'] = get_phrase("order_details");
        $page_data['order_code'] = $order_code;
        $page_data['order_data'] = $this->order_model->get_by_code($order_code);
        $page_data['ordered_items'] = $this->order_model->details($order_code);
        $this->load->view('backend/index', $page_data);
    }


     // earnings function is responsible for showing the earning page of a driver
     function earnings($id)
     {
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
         $page_data['page_name'] = 'earnings';
         
         $page_data['page_title'] = get_phrase("driver_earnings");
         $page_data['driver'] = $this->driver_model->get_by_id($id);
         $page_data['orders'] = $this->order_model->get_by_condition(['driver_id' => $id, 'order_placed_at >=' => $page_data['starting_timestamp'], 'order_placed_at <=' => $page_data['ending_timestamp']]);
         $this->load->view('backend/index', $page_data);
     }

    // PROCESSING ORDERS MAKE SURE THAT THE USER IS ADMIN
    public function process($order_code, $phase)
    {
        authorization(['admin','owner','driver'], true);
        $this->order_model->process($order_code, $phase);
    }

    // ASSIGN A DRIVER TO AN ORDER
    public function assign_driver()
    {
        authorization(['admin'], true);
        $this->order_model->assign_driver();
    }

     // DRIVER INTERCHANGE
     public function interchange_driver()
     {
         authorization(['admin'], true);
         $this->order_model->interchange_driver();
     }

    // ADD DRIVER TIP: COD/CREDIT-DEBIT
    public function add_driver_tip()
    {
        authorization(['admin','driver'], true);
        $response = $this->order_model->add_driver_tip();
        if ($response) {
            if ($this->logged_in_user_role == "admin") {
                success(get_phrase('Tip_added_successfully'), site_url('driver'));
            }else{
                 //success(get_phrase('Tip_added_successfully'), site_url('orders/today'));
                   $response = array("status"=>200,"msg"=>'Tip added successfully!', "url"=> site_url('orders/today')); 
                   echo json_encode($response);
                 
            }
        } else {
            error(get_phrase('invalid_order_code'), site_url('orders/today'));
        }
    }

    // WRITE A NOTE
    public function add_note()
    {
        authorization(['admin','driver'], true);
        $response = $this->order_model->add_note();
        if ($response) {
            success(get_phrase('note_added_successfully'), site_url('orders/today'));
        } else {
            error(get_phrase('invalid_order_code'), site_url('orders/today'));
        }
    }

    // CANCEL AN ORDER. BEFORE CANCELING AN ORDER MAKE SURE TO CHECK THE CUSTOMER ID AND THE ORDER STATUS
    public function cancel($order_code)
    {
        authorization(['admin','owner','customer'], true);
        $is_valid = $this->order_model->is_valid($order_code);
        if (!$is_valid) {
            error(get_phrase('nothing_found'), site_url('orders'));
        }

        $response = $this->order_model->process_cancel($order_code);
        if ($response) {
            success(get_phrase('order_canceled_successfully'), site_url('orders/details/' . $order_code));
        } else {
            error(get_phrase('this_order_can_not_be_cancel_or_already_approved'), site_url('orders/details/' . $order_code));
        }
    }

     // LIVE ORDERS FOR TODAY
    public function live($response = false)
    {
        $page_data['page_name'] = 'orders/index';
        $page_data['order_type'] = 'live';
        $page_data['page_title'] = get_phrase("live_orders");
        $page_data['orders'] = $this->order_model->get_live_orders();
        if ($response == 'data') {
            echo json_encode($page_data['orders']);
        } elseif ($response == 'view') {
            $this->load->view('backend/' . $this->logged_in_user_role . '/orders/live-data', $page_data);
        } else {
            $this->load->view('backend/index', $page_data);
        }
    }

     // GET NUMBER OF ORDERS SPECIALLY FOR AJAX CALLS
    public function get_number_of_orders($phase)
    {
        echo $this->order_model->get_number_of_orders($phase);
    }

    public function get_number_of_todays_pending_orders()
    {
        echo $this->order_model->get_number_of_todays_pending_orders();
    }

}

/* End of file Orders.php */