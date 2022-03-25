<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
    }

    // VALIDATE PAYPAL PAYMENT AFTER PAYING
    public function paypal_payment($paymentID = "") {
        $paypal_keys = get_payment_settings('paypal');
        $paypal_data = json_decode($paypal_keys);

        if ($paypal_data[0]->mode == 'sandbox') {
            $paypalURL       = 'https://api.sandbox.paypal.com/v1/';
        } else {
            $paypalURL       = 'https://api.paypal.com/v1/';
        }

        if ($paypal_data[0]->mode == 'sandbox') {
            $paypalClientID = $paypal_data[0]->sandbox_client_id;
            $paypalSecret   = $paypal_data[0]->sandbox_secret_key;
        }else{
            $paypalClientID = $paypal_data[0]->production_client_id;
            $paypalSecret   = $paypal_data[0]->production_secret_key;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL.'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $paypalClientID.":".$paypalSecret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
        curl_close($ch);

        if(empty($response)){
            return false;
        }else{
            $jsonData = json_decode($response);
            $curl = curl_init($paypalURL.'payments/payment/'.$paymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            // Transaction data
            $result = json_decode($response);

            // CHECK IF THE PAYMENT STATE IS APPROVED OR NOT
            if($result && $result->state == 'approved'){
                return true;
            }else{
                return false;
            }
        }
    }


    // VALIDATING STRIPE PAYMENT
    public function stripe_payment($session_id) {
        $stripe_keys = get_payment_settings('stripe');
            $values = json_decode($stripe_keys);
            if ($values[0]->testmode == 'on') {
                $public_key = $values[0]->public_key;
                $secret_key = $values[0]->secret_key;
            } else {
                $public_key = $values[0]->public_live_key;
                $secret_key = $values[0]->secret_live_key;
            }

        // Stripe API configuration
        define('STRIPE_API_KEY', $secret_key);
        define('STRIPE_PUBLISHABLE_KEY', $public_key);

        $status_msg = '';
        $transaction_id = '';
        $paid_amount = '';
        $paid_currency = '';
        $payment_status = '';

        // Check whether stripe checkout session is not empty
        if($session_id != ""){
            // Include Stripe PHP library
            require_once APPPATH.'libraries/Stripe/init.php';

            // Set API key
            \Stripe\Stripe::setApiKey(STRIPE_API_KEY);

            // Fetch the Checkout Session to display the JSON result on the success page
            try {
                $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
            }catch(Exception $e) {
                $api_error = $e->getMessage();
            }

            if(empty($api_error) && $checkout_session){
                // Retrieve the details of a PaymentIntent
                try {
                    $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    $api_error = $e->getMessage();
                }

                // Retrieves the details of customer
                try {
                    // Create the PaymentIntent
                    $customer = \Stripe\Customer::retrieve($checkout_session->customer);
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    $api_error = $e->getMessage();
                }

                if(empty($api_error) && $intent){
                    // Check whether the charge is successful
                    if($intent->status == 'succeeded'){
                        // Customer details
                        $name = $customer->name;
                        $email = $customer->email;

                        // Transaction details
                        $transaction_id = $intent->id;
                        $paid_amount = ($intent->amount/100);
                        $paid_currency = $intent->currency;
                        $payment_status = $intent->status;

                        // If the order is successful
                        if($payment_status == 'succeeded'){
                            $status_msg = site_phrase("Your_Payment_has_been_Successful");
                        }else{
                            $status_msg = site_phrase("Your_Payment_has_failed");
                        }
                    }else{
                        $status_msg = site_phrase("Transaction_has_been_failed");;
                    }
                }else{
                    $status_msg = site_phrase("Unable_to_fetch_the_transaction_details"). ' ' .$api_error;
                }

                $status_msg = 'success';
            }else{
                $status_msg = site_phrase("Transaction_has_been_failed").' '.$api_error;
            }
        }else{
            $status_msg = site_phrase("Invalid_Request");
        }

        $response['status_msg'] = $status_msg;
        $response['transaction_id'] = $transaction_id;
        $response['paid_amount'] = $paid_amount;
        $response['paid_currency'] = $paid_currency;
        $response['payment_status'] = $payment_status;
        $response['stripe_session_id'] = $session_id;
        $response['payment_method'] = 'stripe';

        return $response;
    }
    // INSERT TO PAYMENT TABLE
    public function cash_on_delivery() {
          
        $data['amount_to_pay'] = $this->cart_model->display_grand_total();
        $data['amount_paid'] = 0;
        $data['payment_method'] = "cash_on_delivery";
        $data['data'] = json_encode([]);
        $data['created_at'] = strtotime(date('D, d-M-Y'));

        $order_code = $this->order_model->confirm();
        $data['order_code'] = $order_code;
        
        $this->db->insert('payment', $data);
        return true;
    }

      
    // INSERT TO PAYMENT TABLE
    public function credit_debit_on_delivery() {
          
        $data['amount_to_pay'] = $this->cart_model->display_grand_total();
        $data['amount_paid'] = 0;
        $data['payment_method'] = "credit_debit";
        $data['data'] = json_encode([]);
        $data['created_at'] = strtotime(date('D, d-M-Y'));

        $order_code = $this->order_model->confirm();
        $data['order_code'] = $order_code;
        
        $this->db->insert('payment', $data);
        return true;
    }

     // INSERT TO PAYMENT TABLE
     public function pay_via_wallet() {
          
        $data['amount_to_pay'] = $this->cart_model->display_grand_total();
        $data['amount_paid'] = 0;
        $data['payment_method'] = "fdcredit";
        $data['data'] = json_encode([]);
        $data['created_at'] = strtotime(date('D, d-M-Y'));

        $order_code = $this->order_model->confirm();
        $data['order_code'] = $order_code;
        
        $this->db->insert('payment', $data);
        return true;
    }

    // INSERT TO PAYMENT TABLE
    public function paid_with_paypal($amount_paid, $address_id, $paymentID, $paymentToken, $payerID) {
        // CHECK IF THE PAYMENT ID IS DUPLICATE
        $check_duplication = $this->db->get_where('payment', array('identifier' => $paymentID))->num_rows();
        if($check_duplication > 0){
            error(site_phrase('invalid_payment'), site_url('cart'));
        }
        // IF THE PAYMENT ID IS UNIQUE
        $data['amount_to_pay'] = $this->cart_model->display_grand_total();
        $data['amount_paid'] = $amount_paid;
        $data['payment_method'] = "paypal";
        $data['identifier'] = $paymentID;
        $data['data'] = json_encode(['payment_id' => $paymentID, 'payment_token' => $paymentToken, 'payer_id' => $payerID]);
        $data['created_at'] = strtotime(date('D, d-M-Y'));

        $order_code = $this->order_model->confirm($address_id);
        $data['order_code'] = $order_code;

        $this->db->insert('payment', $data);
        return true;
    }

    // INSERT TO PAYMENT TABLE
    public function paid_with_stripe($stripe_payment_data) {
        // CHECK IF THE PAYMENT ID IS DUPLICATE
        $check_duplication = $this->db->get_where('payment', array('identifier' => $stripe_payment_data['stripe_session_id']))->num_rows();
        if($check_duplication > 0){
            error(site_phrase('invalid_payment'), site_url('cart'));
        }
        // IF THE PAYMENT ID IS UNIQUE
        $data['amount_to_pay'] = $this->cart_model->display_grand_total();
        $data['amount_paid'] = $stripe_payment_data['paid_amount'];
        $data['payment_method'] = "stripe";
        $data['identifier'] = $stripe_payment_data['stripe_session_id'];
        $data['data'] = json_encode(['transaction_id' => $stripe_payment_data['transaction_id'], 'paid_currency' => $stripe_payment_data['paid_currency'], 'stripe_session_id' => $stripe_payment_data['stripe_session_id']]);
        $data['created_at'] = strtotime(date('D, d-M-Y'));

        $order_code = $this->order_model->confirm();
        $data['order_code'] = $order_code;

        $this->db->insert('payment', $data);
        return true;
    }

     //logical part of Tip handler
    function tip_handler($type, $custom_tip = "")
    {
       
        //TYPE: CUSTOM ADDED TIP
       if (!empty($custom_tip) && $type == "custom") {
                //FILTER THE VALUE
                if(is_numeric($custom_tip) || is_float($custom_tip)) {
                      //IF TIP IS ALREADY EXISTED OR USER ALREADY ENETERED TIP FEW MINS AGO
                        if (!empty($this->session->userdata('custom_tip'))) {   
                                //USER TRY TO ENTER NEW CHANGES IN TIP
                                 if (!empty($custom_tip)){
                                        //USER ENTER THE SAME TIP THAT ALREADY EXSIST IN THE SESSION
                                        if ($this->session->userdata('custom_tip') == $custom_tip) {
                                              $this->session->userdata('custom_tip');
                                         }else{
                                            //ADD NEW CUSTOM TIP
                                              $this->session->set_userdata('custom_tip', $custom_tip); //tip comming from froms/tipping/stripe_tip_system.php 
                                         }
                                 }
                     }else{
                        //FIRST CALL
                            //IF USER TRY TO ENTER NEW VALUE
                              if (!empty($custom_tip)){             
                                    if (integer_validate($custom_tip)) {
                                       $this->session->set_userdata('custom_tip', sanitize(format($custom_tip))); //tip comming from froms/tipping/
                                    }
                                             
                               }
                     }
                }else {
                    //CLEAR THE PREVIOUS SESSION IF EXIST OR NEW IF CREATED
                     $this->checkout_model->clear_tip();
                    
                }
       }

       //TYPE: PREADOPTED TIP IN PERCENTAGE %
       if (!empty($custom_tip) && $type == "percentage") {
          //FILTER THE VALUE
                if(is_numeric($custom_tip) || is_float($custom_tip)) {

                        //IF TIP IS ALREADY EXISTED OR USER ALREADY CLICKED TIP BTN FEW MINS AGO
                        if (!empty($this->session->userdata('custom_tip'))) {   
                            //CLEAR OLD DATA FIRST THEN CALCULATE
                            $this->clear_tip();

                             //USER TRY TO ENTER NEW CHANGES IN TIP
                                 if (!empty($custom_tip)){
                                        //USER ENTER THE DIFFENT TIP THAT NOT MATCH IN THE SESSION 
                                        if ($this->session->userdata('custom_tip') !== $custom_tip) {
                                              //ADD NEW CUSTOM TIP
                                             $this->session->set_userdata('custom_tip', sanitize(format($this->tip_calculator($custom_tip)))); 
                                         }
                                 }
                               
                        }else{
                            //FIRST CALL OR USER HIT BTN % FIRST TIME
                                //IF USER TRY TO HIT NEW %
                                  if (!empty($custom_tip)){             
                                        if (integer_validate($custom_tip)) {
                                           $this->session->set_userdata('custom_tip', sanitize(format($this->tip_calculator($custom_tip)))); //tip comming from froms/tipping/
                                        }
                                                   
                                   }
                         }
                   
                }else {
                    //CLEAR THE PREVIOUS SESSION IF EXIST OR NEW IF CREATED
                     $this->checkout_model->clear_tip();
                     return 0;
                }

       }

    }

     // clearing the tip from session
    function clear_tip(){
        $this->session->unset_userdata('custom_tip');
        return true;
    }

    // calculate tip as percentage provide
    function tip_calculator($percent = ""){
       
        $grand = $this->cart_model->get_grand_total();
        $tip = $grand * (float)$percent / 100;  
        return format($tip);
    }

}
