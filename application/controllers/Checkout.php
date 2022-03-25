<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* Product name : FoodMob
* Date : 21 - November - 2020
* Author : TheDevs
* Checkout Controller controlls the task for checking out
*/

include 'Base.php';
class Checkout extends Base
{

    function  __construct(){
        parent::__construct();
        authorization(['customer', 'owner'], true);
    }

    // index function responsible for showing the CHECKOUT PAGE
    function index()
    {   
        
        $page_data['page_name']  = 'checkout/index';
        $page_data['page_title'] = site_phrase("checkout", true);
        $this->load->view(frontend('index'), $page_data);
    }


    // forms function responsible for showing the Payment forms
    function forms($action, $type = "", $custom_tip = "")
    {   
        $page_data['action']  = sanitize($action);
        $page_data['type']  = sanitize($type);
        $page_data['custom_tip']  = sanitize($custom_tip);
       
        $page_data['page_name']  = 'checkout/forms/index';
        $page_data['page_title'] = site_phrase("COD", true);
        $this->load->view(frontend('checkout/forms/index'), $page_data);
    }


    // driver_tipping function responsible for showing the tip system for stripe
    function tipping()
    {
        $page_data['page_name']  = 'checkout/forms/tipping/index';
        $page_data['page_title'] = site_phrase("COD", true);
        $this->load->view(frontend('checkout/forms/tipping/index'), $page_data);
    }
    //CLEAR TIP SESSION
    function clear_tip()
    {
        $clear = $this->checkout_model->clear_tip(); 
        if ($clear) {
             echo 'clear';
          }  
    }

    function tip_calculator($percent="")
    {
        $result = $this->checkout_model->tip_calculator($percent); 
        if ($result) {
             echo $result;
          }  
    }

  // AFTER CONFIRMING THE ORDER AS CASH ON DELIVERY IT WILL BE CALLED
  public function wallet() {
        $response = $this->checkout_model->pay_via_wallet();
        if($response){
            $this->session->set_flashdata('confirm_order', true);
            success(site_phrase('order_submitted_successfully'), site_url('cart'));
        } else {
            error(site_phrase('an_error_occurred'), site_url('cart'));
        }
    }

    // AFTER CONFIRMING THE ORDER AS CASH ON DELIVERY IT WILL BE CALLED
    public function cash_on_delivery() {
        $response = $this->checkout_model->cash_on_delivery();
        if($response){
            $this->session->set_flashdata('confirm_order', true);
            //success(site_phrase('order_submitted_successfully'));
            $out = array('code' => 200, 'msg' => 'order submitted successfully');
            echo json_encode($out);

        } else {
            //error(site_phrase('an_error_occurred'), site_url('cart'));
            $out = array('code' => 503, 'msg' => 'an_error_occurred');
            echo json_encode($out);
        }
    }

    // AFTER CONFIRMING THE ORDER AS CREDIT/DEBIT ON DELIVERY IT WILL BE CALLED
    public function credit_debit_on_delivery() {
        $response = $this->checkout_model->credit_debit_on_delivery();
        if($response){
            $this->session->set_flashdata('confirm_order', true);
           // success(site_phrase('order_submitted_successfully'));
            $out = array('code' => 200, 'msg' => 'order submitted successfully');
            echo json_encode($out);

        } else {
            //error(site_phrase('an_error_occurred'), site_url('cart'));
            $out = array('code' => 503, 'msg' => 'an error occurred');
            echo json_encode($out);
        }
    }


    // PAY WITH PAYPAL FUNCTION
    public function pay_with_paypal()
    {
        $restaurant_ids = $this->cart_model->get_restaurant_ids();
        $address_id = sanitize($this->input->post('address_number'));

        // CHECK IF THE DELIVERY ADDRESS IS EMPTY OR NOT
        $this->check_address_validity($address_id);

        if($restaurant_ids && count($restaurant_ids) > 0){
            if($this->cart_model->get_grand_total() > 0){
                $page_data['user_details'] = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
                $page_data['amount_to_pay'] = $this->cart_model->get_grand_total();
                $page_data['address_number'] = $address_id;
                $page_data['page_name']  = 'checkout/paypal/paypal';
                $page_data['page_title']  = site_phrase("pay_with_paypal", true);
                $this->load->view(frontend('checkout/paypal/paypal'), $page_data);
            }else{
                error(site_phrase("not_enough_amount_to_checkout"), site_url('cart'));
            }
        }else{
            error(site_phrase("you_do_not_have_anything_to_checkout"), site_url('cart'));
        }
    }

    // AFTER PAYING VIA PAYPAL, REDIRECT TO THIS FUNCTION
    public function paypal_payment($amount_paid, $address_id, $paymentID, $paymentToken, $payerID) {
        // CHECK IF THE DELIVERY ADDRESS IS EMPTY OR NOT
        $this->check_address_validity($address_id);

        $response = $this->checkout_model->paypal_payment($paymentID);
        if($response){
            $confirmation_response = $this->checkout_model->paid_with_paypal($amount_paid, $address_id, $paymentID, $paymentToken, $payerID);
            if ($confirmation_response) {
                $this->session->set_flashdata('confirm_order', true);
                success(site_phrase('order_submitted_successfully'), site_url('cart'));
            } else {
                error(site_phrase('an_error_occurred'), site_url('cart'));
            }
        } else {
            error(site_phrase('an_error_occurred'), site_url('cart'));
        }
    }

    // PAY WITH STRIPE FUNCTION
    public function pay_with_stripe()
    {     
        //delivery_info set at stripe_checkout.php
        //checking price
        $page_data['user_details']  = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
        $page_data['amount_to_pay'] = $this->cart_model->display_grand_total();
        $this->load->view(frontend('checkout/forms/stripe/stripe_checkout'), $page_data);
    }

    // AFTER PAYING VIA STRIPE, REDIRECT TO THIS FUNCTION
    public function stripe_payment($session_id) {
         
        //THIS IS HOW I CHECKED THE STRIPE PAYMENT STATUS
        $response = $this->checkout_model->stripe_payment($session_id);
        if ($response['payment_status'] === 'succeeded') {
            $confirmation_response = $this->checkout_model->paid_with_stripe($response);
            if ($confirmation_response) {
                $this->session->set_flashdata('confirm_order', true);
                success(site_phrase('order_submitted_successfully'), site_url('cart'));
            } else {
                error(site_phrase('an_error_occurred'), site_url('cart'));
            }
        }else{
            error($response['status_msg'], site_url('cart'));
        }
    }

}
