<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 12 - June - 2020
 * Author : TheDevs
 * Restaurant Controller Handles All The Functionalities Regarding to Restaurant
 */

include 'Authorization.php';

class Restaurant extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin', 'owner'], true);
    }

    function index()
    {
        $page_data['page_name']   = 'restaurant/index';
        $page_data['page_title']  = get_phrase("restaurant");
        $page_data['restaurant_status'] = 1;
        $page_data['restaurants'] = $this->restaurant_model->get_all_approved();
        $this->load->view('backend/index', $page_data);
    }

    function pending()
    {
        $page_data['page_name'] = 'restaurant/index';
        $page_data['page_title'] = get_phrase("restaurant");
        $page_data['restaurant_status'] = 0;
        $page_data['restaurants'] = $this->restaurant_model->get_all_pending();
        $this->load->view('backend/index', $page_data);
    }

    function create()
    {
        $page_data['page_name'] = 'restaurant/create';
        $page_data['page_title'] = get_phrase("create_a_restaurant");
        $page_data['cuisines'] = $this->cuisine_model->get_all();
        $this->load->view('backend/index', $page_data);
    }

    function store()
    {
        $return_id = $this->restaurant_model->store();
        if ($return_id) {
            success(get_phrase('restaurant_added_successfully'), site_url('restaurant/edit/' . $return_id . '/address'));
        }
    }


    function edit($id, $active_tab = 'basic')
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (!has_access('restaurants', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('restaurant'));
        }
        $page_data['id'] = $id;
        $page_data['restaurant_data'] = $this->restaurant_model->get_by_id($id);
        $page_data['settings_data'] = $this->restaurant_model->restaurant_settings_by_id($id);
        $restaurant_name = $page_data['restaurant_data']['name'];
        $page_data['cuisines'] = $this->cuisine_model->get_all();
        $page_data['active_tab'] = $active_tab;
        $page_data['page_name'] = 'restaurant/edit';
        $page_data['page_title'] = get_phrase("update") . ' ' . $restaurant_name;
        $this->load->view('backend/index', $page_data);
    }

     // index function responsible for re-ordering the category 
     function reorder()
     {
         $page_data['page_name'] = 'restaurant/reorder';
         $page_data['page_title'] = get_phrase("category_reordering");
         $page_data['categories'] = $this->category_model->get_all();
         $this->load->view('backend/index', $page_data);
     }

    function delete($id)
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (!has_access('restaurants', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('restaurant'));
        }

        $response = $this->restaurant_model->delete($id);
        if ($response) {
            success(get_phrase("restaurant_deleted_successfully"), site_url('restaurant'));
        } else {
            error(get_phrase("an_error_occured"), site_url('restaurant'));
        }
    }

    function update_status($id)
    {
        authorization(['admin'], true);
        $response = $this->restaurant_model->update_status($id);
        if ($response) {
            success(
                get_phrase("restaurant_updated_successfully"),
                site_url('restaurant')
            );
        } else {
            error(get_phrase("an_error_occured"), site_url('restaurant'));
        }
    }

    function update($section)
    {
        $id = required(sanitize($this->input->post('id')));

        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (!has_access('restaurants', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('restaurant'));
        }

        $response = $this->restaurant_model->update($section);
        if ($response) {

               //echo txt to just to return true for ajax
              if ($section == 'address') {
                echo '200';
              }
           
            success(get_phrase("restaurant_updated_successfully"), site_url("restaurant/edit/$id/$section"));
        } else {

            error(get_phrase("an_error_occured"), site_url("restaurant/edit/$id/$section"));
        }
    }

     // UPDATE Restaurant ONLINE/OFFLINE STATUS
     function mode()
     {
         $restaurant_id =  required(sanitize($this->input->post('id')));
         $res_detail = $this->restaurant_model->get_by_id($restaurant_id);
         $response = $this->restaurant_model->mode($restaurant_id);
         if ($response) {
             $arr = array('code'=> 200, 'for_res'=> $res_detail['name']);
             echo json_encode($arr);
         }
     }

     //Hide/show restaurnt from frontend searching result
     function visible($status, $id)
     {
         $restaurant_id =  required(sanitize($id));
         $status =  required(sanitize($status));

         $response = $this->restaurant_model->visible($status,$restaurant_id);
         if ($response) {
             success(get_phrase("restaurant_visibility_updated"), site_url("restaurant"));
         } else {
            error(get_phrase("an_error_occured"), site_url("restaurant"));
        }
     }
}
