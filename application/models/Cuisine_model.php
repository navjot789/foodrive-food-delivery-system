<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 10 - June - 2020
 * Author : TheDevs
 * User model handles all the database queries of Users
 */

class Cuisine_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "cuisines";
    }

    /**
     * GET ALL CUISINE
     */
    public function get_all()
    {
        $this->db->order_by("id", "desc");
        return $this->db->get($this->table)->result_array();
    }

    /**
     * UPDATE CUISINE BY ID
     */
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    /**
     * GET BY CONDITION
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
     * STORING CUISINE
     */
    public function store()
    {
      
        $data['name']  = required(sanitize($this->input->post('cuisine')));
        $data['slug']  = slugify($data['name']);

        //CHECK IF THAT CUISINE IS ALAREADY REGISTERED.
        $query = $this->get_by_condition(array('slug' => $data['slug']));
        if (count($query)) {
            error(get_phrase('cuisine_already_registered'), site_url('cuisine'));
        }

        if (isset($_POST['is_featured'])) {
            if (count($this->get_featured_cuisine()) < 8) {
                $data['is_featured'] = 1;
            } else {
                $data['is_featured'] = 0;
            }
        } else {
            $data['is_featured'] = 0;
        }

         // UPLOAD THUMBNAIL
            if (!empty($_FILES['thumbnail']['name'])) {

                $imageExtention = pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);
               
                if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                   
                        $data['thumbnail']  = $this->upload('cuisine', $_FILES['thumbnail']);

                } else {

                    error(get_phrase('invalid_image_format'), $_SERVER['HTTP_REFERER']);
                   
                }

               
            }


        $data['created_by'] = $this->logged_in_user_id;
        $data['created_at'] = strtotime(date('D, d-M-Y'));
        $this->db->insert('cuisines', $data);
        return true;

       
    }

    /**
     * UPDATING CUISINE
     */
    public function update()
    {
        $id = required(sanitize($this->input->post('id')));
        $previous_data = $this->get_by_id($id);

        $data['name'] = required(sanitize($this->input->post('cuisine')));
        $data['slug']  = slugify($data['name']);

        //CHECK IF THAT CUISINE IS ALAREADY REGISTERED.
        if (count($this->get_by_condition(array('slug' => $data['slug'], 'id !=' => $id))) > 0) {
            error(get_phrase('cuisine_already_registered'), site_url('cuisine'));
        }
        if (isset($_POST['is_featured'])) {
            if (count($this->get_featured_cuisine()) < 8) {
                $data['is_featured'] = 1;
            } else {
                $data['is_featured'] = 0;
            }
        } else {
            $data['is_featured'] = 0;
        }
        $data['updated_at'] = strtotime(date('D, d-M-Y'));

         // UPLOAD THUMBNAIL
            if (!empty($_FILES['thumbnail']['name'])) {

                $imageExtention = pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);
               
                if($imageExtention == 'png' || $imageExtention == 'jpeg' || $imageExtention == 'jpg') {
                   
                        $data['thumbnail']  = $this->upload('cuisine', $_FILES['thumbnail'], $previous_data["thumbnail"]);

                } else {

                    error(get_phrase('invalid_image_format'), $_SERVER['HTTP_REFERER']);
                   
                }

               
            }


        $this->db->where('id', $id);
        $this->db->update('cuisines', $data);
        return true;
    }


    /**
     * GET FEATURED CUISINES
     */
    public function get_featured_cuisine()
    {
        $this->db->where('is_featured', 1);
        return $this->db->get($this->table)->result_array();
    }
}
