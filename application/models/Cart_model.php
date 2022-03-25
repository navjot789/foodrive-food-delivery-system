<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 25 - July - 2020
 * Author : TheDevs
 * Cart model handles all the database queries of Cart
 */

class Cart_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "cart";
    }

    /**
     * ADDING TO CART METHOD
     */
    function add_to_cart()
    {
        $data['servings'] = "menu"; // STATIC VALUE
        $data['customer_id'] = $this->logged_in_user_id;
        $data['menu_id'] = required(sanitize($this->input->post('menuId')));
        $data['quantity'] = sanitize($this->input->post('quantity')) > 0 ? sanitize($this->input->post('quantity')) : 1;
        $data['note'] = sanitize($this->input->post('note'));

        $menu_details = $this->menu_model->get_menu_by_condition(['id' => $data['menu_id'], 'availability' => 1]);
        $menu_details = $menu_details[0];
        $data['restaurant_id'] = $menu_details['restaurant_id'];

        $status = 1;
        $addons_details = $this->addons_model->get_addon_by_menu_id($data['menu_id'], $status); 

        $total_addon_price = 0;
        //ADDONS via POST
        if (isset($_POST['addons']) && !empty($_POST['addons'])) {
            //GETTING THE ADDONS IDS AND TOTAL ADDED PRICE
            $selected_addons = explode(',', sanitize($this->input->post('addons')));
            foreach ($selected_addons as $selected_addon) {
                $selected_addon_details = $this->db->get_where('addons', ['aid' => $selected_addon])->row_array();
                $total_addon_price += $selected_addon_details['addon_price'];
            }

            $data['addons'] = implode(",", $selected_addons);
            $data['price'] = format($total_addon_price);
        }else{
            //WHEN USER NOT SELECTED ANY ADDONS  
            $data['addons'] = NULL;
            //AND NOW CHECK IF MENU HAS ALL THE STATIC ADDONS
            //IF STATIC ADDONS EXISTED
            if (count($addons_details) > 0) {
                 foreach($addons_details as $addons_detail) {    
                     $selected_addon_details = $this->db->get_where('addons', ['aid' => $addons_detail['aid']])->row_array();
                     $total_addon_price += $selected_addon_details['addon_price'];
                 }

                  $data['price'] = format($total_addon_price);
            }
        }

        //CHECKING IF ANY STATIC ADDONS EXISTED
        if (count($addons_details) > 0) { 
            $data['addons'] =  $this->filter_static_basic_addons($data['menu_id'], $data['addons']);
        }

        $total_variant_price = 0;
        //VARIENT
        if ($menu_details['has_variant']) {
            $data['variant_id'] = sanitize($this->input->post('variantId'));

            if (!empty($data['variant_id'])) {
                $selected_variants = explode(',', $data['variant_id']);
                foreach ($selected_variants as $selected_variant) {
                    $variant_details = $this->db->get_where('variants', ['id' => $selected_variant])->row_array();
                    $total_variant_price +=  $variant_details['price'];
                }
                $data['price'] = $data['quantity'] * format($total_variant_price + get_menu_price($data['menu_id']) + $total_addon_price);
            }

        } else {
            $price = $data['quantity'] * (get_menu_price($data['menu_id']) + $total_addon_price);
            $data['price'] = format($price);
        }

        //INSERT ITEM DIRECTLY WITHOUT CHECKING 
        $this->db->insert($this->table, $data);

    }

    /**
     * FILTER THE STATIC AND BASIC ADDONS
     */
    function filter_static_basic_addons($menu_id, $comma_seperated_addons = ""){
           $status = 1;
           $addons_details = $this->addons_model->get_addon_by_menu_id($menu_id, $status); 

            //IF STATIC ADDONS EXISTED
            if (count($addons_details) > 0) {
                 foreach($addons_details as $addons_detail) {   
                     $addon_ids[] = $addons_detail['aid'];  
                 }
                $mandtory = implode(",", $addon_ids); //288,290   
                $mandtory = explode(',',  $mandtory); //[288 290]

            }else {
             //NO STATIC ADDON FOUND
                 $mandtory = array();
            }
              
              
              //IF USER SELECTED THE BASIC ADDONS 
               if (!empty($comma_seperated_addons)) {
                  $just_arrived = explode(',',  $comma_seperated_addons); //[288 289 290]
               }else{
                //IF NOT SELECTED BASIC
                  $just_arrived = array();
               }

               $both_merged =  array_merge($mandtory,$just_arrived); //[288 290 288 289 290]
               $unique = array_unique($both_merged); //[288 289 290]
               return $implode = implode(",", $unique);  //288,289,290   
    }


   /**
     * UPDATE CART ITEM METHOD
     */
    function update_cart()
    {
        $cart_id = required(sanitize($this->input->post('cartId')));
        $data['quantity'] = sanitize($this->input->post('quantity')) > 0 ? sanitize($this->input->post('quantity')) : 1;
        $cart_detail = $this->db->get_where('cart', ['id' => $cart_id])->row_array();

        $total_addon_price = 0;
        if (isset($cart_detail['addons']) && !empty($cart_detail['addons'])) {
            
            $selected_addons = explode(',', $cart_detail['addons']);
            foreach ($selected_addons as $selected_addon) {
                $selected_addon_details = $this->db->get_where('addons', ['aid' => $selected_addon])->row_array();
                $total_addon_price += $selected_addon_details['addon_price'];
            }

        }

        //CART VARIENT
        $total_variant_price = 0;
        if (!empty($cart_detail['variant_id'])) {
            $selected_variants = explode(',', $cart_detail['variant_id']);
            foreach ($selected_variants as $selected_variant) {
                $variant_details = $this->db->get_where('variants', ['id' => $selected_variant])->row_array();
                $total_variant_price += $variant_details['price'];
            }
    
        }

        $menu_details = $this->db->get_where('food_menus', ['id' => $cart_detail['menu_id']])->row_array();
        $unit_price = get_menu_price($menu_details['id']);


        $price =  $data['quantity'] * ($unit_price + $total_variant_price + $total_addon_price);   
        $data['price'] = $price;

        $this->db->where('id', $cart_id);
        $this->db->update('cart', $data);

        return currency(format($data['price']));
    }

    /**
     * RETURN THE TOTAL NUMBER OF CART ITEMS
     */
    function total_cart_items()
    {
        $data['customer_id'] = $this->logged_in_user_id;
        return $this->db->get_where($this->table, $data)->num_rows();
    }

    /**
     * RETURN ALL THE CART ITEMS
     */
    function get_all()
    {
        $data['customer_id'] = $this->logged_in_user_id;
        $obj = $this->db->get_where($this->table, $data);
        return $this->merger($obj);
    }


    /**
     * RETURN A SINGLE CART ITEM
     */
    function get_by_id($id)
    {
        $data['id'] = $id;
        $obj = $this->db->get_where($this->table, $data);
        return $this->merger($obj, true);
    }


    /**
     * RETURN RESULT ARRAY CONDITION WISE
     */
    function get_cart_by_condition($conditions = [])
    {
        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }

        $menus = $this->db->get($this->table);
        return $this->merger($menus);
    }

    /**
     * MERGER FUNCTION IS FOR MERGING NECESSARY DATA
     */
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $cart_items = $query_obj->result_array();
            foreach ($cart_items as $key => $cart_item) {
                $menu_data = $this->menu_model->get_by_id($cart_item['menu_id']);
                $restaurant_data = $this->restaurant_model->get_by_id($cart_item['restaurant_id']);
                $cart_items[$key]['menu_name']  = $menu_data['name'];
                $cart_items[$key]['menu_thumbnail']  = $menu_data['thumbnail'];
                $cart_items[$key]['thumb_status']  = $menu_data['thumb_status'];
                $cart_items[$key]['restaurant_name']  = $restaurant_data['name'];
                $cart_items[$key]['delivery_charge']  = delivery_charge($restaurant_data['id']);
            }
            return $cart_items;
        } else {
            $cart_item = $query_obj->row_array();
            $menu_data = $this->menu_model->get_by_id($cart_item['menu_id']);
            $restaurant_data = $this->restaurant_model->get_by_id($cart_item['restaurant_id']);
            $cart_item['menu_name']  = $menu_data['name'];
            $cart_item['menu_thumbnail']  = $menu_data['thumbnail'];
            $cart_items[$key]['thumb_status']  = $menu_data['thumb_status'];
            $cart_item['restaurant_name']  = $restaurant_data['name'];
            $cart_item['delivery_charge']  = delivery_charge($restaurant_data['id']);
            return $cart_item;
        }
    }

    /**
     * GET THE RESTAURANT IDS ONLY. THIS FUNCTION WILL RETURN ALL THE INDIVIDUAL RESTAURANT IDS OF THE CART ITEMS
     */
    public function get_restaurant_ids()
    {
        $restaurant_ids = array();
        $cart_items = $this->get_all();
        foreach ($cart_items as $cart_item) {
            if (!in_array($cart_item['restaurant_id'], $restaurant_ids)) {
                array_push($restaurant_ids, $cart_item['restaurant_id']);
            }
        }
        return $restaurant_ids;
    }

    
    /**
     * GET SMALLER DATA FOR CART PAGE : PER-MENU PRICE
     */
    public function get_per_menu_price()
    {
        $cart_details = $this->get_all();
        $data = array(); 
        foreach ($cart_details as $cart_detail) {
  
            $menu_details = $this->menu_model->get_cat_by_menu_id($cart_detail['menu_id']);
            $data[$menu_details['category_id']][] = $cart_detail['price'];           
            
        }
        return $data;
        
    }



    /**
     * GET SMALLER DATA FOR CART PAGE : TOTAL MENU PRICE
     */
    public function get_total_menu_price()
    {
        $total_price = 0;
        $cart_details = $this->get_all();
        foreach ($cart_details as $cart_detail) {
            $total_price = $total_price + $cart_detail['price'];
        }
        return $total_price;
    }

    /**
     * GET TOTAL SUM OF ADDONS PRICE FROM CART
     */
    public function get_total_addons_price()
    {
        $cart_details = $this->get_all();
        $total_addon_price = 0;
        if (isset($cart_details) && !empty($cart_details)) {       
          
         foreach ($cart_details as $cart_detail) { 
                $selected_addons = explode(',', $cart_detail['addons']);
                    foreach ($selected_addons as $selected_addon) {
                            if (isset($selected_addon) && !empty($selected_addon)) {    
                                $selected_addon_details = $this->db->get_where('addons', ['aid' => $selected_addon])->row_array();
                                $total_addon_price += $selected_addon_details['addon_price'];
                            }
                        }
                    
            }

        }
      
      return $total_addon_price;
     
    }

    /**
     * GET TOTAL SUM OF VARIENT OR BASE MENU PRICE FROM CART
     */
    public function get_total_varient_or_base_price()
    {
         $cart_details = $this->get_all();
         $total_varient_price = 0;

          if (isset($cart_details) && !empty($cart_details)) {       
          
             foreach ($cart_details as $cart_detail) { 
                   
                     if ($cart_detail['variant_id'] > 0) {
                        //IF VARIENT ACTIVATED
                        $variant_details = $this->db->get_where('variants', ['id' => $cart_detail['variant_id']])->row_array();
                        $total_varient_price += $variant_details['price'];
                     } else {
                        //IF NORMAL MENU 
                        $menu_details = $this->db->get_where('food_menus', ['id' => $cart_detail['menu_id']])->row_array();
                        $total_varient_price += get_menu_price($menu_details['id']);
                    }
                }

        }

     return $total_varient_price;
     
    }


    /**
     * CALCULATING DISTANCE BETWEEN CUSTOMER AND RESTAURNAT
     */
     function distanceMatrix($origin, $destination)
     {
       //https://developers.google.com/maps/documentation/distance-matrix/overview

       //origin is comming from site() controller from session
       //origin: restaurant address
       //destination: customer address 

       $key  =  sanitize(get_system_settings('gmap_api_key')); 
       $mode = "driving";

        if (!empty($restaurant_details['address']) && !empty($this->session->userdata('fullAddress'))) {
               $distance = $this->cart_model->distanceMatrix($restaurant_details['address'], $this->session->userdata('fullAddress')); 
          }

       $content = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.urlencode($origin).'&destinations='.urlencode($destination).'&mode='.$mode.'&language=fr-FR&key='.$key.'');

       $decodedData = json_decode($content);

       $km   = $decodedData->rows[0]->elements[0]->distance->value;
       $time = $decodedData->rows[0]->elements[0]->duration->text;

       $output = $this->distance_calculate_via_matrix($km);
       $data = array('charge' => format($output), 'km' => $km, 'time'=> $time);

       return $data;
       
     }

     //DISTANCE CALCULATON ALGO
     function distance_calculate_via_matrix($data)
     {
            $base_price     = $this->get_total_delivery_charge(); //3.99
            $increase_price = 0;
            $km             = $data; // km in meter by google

            
            $base_meter = get_delivery_settings('base_meter'); //3000m | 3km 
            $x = $base_meter - 1000; //how many time multiply with $0.5 
            if($km > $base_meter) {
                $difference_km = ($km - $x)/1000; 
                $difference_floor = floor($difference_km);
                $increase_price = $difference_floor*0.5;
            } 
            
            $output = $base_price + $increase_price;
            return $output;
          
     }

     //DISTANCE BASED PRICING CALCULATION
     function distance_price()
     {
           $restaurant_ids = $this->cart_model->get_restaurant_ids();
            if (count($restaurant_ids) > 0){
                  foreach ($restaurant_ids as $restaurant_id) {
                     $restaurant_details = $this->restaurant_model->get_by_id($restaurant_id);
                  }

                  $customer_details = $this->customer_model->get_by_id($this->logged_in_user_id);
                  if (!empty($restaurant_details['address']) && !empty($this->session->userdata('fullAddress'))) {
                           $distance = $this->cart_model->distanceMatrix($restaurant_details['address'], $this->session->userdata('fullAddress'));
                  } else {
                       $distance = $this->cart_model->distanceMatrix($restaurant_details['address'], sanitize($customer_details['address_1']));
                  } 
                 
            }

            return $distance;
          
     }

    /**
     * GET SMALLER DATA FOR CART PAGE : TOTAL DELIVERY CHARGE FOR MULTIPLE RESTAURANTS
     */
    public function get_total_delivery_charge()
    {
        $total_delivery_charge = 0;
        $restaurant_ids = $this->get_restaurant_ids();
        foreach ($restaurant_ids as $restaurant_id) {
            $delivery_charge = delivery_charge($restaurant_id) > 0 ? delivery_charge($restaurant_id) : 0;
            $total_delivery_charge = $total_delivery_charge + $delivery_charge;
        }
        return $total_delivery_charge;
        
    }

    /**
     * GET SMALLER DATA FOR CART PAGE : TOTAL SUB TOTAL
     */
    public function get_sub_total()
    {
        $sub_total = 0;
        $total_menu_price       = $this->get_total_menu_price();
        $total_vat_amount       = $this->get_price_tax_amount(); //GST
        $total_pst_amount       = $this->get_price_pst_amount(); //PST
        $service_charge         = $this->get_service_charge($total_menu_price);
        $sub_total =  $total_menu_price + $total_vat_amount + $total_pst_amount + $service_charge;
        return $sub_total;
    }  


    /**
     * GET SMALLER DATA FOR CART PAGE : CATEGORY-WISE VAT/TAX/GST ON PER ITEM
     */
    public function get_price_tax_amount()
    {
         $percentages = $this->category_model->get_category_tax_value();   
         $units = $this->cart_model->get_per_menu_price();
         $total_vat = array(); 
         $total_tax = 0;
         foreach ($units as $unit_cat => $prices) {
            foreach ($prices as $index => $price) {
                $total_vat[] = $price * ($percentages[$unit_cat] / 100);
            }

         }

        //GETTING SUM OF EACH TAX/GST AMOUNT
         foreach ($total_vat as $tax) {
             $total_tax += $tax;
         } 

         return $total_tax;
    }

     /**
     * GET SMALLER DATA FOR CART PAGE : CATEGORY-WISE PST ON PER ITEM
     */
    public function get_price_pst_amount()
    {
         $percentages = $this->category_model->get_category_pst_value();   
         $units = $this->cart_model->get_per_menu_price();
         $total_vat = array(); 
         $total_pst = 0;
         foreach ($units as $unit_cat => $prices) {
            foreach ($prices as $index => $price) {
                $total_vat[] = $price * ($percentages[$unit_cat] / 100);
            }

         }

        //GETTING SUM OF EACH TAX/GST AMOUNT
         foreach ($total_vat as $tax) {
             $total_pst += $tax;
         } 

         return $total_pst;
    }


    /**
     * GET COMMISSON SERVICE CHARGE
     */
    public function get_service_charge($amount, $res_id="")
    {
        $restaurant_ids = $this->cart_model->get_restaurant_ids();
        
        if(count($restaurant_ids) > 0){
          $restaurant_settings = $this->restaurant_model->restaurant_settings_by_id($restaurant_ids[0]);  
        }elseif(!empty($res_id)){
            $restaurant_settings = $this->restaurant_model->restaurant_settings_by_id($res_id);  
        }
        
        $service_charge = $restaurant_settings['service_charge'];

       return $service_charge = ($service_charge / 100) * $amount;
    }


 
    /**
     * GET SMALLER DATA FOR CART PAGE : GRAND TOTAL
     */
    public function get_grand_total()
    {
        $grand_total = 0;
        $sub_total = $this->get_sub_total();

            $restaurant_ids = $this->cart_model->get_restaurant_ids();
            $restaurant_details = $this->restaurant_model->get_by_id($restaurant_ids[0]);

            $customer_details = $this->customer_model->get_by_id($this->session->userdata('user_id'));

             if (!empty($restaurant_details['address']) && !empty($this->session->userdata('fullAddress'))) {
                //pickup customer entered address
                   $distance = $this->cart_model->distanceMatrix($restaurant_details['address'], $this->session->userdata('fullAddress')); 
             } else {
                //pickup customer db address
                   $distance = $this->cart_model->distanceMatrix($restaurant_details['address'], sanitize($customer_details['address_1']));   
              } 


        $total_delivery_charge = $distance['charge'];
        
        //ADDING TIP
        if (!empty($this->session->userdata('custom_tip'))) {
            $grand_total += $this->session->userdata('custom_tip');
        }
        //SUB+DELIVERY
        $grand_total += $sub_total + $total_delivery_charge;
        
        return roundoff(format($grand_total));
    }

    /**
     * DISPLAY GRAND-TOTAL IF WALLET IS ACTIVATED
     */
    public function display_grand_total()
    {
        //WHEN WALLET ACTIVATE
        if(!empty($this->session->userdata('wallet')) && $this->session->userdata('wallet') == 1) :
            $wallet_balance = $this->transaction_model->wallet_balance();   //FETCH THE USER WALLET BALANCE  
                    if($wallet_balance >= $this->cart_model->get_grand_total()): //IF BAL IS GREATER EQUAL TO GT
                        return sanitize(format(0.00));  //SHOW 0.00
                    elseif($wallet_balance <= $this->cart_model->get_grand_total()):  //IF BAL IS LESS THAN EQUAL TO GT
                        return sanitize(format($this->cart_model->get_grand_total() - $wallet_balance)); //GT - BAL
                    else:
                        return sanitize(format($this->cart_model->get_grand_total())); //SHOW ORIGNAL GT
                    endif;

        else: //NOT ACTIVE
            return sanitize(format($this->cart_model->get_grand_total())); //SHOW ORIGNAL GT
        endif;
    }


    /**
     * CLEARING A CART
     */
    public function clearing_cart()
    {
        $data['customer_id'] = $this->logged_in_user_id;
        $this->db->where($data);
        return $this->db->delete($this->table);
    }

    

    /**
     * DASHBOARD TILE DATA USER WISE
     */
    public function get_number_of_cart_items()
    {
        $user_role = $this->session->userdata('user_role');
        if ($user_role == "customer") {
            $this->db->where('customer_id', $this->logged_in_user_id);
        }
        return $this->db->get($this->table)->num_rows();
    }

     /**
     * GET MENU DETAILS WITH VARIANTS
     */
    public function get_menu_details_with_variants_and_addons()
    {
        $menu_id = sanitize($this->input->post('menuId'));
        $quantity = $this->input->post('quantity') > 0 ? sanitize($this->input->post('quantity')) : 1;

        $query_object = $this->db->get_where('food_menus', ['id' => $menu_id]);
        $menu_availability = $query_object->num_rows();
        $menu_details = $query_object->row_array();

        $selected_variants = sanitize($this->input->post('selectedVariants'));

        $menu_price = 0;
        $total_addon_price = 0;
        $total_variant_price = 0;

         $selected_addons = sanitize($this->input->post('selectedAddons'));
        if (!empty($selected_addons)) {
            $selected_addons = explode(',', $selected_addons);
            foreach ($selected_addons as $selected_addon) {
                $selected_addon_details = $this->db->get_where('addons', ['aid' => $selected_addon])->row_array();
                $total_addon_price += $selected_addon_details['addon_price'];
            }

            $selected_addons = implode(",", $selected_addons);
        }

        if ($menu_details['has_variant']) {
          
            if (!empty($selected_variants)) {
                $selected_variants = explode(',', $selected_variants);
                $out = array();
                foreach ($selected_variants as $selected_variant) {
                    $query_object = $this->db->get_where('variants', ['id' => $selected_variant, 'menu_id' => $menu_id]);
                    $variant_details = $query_object->row_array();  
                    $variant_availability = $query_object->num_rows();
                    
                    if ($variant_availability > 0) {
                        $total_variant_price += $variant_details['price'];
                    }

                    array_push($out, $variant_details['id']);
                }
                $variant_count = count($selected_variants);
                $selected_variants = implode(",", $out);
             
            }
  
            
        } else {
            $menu_price = get_menu_price($menu_details['id']);
        }

        $menu_price = get_menu_price($menu_details['id']);

        $total_price = is_numeric($quantity) ? $quantity * ($menu_price + $total_variant_price + $total_addon_price): $menu_price + $total_addon_price + $total_variant_price;

        // ROUNDING UP THE TOTAL PRICE
        $total_price = is_int($total_price) ? $total_price : number_format((float)$total_price, 3, '.', '');

        if ($menu_availability > 0) {
            if ($menu_details['has_variant'] == 1) {
                if (isset($variant_availability) && $variant_availability > 0) {
                    return json_encode(['status' => true, 'hasVariant' => true, 'menuId' => $menu_details['id'], 'variantId' => $selected_variants, 'variantCount' => $variant_count, 'addons' => $selected_addons, 'totalPrice' => format($total_price), 'currencyCode' => currency_code_and_symbol()]);
                } else {
                    return json_encode(['status' => false]);
                }
            } else {
                return json_encode(['status' => true, 'hasVariant' => false, 'menuId' => $menu_details['id'], 'addons' => $selected_addons, 'totalPrice' => format($total_price), 'currencyCode' => currency_code_and_symbol()]);
            }
        } else {
            return json_encode(['status' => false]);
        }
    }

    
}
