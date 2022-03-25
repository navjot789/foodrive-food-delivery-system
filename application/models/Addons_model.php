<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Product name : FoodMob
 * Date : 28 - June - 2020
 * Author : TheDevs
 * Menu model handles all the database queries of Menu
 */
class Addons_model extends Base_model
{
    // DEFAULT CONSTRUCTOR. FOR INITIALIZING THE TABLE NAME
    function __construct()
    {
        parent::__construct();
        $this->table = "addons";
    }


     /**
     *  GET menu addonS BY ID
     */

    public function get_addon_by_id($id)
    {
        $menu_addons = $this->db->get_where('addons', ['aid' => $id])->result_array();
        return $menu_addons;
      
    }

 
     // GET ADDON BY MENU BY ID AND STATUS 
    public function get_addon_by_menu_id($id, $status="")
    {
        $this->db->where('id', $id);
        if($status)
          $this->db->where('status', $status);

        $addon_data = $this->db->get($this->table);
        return $addon_data->result_array();
    }  



    /**
     *  CREATE OR UPDATE ADDON MENU
     */

    public function save_addon($action)
    {
        $data['id'] = required(sanitize($this->input->post('menu_id')));
        $data['addon_name'] = required(sanitize($this->input->post('addon_name')));
        $data['addon_price'] = required(sanitize(format($this->input->post('addon_price'))));
        $data['status'] = sanitize($this->input->post('addon_type')) ? sanitize($this->input->post('addon_type')):0;

        if ($this->menu_model->authentication($data['id'])) {
            if ($action == "create") {
                $this->db->insert('addons', $data);
                return true;
            } else {
                $addon_id = required(sanitize($this->input->post('addon_id')));
                $this->db->where('aid', $addon_id);
                $this->db->update('addons', $data);
                return true;
            }
        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }

    /**
     * DELETE MENU addonS
     */

    public function delete_addon($menu_addon_id)
    {
        $menu_addons = $this->db->get_where('addons', ['aid' => $menu_addon_id])->row_array();
        if ($this->menu_model->authentication($menu_addons['id'])) {
            $this->db->where('aid', $menu_addon_id);
            $this->db->delete('addons');
            return true;
        } else {
            error(get_phrase("you_are_not_authorized"), site_url('menu'));
        }
    }


}

/* End of file Menu_model.php */
