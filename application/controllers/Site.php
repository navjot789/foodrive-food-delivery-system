<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 14 - July - 2020
 * Author : TheDevs
 * Site Controller controlls the The Frontend Stuffs
 */

include 'Base.php';
class Site extends Base
{

    // INDEX FUNCTION IS RESPONSIBLE FOR SHOWING INDEX PAGE
    function index()
    {
        $page_data['page_name']        = 'home/index';
        $page_data['page_title']       = site_phrase("home", true);
        $page_data['featured_cuisines'] = $this->cuisine_model->get_featured_cuisine();
        $page_data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants(9);
        $page_data['categories'] = $this->category_model->get_featured_categories();
        $this->load->view(frontend('index'), $page_data);
    }

    // RESTAURANT FUNCTION IS RESPONSIBLE FOR SHOWING THE RESTAURANT DETAILS PAGE
    function restaurant($slug = "", $restaurant_id = "",  $clicked_cat = "")
    {

      //PREVENT DIRECT RESTAURANT ACCESS
      if (!empty($this->session->userdata('cityName')) && !empty($this->session->userdata('fullAddress'))) {

         //SLUG AND RES-ID CANNOT BE EMPTY
        if (!empty($slug) && !empty($restaurant_id)) {

           $page_data['restaurant_details'] = $this->restaurant_model->get_by_id($restaurant_id);

          //MATCHING SESSION CITY-NAME WITH RESTAURANT CITY-NAME
          if ($this->session->userdata('cityName') == $page_data['restaurant_details']['city']) {
         
                $page_data['page_name']          = 'restaurant/index';
                $page_data['page_title']         = site_phrase("restaurant", true);

                /* SENDING THIS PARAM TO PAGE FOR SEARCH BY CATEGORY */
                $page_data['slug']               = $slug; 
                $page_data['category']           = $clicked_cat;

                
                $page_size = 15;

                //if display menu by clicked category via customer
                if (!empty($page_data['category'])) {

                    $total_search_by_clicked_cat = $this->menu_model->count_search_menu_by_clicked_cat($page_data['category'],$restaurant_id);
                   
                   /**PAGINATION STARTS**/
                    $total_menus = $total_search_by_clicked_cat;
                    $total_rows = $total_menus;
                    $config = pagintaion($total_rows, $page_size, site_url("site/restaurant/".$slug."/".$restaurant_id."/".$page_data['category']));
                    $current_page = sanitize($this->input->get('page')) ? sanitize($this->input->get('page')) : 0;
                    $this->pagination->initialize($config);
                    /**PAGINATION ENDS**/
                   
                    $page_data['menus'] = $this->menu_model->search_menu_by_clicked_cat($page_data['category'], $restaurant_id, $page_size, $current_page);
                   
                }else {

                 /**PAGINATION STARTS**/
                    $total_menus = $this->menu_model->count_restaurant_menu($restaurant_id);
                    $total_rows = $total_menus;
                    $page_data['total'] = $total_rows;
                    $config = pagintaion($total_rows, $page_size, site_url("site/restaurant/".$slug."/".$restaurant_id));
                    $current_page = sanitize($this->input->get('page')) ? sanitize($this->input->get('page')) : 0;
                    $this->pagination->initialize($config);
                    /**PAGINATION ENDS**/
                   
                    $page_data['menus'] = $this->menu_model->get_restaurant_menu($restaurant_id, $page_size, $current_page);
                }

                $this->load->view(frontend('index'), $page_data);

              }else {
                //REDIRECT TO HOME PAGE
                error(get_phrase('Your_location_not_matched_with_restaurant'), site_url('/'));
                redirect(site_url('/'));  
            }


          } else {
            //REDIRECT TO HOME PAGE
            redirect(site_url('/')); 
            
        }

        } else {
            //REDIRECT TO HOME PAGE
           redirect(site_url('/')); 
            
        }

    }

