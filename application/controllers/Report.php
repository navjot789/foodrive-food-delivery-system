<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 28 - August - 2020
 * Author : TheDevs
 * Report Controller controlls the all the function that is related to order reports
 */

include 'Authorization.php';

class Report extends Authorization
{

    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin', 'owner'], true);
    }

    // index function responsible for showing the index page.
    function index()
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (isset($_GET['restaurant_id']) && $_GET['restaurant_id'] != "all") {
            if (!has_access('restaurants', $_GET['restaurant_id'])) {
                error(get_phrase('you_are_not_authorized_for_this_action'), site_url('report'));
            }
        }

        $page_data['restaurant_id'] = (isset($_GET['restaurant_id']) && $_GET['restaurant_id'] != "all") ? sanitize($_GET['restaurant_id']) : "all";
        $page_data['page_name'] = 'report/index';
        $page_data['report_type'] = 'owner';
        $page_data['page_title'] = get_phrase("owner_commission_report");
        $page_data['restaurants'] = $this->restaurant_model->get_all_approved();
        $page_data['commissions'] = $this->report_model->filter_commissions();
        $this->load->view('backend/index', $page_data);
    }

    // Admin FUNCTION WILL SHOW THE ADMIN REVENUE LIST
    function admin()
    {
        authorization(['admin'], true);

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
        $page_data['page_name'] = 'report/index';
        $page_data['report_type'] = 'admin';
        $page_data['page_title'] = get_phrase("admin_commission_report");
        $page_data['commissions'] = $this->report_model->filter_admin_commissions();
        $this->load->view('backend/index', $page_data);
    }

    // DETAILS FUNCTION SHOWS THE DETAILS REPORT OF COMMISSIONS
    function details($restaurant_id = null)
    {
        if (empty($restaurant_id)) {
            error(get_phrase('select_a_restaurant'), site_url('report'));
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

        $restaurant_details = $this->restaurant_model->get_by_id($restaurant_id);
        $page_data['restaurant_details'] = $restaurant_details;
        $page_data['page_name'] = 'report/index';
        $page_data['report_type'] = 'details';
        $page_data['page_title'] = get_phrase("commission_details_for_") . ' ' . $restaurant_details['name'];
        $page_data['commission_details'] = $this->report_model->get_commission_details($restaurant_id, $page_data['starting_timestamp'], $page_data['ending_timestamp']);
        $this->load->view('backend/index', $page_data);
    }

   // PAYMENT HISTORY FUNCTION SHOWS THE DETAILS REPORT OF PAST PAYEMENT OF PERTICULAR RESTAURNAT
    function payment_history($restaurant_id = null)
    {
        if (empty($restaurant_id)) {
            error(get_phrase('select_a_restaurant'), site_url('report'));
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

       

        $restaurant_details = $this->restaurant_model->get_by_id($restaurant_id);
        $page_data['restaurant_details'] = $restaurant_details;
        $page_data['page_name'] = 'report/index';
        $page_data['report_type'] = 'payment_history';
        $page_data['page_title'] = get_phrase("Payment_history_for_") . ' ' . $restaurant_details['name'];
        $page_data['payment_history'] = $this->report_model->get_commission_pay_history($restaurant_id, $page_data['starting_timestamp'], $page_data['ending_timestamp']);
        $this->load->view('backend/index', $page_data);
    }
    // PAY FUNCTION IS BEING USED FOR PAYING A RESTAURANT OWNER
    function pay()
    {
        authorization(['admin'], true);

        $response = $this->report_model->pay_to_restaurant_owner();
        if ($response) {
            success(get_phrase('payment_information_saved'), site_url('report'));
        }
    }
}
