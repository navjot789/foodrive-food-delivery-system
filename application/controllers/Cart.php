<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 25 - July - 2020
 * Author : TheDevs
 * Cart Controller controlls the task for a Cart
 */

include 'Base.php';
class Cart extends Base
{

    function check_customer_login()
    {
        if (!$this->session->userdata('customer_login') && !$this->session->userdata('owner_login')) {
            return false;
        }
        return true;
    }
    // index function responsible for showing the index page.
    function index()
    {
        $page_data['page_name']  = 'cart/index';
        $page_data['page_title'] = get_phrase("your_cart", true);
        $this->load->view(frontend('index'), $page_data);
    }

    // add_to_cart method add items to the cart
    function add_to_cart()
    {
        //Status
        //0: not login
        //1: added to cart
        //2: restaurant location changed and clear the cart
        //3: user address not found! || if front address not match with db address

    
        //if user is not login
        if (!$this->check_customer_login()) {

             $response = array("status"=>"0");
             $response = json_encode($response);
             echo $response;

        }else {
        //if login success

         $cart_item_rid = $this->cart_model->get_restaurant_ids();
         //[1]: Newly added cart restaurant ID
         //[0]: Previous added cart item restaurant ID 
         //  NEWLY ADDED CART RESTAURNAT ID !== if previous added cart item restaurant ID
         $post_restaurnat_id = sanitize($this->input->post('resID')); //user trying to add item from another restaurant
         $customer_address = $this->customer_model->get_address_by_id($this->session->userdata('user_id')); 

         $address_1 = str_replace(" ","",$customer_address->address_1); //remove white-spaces

       //if new customer address is not empty for checkout
             if (!empty($address_1)) {

                     //when cart is 0
                     if (empty($cart_item_rid[0]) || $cart_item_rid[0] == 0) {
                         
                            //if frontend address match with user checkout address (steet-number|street-name|city)
                             if ($this->session->userdata('streetNumber') == $customer_address->street_no &&
                                 $this->session->userdata('streetName') == $customer_address->street_name &&
                                 $this->session->userdata('cityName') == $customer_address->city) {

                                    //add to cart 
                                     $this->cart_model->add_to_cart();
                                     $total_cart_items = sanitize($this->cart_model->total_cart_items());

                                     $response = array("status"=>"1","total_cart_items"=>$total_cart_items);
                                     $response = json_encode($response);
                                     echo $response;


                                 } else {

                                         //error: not match
                                         $this->cart_model->clearing_cart();
                                         //unset sessions
                                         $this->session->unset_userdata('streetNumber');
                                         $this->session->unset_userdata('streetName');
                                         $this->session->unset_userdata('cityName');
                                         $this->session->unset_userdata('fullAddress');
                                         $this->session->unset_userdata('place_id');

                                           //loadup customer current address into session so that he can add to cart from favourate
                                        $user_id = array('user_id' => $this->session->userdata('user_id'));
                                        $location = $this->db->get_where('customers', $user_id)->row(); //return single row
                                        if (!empty($location->address_1)) {
                                          
                                                $this->session->set_userdata('streetNumber',  $location->street_no);
                                                $this->session->set_userdata('streetName',  $location->street_name);
                                                $this->session->set_userdata('cityName',  $location->city);
                                                $this->session->set_userdata('fullAddress',  $location->address_1);
                                      
                                         }


                                         $total_cart_items = sanitize($this->cart_model->total_cart_items());
                                         $response = array("status"=>"3","total_cart_items"=>$total_cart_items,"url"=>'/');
                                         $response = json_encode($response);
                                         echo $response;
                                         error(get_phrase('Your_entered_location_not_match_with_delivery_address_please_update_your_current_address_from_profile_settings'), site_url('/'));        

                                 }

                         
                     }

                    //when customer add item into cart from same restaurant
                     if(!empty($cart_item_rid[0]) && $cart_item_rid[0] == $post_restaurnat_id )
                     {
                         
                            //if frontend address match with user checkout address
                          
                             if ($this->session->userdata('streetNumber') == $customer_address->street_no &&
                                 $this->session->userdata('streetName') == $customer_address->street_name &&
                                 $this->session->userdata('cityName') == $customer_address->city) {

                                    //add to cart 
                                     $this->cart_model->add_to_cart();
                                     $total_cart_items = sanitize($this->cart_model->total_cart_items());

                                     $response = array("status"=>"1","total_cart_items"=>$total_cart_items);
                                     $response = json_encode($response);
                                     echo $response;


                             } else {

                                     //error: not match
                                     $this->cart_model->clearing_cart();
                                     //unset font sessions
                                     $this->session->unset_userdata('streetNumber');
                                     $this->session->unset_userdata('streetName');
                                     $this->session->unset_userdata('cityName');
                                     $this->session->unset_userdata('fullAddress');
                                     $this->session->unset_userdata('place_id');

                                      //loadup customer current address into session so that he can add to cart from favourate
                                        $user_id = array('user_id' => $this->session->userdata('user_id'));
                                        $location = $this->db->get_where('customers', $user_id)->row(); //return single row
                                        if (!empty($location->address_1)) {
                                          
                                                $this->session->set_userdata('streetNumber',  $location->street_no);
                                                $this->session->set_userdata('streetName',  $location->street_name);
                                                $this->session->set_userdata('cityName',  $location->city);
                                                $this->session->set_userdata('fullAddress',  $location->address_1);
                                      
                                         }

                                     $total_cart_items = sanitize($this->cart_model->total_cart_items());
                                     $response = array("status"=>"3","total_cart_items"=>$total_cart_items,"url"=>'/');
                                     $response = json_encode($response);
                                     echo $response;-
                                     error(get_phrase('Your_entered_location_not_match_with_delivery_address_please_update_your_current_address_from_profile_settings'), site_url('/'));        

                             }

                     }
         

                     //when customer trying to add item into cart from different restaurants
                    if(!empty($cart_item_rid[0]) && $cart_item_rid[0] !== $post_restaurnat_id )
                     {
                         
                         if($this->cart_model->clearing_cart())
                         {
                             $this->cart_model->add_to_cart();
                             $total_cart_items = sanitize($this->cart_model->total_cart_items());

                             $response = array("status"=>"2","status_msg"=>"cleared","total_cart_items"=>$total_cart_items);
                             $response = json_encode($response);
                             echo $response;
                             
                         }
                        
                     }


                 } else {

                //if empty address
                     $total_cart_items = sanitize($this->cart_model->total_cart_items());
                     $response = array("status"=>"3","total_cart_items"=>$total_cart_items,"url"=>'/settings/profile#address');
                     $response = json_encode($response);
                     echo $response;
                     error(get_phrase('Checkout_address_not_defined_please_add_your_current_address'), site_url('/settings/profile#address'));

             }
      
        }

       return false; 

  
    }

    // Update method is responsible for Updating the restaurant types
    function update_cart()
    {
        $updated_price = $this->cart_model->update_cart();
        echo $updated_price;
    }

    function reload_cart_summary()
    {
        //Activate the wallet balance
        $this->transaction_model->activate_wallet_balance();
        $this->load->view(frontend('cart/summary'));
    }

    // Delete method is responsible for storing data
    function delete($id)
    {
        $response = $this->cart_model->delete($id);
        if ($response) {
            success(get_phrase('item_deleted_successfully'), site_url('cart'));
            
        } else {
            error(get_phrase('an_error_occurred'), site_url('cart'));
        }
    }

    // GET MENU DETAILS INCLUDING VARIANTS
    public function get_menu_details_with_variants_and_addons()
    {
        $response = $this->cart_model->get_menu_details_with_variants_and_addons();
        echo $response;
    }

}