    // THIS FUNCTION IS RESPONSIBLE FOR SHOWING POPULAR RESTAURANT LIST
    function restaurants($type = "")
    {
        $page_data['cuisine']    = isset($_GET['cuisine']) ? sanitize($_GET['cuisine']) : "all";
        $page_data['category']   = isset($_GET['category']) ? sanitize($_GET['category']) : "all";
        if (empty($type) || $type == "popular") {
            $page_title = empty($type) ? site_phrase('restaurants', true) : site_phrase('popular_restaurants', true);
            $page_header = site_phrase('popular_restaurants');
            $order_by = 'rating';
            $condition['status'] = 1;
            $restaurants = $this->restaurant_model->get_popular_restaurants();
        } elseif ($type == "recent") {
            $page_title = site_phrase('recently_added_restaurants', true);
            $page_header = site_phrase('recently_added_restaurants');
            $order_by = 'id';
            $condition['status'] = 1;
            $restaurants = $this->restaurant_model->get_all_approved();
        } elseif ($type == "filter") {
            $page_title = site_phrase('filtered_restaurants', true);
            $page_header = site_phrase('filtered_restaurants');
            $order_by = 'rating';
            $restaurants = $this->restaurant_model->filter_restaurant_frontend(); // IT RETURNS ALL THE FILTERED RESTAURANT'S IDS
            $condition['id'] = $restaurants;
        }
        /**PAGINATION STARTS**/
        $total_rows = count($restaurants);
        $page_size = 15;
        $pagination_url = empty($type) ? site_url('site/restaurants') : site_url('site/restaurants/' . $type);
        $config = pagintaion($total_rows, $page_size, $pagination_url);
        $current_page = sanitize($this->input->get('page', 0));
        $this->pagination->initialize($config);

        $page_data['restaurants'] = $this->restaurant_model->merger($this->restaurant_model->paginate($page_size, $current_page, $condition, $order_by));
        /**PAGINATION ENDS**/

        $page_data['total_rows']  = $total_rows;
        $page_data['cuisines']    = $this->cuisine_model->get_all();
        $page_data['categories']  = $this->category_model->get_all();
        $page_data['page_name']   = 'restaurants/index';
        $page_data['page_header'] = $page_header;
        $page_data['page_title']  = $page_title;
        $page_data['type']        = $type;
        $this->load->view(frontend('index'), $page_data);
    }
  
    //LOADING SESSION FOR CUSTOMER 
    function lookup() {
      
       $cityName =sanitize($this->input->post('cityName'));

       //init session
       $this->load->library('session');
       if (!empty($cityName)) {

        $this->session->set_userdata('lat',  sanitize($this->input->post('lat')));
        $this->session->set_userdata('long',  sanitize($this->input->post('long')));

        $this->session->set_userdata('streetNumber',  sanitize($this->input->post('streetNumber')));
        $this->session->set_userdata('streetName',  sanitize($this->input->post('streetName')));
        $this->session->set_userdata('cityName',  sanitize($this->input->post('cityName')));
        $this->session->set_userdata('fullAddress',  sanitize($this->input->post('fullAddress')));
        $this->session->set_userdata('place_id',  sanitize($this->input->post('place_id')));

        $responce = array("status"=> 200);

     
            //IF USER LOGGED-IN AND MUST BE CUSTOMER
            if ($this->session->userdata('is_logged_in') && $this->session->userdata('customer_login')) {
                //CUSTOMER USER-ROLE ID
                if ($this->session->userdata('user_role_id') == 2 && $this->session->userdata('user_role') == 'customer') { 

                        $user_id = array('user_id' => $this->session->userdata('user_id'));

                        //UPDATE USER ADDRESS EVERYTIME WHEN HE ENTER HIS LOCATION FROM HOME 
                         $query_status =  $this->load_session_as_address($user_id);
                         if ($query_status) {  

                              //RESET CART IF USER TRYING TO ORDER FROM DIFFERENT CITY
                                 if($this->cart_model->total_cart_items() > 0) {
                                     $restaurant_id = $this->cart_model->get_restaurant_ids(); //CART RESTAURNT ID
                                     $restaurant_data = $this->restaurant_model->get_by_id($restaurant_id[0]);
                                     if ($this->session->userdata('cityName') !== $restaurant_data['city']) {
                                        $this->cart_model->clearing_cart();
                                     }
                                 }

                              $msg = array("msg"=>"Delivery Address updated", "type" => "success");
                              $responce = array_merge($responce, $msg);   
                         
                         }     
                   
                 }
               
            }

        echo json_encode($responce);

       }
      
     }

