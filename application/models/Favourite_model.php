<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 23 - August - 2020
 * Author : TheDevs
 * Favourite model handles all the database queries of favourite
 */

class Favourite_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "favourites";
    }

    /**
     * GET ALL THE FAVOURITES
     */
    public function get_all()
    {
        $this->db->where('customer_id', $this->logged_in_user_id);
        $obj = $this->db->get($this->table);
        return $this->merger($obj);
    }

    /**
     * FAVOURITE MERGER
     */
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $favourites = $query_obj->result_array();
            foreach ($favourites as $key => $favourite) {
                $customer_details = $this->customer_model->get_by_id($favourite['customer_id']);
                $menu_details = $this->menu_model->get_by_id($favourite['menu_id']);
                $restaurant_details = $this->restaurant_model->get_by_id($menu_details['restaurant_id']);
                $favourites[$key]['customer_name']  = isset($customer_details['name']) ? $customer_details['name'] : "";
                $favourites[$key]['customer_email']  = isset($customer_details['email']) ? $customer_details['email'] : "";
                $favourites[$key]['menu_name']  = $menu_details['name'];
                $favourites[$key]['menu_servings']  = $menu_details['servings'];
                $favourites[$key]['menu_availability']  = $menu_details['availability'];
                $favourites[$key]['restaurant_name']  = $restaurant_details['name'];
                $favourites[$key]['restaurant_slug']  = $restaurant_details['slug'];
                $favourites[$key]['restaurant_id']  = $restaurant_details['id'];
            }
            return $favourites;
        } else {
            $favourite = $query_obj->row_array();
            $customer_details = $this->customer_model->get_by_id($favourite['customer_id']);
            $menu_details = $this->menu_model->get_by_id($favourite['menu_id']);
            $restaurant_details = $this->restaurant_model->get_by_id($menu_details['restaurant_id']);
            $favourite['customer_name']  = isset($customer_details['name']) ? $customer_details['name'] : "";
            $favourite['customer_email']  = isset($customer_details['email']) ? $customer_details['email'] : "";
            $favourite['menu_name']  = $menu_details['name'];
            $favourite['menu_servings']  = $menu_details['servings'];
            $favourite['menu_availability']  = $menu_details['availability'];
            $favourite['restaurant_name']  = $restaurant_details['name'];
            $favourite['restaurant_slug']  = $restaurant_details['slug'];
            $favourite['restaurant_id']  = $restaurant_details['id'];
            return $favourite;
        }
    }

    /**
     * CHECK IF A MENU IS ADDED TO THE FAVOURITE
     */
    public function is_added($menu_id)
    {
        $data['customer_id'] = $this->logged_in_user_id;
        $data['menu_id'] = $menu_id;
        $previous_data = $this->db->get_where($this->table, $data)->num_rows();
        return $previous_data > 0 ? true : false;
    }

    /**
     * ADDING OR REMOVING FAVOURITES FUNCTION
     */
    function toggle_favourites($menu_id)
    {
        $data['customer_id'] = $this->logged_in_user_id;
        $data['menu_id'] = $menu_id;
        $menu_details = $this->db->get_where('food_menus', ['id' => $menu_id])->num_rows();
        if ($menu_details > 0) {
            $previous_data = $this->db->get_where($this->table, $data);
            if ($previous_data->num_rows() > 0) {
                $previous_data = $previous_data->row_array();
                $this->db->where('id', $previous_data['id']);
                $this->db->delete($this->table);
                return "removed";
            } else {
                $this->db->insert($this->table, $data);
                return "added";
            }
        } else {
            return false;
        }
    }


    /**
     * DASHBOARD TILE DATA USER WISE
     */
    public function get_number_of_favourite_items()
    {
        $user_role = $this->session->userdata('user_role');
        if ($user_role == "customer") {
            $this->db->where('customer_id', $this->logged_in_user_id);
        }
        return $this->db->get($this->table)->num_rows();
    }
}
