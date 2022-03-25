<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 18 - July - 2020
 * Author : TheDevs
 * Payment model handles all the database queries of payment related data
 */

class Payment_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
    }

    // GET CURRENCIES
    public function get_system_currencies()
    {
        return $this->db->get('currencies')->result_array();
    }
    // GET PAYPAL CURRENCIES
    public function get_paypal_currencies()
    {   
        $this->db->where('paypal_supported', 1);
        return $this->db->get('currencies')->result_array();
    }
    // GET STRIPE CURRENCIES
    public function get_stripe_currencies()
    {
        $this->db->where('stripe_supported', 1);
        return $this->db->get('currencies')->result_array();
    }

    // UPDATE PAYMENT SETTINGS
    public function update_payment_settings()
    {   
        $payment_type = required(sanitize($this->input->post('payment_type')));
        if($payment_type == "system"){
            $this->update_system_payment_settings();
            
        }elseif($payment_type == "paypal") {
            $this->update_paypal_payment_settings();
        }elseif($payment_type == "stripe") {
            $this->update_stripe_payment_settings();
        }elseif($payment_type == "cod") {
            $this->update_cash_on_delivery_settings();
        }elseif($payment_type == "cdod") {
            $this->update_credit_debit_on_delivery_settings();
        }
        return true;
    }

    // UPDATE SYSTEM PAYMENT SETTINGS
    public function update_system_payment_settings() {
        $payment_infos = ['system_currency', 'currency_position'];
        foreach ($payment_infos as $payment_info) {
            $updater = required(sanitize($this->input->post($payment_info)));
            $this->db->where('key', $payment_info);
            $this->db->update('system_settings', ['value' => $updater]);
        }
        return true;
    }

    // UPDATE CASH ON DELIVERY SETTINGS
    public function update_cash_on_delivery_settings() {
        $cash_on_delivery_info = array();
        $cash_on_delivery['active'] = required(sanitize($this->input->post('active')));

        array_push($cash_on_delivery_info, $cash_on_delivery);
        $data['value']    =   json_encode($cash_on_delivery_info);
        $this->db->where('key', 'cash_on_delivery');
        $this->db->update('payment_settings', $data);
    }

     // UPDATE CREDIT/DEBIT ON DELIVERY SETTINGS
    public function update_credit_debit_on_delivery_settings() {
       
        $credit_debit_on_delivery_info = array();
        $credit_debit_on_delivery['active'] = required(sanitize($this->input->post('active')));

        array_push($credit_debit_on_delivery_info, $credit_debit_on_delivery);
        $data['value']    =   json_encode($credit_debit_on_delivery_info);
        $this->db->where('key', 'credit_debit_on_delivery');
        $this->db->update('payment_settings', $data);
    }


    // UPDATE PAYPAL PAYMENT SETTINGS
    public function update_paypal_payment_settings() {
        // update paypal keys
        $paypal_info = array();
        $paypal['active'] = required(sanitize($this->input->post('active')));
        $paypal['mode'] = required(sanitize($this->input->post('mode')));
        $paypal['currency'] = required(sanitize($this->input->post('paypal_currency')));
        $paypal['sandbox_client_id'] = required(sanitize($this->input->post('sandbox_client_id')));
        $paypal['sandbox_secret_key'] = required(sanitize($this->input->post('sandbox_secret_key')));
        $paypal['production_client_id'] = required(sanitize($this->input->post('production_client_id')));
        $paypal['production_secret_key'] = required(sanitize($this->input->post('production_secret_key')));

        array_push($paypal_info, $paypal);

        $data['value']    =   json_encode($paypal_info);
        $this->db->where('key', 'paypal');
        $this->db->update('payment_settings', $data);
    }

    // UPDATE STRIPE PAYMENT SETTINGS
    public function update_stripe_payment_settings() {
        // update stripe keys
        $stripe_info = array();
        $stripe['active'] = required(sanitize($this->input->post('active')));
        $stripe['testmode'] = required(sanitize($this->input->post('test_mode')));
        $stripe['currency'] = required(sanitize($this->input->post('stripe_currency')));
        $stripe['public_key'] = required(sanitize($this->input->post('test_public_key')));
        $stripe['secret_key'] = required(sanitize($this->input->post('test_secret_key')));
        $stripe['public_live_key'] = required(sanitize($this->input->post('live_public_key')));
        $stripe['secret_live_key'] = required(sanitize($this->input->post('live_secret_key')));

        array_push($stripe_info, $stripe);

        $data['value']    =   json_encode($stripe_info);
        $this->db->where('key', 'stripe');
        $this->db->update('payment_settings', $data);
    }

    // GET PAYMENT DATA BY ORDER CODE
    public function get_payment_data_by_order_code($order_code) {
        $payment_data = $this->db->get_where('payment', array('order_code' => $order_code))->row_array();
        return $payment_data;
    }

    // MARK ORDER AS PAID
    public function mark_order_as_paid($order_code) {
        $payment_data = $this->db->get_where('payment', array('order_code' => $order_code))->row_array();
        $updater = array(
            'amount_paid' => $payment_data['amount_to_pay'],
            'updated_at' => strtotime(date('D, d-M-Y H:i:s'))
        );
        $this->db->where('id', $payment_data['id']);
        $this->db->update('payment', $updater);
    }
    // SWAPING PAYMENT METHOD 
    public function swap_payment_method($order_code, $method) {
        $updater = array(
            'payment_method' => $method
        );
        $this->db->where('order_code', $order_code);
        $response = $this->db->update('payment', $updater);
        if($response){
          return true;
        }
        return false;
    }
}
