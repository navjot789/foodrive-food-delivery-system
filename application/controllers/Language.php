<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 16 - July - 2020
 * Author : TheDevs
 * Language Controller controlls all the language related data
 */

include 'Authorization.php';

class Language extends Authorization
{

    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin'], true);
    }
    /** LANGUAGE FUNCTION IS RESPONSIBLE FOR HANDLING ALL THE LANGUAGE RELATED OPERATION **/
    function index()
    {
        $page_data['page_name'] = 'settings/language';
        $page_data['page_title'] = get_phrase("language_settings");
        $page_data['system_language'] = $this->language_model->get_system_language();
        $page_data['languages'] = $this->language_model->get_all();
        $this->load->view('backend/index', $page_data);
    }

    /** STORE FUNCTION IS FOR STORING NEW LANGUAGES **/
    public function store()
    {
        $this->language_model->store();
    }

    /** DELETE FUNCTION IS FOR DELETING LANGUAGES **/
    public function delete($id)
    {
        $response = $this->language_model->delete($id);
        if ($response) {
            success(get_phrase('language_got_deleted'), site_url('language'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('language'));
        }
    }

    /** UPDATE PHRASES **/
    public function phrase($language_code)
    {
        if (empty($language_code)) {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
            redirect(site_url('language'), 'refresh');
        }
        $language_details = $this->language_model->get_language_by_code($language_code);
        $page_data['page_name'] = 'settings/phrase';
        $page_data['page_title'] = get_phrase("update_phrase") . ': ' . ucfirst($language_details['name']);
        $page_data['language_code'] = $language_code;
        $this->load->view('backend/index', $page_data);
    }

    /** SET SYSTEM LANGUAGE **/
    public function update_phrase()
    {
        $response = $this->language_model->update_phrase();
        return $response;
    }

    /** SET SYSTEM LANGUAGE **/
    function set_system_language($language_code)
    {
        $response = $this->language_model->set_system_language($language_code);
        if ($response) {
            success(get_phrase('language_added_as_system_language'), site_url('language'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('language'));
        }
    }
}
