<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 23 - August - 2020
 * Author : TheDevs
 * Variation model handles all the database queries of menu variation
 */

class Variation_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     *  CREATE OR UPDATE VARIATION OPTIONS
     */

    public function save_options($action)
    {
        $data['menu_id'] = required(sanitize($this->input->post('menu_id')));
        $data['name'] = required(sanitize($this->input->post('name')));
        $data['options'] = required(trim(strtolower(str_replace('-', ' ', sanitize($this->input->post('options'))))));

        if ($this->menu_model->authentication($data['menu_id'])) {
            if ($action == "create") {
                $this->db->insert('variant_options', $data);
                return true;
            } else {
                $menu_option_id = required(sanitize($this->input->post('menu_option_id')));
                $this->db->where('id', $menu_option_id);
                $this->db->update('variant_options', $data);
                return true;
            }
        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }


    /**
     * DELETE MENU OPTIONS
     */

    public function delete_options($menu_option_id)
    {
        $menu_options = $this->db->get_where('variant_options', ['id' => $menu_option_id])->row_array();
        if ($this->menu_model->authentication($menu_options['menu_id'])) {
            $this->db->where('id', $menu_option_id);
            $this->db->delete('variant_options');
            return true;
        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }

    /**
     *  GET VARIATION OPTIONS
     */

    public function get_options($menu_id)
    {
        $menu_options = $this->db->get_where('variant_options', ['menu_id' => $menu_id])->result_array();
        return $menu_options;
    }

    /**
     *  GET VARIATION OPTIONS BY ID
     */

    public function get_options_by_id($id)
    {
        $menu_options = $this->db->get_where('variant_options', ['id' => $id])->row_array();
        if ($this->menu_model->authentication($menu_options['menu_id'])) {
            return $menu_options;
        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }

    /**
     * THIS FUNCTION TOGGLES FLAG OF MENU VARIANT FIELD
     */
    public function toggle_menu_variant()
    {
        $menu_id = required(sanitize($this->input->post('menu_id')));
        $has_variant = required(sanitize($this->input->post('has_variant')));
        if ($this->menu_model->authentication($menu_id)) {
            $this->db->where('id', $menu_id);
            $this->db->update('food_menus', ['has_variant' => $has_variant]);
            return true;
        } else {
            return false;
        }
    }

      /**
     * THIS FUNCTION TOGGLES FLAG OF VARIANT FIELD
     */
    public function toggle_variant()
    {
        $variant_id = required(sanitize($this->input->post('variantID')));
        $option_id = required(sanitize($this->input->post('option')));
        $avail = required(sanitize($this->input->post('avail')));

        $instock = $this->get_instock_varients($option_id); //STATUS:0 IN-STOCK
        $outstock = $this->get_outstock_varients($option_id); //STATUS:1 OUT-STOCK
        
        if($avail == 1) {//WHEN DISABLE
           if(count($instock) > count($outstock)) { 
                $this->db->where('id', $variant_id);
                $this->db->update('variants', ['avail' => $avail]);
                return true;
           }
             return false;
         } else { 
          //ENABLED
            $this->db->where('id', $variant_id);
            $this->db->update('variants', ['avail' => $avail]);
            return true;
        }
 
    }

    /**
     * THIS FUNCTION GETS ALL THE MENU VARIANTS
     */
    public function get_variants($menu_id)
    {
        $variants = $this->db->get_where('variants', ['menu_id' => $menu_id])->result_array();
        if ($this->menu_model->authentication($menu_id)) {
            return $variants;
        } else {
            return array();
        }
    }

    /**
     * THIS FUNCTION GETS THE MENU VARIANTS by OPTION AND MENU ID
     */
    public function get_variants_by_id($menu_id, $option_id)
    {
        //GET VARIENTS WHICH ARE ONLY IN STOCK
        $variants = $this->db->get_where('variants', ['menu_id' => $menu_id, 'option_id' => $option_id, 'avail' => 0])->result_array();
        if (count($variants) > 0) {
            return $variants;
        }

        return array();

    }

     /**
     * THIS FUNCTION GETS THE IN-STOCK VARIANTS by OPTION 
     */
    public function get_instock_varients($option_id)
    {
        //GET VARIENTS WHICH ARE ONLY IN STOCK
        $variants = $this->db->get_where('variants', ['option_id' => $option_id,'avail' => 0])->result_array();
        if (count($variants) > 0) {
            return $variants;
        }

        return array();

    }

    /**
     * THIS FUNCTION GETS THE OUT-STOCK VARIANTS by OPTION 
     */
    public function get_outstock_varients($option_id)
    {
        //GET VARIENTS WHICH ARE ONLY IN STOCK
        $variants = $this->db->get_where('variants', ['option_id' => $option_id, 'avail' => 1])->result_array();
        if (count($variants) > 0) {
            return $variants;
        }

        return array();

    }


    /**
     *  CREATE VARIATION
     */

    public function create_variant()
    {
        $data['menu_id'] = required(sanitize($this->input->post('menu_id')));
        $data['price'] = required(sanitize($this->input->post('variant_price')));

        $variants = $this->input->post('menu_variation_options');
        $variants = array_map('strtolower', $variants);
        sort($variants);
        $variants =  required(trim(sanitize(implode(",", $variants))));

        $title= explode('-', $variants);
        $option_id = required(trim(sanitize($title[0])));
        $variant = required(trim(sanitize($title[1])));
        $data['option_id'] =  $option_id;
        $data['variant'] = $variant;
        
        if ($this->menu_model->authentication($data['menu_id'])) {
         
                $previous_data = $this->db->get_where('variants', array('menu_id' => $data['menu_id'], 'option_id' => $data['option_id'], 'variant' => $data['variant']));
                if ($previous_data->num_rows() == 0) {
                    $this->db->insert('variants', $data);
                } else {
                    error(get_phrase("variant_already_exist!"), site_url('menu/edit/'.$data['menu_id'].'/variation'));
                }

                return true;
          
        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }

    /**
     *  UPDATE VARIATION
     */

    public function update_variant()
    {
        $data['menu_id'] = required(sanitize($this->input->post('menu_id')));
        $data['price'] = required(sanitize($this->input->post('variant_price')));

        if ($this->menu_model->authentication($data['menu_id'])) {
                $menu_variant_id = required(sanitize($this->input->post('menu_variant_id')));
                $this->db->where('id', $menu_variant_id);
                $this->db->update('variants', $data);
                return true;

        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }

    /**
     * DELETE MENU VARIANT
     */

    public function delete_variant($menu_variant_id)
    {
        $menu_variants = $this->db->get_where('variants', ['id' => $menu_variant_id])->row_array();
        if ($this->menu_model->authentication($menu_variants['menu_id'])) {
            $this->db->where('id', $menu_variant_id);
            $this->db->delete('variants');
            return true;
        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }

    /**
     *  GET VARIATION BY ID
     */

    public function get_variant_by_id($id)
    {
        $menu_variant = $this->db->get_where('variants', ['id' => $id])->row_array();
        if ($this->menu_model->authentication($menu_variant['menu_id'])) {
            return $menu_variant;
        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }
}
