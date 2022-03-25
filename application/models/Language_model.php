<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 17 - July - 2020
 * Author : TheDevs
 * Language model handles all the database queries of language related data
 */

class Language_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
    }


    /**
     * GET ALL THE LANGUAGES
     */
    public function get_all()
    {
        return $this->db->get('languages')->result_array();
    }

    /**
     * GET LANGUAGE BY CODE
     */
    public function get_language_by_code($code)
    {
        $this->db->where('code', $code);
        return $this->db->get('languages')->row_array();
    }

    /**
     * GET SYSTEM'S LANGUAGE IT WILL BE SET BY ADMIN
     */
    public function get_system_language()
    {
        $system_language_code = get_system_settings('language');
        $this->db->where('code', $system_language_code);
        return $this->db->get('languages')->row_array();
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR ADDING NEW LANGUAGE
     */
    public function store()
    {
        $data['name']  = required(sanitize($this->input->post('language_name')));
        $code  = strtolower(required(sanitize($this->input->post('language_code'))));

        // CHECK IF THE LANGUAGE CODE LENGTH IS LARGER THAN TWO CHARS
        if (strlen($code) != 2) {
            $this->session->set_flashdata('error_message', get_phrase('language_code_must_be_two_characters'));
        } else {
            $this->db->where('code', $code);
            $previous_data = $this->db->get('languages');
            if ($previous_data->num_rows() > 0) {
                $previous_data = $previous_data->row_array();
                $this->session->set_flashdata('error_message', $code . ' ' . get_phrase('language_code_already_exists_for') . ' ' . $previous_data['name']);
            } else {
                $code = preg_replace('~[^\\pL\d]+~u', '-', $code);
                $code = trim($code, '-');
                $code = strtolower($code);
                if (empty($code)) {
                    $this->session->set_flashdata('error_message', $code . ' ' . get_phrase('language_code_should_not_contain_special_characters'));
                } else {
                    $data['code'] = $code;
                    $this->db->insert('languages', $data);

                    // ADD NEW LANGUAGE FILE
                    saveDefaultJSONFile($code);

                    $this->session->set_flashdata('flash_message', $data['name'] . ' ' . get_phrase('language_added'));
                }
            }
        }
        redirect(site_url('language'), 'refresh');
    }

    /**
     * SET SYSTEM LANGUAGE
     */
    public function set_system_language($language_code)
    {
        $this->db->where('code', $language_code);
        $previous_data = $this->db->get('languages');
        if ($previous_data->num_rows() > 0) {
            // INSERT IN SETTINGS TABLE AS LANGUAGE
            $this->db->where('key', 'language');
            $this->db->update('system_settings', ['value' => $language_code]);

            return true;
        }
        return false;
    }

    /**
     * DELETE LANGUAGES FROM HERE
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $previous_data = $this->db->get('languages');

        if ($previous_data->num_rows() > 0) {
            $previous_data = $previous_data->row_array();
            // CHECK WHETHER THE LANGUAGE IS SYSTEM LANGUAGE
            $system_language = $this->get_system_language();
            if ($system_language['code'] != $previous_data['code']) {
                // DELETE THE LANGUAGE ROW
                $this->db->where('id', $id);
                $this->db->delete('languages');
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    /**
     * THIS IS THE FUNCTION WHICH IS RESPONSIBLE FOR UPDATING PHRASES
     */
    public function update_phrase()
    {
        $current_language_code = sanitize($this->input->post('currentLanguageCode'));
        $value = htmlspecialchars($this->input->post('value'));
        $key = sanitize($this->input->post('key'));
        saveJSONFile($current_language_code, $key, $value);
        return true;
    }
}
