<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 10 - June - 2020
 * Author : TheDevs
 * Category model handles all the database queries of Menu Categories
 */

class Category_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "food_categories";
    }

    /**
     * GET ALL CATEGORIES
     */
    public function get_all()
    {
        $this->db->order_by("id", "desc");
        return $this->db->get($this->table)->result_array();
    }

    /**
     * GET CATEGORIES BY ID
     */
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    /**
     * GET CATEGORIES-ID FROM ADDED CART ITEM OF THE USER
     */
    public function get_category_id_from_cart_item()
    {
         $cart_items = $this->cart_model->get_all();

         $data = array();
         foreach ($cart_items as $cart_item) {
             
            $menu_details = $this->menu_model->get_cat_by_menu_id($cart_item['menu_id']);
            $data[] = $menu_details['category_id']; //array(1, 2, 2, 3);
         }

          return  array_unique($data); // Array is now unique (1, 2, 3)

    }
 
    /**
     * GET GST % FROM CATEGORY-ID from cart
     */
    public function get_category_tax_value()
    {
         
         $cat_ids = $this->get_category_id_from_cart_item();
         $data = array();
         foreach ($cat_ids as $cat_id) {
            $this->db->select('id,tax');
            $this->db->where('id', $cat_id);
            $category_data = $this->db->get($this->table)->row_array();
            $data[$category_data['id']] =  ($category_data['tax'] == 0) ? 0 : $category_data['tax'];
          }
       return $data;
    }

     /**
     * GET PST % FROM CATEGORY-ID from cart
     */
    public function get_category_pst_value()
    {
         
         $cat_ids = $this->get_category_id_from_cart_item();
         $data = array();
         foreach ($cat_ids as $cat_id) {
            $this->db->select('id,pst');
            $this->db->where('id', $cat_id);
            $category_data = $this->db->get($this->table)->row_array();
            $data[$category_data['id']] =  ($category_data['pst'] == 0) ? 0 : $category_data['pst'];
          }
       return $data;
    }

   
    

    /**
     * GET FEATURED CATEGORIES
     */
    public function get_featured_categories()
    {
        $this->db->where('is_featured', 1);
        return $this->db->get($this->table)->result_array();
    }

    /**
     * GET DATA BY A CONDITION ARRAY
     */
    public function get_by_condition($conditions = [])
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
        return $this->db->get($this->table)->result_array();
    }

    /**
     * STORING DATA
     */
    public function store()
    {
            $tax  = !empty(sanitize($this->input->post('gst'))) ? sanitize($this->input->post('gst')) : 0;
            $pst  = !empty(sanitize($this->input->post('pst'))) ? sanitize($this->input->post('pst')) : 0;

               $data['name']  = required(sanitize($this->input->post('category_name')));
               $data['tax']  = $tax;
               $data['pst']  = $pst;
               $data['created_by'] = $this->logged_in_user_id;
               if (isset($_POST['is_featured'])) {
                   if (count($this->get_featured_categories()) < 8) {
                       $data['is_featured'] = 1;
                   } else {
                       $data['is_featured'] = 0;
                   }
               } else {
                   $data['is_featured'] = 0;
               }
               $data['created_at'] = strtotime(date('D, d-M-Y'));

               if (count($this->get_by_condition(['name' => $data['name']])) > 0) {
                   error(get_phrase('this_category_is_already_registered'), site_url('category'));
               }

               // UPLOAD THUMBNAIL
               if (!empty($_FILES['category_thumbnail']['name'])) {

                   $imageExtention = pathinfo($_FILES["category_thumbnail"]["name"], PATHINFO_EXTENSION);
               
                   if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                   
                           $data['thumbnail']  = $this->upload('category', $_FILES['category_thumbnail']);

                   } else {

                       error(get_phrase('invalid_image_format'), $_SERVER['HTTP_REFERER']);
                   
                   }
               }

                $this->db->insert($this->table, $data);
                return true;   
        
    }

    /**
     * UPDATING CATEGORY
     */
    public function update()
    {
        $id = required(sanitize($this->input->post('id')));
        $previous_data = $this->get_by_id($id);

        $tax  = !empty(sanitize($this->input->post('gst'))) ? sanitize($this->input->post('gst')) : 0;
        $pst  = !empty(sanitize($this->input->post('pst'))) ? sanitize($this->input->post('pst')) : 0;

           
                $data['name']  = required(sanitize($this->input->post('category_name')));
                $data['tax']  = $tax;
                $data['pst']  = $pst;
                if (isset($_POST['is_featured'])) {
                    if (count($this->get_featured_categories()) < 8) {
                        $data['is_featured'] = 1;
                    } else {
                        if ($previous_data['is_featured']) {
                            $data['is_featured'] = 1;
                        } else {
                            $data['is_featured'] = 0;
                        }
                    }
                } else {
                    $data['is_featured'] = 0;
                }
                $data['updated_at'] = strtotime(date('D, d-M-Y'));

                if (count($this->get_by_condition(['name' => $data['name'], 'id !=' => $id])) > 0) {
                    error(get_phrase('this_category_is_already_registered'), site_url('category'));
                }

                 // UPLOAD THUMBNAIL
                if (!empty($_FILES['category_thumbnail']['name'])) {

                    $imageExtention = pathinfo($_FILES["category_thumbnail"]["name"], PATHINFO_EXTENSION);
                   
                    if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                       
                            $data['thumbnail']  = $this->upload('category', $_FILES['category_thumbnail'], $previous_data["thumbnail"]);

                    } else {

                        error(get_phrase('invalid_image_format'), $_SERVER['HTTP_REFERER']);
                       
                    }
                }

                $this->db->where('id', $id);
                $this->db->update($this->table, $data);
                return true;

    }

    /**METHOD: GETTING CATEGORIES FROM ALL RESTAURANT MENUES
     * PUBLIC FUNCTION GET FOOD CATEGORIES ACCORDING TO RESTAURANT
     */
    public function get_categories_by_restaurant_id($restaurant_id)
    {
        // FIRST GET ALL THE CATEGORY ID AS NUMERIC ARRAY
        $this->db->distinct();
        $this->db->select('category_id');
        $this->db->where('restaurant_id', $restaurant_id);
        $categories_array = $this->db->get('food_menus')->result_array();
        $categories = array();
        foreach ($categories_array as $category) {
            array_push($categories, $category['category_id']);
        }

        // NOW GET THE ACTUAL CATEGORY DETAILS
        if (count($categories) > 0) {
            $this->db->where_in('id', $categories);
            return $this->db->get('food_categories')->result_array();
        }
        return array();
    }

    //CREATING ORDER INDEX
    function create_index_order($category_id, $menu_id, $restaurant_id)
    {       
         $restaurant_data = $this->restaurant_model->get_by_id($restaurant_id);
            
            $index_data['id'] =  $category_id;
            $index_data['mid'] =  $menu_id;
            $index_data['restaurant_id'] = $restaurant_id;
            $index_data['created_by'] = $restaurant_data['owner_id'];
            $this->db->insert('food_categories_index', $index_data);
       
            return true;    
    }
 
    //METHOD: GETTING CATEGORY IDS(DISTINCT) FROM TABLE RECORDS
    //GETTING CATEGORY INDEX ORDER BY RESTAURANT ID
    function get_index_order_by_restaurant($restaurant_id)
    {    
        $owner = $this->restaurant_model->get_owner_id_by_res_id($restaurant_id); 

            $this->db->where('restaurant_id', $restaurant_id);
            if($this->session->userdata('user_role') == 'owner') {
               $this->db->where('created_by', $this->logged_in_user_id);   
            }else {
                $this->db->where('created_by', $owner['owner_id']);  
            }
            $this->db->group_by('id');
            $this->db->order_by('index_order','AESC');
            return  $this->db->get('food_categories_index')->result_array();
           
    }

    //GETTING CATEGORY INDEX ORDER BY RESTAURANT ID
    function update_index_order($indx_id, $index_order) { 
        
            $data = array( 'index_order' => $index_order);

            $this->db->where('indx_id', $indx_id);
            $this->db->update('food_categories_index', $data);

            return true;
           
    }
 

    
}
