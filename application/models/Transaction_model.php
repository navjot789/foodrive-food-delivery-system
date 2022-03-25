<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 23 - August - 2020
 * Author : TheDevs
 * Transaction model handles all the database queries of Transaction
 */

class Transaction_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "transactions";
    }

    /**
     * GET ALL THE TRANSACTION BY USERID
     */
    public function get_by_user($user_id="")
    { 
        if(!empty($user_id)){
            $this->db->where('user_id', $user_id);
        }else {
            $this->db->where('user_id', $this->logged_in_user_id);
        }

        $trans = $this->db->get($this->table)->result_array();
        return $trans;
    }

      /**
     * GET TOTAL SUM INCLUDE CREDIT/DEBIT  AMOUNT BY USERID
     */
    public function total_sum_balance()
    {    
        $this->db->select_sum('amt');
        $this->db->where('user_id', $this->logged_in_user_id);
        $this->db->where('type', 'credit');
        $bal = $this->db->get($this->table)->row()->amt;
        if($bal > 0){
            return format($bal);
        }
        return 0;
    }
    /**
     * GET SUM DEBIT AMOUNT BY USERID
     */
    public function sum_debit_balance()
    {    
        $this->db->select_sum('amt');
        $this->db->where('user_id', $this->logged_in_user_id);
        $this->db->where('type', 'debit');
        $bal = $this->db->get($this->table)->row()->amt;
        if($bal > 0){
            return format($bal);
        }
        return 0;
    }
     /**
     * GET WALLET BALANCE BY USERID
     */
    public function wallet_balance()
    {    
         $total_bal = $this->total_sum_balance();
         $debit_bal = $this->sum_debit_balance();
         $wallet_bal = sanitize(format($total_bal - $debit_bal));
         if($wallet_bal > 0){
             return format($wallet_bal);
         }

         return 0;
       
    }

    
     /**
     * DEBIT AMT FROM USER WALLET
     */
    public function debit_trans($user_id, $order_code, $debit)
    {    
        $trans['code'] = $order_code;
        $trans['user_id'] = $user_id;
        $trans['amt'] = $debit;
        $trans['type'] = 'debit';
        $trans['add_date'] = strtotime(date("Y-m-d H:i:s"));

        $trans_status = $this->db->insert('transactions', $trans); 
        if ($trans_status) {
                return true; 
        }else{
            error(get_phrase('transation_error_cannot_debit_wallet_amount'), site_url('cart'));
        }
       
    }

    /**
     * ROLLBACK THE AMOUNT TO USER WALLET IF ORDER CANCELED
     */
    public function rollback_trans_by_code($code)
    {    
        $this->db->where('code', $code);
        $this->db->where('type', 'debit');
        $trans_status = $this->db->delete('transactions'); 
        if ($trans_status) {
                return true; 
        } else{
            error(get_phrase('transation_error_cannot_rollback_wallet_amount'), site_url('cart'));
        }
       
    }


    /**
     * INCLUDE/EXCLUDE WALLET BALANCE INTO THE CART
     */
    public function activate_wallet_balance()
    {    
        $status = sanitize($this->input->post('status'));
        if($status == '1') { 
          $this->session->set_userdata('wallet', 1); 
          return 1;   
        }else if($status == '0') {
          $this->session->set_userdata('wallet', 0); 
          return 0;    
        }
        return 0;  
    }

    /**
     * INCLUDE/EXCLUDE WALLET BALANCE INTO THE CART
     */
    public function wallet_balance_remainder()
    {    
        if(!empty($this->session->userdata('wallet')) && $this->session->userdata('wallet') == 1) {
            $grand = $this->cart_model->get_grand_total();
            $wallet_balance = $this->transaction_model->wallet_balance();

           //IF WALLET BAL GREATER THAN GRAND TOTAL 
           if($wallet_balance >= $grand) {
                $remainder = $wallet_balance - $grand;
                return $remainder;
           }else{
                $remainder = 0;
                return $remainder;
           }
       } 
         return false;
    }


    /**
     * GIVING USER CASHBACK AS FDCREDIT
     */
     function cashback($user, $code, $persent)
     {
          //START TRANSACTION TO CREDIT REFUNDED AMOUNT TO USER WALLET
          $trans['user_id'] = $user;
          $trans['code'] = $code;
          $trans['amt'] = $calculated;
          $trans['type'] = 'cashback';
          $trans['add_date'] = strtotime(date("Y-m-d H:i:s"));
 
          $trans_status = $this->db->insert('transactions', $trans);
     
     }
    

}