     //THIS FUNCTION WILL UPDATE THE DELIVERY ADDRESS OF THE USER
     function load_session_as_address($user_id)
     {     

            $latitude_1 = sanitize($this->session->userdata('lat')) ? sanitize($this->session->userdata('lat')) : '';
            $longitude_1 = sanitize($this->session->userdata('long')) ? sanitize($this->session->userdata('long')) : '';
            $coordinate_1 = array('latitude' => $latitude_1, 'longitude' => $longitude_1);

            $address_data['street_no'] = required(sanitize($this->session->userdata('streetNumber')));
            $address_data['street_name'] = required(sanitize($this->session->userdata('streetName')));
            $address_data['city'] = required(sanitize($this->session->userdata('cityName')));

            $address_data['address_1'] = required(sanitize($this->session->userdata('fullAddress')));
            $address_data['coordinate_1'] = json_encode($coordinate_1); 

            $this->db->where($user_id);  
            $result = $this->db->update('customers', $address_data);  
               
               if(!$result) {
                   return false;
                }
                else {

                    if($this->db->affected_rows() > 0) {
                        return true;
                    }
  
                }

     }


    //GET RESTAURNTS BASED ON USER ENTERED LOCATION
    function findRestaurants() 
     {
       if($this->session->userdata('fullAddress')) {

            $page_data['page_name']        = 'findRestaurants/index';
            $page_data['page_title']       = 'list of available restaurants';

                //counting total number of search rows
                $total_rows = $this->restaurant_model->count_restaurant_by_city($this->session->userdata('cityName'), $this->session->userdata('fullAddress')); 
                $page_size = 12; //item display per page
                $pagination_url = site_url('site/findRestaurants'); //url where pagination will show

                $config = pagintaion($total_rows, $page_size, $pagination_url); //pagination config
                $this->pagination->initialize($config);
                $current_page = sanitize($this->input->get('page')) ? sanitize($this->input->get('page')) : 0; //current page is 0

                $page_data['page_header']      = $total_rows.' restaurants around you';
                $page_data['fullAddress']  = $this->session->userdata('fullAddress');


                $page_data['restaurants'] = $this->restaurant_model->get_restaurant_by_city($this->session->userdata('cityName'), $this->session->userdata('fullAddress'), $page_size, $current_page);

                $this->load->view(frontend('index'), $page_data);

        }else {
            //REDIRECT TO HOME PAGE
            error('Please enter your address first!','/');
        }

     }

     // THIS FUNCTION IS RESPONSIBLE FOR SHOWING SEARCH RESULTS WITHIN RESTAURANT
    function search()
    {
    
     //PREVENT DIRECT RESTAURANT ACCESS
      if (!empty($this->session->userdata('streetNumber')) && !empty($this->session->userdata('streetName')) && 
          !empty($this->session->userdata('cityName')) && !empty($this->session->userdata('fullAddress'))) {

                $page_data['restaurant_id']    =  sanitize($_GET['id']);
                $page_data['query']            =  sanitize($_GET['query']);   
                $page_data['page_name']        = 'search/index';
                $page_data['page_title']       = 'Search result';
                
                $total_rows = $this->menu_model->count_search_menu($page_data['query'], $page_data['restaurant_id']); //counting total number of search rows
                $page_size = 12; //item display per page
                $pagination_url = site_url('site/search'); //url where pagination will show

                $config = pagintaion($total_rows, $page_size, $pagination_url); //pagination config
                $this->pagination->initialize($config);
                $current_page = sanitize($this->input->get('page')) ? sanitize($this->input->get('page')) : 0; //current page is 0

                $page_data['total_rows']  = $total_rows;
                $page_data['search_result'] = $this->menu_model->get_searched_menu_by_name_and_restaurant($page_data['query'], $page_data['restaurant_id'], $page_size, $current_page);

                $this->load->view(frontend('index'), $page_data);

         } else {

            //REDIRECT TO HOME PAGE
            redirect('/');
            
        }

    }

    
    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING THE ABOUT US PAGE
     *
     * @return void
     */
    public function about_us()
    {
        $page_data['page_name']        = 'about_us/index';
        $page_data['page_title']       = site_phrase("about_us", true);
        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING THE FAQ PAGE
     *
     * @return void
     */
    public function faq()
    {
        $page_data['page_name']        = 'faq/index';
        $page_data['page_title']       = site_phrase("FAQ's", true);
        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING THE TERMS AND CONDITIONS PAGE
     *
     * @return void
     */
    public function privacy_policy()
    {
        $page_data['page_name']        = 'privacy_policy/index';
        $page_data['page_title']       = site_phrase("privacy_policy", true);
        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SWITCHING LANGUAGE FROM FRONTEND
     *
     * @return void
     */
    public function site_language()
    {
        $selected_language = sanitize($this->input->post('language'));
        $this->session->set_userdata('language', $selected_language);
        echo true;
    }
}

/* End of file Site.php */
