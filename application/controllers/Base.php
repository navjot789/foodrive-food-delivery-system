<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 09 - June - 2020
 * Author : TheDevs
 * Base Controller holds all the basic things
 */

class Base extends CI_Controller
{

    protected $logged_in_user_id;
    protected $logged_in_user_role;

    function __construct()
    {
        parent::__construct();

        // LOAD DEPENDENCIES
        $this->load->database();
        $this->load->library('session');

        //  LOADING FREQUENT USING SESSION DATA
        $this->logged_in_user_id = $this->session->userdata('user_id');
        $this->logged_in_user_role = $this->session->userdata('user_role');

        // LOAD MODELS
        $this->load->model('Base_model', 'base_model');
        $this->load->model('Auth_model', 'auth_model');       
        $this->load->model('User_model', 'user_model');
        $this->load->model('Cuisine_model', 'cuisine_model');
        $this->load->model('Category_model', 'category_model');
        $this->load->model('Restaurant_model', 'restaurant_model');
        $this->load->model('Menu_model', 'menu_model');
        $this->load->model('Settings_model', 'settings_model');
        $this->load->model('Customer_model', 'customer_model');
        $this->load->model('Driver_model', 'driver_model');
        $this->load->model('Language_model', 'language_model');
        $this->load->model('Payment_model', 'payment_model');
        $this->load->model('Owner_model', 'owner_model');
        $this->load->model('Cart_model', 'cart_model');
        $this->load->model('Order_model', 'order_model');
        $this->load->model('Review_model', 'review_model');
        $this->load->model('Favourite_model', 'favourite_model');
        $this->load->model('Report_model', 'report_model');
        $this->load->model('Email_model', 'email_model');
        $this->load->model('Checkout_model', 'checkout_model');
        $this->load->model('Variation_model', 'variation_model');
        $this->load->model('Addons_model', 'addons_model');
        $this->load->model('Support_model', 'support_model');
        $this->load->model('Transaction_model', 'transaction_model');
        


        // CACHE CONTROL
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // Set the timezone
        date_default_timezone_set(get_system_settings('timezone'));

        // SESSION DATA FOR FRONTEND LANGUAGE
        if (!$this->session->userdata('language')) {
            $this->session->set_userdata('language', get_system_settings('language'));
        }
    }
}
