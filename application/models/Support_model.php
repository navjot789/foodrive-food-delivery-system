<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Product name : FoodMob
 * Date : 28 - June - 2020
 * Author : TheDevs
 * Menu model handles all the database queries of Menu
 */
class Support_model extends Base_model
{
    // DEFAULT CONSTRUCTOR. FOR INITIALIZING THE TABLE NAME
    function __construct()
    {
        parent::__construct();
        $this->table = "support";
    }
    
    //Filling support request by customer
    public function support_request()
    {
        $data['order_id'] = required(sanitize($this->input->post('order_code')));
        $data['user_id'] = $this->session->userdata('user_id');
        $data['sub'] = required(sanitize($this->input->post('subject')));
        $data['brief'] = required(sanitize($this->input->post('brief')));
        $data['add_date'] = strtotime(date("Y-m-d H:i:s"));

        $this->db->insert($this->table, $data);
        return true;
    }

    //Getting dublicate support requests
    public function check_dublicate_ticket($order_code, $status="")
    {
        if(empty($status)) {
            $status = 0;
        }
        $this->db->where('order_id', $order_code);
        $this->db->where('status', $status); //Pending status
        $responce =  $this->db->get($this->table)->result_array();  
        //If more than 1 request found
        if(count($responce) > 0) {
            return true;
        }
        return false;
    }

    //Getting pending support request via support-ID
    public function get_by_support_id($id="")
    {
        if(!empty($id)){
            $this->db->where('s_id', $id); 
            $responce =  $this->db->get($this->table)->row_array();  
            return $responce;
        }else{
               return null;
        }

     
      
    }

    //Getting pending support request via order-code
    public function get_by_order_code($order_code)
    {
        $this->db->where('order_id', $order_code); 
        $this->db->order_by('s_id', 'DESC');
        $responce =  $this->db->get($this->table)->result_array();  
        return $responce;
    }

     //Getting pending support request
     public function get_by_order_status($order_code, $status)
     {
         $this->db->where('order_id', $order_code);
         $this->db->where('status', $status);
         $responce =  $this->db->get($this->table)->row_array();  
         return $responce;
     }

   //Getting pending support request
   public function get_all_ticket()

   {  
       $this->db->order_by('s_id', 'DESC'); 
       $responce =  $this->db->get($this->table)->result_array();  
       return $responce;
   }
   
    //Getting pending support request
    public function get_all_pending_ticket()
    {
        $this->db->where('status', 0); //Pending status
        $this->db->order_by('s_id', 'DESC');
        $responce =  $this->db->get($this->table)->result_array();  
        return $responce;
    }

    //Getting Approved support request
    public function get_all_approved_ticket()
    {
        $this->db->where('status', 1); //Approved status
        $this->db->order_by('s_id', 'DESC');
        $responce =  $this->db->get($this->table)->result_array();  
        return $responce;
    }

     //Getting Rejected support request
     public function get_all_rejected_ticket()
     {
         $this->db->where('status', 2); //Rejected status
         $this->db->order_by('s_id', 'DESC');
         $responce =  $this->db->get($this->table)->result_array();  
         return $responce;
     }



