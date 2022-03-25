<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 10 - June - 2020
 * Author : TheDevs
 * User model handles all the database queries of Users
 */

class Restaurant_model extends Base_model
{
    function __construct()
    {

        parent::__construct();
        $this->table = "restaurants";
    }

    /**
     * GET ALL THE RESTAURANTS WITHOUT ANY CONDITIONS
     *
     */
    public function get_all()
    {
        $this->db->order_by("id", "desc");
        return $this->db->get($this->table)->result_array();
    }

    /**
     * GET RESTAURANT USING ID WITHOUT ANY CONDITIONS
     *
     */
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $restaurants = $this->db->get($this->table);
        return $this->merger($restaurants, true);
    }

      /**
     * GET RESTAURANT USING OWNER ID WITHOUT ANY CONDITIONS
     *
     */
    public function get_res_by_owner_id($id)
    {
        $this->db->where('owner_id', $id);
        return $this->db->get($this->table)->result_array();
    }

      /**
     * GET OWNER ID USING RESTAURANT ID WITHOUT ANY CONDITIONS
     *
     */
    public function get_owner_id_by_res_id($id)
    {
        $this->db->select('owner_id');
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    /**
     * GET RESTAURANT SETTINGS BY RES ID
     *
     */
    public function restaurant_settings_by_id($id)
    {
        $this->db->where('restaurant_id', $id);
        return $this->db->get('restaurant_settings')->row_array();
    }


    /**
     * GET RESTAURANT USING CITY OR ADDRESS
     *
     */
    public function get_restaurant_by_city($city, $address="", $page_per_row, $pagenum)
    {
        
        $this->db->group_start()   
                   ->like('city', $city, 'both')
                   ->or_like('address', $address, 'both')//both = %query%, before = %query, after = query%
               ->group_end()
               ->where('status', 1)//1:Approved|0:pending
               ->where('visibility', 1)//restaurant hide/show from front end
               ->order_by("online_status desc","id desc");

        // Executes: SELECT * FROM mytable LIMIT 10 OFFSET 20
        // get([$table = ''[, $limit = NULL[, $offset = NULL]]])
       // $this->db->get('mytable', 10, 20);
    
       if (isset($pagenum) && $pagenum !== 0) {
         $pagenum  = ($pagenum - 1) * $page_per_row;
       }else { 
           if(isset($_GET['page'])) {
             $pagenum  = ($pagenum + 1) * $page_per_row;
           }else {
            $pagenum  = 0;
           }
       }
      
        $find  = $this->db->get($this->table, $page_per_row , $pagenum);
        return $find->result();
    }

    // COUNT RESTAURANT USING CITY OR ADDRESS
    public function count_restaurant_by_city($city, $address="")
    {
       
         $this->db->group_start()   
                   ->like('city', $city, 'both')
                   ->or_like('address', $address, 'both')//both = %query%, before = %query, after = query%
               ->group_end()
               ->where('status', 1)//1:Approved|0:pending
               ->where('visibility', 1); //restaurant hide/show from front end

        $find  = $this->db->get($this->table);
        $result = $find->result();
        $count = count($result);
        return $count;
    }


    /**
     * GET RESTAURANT USING CONDTIONS
     *
     * @param array $conditions
     */
    public function get_restaurants_by_condition($conditions = [])
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
        $this->db->order_by("id", "desc");
        return $this->db->get($this->table)->result_array();
    }

    public function get_all_approved()
    {
        if ($this->logged_in_user_role == "owner") {
            $this->db->where('owner_id', $this->logged_in_user_id);
        }
        $this->db->where('status', 1);
        $this->db->order_by("id", "desc");
        $restaurants = $this->db->get($this->table);
        return $this->merger($restaurants);
    }

    public function get_all_pending()
    {
        if ($this->logged_in_user_role == "owner") {
            $this->db->where('owner_id', $this->logged_in_user_id);
        }
        $this->db->where('status', 0);
        $this->db->order_by("id", "desc");
        $restaurants = $this->db->get($this->table);
        return $this->merger($restaurants);
    }

    // FETCH ALL THE RELATED DATA WITH RESTAURANT
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $restaurants = $query_obj->result_array();
            foreach ($restaurants as $key => $restaurant) {
                $restaurant_owner_data = !empty($restaurant['owner_id']) ? $this->user_model->get_user_by_id($restaurant['owner_id']) : array();
                $restaurants[$key]['owner_name']  = isset($restaurant_owner_data['name']) ? $restaurant_owner_data['name'] : "";
                $restaurants[$key]['owner_email'] = isset($restaurant_owner_data['email']) ? $restaurant_owner_data['email'] : "";
                $restaurants[$key]['owner_phone'] = isset($restaurant_owner_data['phone']) ? $restaurant_owner_data['phone'] : "";
            }

            return $restaurants;
        } else {
            $restaurant = $query_obj->row_array();
            $restaurant_owner_data = !empty($restaurant['owner_id']) ? $this->user_model->get_user_by_id($restaurant['owner_id']) : array();
            $restaurant['owner_name']  = isset($restaurant_owner_data['name']) ? $restaurant_owner_data['name'] : "";
            $restaurant['owner_email'] = isset($restaurant_owner_data['email']) ? $restaurant_owner_data['email'] : "";
            $restaurant['owner_phone'] = isset($restaurant_owner_data['phone']) ? $restaurant_owner_data['phone'] : "";
            return $restaurant;
        }
    }

    // THIS METHOD WILL SAVE ONLY THE RESTAURANT BASIC DATA
    public function store()
    {
        $data['name']       = required(sanitize($this->input->post('restaurant_name')));
        $data['slug']       = slugify($data['name']);
        $cuisine            = (isset($_POST['cuisine']) && !empty($_POST['cuisine'])) ? sanitize_array($this->input->post('cuisine')) : array();
        $data['cuisine']    = json_encode(array_map('intval', $cuisine));
        $data['about']       = required(sanitize($this->input->post('restaurant_about')));
        $data['created_at'] = strtotime(date('D, d-M-Y'));
        $data['status']     = $this->logged_in_user_role == 'admin' ? 1 : 0;

        if ($this->logged_in_user_role == "owner") {
            $data['owner_id'] = $this->logged_in_user_id;
        }

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // PARENT FUNCTION FOR UPDATING A RESTAURANT
    public function update($section)
    {
        $id = required(sanitize($this->input->post('id')));
        // AUTHORIZATION IS A HELPER METHOD WHICH IS RESPONSIBLE FOR AUTHORIZING OPERATION
        if (has_access($this->table, $id)) {
            $dynamic_function_name = "update_" . $section;
            return $this->$dynamic_function_name();
        }
        return false;
    }

    // UPDATE BASIC INFOS FOR A RESTAURANT
    public function update_basic()
    {
        $id = required(sanitize($this->input->post('id')));
        $data['name']     = required(sanitize($this->input->post('restaurant_name')));
        $data['slug']     = slugify($data['name']);
        $cuisine = (isset($_POST['cuisine']) && !empty($_POST['cuisine'])) ? $this->input->post('cuisine') : array();
        $data['cuisine']  = json_encode(array_map('intval', $cuisine));
        $data['about']       = required(sanitize($this->input->post('restaurant_about')));
        $data['updated_at'] = strtotime(date('D, d-M-Y'));
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // UPDATE COMMISSION FOR A RESTAURANT
    public function update_revenue()
    {
        $id = required(sanitize($this->input->post('id')));
        $data['res_percent']     = required(sanitize($this->input->post('restaurant_cut')));
        $data['admin_percent']   = required(sanitize($this->input->post('foodrive_cut')));
        $data['service_charge']  = required(sanitize($this->input->post('service_charge')));
        
        if ($data['admin_percent'] >= 0 && $data['admin_percent'] <= 100) {
            $this->db->where('restaurant_id', $id);
            $this->db->update('restaurant_settings', $data);
            return true;
        } else {
            error(get_phrase('invalid_number'), site_url('settings/revenue'));
        }
         
    }

    // UPDATE ADDRESS AND PHONE INFOS FOR A RESTAURANT
    public function update_address()
    {
        $id = $this->input->post('id');

        $data['street_no']      = sanitize($this->input->post('streetNumber'));
        $data['street_name']    = sanitize($this->input->post('streetName'));
        $data['city']           = sanitize($this->input->post('cityName')); 
        $data['place_id']       = sanitize($this->input->post('place_id')); 
        $data['address']        = sanitize($this->input->post('fullAddress'));
       

        //$data['address']    = sanitize($this->input->post('restaurant_address'));
        $data['latitude']   = sanitize($this->input->post('restaurant_latitude'));
        $data['longitude']  = sanitize($this->input->post('restaurant_longitude'));
        $data['phone']      = sanitize($this->input->post('restaurant_phone'));
        $data['website']    = sanitize($this->input->post('restaurant_website_link'));
        $data['updated_at'] = strtotime(date('D, d-M-Y'));
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // UPDATE OWNER INFOS FOR A RESTAURANT
    public function update_owner()
    {
        $id = required(sanitize($this->input->post('id')));

        // OWNER CAN BE UPDATED BY ADMIN ONLY
        if ($this->logged_in_user_role != "admin") {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('restaurant'));
        }

        if (isset($_POST['restaurant_owner_type']) && !empty($_POST['restaurant_owner_type']) && $this->input->post('restaurant_owner_type') == 'new') { // FOR NEW RESTAURANT OWNER
            $restaurant_owner_data['name']     = sanitize($this->input->post('restaurant_owner_name'));
            $restaurant_owner_data['email']    = sanitize($this->input->post('restaurant_owner_email'));
            $restaurant_owner_data['password'] = sha1($this->input->post('restaurant_owner_password'));
            $restaurant_owner_data['role_id']  = 3; // RESTAURANT OWNER ROLE
            $restaurant_owner_data['status']   = 1;

            if (email_duplication($restaurant_owner_data['email'])) {
                $this->db->insert('users', $restaurant_owner_data);
                $data['owner_id'] = $this->db->insert_id();
                $this->db->where('id', $id);
                $this->db->update($this->table, $data);
            }

            return true;
        } elseif (isset($_POST['restaurant_owner_type']) && !empty($_POST['restaurant_owner_type']) && $this->input->post('restaurant_owner_type') == 'existing') { // FOR EXISTING RESTAURANT OWNER
            $data['owner_id'] = sanitize($this->input->post('restaurant_owner_id'));
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);

            // BECOME A RESTAURANT OWNER IF HE / SHE IS A CUSTOMER
            $this->owner_model->become_restaurant_owner($data['owner_id']);

            return true;
        } else { // ERROR
            return false;
        }
    }

    // UPDATE DELIVERY DATA FOR A RESTAURANT
    public function update_delivery()
    {
        $id = required(sanitize($this->input->post('id')));
        $data['delivery_charge']     = sanitize($this->input->post('delivery_charge'));
        $data['maximum_time_to_deliver'] =  (sanitize($this->input->post('maximum_time_to_deliver'))) ? sanitize($this->input->post('maximum_time_to_deliver')) : sanitize($this->input->post('avg_time_to_deliver'));

        $data['updated_at'] = strtotime(date('D, d-M-Y'));
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // UPDATE SCHEDULE DATA FOR A RESTAURANT
    public function update_schedule()
    {
        $id = required(sanitize($this->input->post('id')));
        $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        $schedule = array();
        foreach ($days as $day) {
            if ($this->input->post($day . '_opening_is_closed')) {
                $schedule[$day . '_opening'] = "closed";
                $schedule[$day . '_closing'] = "closed";
            } else {
                $schedule[$day . '_opening'] = sanitize($this->input->post($day . '_opening')) ? sanitize($this->input->post($day . '_opening')) : "closed";
                $schedule[$day . '_closing'] = sanitize($this->input->post($day . '_closing')) ? sanitize($this->input->post($day . '_closing')) : "closed";
            }
        }

        $data['schedule'] = json_encode($schedule);
        $data['updated_at'] = strtotime(date('D, d-M-Y'));
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }


    // UPDATE GALLERY AND THUMBNAIL INFOS FOR A RESTAURANT
    public function update_gallery()
    {
        $id = required(sanitize($this->input->post('id')));
        $previous_data = $this->get_by_id($id);

        $previous_gallery_images = empty($previous_data['gallery']) ? ['placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png'] : json_decode($previous_data['gallery']);

        if (!empty($_FILES['restaurant_thumbnail']['name'])) {
            $data['thumbnail']  = $this->upload('restaurant/thumbnail', $_FILES['restaurant_thumbnail'], $previous_data["thumbnail"]);
        }

        $data['updated_at'] = strtotime(date('D, d-M-Y'));

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

     

    // UPDATE RESTARAURANT STATUS
    public function update_status($id)
    {
        // AUTHORIZATION IS A HELPER METHOD WHICH IS RESPONSIBLE FOR AUTHORIZING OPERATION
        if (has_access($this->table, $id)) {
            $previous_data = $this->get_by_id($id);
            if ($previous_data['status']) {
                $data['status'] = 0;
            } else {
                $data['status'] = 1;
            }

            $this->db->where('id', $id);
            $this->db->update($this->table, $data);
            return true;
        }
        return false;
    }

    // IN WHICH RESTAURANTS A PARTICULAR CUISINE BELONGS
    public function get_restaurants_by_cuisine($cuisine_id)
    {
        $restaurants = $this->db->get_where($this->table, ['status' => 1])->result_array();
        foreach ($restaurants as $key => $restaurant) {
            $available_cuisines = json_decode($restaurant['cuisine'], true);
            if (!in_array($cuisine_id, $available_cuisines)) {
                unset($restaurants[$key]);
            }
        }

        return $restaurants;
    }

    // GET POPULAR RESTAURANTS. THIS BASICALLY CHECKS THE TOP RESTAURANTS BY RATINGS
    public function get_popular_restaurants($limit = false)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where('status', 1);
        $this->db->order_by('rating', 'desc');
        $obj = $this->db->get($this->table);
        return $this->merger($obj);
    }

    /**
     * GET PLAIN RESTAURANT IDS AS A NUMERIC ARRAY LIKE [1,2,3,4]
     *
     * @return array
     */
    public function get_approved_restaurant_ids_by_owner_id($owner_id)
    {
        $restaurant_ids = [];
        $restaurants = $this->db->get_where('restaurants', ['status' => 1, 'owner_id' => $owner_id])->result_array();
        foreach ($restaurants as $restaurant) {
            if (!in_array($restaurant['id'], $restaurant_ids)) {
                array_push($restaurant_ids, $restaurant['id']);
            }
        }
        return $restaurant_ids;
    }

    /**
     * GET PLAIN RESTAURANT IDS AS A NUMERIC ARRAY LIKE [1,2,3,4]
     *
     * @return array
     */
    public function get_pending_restaurant_ids_by_owner_id($owner_id)
    {
        $restaurant_ids = [];
        $restaurants = $this->db->get_where('restaurants', ['status' => 0, 'owner_id' => $owner_id])->result_array();
        foreach ($restaurants as $key => $restaurant) {
            if (!in_array($restaurant['id'], $restaurant_ids)) {
                array_push($restaurant_ids, $restaurant['id']);
            }
        }
        return $restaurant_ids;
    }


    /**
     * FILTER RESTAURANTS FOR FRONTEND
     */

    public function filter_restaurant_frontend()
    {
        $cuisine    = nuller(sanitize($this->input->get('cuisine')));
        $category   = nuller(sanitize($this->input->get('category')));
        $search_string   = nuller(sanitize($this->input->get('query')));

        $filtered_restaurant_ids = array();
        $restaurant_ids_have_cuisine = array();
        $restaurant_ids_have_category = array();
        $restaurant_ids_have_search_string = array();

        if ($category) {
            $this->db->distinct();
            $this->db->select('restaurant_id');
            $query = $this->db->get_where('food_menus', ['category_id' => $category])->result_array();
            foreach ($query as $row) {
                if (!in_array($row['restaurant_id'], $restaurant_ids_have_category)) {
                    array_push($restaurant_ids_have_category, $row['restaurant_id']);
                }
            }
        }

        if ($cuisine) {
            $query = $this->db->get_where($this->table, ['status' => 1])->result_array();
            foreach ($query as $row) {
                $cuisines = json_decode($row['cuisine']);
                if (in_array($cuisine, $cuisines)) {
                    if (!in_array($row['id'], $restaurant_ids_have_cuisine)) {
                        array_push($restaurant_ids_have_cuisine, $row['id']);
                    }
                }
            }
        }

        if ($category && $cuisine && !$search_string) {
            if (count($restaurant_ids_have_category) && count($restaurant_ids_have_cuisine)) {
                $filtered_restaurant_ids = array_intersect($restaurant_ids_have_cuisine, $restaurant_ids_have_category);
            }
        } elseif (!$category && !$cuisine && !$search_string) {
            $query = $this->db->get_where($this->table, ['status' => 1])->result_array();
            foreach ($query as $row) {
                if (!in_array($row['id'], $filtered_restaurant_ids)) {
                    array_push($filtered_restaurant_ids, $row['id']);
                }
            }
        } elseif ($category && !$cuisine && !$search_string) {
            $filtered_restaurant_ids = $restaurant_ids_have_category;
        } elseif (!$category && $cuisine && !$search_string) {
            $filtered_restaurant_ids = $restaurant_ids_have_cuisine;
        } elseif ($search_string) {
            $this->db->select('id');
            $this->db->like('name', $search_string, 'both');
            $query = $this->db->get($this->table)->result_array();
            foreach ($query as $row) {
                if (!in_array($row['id'], $filtered_restaurant_ids)) {
                    array_push($filtered_restaurant_ids, $row['id']);
                }
            }
        }
        return $filtered_restaurant_ids;
    }


    
    /**
     * RESTAURANT ONLINE-OFFLINE MODE
     */

    public function mode($restaurant_id)
    { 
        $data['online_status'] =  required(sanitize($this->input->post('status')));
        $this->db->where('id', $restaurant_id);
        $result = $this->db->update('restaurants', $data);
        if($result){
            return true;
        }
        return false;
    }

     /**
     * RESTAURANT FRONT-END VISIBILITY SHOW/HIDE
     */

    public function visible($status, $restaurant_id)
    { 
        $data['visibility'] =  $status;
        $this->db->where('id', $restaurant_id);
        $result = $this->db->update('restaurants', $data);
        if($result){
            return true;
        }
        return false;
    }
    

}
