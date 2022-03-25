<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Product name : FoodMob
 * Date : 28 - June - 2020
 * Author : TheDevs
 * Menu model handles all the database queries of Menu
 */
class Menu_model extends Base_model
{
    // DEFAULT CONSTRUCTOR. FOR INITIALIZING THE TABLE NAME
    function __construct()
    {
        parent::__construct();
        $this->table = "food_menus";
    }

    // GET ALL THE FOOD MENUS
    public function get_all()
    {
        $this->db->order_by("id", "desc");
        $menus = $this->db->get($this->table);
        return $this->merger($menus);
    }

    // GET MENU BY ID
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $menu = $this->db->get($this->table);
        return $this->merger($menu, true);
    }

    /**
     * GET CATEGORIES BY MENU-ID
     */
    public function get_cat_by_menu_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

     // GET MENU BY SEARCH NAME AND RESTAURANT ID TOTAL ROWS
    public function count_search_menu($query, $restaurant)
    {
        $this->db->where('restaurant_id', $restaurant);
        $this->db->like('name', $query, 'both'); //both = %query%, before = %query, after = query%
        $menu  = $this->db->get($this->table);
        $result = $menu->result();
        $count = count($result);
        return $count;
    }

     // GET MENU BY SEARCH NAME AND RESTAURANT ID
    public function get_searched_menu_by_name_and_restaurant($query, $restaurant, $page_per_row, $pagenum)
    {
        $this->db->where('restaurant_id', $restaurant);
        $this->db->like('name', $query, 'both'); //both = %query%, before = %query, after = query%

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

        $menu  = $this->db->get($this->table, $page_per_row , $pagenum);
        return $menu->result();
    }

     // GET MENU BY category_id AND RESTAURANT ID
    public function search_menu_by_clicked_cat($category_id, $restaurant, $page_per_row, $pagenum)
    {
        $this->db->where('category_id', $category_id);
        $this->db->where('restaurant_id', $restaurant);
        $this->db->where('availability', 1);

       if (isset($pagenum) && $pagenum !== 0) {
         $pagenum  = ($pagenum - 1) * $page_per_row;
       }else { 
           if(isset($_GET['page'])) {
             $pagenum  = ($pagenum + 1) * $page_per_row;
           }else {
            $pagenum  = 0;
           }
       }

        $menu  = $this->db->get($this->table, $page_per_row , $pagenum);
        return $menu->result();
    }

     // GET MENU BY SEARCH NAME AND RESTAURANT ID TOTAL ROWS
    public function count_search_menu_by_clicked_cat($category_id, $restaurant)
    {
        $this->db->where('category_id', $category_id);
        $this->db->where('restaurant_id', $restaurant);
        $this->db->where('availability', 1);
        $menu  = $this->db->get($this->table);
        $result = $menu->result();
        $count = count($result);
        return $count;
    }



    
   // GET MENU BY CONDITIONS ARRAY ONLY FOR RESTAURANT FRONT
    public function get_restaurant_menu($restaurant_id, $row_per_page, $numpage)
    {
       $this->db->where('restaurant_id', $restaurant_id);
       $this->db->where('availability', 1);
       $this->db->order_by("category_id", "asc");

       if (isset($numpage) && $numpage !== 0) {
        $numpage  = ($numpage - 1) * $row_per_page;
       }else { 
           if(isset($_GET['page'])) {
             $numpage  = ($numpage + 1) * $row_per_page;
           }else {
            $numpage  = 0;
           }
       }
        
        $data = $this->db->get($this->table, $row_per_page, $numpage);
        $result = $data->result();
        return $result;
    }


      // BASED UPON RESTAURANT ID GET TOTAL ROWS
    public function count_restaurant_menu($restaurant_id)
    {
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->where('availability', 1);
        $menu  = $this->db->get($this->table);
        $result = $menu->result();
        $count = count($result);
        return $count;
    }



    // GET MENU BY CONDITIONS ARRAY
    public function get_menu_by_condition($conditions = [])
    {
        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    if (count($value)) {
                        $this->db->where_in($key, $value);
                    } else {
                        return array();
                    }
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        
        $menus = $this->db->get($this->table);
        return $this->merger($menus);
    }

    // MERGER FUNCTION IS FOR MERGING NECESSARY DATA
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $menus = $query_obj->result_array();
            foreach ($menus as $key => $menu) {
                $category_data = $this->category_model->get_by_id($menu['category_id']);
                $restaurant_data = $this->restaurant_model->get_by_id($menu['restaurant_id']);
                $menus[$key]['category_name']  = $category_data['name'];
                $menus[$key]['restaurant_name']  = $restaurant_data['name'];
            }

            return $menus;
        } else {
            $menu = $query_obj->row_array();
            $category_data = $this->category_model->get_by_id($menu['category_id']);
            $menu['category_name']  = $category_data['name'];
            $restaurant_data = $this->restaurant_model->get_by_id($menu['restaurant_id']);
            $menu['restaurant_name']  = $restaurant_data['name'];
            return $menu;
        }
    }



     // menu authentication
    public function authentication($menu_id, $user_id = "")
    {
        if (empty($user_id)) {
            $user_id = $this->logged_in_user_id;
        }
        $menu_details = $this->get_by_id($menu_id);
        $restaurant_details = $this->restaurant_model->get_by_id($menu_details['restaurant_id']);
        if ($this->logged_in_user_role == "admin" || $restaurant_details['owner_id'] == $user_id) {
            return true;
        }
        return false;
    }


    // STORE MENU DATA
    public function store()
    {
        $restaurants = (isset($_POST['restaurant_id']) && !empty($_POST['restaurant_id'])) ? sanitize_array($this->input->post('restaurant_id')) : array();
        if (!count($restaurants)) {
            error(get_phrase("you_have_to_choose_at_least_one_restaurant"), site_url("menu/create"));
        }

        // GET THUMBNAIL FOR ONE TIME. IT DOES NOT WORK INSIDE FOREACH LOOP.
        $gallery_data = $this->store_gallery_data();

        //CATEGORY ID
        $category_id = required(sanitize($this->input->post('category_id')));

        // FOREACH LOOP FOR MULTIPLE RESTAURANTS
        foreach ($restaurants as $restaurant) {

            $restaurant_data['restaurant_id'] = required($restaurant);
            $basic_data = $this->store_basic_data($category_id);
            $data = array_merge($restaurant_data, $basic_data, $gallery_data);
            $data['created_at'] = strtotime(date('D, d-M-Y'));
            $data['nutrition_fact'] = json_encode(array());
            $this->db->insert($this->table, $data);
            $menu_insert_id = $this->db->insert_id();

            //CREATE ORDER INDEX
            if( $menu_insert_id){
                  $this->category_model->create_index_order($category_id, $menu_insert_id, $restaurant_data['restaurant_id']);
            }
          

        }

        return true;
    }

    // UPDATE MENU DATA
    public function update()
    {
        $menu_id = required(sanitize($this->input->post('id')));
        $type = required(sanitize($this->input->post('type')));

        // DYNAMIC FUNCTION CALLING
        $dynamic_function_name = "update_" . $type;
        $data = $this->$dynamic_function_name($menu_id);
        $data['updated_at'] = strtotime(date('D, d-M-Y'));

        $this->db->where('id', $menu_id);
        $this->db->update($this->table, $data);
        return true;
    }

    // STORE MENU'S BASIC DATA
    public function store_basic_data($category_id)
    { 
        $data['name'] = required(sanitize($this->input->post('name')));
        $data['category_id'] = $category_id; 
        $data['availability'] = isset($_POST['availability']) ? 1 : 0;
        $data['slug'] = slugify(sanitize($this->input->post('name')));

        $menu_price = required(sanitize($this->input->post('per_menu_price')));
        $menu_discount_flag = isset($_POST['per_menu_discount_flag']) ? 1 : 0;
        $menu_discounted_price = sanitize($this->input->post('per_menu_discounted_price'));

        $data['servings'] = 'menu';
        $data['has_discount'] = json_encode(array('menu' => $menu_discount_flag));
        $data['price'] = json_encode(array('menu' => $menu_price));
        $data['discounted_price'] = json_encode(array('menu' => $menu_discounted_price));

        return $data;
    }

    // UPDATING BASIC DATA
    public function update_basic($menu_id)
    {
        $data['name'] = required(sanitize($this->input->post('name')));
        $data['category_id'] = required(sanitize($this->input->post('category_id')));
        $data['availability'] = isset($_POST['availability']) ? 1 : 0;
        $data['slug'] = slugify(sanitize($this->input->post('name')));
        $data['restaurant_id'] = required(sanitize($this->input->post('restaurant_id')));
        return $data;
    }
    // STORE MENU'S DETAILS DATA LIKE ITEMS, MENU DETAILS AND NUTRITION FACTS
    public function update_details($menu_id)
    {
        $data['items'] = sanitize($this->input->post('items'));
        $data['details'] = sanitize($this->input->post('details'));

      if(!empty($this->input->post('nutrition_key'))){
             // NUTRITION SECTION
                $nutrition_key = sanitize_array($this->input->post('nutrition_key'));
                $nutrition_value = sanitize_array($this->input->post('nutrition_value'));

                foreach ($nutrition_key as $key => $key) {
                    $nutrition_fact[$nutrition_key[$key]] = $nutrition_value[$key];
                }
                $data['nutrition_fact'] = json_encode($nutrition_fact);
      }
     

        return $data;
    }


    // STORE MENU'S IMAGE DATA
    public function store_gallery($menu_id = "")
    {
        if (empty($menu_id)) {
            if (isset($_FILES['food_menu_thumbnail']['name'])) {
                $data['thumbnail']  = $this->upload('menu', $_FILES['food_menu_thumbnail']);
            } else {
                $data['thumbnail']  = "placeholder.png";
            }
        }

        return $data;
    }

    // UPDATE MENU IMAGE DATA
    public function update_gallery($menu_id)
    {
        $previous_data = $this->get_by_id($menu_id);
        if (!empty($_FILES['food_menu_thumbnail']['name'])) {
            $data['thumbnail']  = $this->upload('menu', $_FILES['food_menu_thumbnail'], $previous_data["thumbnail"]);
        } else {
            $data['thumbnail']  = $previous_data["thumbnail"];
        }

        return $data;
    }

    // UPDATE MENU PRICE DATA
    public function update_price($menu_id)
    {
        $menu_price = required(sanitize($this->input->post('per_menu_price')));
        $menu_discount_flag = isset($_POST['per_menu_discount_flag']) ? 1 : 0;
        $menu_discounted_price = sanitize($this->input->post('per_menu_discounted_price'));

        $data['servings'] = 'menu';
        $data['has_discount'] = json_encode(array('menu' => $menu_discount_flag));
        $data['price'] = json_encode(array('menu' => $menu_price));
        $data['discounted_price'] = json_encode(array('menu' => $menu_discounted_price));
        return $data;
    }


    // STORE MENU'S IMAGE DATA
    public function store_gallery_data()
    {
        $data['thumbnail']  = $this->upload('menu', $_FILES['food_menu_thumbnail']);
        return $data;
    }

    // menu Activating switch
    public function activator($menu, $type)
    {
        $status = required(sanitize($this->input->post('status')));
        $dynamic_function_name = "activate_" . $type;
        return $this->$dynamic_function_name($menu, $status);
    }

      // menu availability
      public function activate_availability($menu_id, $status)
      {
        $data['availability'] = $status;
        $this->db->where('id', $menu_id);
        $result = $this->db->update($this->table, $data);
        if($result){
            return true;
        }
        return false;
      }

        /**
     * THIS FUNCTION TOGGLES FLAG OF MENU THUMBNAIL FIELD
     */
    public function toggle_menu_thumbnail()
    {
        $menu_id = required(sanitize($this->input->post('menu_id')));
        $has_variant = required(sanitize($this->input->post('status')));
        if ($this->menu_model->authentication($menu_id)) {
            $this->db->where('id', $menu_id);
            $this->db->update('food_menus', ['thumb_status' => $has_variant]);
            return true;
        } else {
            return false;
        }
    } 

}

/* End of file Menu_model.php */
