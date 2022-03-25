<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 08 - July - 2020
 * Author : TheDevs
 * Payment Controller controlls all the payment related data
 */

include 'Authorization.php';

class Payment extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
    }

    // index function responsible for showing the Payment settings page.
    function index()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/payment';
        $page_data['page_title'] = get_phrase("payment_settings");
        $page_data['currencies'] = $this->payment_model->get_system_currencies();
        $page_data['paypal_currencies'] = $this->payment_model->get_paypal_currencies();
        $page_data['stripe_currencies'] = $this->payment_model->get_stripe_currencies();
        $this->load->view('backend/index', $page_data);
    }

    // Update method is responsible for Updating payment settings data
    function update()
    {
        authorization(['admin'], true);
        $response = $this->payment_model->update_payment_settings();
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('payment_settings_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
        }
        redirect(site_url('payment'), 'refresh');
    }

    // SWAPPING PAYMENT METHOD
    function swap_payment_method()
    {
        authorization(['admin','driver'], true);
        $order_code = required(sanitize($this->input->post('code')));
        $method = required(sanitize($this->input->post('method')));

        $response = $this->payment_model->swap_payment_method($order_code, $method);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('Pay_method_updated'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
        }
        redirect(site_url('orders/details/'.$order_code), 'refresh');
    }
}
