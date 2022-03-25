<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 28 - August - 2020
 * Author : TheDevs
 * Report model handles all the database queries of Report
 */

class Report_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
    }

    //GET COMMISION WITHOUT ROLE
    public function get_commission_details_without_role($restaurant_id)
    {
        $this->db->order_by("id", "desc");
        return $this->db->get_where('commission_details', ['restaurant_id' => $restaurant_id])->result_array();
    }

    //GET COMMISSION DETAILS WITH DATE-RANGE
    ///DYNAMIC CALLER
    public function get_commission_details($restaurant_id, $start_date, $end_date)
    {
        $dynamic_function_name = "get_commission_details_as_" . $this->logged_in_user_role;
        return $this->$dynamic_function_name($restaurant_id, $start_date, $end_date);
    }

    //GET PAYMENT HISTORY OF SPECIFIC RESTAURANT WITH DATE-RANGE
    //DYNAMIC CALLER
    public function get_commission_pay_history($restaurant_id, $start_date, $end_date)
    {
        $dynamic_function_name = "get_commission_pay_history_as_" . $this->logged_in_user_role;
        return $this->$dynamic_function_name($restaurant_id,  $start_date, $end_date);
    }

    //AS ADMIN
    public function get_commission_details_as_admin($restaurant_id, $start_date, $end_date)
    {
        $this->db->order_by("id", "desc");
        return $this->db->get_where('commission_details', ['restaurant_id' => $restaurant_id, 'placed_at >=' => $start_date, 'placed_at <=' =>$end_date])->result_array();
    }

    //AS ADMIN
     public function get_commission_pay_history_as_admin($restaurant_id, $start_date, $end_date)
    {
        $this->db->order_by("hid", "DESC");
        return $this->db->get_where('paid_commission_history', ['restaurant_id' => $restaurant_id, 'date_added >=' => $start_date, 'date_added <=' =>$end_date])->result_array();
    }


    //AS OWNER
    public function get_commission_details_as_owner($restaurant_id, $start_date, $end_date)
    {
        $this->db->order_by("id", "desc");
        return $this->db->get_where('commission_details', ['restaurant_id' => $restaurant_id, 'placed_at >=' => $start_date, 'placed_at <=' =>$end_date])->result_array();
    }

    //AS OWNER
     public function get_commission_pay_history_as_owner($restaurant_id, $start_date, $end_date)
    {
        $this->db->order_by("hid", "DESC");
        return $this->db->get_where('paid_commission_history', ['restaurant_id' => $restaurant_id, 'date_added >=' => $start_date, 'date_added <=' =>$end_date])->result_array();
    }

    //DYNAMIC CALLER
    public function filter_commissions()
    {
        $dynamic_function_name = "filter_commissions_as_" . $this->logged_in_user_role;
        return $this->$dynamic_function_name();
    }

    /**
     * GET ALL REPORTS AS ADMIN
     */
    public function filter_commissions_as_admin()
    {
        $conditions['restaurant_id'] = (isset($_GET['restaurant_id']) && $_GET['restaurant_id'] != "all") ? sanitize($_GET['restaurant_id']) : null;
        //return $this->get_by_condition($conditions, 'paid_commissions');
       
        $this->db->select('restaurant_id');
        $this->db->from('commission_details');
        if(isset($_GET['restaurant_id']) && $_GET['restaurant_id'] != "all"){
            $this->db->where('restaurant_id', $conditions['restaurant_id']);
        } 
        $this->db->group_by('restaurant_id');
        return $query = $this->db->get()->result_array();
       
    }

    /**
     * GET ALL REPORTS AS OWNER
     */
    public function filter_commissions_as_owner()
    {
        $approved_restaurant_ids = $this->restaurant_model->get_approved_restaurant_ids_by_owner_id($this->logged_in_user_id);
        $approved_restaurant_ids = count($approved_restaurant_ids) > 0 ? $approved_restaurant_ids : [null];

       // $conditions['restaurant_id'] = (isset($_GET['restaurant_id']) && $_GET['restaurant_id'] != "all") ? $_GET['restaurant_id'] : $approved_restaurant_ids;
       // return $this->get_by_condition($conditions, 'paid_commissions');

       $this->db->select('restaurant_id');
       if(isset($_GET['restaurant_id']) && $_GET['restaurant_id'] != "all") {
           $this->db->where('restaurant_id', sanitize($_GET['restaurant_id']));
           $this->db->group_by('restaurant_id');
       } else {
            $this->db->where_in('restaurant_id', $approved_restaurant_ids);
            $this->db->group_by('restaurant_id');      
       } 
       
       return $query = $this->db->get('commission_details')->result_array();

    }



    /**ADMIN_OWNER
     * GET ADMIN AND OWNER COMMISION AFTER SUBTRACT
     */
    public function get_commission_admin_owner()
    {
        // CHECK DATE RANGE
        if (isset($_GET['date_range']) && !empty($_GET['date_range'])) {
            $date_range                   = sanitize($this->input->get('date_range'));
            $date_range                   = explode(" - ", $date_range);
            $conditions['c.placed_at >='] = strtotime($date_range[0] . ' 00:00:01');
            $conditions['c.placed_at <=']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            //1 MONTH
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:01';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $conditions['c.placed_at >=']   = strtotime($first_day_of_month);
            $conditions['c.placed_at <=']     = strtotime($last_day_of_month);
        }   
       
        $this->db->select('c.order_code,
                           c.restaurant_id,
                           c.s_id,
                           s.system_debt,
                           s.owner_debt,
                           (c.admin_commission - s.system_debt) AS admin_earnings,
                           (c.owner_commission  - s.owner_debt) AS owner_menu_earnings,
                           (s.tax_deduct + s.pst_deduct) AS owner_payable_tax,
                           ((c.payable_tax + c.payable_pst) - (s.tax_deduct + s.pst_deduct)) AS refunded_tax_earn,
                           (c.payable_tax - s.tax_deduct) AS refunded_gst_earn,
                           (c.payable_pst - s.pst_deduct) AS refunded_pst_earn,
                            s.refund_fault')
        ->from('commission_details c')
        ->join('support s', 'c.s_id=s.s_id AND c.order_code=s.order_id');
        foreach ($conditions as $key => $value) {
            if ($value && $value != null) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }

      return $query = $this->db->get()->result_array();
        
    }

    /**ADMIN
     * GET ONLY RESTAURANT BADGE EARNING | EXCLUDE SYSTEM AND SYSTEM PARTIAL 
     */

    public function exclude_restaurant_fault()
    {
          // CHECK DATE RANGE
          if (isset($_GET['date_range']) && !empty($_GET['date_range'])) {
            $date_range                   = sanitize($this->input->get('date_range'));
            $date_range                   = explode(" - ", $date_range);
            $conditions['c.placed_at >='] = strtotime($date_range[0] . ' 00:00:01');
            $conditions['c.placed_at <=']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            //1 MONTH
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:01';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $conditions['c.placed_at >=']   = strtotime($first_day_of_month);
            $conditions['c.placed_at <=']     = strtotime($last_day_of_month);
        }
        
        $this->db->select('sum(c.admin_commission) As earn')
        ->from('commission_details c')
        ->join('support s', 'c.s_id=s.s_id AND s.refund_fault = "restaurant"');
        foreach ($conditions as $key => $value) {
            if ($value && $value != null) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
       
        $total_admin_commission =  $this->db->get()->row()->earn;
        return $total_admin_commission > 0 ? $total_admin_commission : 0;
    }

      /**ADMIN
     * GET PURE ADMIN COMMISSION WITHOUT INCLUDING ANY REFUNDS OR SYSTEM FAULT
     */
    public function no_refund_admin_commissions()
    {
        // CHECK DATE RANGE
        if (isset($_GET['date_range']) && !empty($_GET['date_range'])) {
            $date_range                   = sanitize($this->input->get('date_range'));
            $date_range                   = explode(" - ", $date_range);
            $conditions['placed_at >='] = strtotime($date_range[0] . ' 00:00:01');
            $conditions['placed_at <=']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            //1 MONTH
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:01';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $conditions['placed_at >=']   = strtotime($first_day_of_month);
            $conditions['placed_at <=']     = strtotime($last_day_of_month);
        }

        $this->db->select_sum('admin_commission');
        foreach ($conditions as $key => $value) {
            if ($value && $value != null) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        $this->db->where('status', 0);
        $total_admin_commission = $this->db->get('commission_details')->row()->admin_commission;
        return $total_admin_commission > 0 ? $total_admin_commission : 0;
    }

      /**ADMIN
     * GET ADMIN EARNINGS
     */
    public function get_admin_after_refund()
    {
        $total_earn = 0;
        $support_details = $this->get_commission_admin_owner();
        foreach($support_details as $support_detail){
            if(sanitize($support_detail['refund_fault']) !== 'restaurant'){
                $total_earn += $support_detail['admin_earnings'];
            }
        }
        return $total_earn;
    }


      /**ADMIN
     * GET TOATL REVENUE WITHOUT REFUND OF ADMIN
     */
    public function get_admin_comissions()
    {
        $exclude_restaurant_fault =  $this->exclude_restaurant_fault(); //refund rows which only contain restaurant 
        $no_refund_admin_commissions = $this->no_refund_admin_commissions(); // non refund data with 0 refund status
        $get_admin_after_refund =  $this->get_admin_after_refund(); //contain after math of admin_commission - system_debt | system and partial

        return $exclude_restaurant_fault + $no_refund_admin_commissions + $get_admin_after_refund;
    }


    /**FOR OWNER
     * GET ONLY SYSTEM BADGE EARNING | EXCLUDE OWNER AND OWNER PARTIAL 
     */

    public function exclude_system_fault($restaurant_id)
    {
          // CHECK DATE RANGE
          if (isset($_GET['date_range']) && !empty($_GET['date_range'])) {
            $date_range                   = sanitize($this->input->get('date_range'));
            $date_range                   = explode(" - ", $date_range);
            $conditions['c.placed_at >='] = strtotime($date_range[0] . ' 00:00:01');
            $conditions['c.placed_at <=']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            //1 MONTH
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:01';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $conditions['c.placed_at >=']   = strtotime($first_day_of_month);
            $conditions['c.placed_at <=']     = strtotime($last_day_of_month);
        }
        
        $this->db->select('sum(c.owner_commission) As exclude_menu_total,
                           sum(c.payable_tax + c.payable_pst) As exclude_tax_total,
                           sum(c.payable_tax) As exclude_gst_total,
                           sum(c.payable_pst) As exclude_pst_total')
        ->from('commission_details c')
        ->join('support s', 'c.s_id=s.s_id AND s.refund_fault = "system"');
        foreach ($conditions as $key => $value) {
            if ($value && $value != null) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        $this->db->where('c.restaurant_id', $restaurant_id);
        return $total_owner_commission =  $this->db->get()->result_array();
        
    }


      /**OWNER
     * GET PURE OWNER COMMISSION WITHOUT INCLUDING ANY REFUNDS AND RESTAURANT FAULT
     */
    public function no_refund_owner_commissions($restaurant_id)
    {
        // CHECK DATE RANGE
        if (isset($_GET['date_range']) && !empty($_GET['date_range'])) {
            $date_range                   = sanitize($this->input->get('date_range'));
            $date_range                   = explode(" - ", $date_range);
            $conditions['placed_at >='] = strtotime($date_range[0] . ' 00:00:01');
            $conditions['placed_at <=']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            //1 MONTH
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:01';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $conditions['placed_at >=']   = strtotime($first_day_of_month);
            $conditions['placed_at <=']     = strtotime($last_day_of_month);
        }

        $this->db->select('sum(owner_commission) As pure_menu_total,
                           sum(payable_tax + payable_pst) As pure_tax_total,
                           sum(payable_tax) As pure_gst_total,
                           sum(payable_pst) As pure_pst_total');
        foreach ($conditions as $key => $value) {
            if ($value && $value != null) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        $this->db->where('status',0);
        $this->db->where('restaurant_id', $restaurant_id);
        return $total_owner_commission =  $this->db->get('commission_details')->result_array();
    }



      /**OWNER
     * GET TOATL REVENUE AFTER REFUND
     */
    public function get_owner_comissions($restaurant_id)
    {
        //TYPE ARRAY
        $exclude_system_faults =  $this->exclude_system_fault($restaurant_id); //refund rows which only contain restaurant 
        //TYPE ARRAY
        $no_refund_owner_commissions = $this->no_refund_owner_commissions($restaurant_id); // non refund data with 0 refund status
        //REQUIRED SEPERATE WAY TO ADD
        $support_details = $this->get_commission_admin_owner(); //contain after math of admin_commission - system_debt | system and partial

       // return $exclude_system_fault + $no_refund_owner_commissions + $get_owner_after_refund;
       $total_earned = array();
       $total_menu = 0;
       $total_tax = 0;
       $total_gst = 0;
       $total_pst = 0;

       //1: exclude_system_fault
       foreach($exclude_system_faults as $exclude_system_fault){
             
                $total_menu += $exclude_system_fault['exclude_menu_total'];
                $total_tax += $exclude_system_fault['exclude_tax_total'];
                $total_gst += $exclude_system_fault['exclude_gst_total'];
                $total_pst += $exclude_system_fault['exclude_pst_total'];
                   //2:no_refund_owner_commissions
                    foreach($no_refund_owner_commissions as $no_refund_owner_commission){  
                           $total_menu += $no_refund_owner_commission['pure_menu_total']; 
                           $total_tax += $no_refund_owner_commission['pure_tax_total']; 
                           $total_gst += $no_refund_owner_commission['pure_gst_total']; 
                           $total_pst += $no_refund_owner_commission['pure_pst_total']; 
                     } 
       }

        //GET OWNER EARNINGS | INCLUDE ONLY BADGE RESTAURANT AND PARTIAL
       foreach($support_details as $support_detail){
            if(sanitize($support_detail['refund_fault']) !== 'system' && sanitize($support_detail['restaurant_id']) == $restaurant_id){
                $total_menu += $support_detail['owner_menu_earnings'];
                $total_tax += $support_detail['refunded_tax_earn'];
                $total_gst += $support_detail['refunded_gst_earn']; 
                $total_pst += $support_detail['refunded_pst_earn'];
            }
        }

    $total_earned['menu_earned'] = $total_menu;
    $total_earned['earned_total_tax'] = $total_tax;
    $total_earned['earned_gst'] = $total_gst;
    $total_earned['earned_pst'] = $total_pst;

     return $total_earned;
     
    }


    /**
     * GET ALL REPORTS AS ADMIN
     */
    public function filter_admin_commissions()
    {
        // CHECK DATE RANGE
        if (isset($_GET['date_range']) && !empty($_GET['date_range'])) {
            $date_range                   = sanitize($this->input->get('date_range'));
            $date_range                   = explode(" - ", $date_range);
            $conditions['placed_at >='] = strtotime($date_range[0] . ' 00:00:01');
            $conditions['placed_at <=']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:01';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $conditions['placed_at >=']   = strtotime($first_day_of_month);
            $conditions['placed_at <=']     = strtotime($last_day_of_month);
        }

        return $this->get_by_condition($conditions, 'commission_details');
    }

  
     
    // GET DATA BY A CONDITION ARRAY
    public function get_by_condition($conditions = [], $table)
    {
        $this->db->order_by("id", "desc");
        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        return $this->db->get($table)->result_array();
    }

    /**
     * THIS FUNCTION DEVIDES COMMISSION BETWEEN ADMIN AND RESTAURANT OWNER
     *
     * @param [STRING] $order_code
     * @return void
     */
    public function devide_commission($order_code)
    {
        $admin_details = $this->user_model->get_admin_details();

        //FIRST GET ALL THE RESTAURANT IDS
        $this->db->distinct();
        $this->db->select('restaurant_id');
        $query = $this->db->get_where('order_details', ['order_code' => $order_code])->result_array();

        foreach ($query as $key => $row) {
            $restaurant_details = $this->restaurant_model->get_by_id($row['restaurant_id']);


             $this->db->select('order_placed_at,total_menu_price,total_addons_price,total_vat_amount,total_pst_amount,service_charge'); //total_vat_amount
             $final_order_data = $this->db->get_where('orders', ['code' => $order_code])->row();

             $order_placed_at = $final_order_data->order_placed_at; //WHEN ORDER IS PLACED
             $menu_bill = $final_order_data->total_menu_price; //GET TOTAL MENU PRICE WITH (ADDON + VARIENT)
            // $total_addons_bill = $final_order_data->total_addons_price; //GET TOTAL ADDONS PRICE (COBINATION OF EACH ADDON PRICE)
             $total_gst_bill = $final_order_data->total_vat_amount; //GET TOTAL GST PRICE CATEGORY WISE
             $total_pst_bill = $final_order_data->total_pst_amount; //GET TOTAL PST PRICE CATEGORY WISE
             $service_charge = $final_order_data->service_charge;
            
           /* FINAL SUM */
            $grand_total =  $menu_bill; //GRAND TOTAL

            if ($restaurant_details['owner_id'] == $admin_details['id']) {
                //IF ADMIN PLACED AN ORDER
                $report_data['admin_commission'] = $grand_total;
                $report_data['owner_commission'] = 0;
            } else {

                $res_percent = $this->get_restaurant_percentage($menu_bill, $row['restaurant_id']); //restaurant percentage
                $foodrive_earning = $this->get_admin_percentage($menu_bill, $row['restaurant_id']); //system earning

                    $admin_commission =  $foodrive_earning + $service_charge; 
                    $owner_commission =  $res_percent;
                   
                $report_data['owner_commission'] =  number_format($owner_commission, 2, '.', ''); 
                $report_data['admin_commission'] =  number_format($admin_commission, 2, '.', ''); 
                $report_data['payable_tax']      =  number_format($total_gst_bill, 2, '.', ''); 
                $report_data['payable_pst']      =  number_format($total_pst_bill, 2, '.', ''); 
                
            }

            $report_data['restaurant_id'] = $row['restaurant_id'];
            $report_data['order_code'] = $order_code;
            $report_data['total_bill'] = $grand_total;
            $report_data['Placed_at'] = $order_placed_at; //FOR FILTER DATA USING ORDER PLACING TIME
            $report_data['date_added'] = strtotime(date('D, d-M-Y H:i:s')); //DELIVERED AT
            $this->db->insert('commission_details', $report_data);
        }
    }

      /**
     * GET COMMISSON RESTAURANT PERCENT 
     */
    public function get_restaurant_percentage($amount, $restaurant_id)
    {
        $restaurant_settings = $this->restaurant_model->restaurant_settings_by_id($restaurant_id);
        $res_percent    = $restaurant_settings['res_percent'];

        return $res_percent = ($res_percent / 100) * $amount;
    }

    /**
     * GET COMMISSON ADMIN PERCENTAGE
     */
    public function get_admin_percentage($amount, $restaurant_id)
    {
        $restaurant_settings = $this->restaurant_model->restaurant_settings_by_id($restaurant_id);
        $admin_percent = $restaurant_settings['admin_percent'];

        return $foodrive_earning = ($admin_percent / 100 * $amount); 
    }


     /**
     * ADD RESTAURAANT PAYOUT RECORD
     */
    public function pay_to_restaurant_owner()
    {
        $restaurant_id = required(sanitize($this->input->post('restaurant_id')));
        $amount_to_pay = required(sanitize($this->input->post('amount_to_pay')));
        $tax_to_pay = required(sanitize($this->input->post('tax_to_pay')));
        $pst_to_pay = required(sanitize($this->input->post('pst_to_pay')));
        $remark = sanitize($this->input->post('remark'));

        $restaurant_details = $this->db->get_where('restaurants', ['id' => $restaurant_id, 'status' => 1]);
        if ($restaurant_details->num_rows() > 0) {
                  //NEW payment history entry
                    $data_history = array(
                        'restaurant_id'=> $restaurant_id,
                        'paid_amount'=> format($amount_to_pay),
                        'paid_tax'=> format($tax_to_pay),
                        'paid_pst'=> format($pst_to_pay),
                        'date_added'=> strtotime(date("Y-m-d H:i:s")),
                        'remark'=>  $remark
                    );
                    $this->db->insert('paid_commission_history', $data_history);
            
                return true;
           
        } else {
            error(get_phrase('invalid_restaurant_id'), site_url('report'));
        }
    }


}