    public function action()
    {
        $order_code = required(sanitize($this->input->post('order_code')));  
        $refund_id = required(sanitize($this->input->post('refund_id')));
        $data['status'] = required(sanitize($this->input->post('status')));
        $data['gen_cmt'] = required(sanitize($this->input->post('general-reason')));
        $data['update_at'] = strtotime(date("Y-m-d H:i:s"));
        
            if($data['status'] == 1) { // APPROVED

                //IF PREVIOUS TICKED ALREADY APPROVED  
                if($this->check_dublicate_ticket($order_code, '1')) {
                    error(get_phrase('Previous_support_ticket_already_approved'), site_url('support')); 
                }

                $order_details = $this->order_model->get_by_code(sanitize($order_code));
                $data['refund_fault'] = required(sanitize($this->input->post('r-fault')));  
                
                //Optional
                $refund_tax = sanitize($this->input->post('tax-debit-amt')) ? sanitize($this->input->post('tax-debit-amt')) :0; //GST
                $refund_pst = sanitize($this->input->post('pst-debit-amt')) ? sanitize($this->input->post('pst-debit-amt')) :0; //PST 
     
                if($data['refund_fault'] == 'restaurant'){
                //IF RESTAURANT FAULT 

                  //Mandatory fields 
                    if(sanitize($this->input->post('restaurant-amt')) == 0.00){
                            error('Restaurant value cannot be null or zero','support/pending');
                        }else{
                        $refund_by_restaurant = required(sanitize($this->input->post('restaurant-amt')));
                    }

                            if($order_details['grand_total'] >= $refund_by_restaurant && 
                               $order_details['total_vat_amount'] >= $refund_tax && 
                               $order_details['total_pst_amount'] >= $refund_pst) { //REFUND AMT MUST BE LESS THAN G-TOTAL
                                
                                $data['refund_reason'] = required(sanitize($this->input->post('refund-reason')));
                                $data['owner_debt'] = format($refund_by_restaurant);
                                $data['tax_deduct'] = format($refund_tax);
                                $data['pst_deduct'] = format($refund_pst);
                            
                                $this->db->where('s_id', $refund_id);
                                $result = $this->db->update($this->table, $data);
                                if($result) {

                                    $refund_data['s_id'] = $refund_id;
                                   
                                    $this->db->where('order_code', $order_code);
                                    $stat = $this->db->update('commission_details', $refund_data);
                                    if ($stat) {
                                        //Changing order status
                                        $refunded = $this->order_model->process(sanitize($order_code), 'refunded');
                                        if ($refunded) {
                                             //START TRANSACTION TO CREDIT REFUNDED AMOUNT TO USER WALLET
                                             $trans['user_id'] = $order_details['customer_id'];
                                             $trans['s_id'] = $refund_data['s_id'];
                                             $trans['amt'] = $data['owner_debt'] + $data['tax_deduct'] + $data['pst_deduct'];
                                             $trans['type'] = 'credit';
                                             $trans['add_date'] = strtotime(date("Y-m-d H:i:s"));

                                             $trans_status = $this->db->insert('transactions', $trans); 
                                            if ($trans_status) {
                                                $customer = $this->customer_model->get_by_id($trans['user_id']);
                                                $this->email_model->refund_mail($customer['email'], "This is to confirm that refund for amount ".currency(format($trans['amt']))." has been successfully processed on ".date('D, d-M-Y', $trans['add_date'])." and the amount should reflect in your account by now.");
                                                return true; 
                                            }else{
                                                error(get_phrase('transation_error_refund_amount_not_credited'), site_url('support'));
                                            }

                                           
                                        }else{
                                            error(get_phrase('Critical_error_cannot_change_refund_status'), site_url('support'));
                                        }
                                    }
                                   
                                }

                            }else {
                                error(get_phrase('refund_amount_cannot_be_greater_than_total_order_cost_for_restaurant'), site_url('support'));
                            }



                }else if($data['refund_fault'] == 'system'){
                //IF SYSTEM FAULT 
              
                  //Mandatory fields   
                    if(sanitize($this->input->post('system-debit')) == 0.00){
                            error('System value cannot be null or zero','support/pending');
                        }else{
                        $refund_by_system = required(sanitize($this->input->post('system-debit')));
                    } 

                        if($order_details['grand_total'] >= $refund_by_system) { //REFUND AMT MUST BE LESS THAN G-TOTAL           
                            $data['system_debt'] = format($refund_by_system);
                        
                            $this->db->where('s_id', $refund_id);
                            $result = $this->db->update($this->table, $data);
                            if($result) {
                                
                                $refund_data['s_id'] = $refund_id;
                              
                                $this->db->where('order_code', $order_code);
                                $stat = $this->db->update('commission_details', $refund_data);
                                if ($stat) {

                                    //Changing order status
                                    $refunded = $this->order_model->process(sanitize($order_code), 'refunded');
                                    if ($refunded) {
                                         //START TRANSACTION TO CREDIT REFUNDED AMOUNT TO USER WALLET
                                             $trans['user_id'] = $order_details['customer_id'];
                                             $trans['s_id'] = $refund_data['s_id'];
                                             $trans['amt'] = $data['system_debt'];
                                             $trans['type'] = 'credit';
                                             $trans['add_date'] = strtotime(date("Y-m-d H:i:s"));

                                             $trans_status = $this->db->insert('transactions', $trans); 
                                            if ($trans_status) {
                                                $customer = $this->customer_model->get_by_id($trans['user_id']);
                                                $this->email_model->refund_mail($customer['email'], "This is to confirm that refund for amount ".currency(format($trans['amt']))." has been successfully processed on ".date('D, d-M-Y', $trans['add_date'])." and the amount should reflect in your account by now.");
                                                return true; 
                                            }else{
                                                error(get_phrase('transation_error_refund_amount_not_credited'), site_url('support'));
                                            }

                                    }else {
                                        error(get_phrase('Critical_error_cannot_change_refund_status'), site_url('support'));
                                    }
                                }
                               
                            }
                        

                        }else {
                            error(get_phrase('refund_amount_cannot_be_greater_than_total_order_cost_for_system'), site_url('support'));
                        }

                }else{
                //FAULT BY BOTH SIDE

                    //Mandatory fields
                    if(sanitize($this->input->post('system-debit')) == 0.00 ){
                        error('System value cannot be null or zero','support/pending');
                    }else{
                        $refund_by_restaurant = required(sanitize($this->input->post('restaurant-amt')));
                        $refund_by_system = required(sanitize($this->input->post('system-debit')));
                    }

                        if($order_details['grand_total'] >= $refund_by_restaurant &&
                           $order_details['total_vat_amount'] >= $refund_tax &&
                           $order_details['total_pst_amount'] >= $refund_pst &&
                           $order_details['grand_total'] >= $refund_by_system) { //REFUND AMT MUST BE LESS THAN G-TOTAL
                                                
                            $data['refund_reason'] = required(sanitize($this->input->post('refund-reason')));
                            $data['owner_debt'] = format($refund_by_restaurant);
                            $data['tax_deduct'] = format($refund_tax);
                            $data['pst_deduct'] = format($refund_pst);
                            $data['system_debt'] = format($refund_by_system);
                        
                            $this->db->where('s_id', $refund_id);
                            $result = $this->db->update($this->table, $data);
                            if($result) {
                                
                                $refund_data['s_id'] = $refund_id;
                             
                                $this->db->where('order_code', $order_code);
                                $stat = $this->db->update('commission_details', $refund_data);

                                if ($stat) {

                                    //Changing order status
                                    $refunded = $this->order_model->process(sanitize($order_code), 'refunded');
                                    if ($refunded) {
                                        //START TRANSACTION TO CREDIT REFUNDED AMOUNT TO USER WALLET
                                             $trans['user_id'] = $order_details['customer_id'];
                                             $trans['s_id'] = $refund_data['s_id'];
                                             $trans['amt'] = $data['owner_debt'] + $data['tax_deduct'] + $data['pst_deduct'] + $data['system_debt'];
                                             $trans['type'] = 'credit';
                                             $trans['add_date'] = strtotime(date("Y-m-d H:i:s"));

                                             $trans_status = $this->db->insert('transactions', $trans); 
                                            if ($trans_status) {
                                                $customer = $this->customer_model->get_by_id($trans['user_id']);
                                                $this->email_model->refund_mail($customer['email'], "This is to confirm that refund for amount ".currency(format($trans['amt']))." has been successfully processed on ".date('D, d-M-Y', $trans['add_date'])." and the amount should reflect in your account by now.");
                                                  return true; 
                                            }else{
                                                error(get_phrase('transation_error_refund_amount_not_credited'), site_url('support'));
                                            }

                                    }else {
                                        error(get_phrase('Critical_error_cannot_change_refund_status'), site_url('support'));
                                    }
                                }
                               
                            }
                        

                        }else {
                            error(get_phrase('refund_amount_cannot_be_greater_than_total_order_cost_for_both_ends'), site_url('support'));
                        }

                }
                
                
            }

            $this->db->where('s_id', $refund_id);
            $this->db->update($this->table, $data);
            return true;
          
        
       
    }


}

/* End of file Support_model.php */
