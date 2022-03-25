<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 23 - August - 2020
 * Author : TheDevs
 * Favourite Controller controlls the task for favourite menus
 */

include 'Authorization.php';
class Favourite extends Authorization
{

    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['customer', 'owner'], true);
    }

    // CHECK IF CUSTOMER IS LOGGEDIN
    function check_customer_login()
    {
        if (!$this->session->userdata('customer_login') && !$this->session->userdata('owner_login')) {
            return false;
        }
        return true;
    }

    // INDEX PAGE IS RESPONSIBLE FOR SHOWING INDEX PAGE
    public function index()
    {
        $page_data['page_name']  = 'favourite/index';
        $page_data['page_title'] = get_phrase("your_favourites", true);
        $page_data['favourites'] = $this->favourite_model->get_all();
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
}
