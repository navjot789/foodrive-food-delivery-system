<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 23 - August - 2020
 * Author : TheDevs
 * Favourite Controller controlls the task for favourite menus
 */

include 'Authorization.php';
class Transactions extends Authorization
{

    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin', 'customer'], true);
    }

    // CHECK IF CUSTOMER IS LOGGEDIN
    function check_customer_login()
    {
        if (!$this->session->userdata('customer_login') && !$this->session->userdata('admin_login')) {
            return false;
        }
        return true;
    }

    // INDEX PAGE IS RESPONSIBLE FOR SHOWING INDEX PAGE
    public function index()
    {
        $page_data['page_name']  = 'transactions/index';
        $page_data['page_title'] = get_phrase("Your_Transactions", true);
        $page_data['transactions'] = $this->transaction_model->get_by_user();
        $this->load->view('backend/index', $page_data);
    }

    // HANDLE ADDING FAVOURITE
    function update($menu_id)
    {
        if (!$this->check_customer_login()) {
            error(get_phrase('login_first'), site_url('login'));
        }
        $response = $this->favourite_model->toggle_favourites($menu_id);
        if (!$response) {
            error(get_phrase('login_first'), $_SERVER['HTTP_REFERER']);
        } else {
            if ($response == "added") {
                success(get_phrase('added_to_the_favourites'), $_SERVER['HTTP_REFERER']);
            } else {
                success(get_phrase('removed_from_the_favourites'), $_SERVER['HTTP_REFERER']);
            }
        }
    }

     // HANDLE WALLET DEDUCTION DISPLAY
     function display_balance()
     {
        if (!$this->check_customer_login()) {
            error(get_phrase('login_first'), site_url('login'));
        }
        //IF SESSION EXIST
        if(!empty($this->session->userdata('wallet')) && $this->session->userdata('wallet') == 1) {
            //CHECKING CONDITIONS
            $deduct = $this->transaction_model->wallet_balance_remainder();
            if($deduct >= 0) { 
                    echo currency(format($deduct));
                }
        }else{
            //DISPLAYING THE ORDIGNAL WALLET BAL
            $main_bal = $this->transaction_model->wallet_balance();
            echo currency(format($main_bal));
        }
    
     }

    // GIVING USER CASHBACK as FDCREDIT
    function cashback()
    {
        $this->transaction_model->cashback($user, $code, $persent);
    
    }

    
}
