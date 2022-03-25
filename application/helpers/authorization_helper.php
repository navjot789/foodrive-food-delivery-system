<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 7 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// CHECK IF THE ITEM HAS ACCESS FOR THE USER
if (!function_exists('has_access')) {
    function has_access($table = '', $table_id = '')
    {
        $CI    = &get_instance();
        $CI->load->database();

        $CI->db->where('id', $table_id);
        $data = $CI->db->get($table);

        if ($data->num_rows()) {
            if ($CI->session->userdata('user_role') == 'admin') {
                return true;
            } elseif ($CI->session->userdata('user_role') == 'owner') {
                $data = $data->row_array();
                //CHECK IF COLUMN EXISTS
                if ($CI->db->field_exists('created_by', $table)) {
                    return $data['created_by'] == $CI->session->userdata('user_id') ? true : false;
                } elseif ($CI->db->field_exists('owner_id', $table)) {
                    return $data['owner_id'] == $CI->session->userdata('user_id') ? true : false;
                } elseif ($CI->db->field_exists('restaurant_id', $table)) {
                    $restaurant_ids = $CI->restaurant_model->get_approved_restaurant_ids_by_owner_id($CI->session->userdata('user_id'));
                    return in_array($restaurant_ids, $data['restaurant_id']) ? true : false;
                }
            }
        }
        return false;
    }
}

// AUTHORIZATION
if (!function_exists('authorization')) {
    function authorization($roles = null, $doRedirect = false)
    {
        $CI    = &get_instance();
        $CI->load->database();

        if (is_array($roles)) {
            $auth = in_array($CI->session->userdata('user_role'), $roles) ? true : false;
        } else {
            $auth = $CI->session->userdata('is_logged_in') ? true : false;
        }

        if (!$auth && $doRedirect) {
            if (isset($_SERVER['HTTP_REFERER'])) {
                error(get_phrase('you_are_not_authorized'), $_SERVER['HTTP_REFERER']);
            } else {
                error(get_phrase('you_are_not_authorized'), site_url('dashboard'));
            }
        } else {
            return $auth;
        }
    }
}  

// ------------------------------------------------------------------------
/* End of file authorization_helper.php */
/* Location: ./system/helpers/authorization_helper.php */
