<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 13 - June - 2020
 * Author : TheDevs
 * User model handles all the database queries of Users
 */

class Base_model extends CI_Model
{
    protected $table = NULL;
    protected $logged_in_user_id;
    protected $logged_in_user_role;

    function __construct()
    {
        parent::__construct();
        $this->logged_in_user_id = $this->session->userdata('user_id');
        $this->logged_in_user_role = $this->session->userdata('user_role');
    }

    /**
     * COMMON DELETE METHOD FOR ALL
     */
    function delete($id)
    {
        $this->db->delete($this->table, array('id' => $id));
        return true;
    }

    /**
     * COMMON UPLOAD METHOD
     */
    function upload($thing, $new_file, $previous_file = NULL)
    {
        // REMOEV THE PREVIOUS FILE FIRST
        if (!empty($previous_file) && $previous_file != "placeholder.png") {
            if (file_exists("uploads/$thing/$previous_file")) {
                unlink("uploads/$thing/$previous_file");
            }
        }

        // UPLOAD NEW FILE
        if (!empty($new_file['tmp_name'])) {
            $file_name = random(20) . '.jpg';
            $uploaded_image = "uploads/$thing/" . $file_name;
            return move_uploaded_file($new_file['tmp_name'], $uploaded_image) ? $file_name : "placeholder.png";
        }

        return "placeholder.png";
    }


    /**
     * COMMON PAGINATION FUNCTION FOR ALL
     */
    public function paginate($per_page, $page_number, $conditions = [], $order_by = "id", $order = "desc")
    {
        /**
         * THIS LOOP CHECKS IF GIVEN CONDITION HAS ANY EMPTY ARRAY. IF IT DOES IT WILL RETURN EMPTY ARRAY.
         */
        foreach ($conditions as $key => $value) {
            if (is_array($value)) {
                if (count($value) == 0) {
                    $conditions[$key] = "-1"; // GIVING A VALUE WHICH IS NOT BE AVAILABE ANYWHERE
                }
            }
        }

        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }

        $offset = $page_number > 0 ? ($page_number - 1) * $per_page : 0;
        $this->db->order_by($order_by, $order);
        return $this->db->get($this->table, $per_page, $offset);
    }
}
