<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 09 - June - 2020
 * Author : TheDevs
 * cuisine Controller controlls the Restaurant types
 */

include 'Authorization.php';

class Cuisine extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin'], true);
    }

    // index function responsible for showing the index page.
    function index()
    {
        $page_data['cuisine_type'] = isset($_GET['cuisine_type']) ? sanitize($_GET['cuisine_type']) : "all";
        $page_data['page_name'] = 'cuisine/index';
        $page_data['page_title'] = get_phrase("cuisine");

        /**PAGINATION STARTS**/
        if ($page_data['cuisine_type'] == "me" && $this->session->userdata('user_role') == "owner") {
            $cuisines = $this->cuisine_model->get_by_condition(['created_by' => $this->session->userdata('user_id')]);
        } else {
            $cuisines = $this->cuisine_model->get_all();
        }

        $total_rows = count($cuisines);
        $page_size = 16;
        $config = pagintaion($total_rows, $page_size, site_url('cuisine/index'));
        $current_page = sanitize($this->input->get('page', 0));
        $this->pagination->initialize($config);

        if ($page_data['cuisine_type'] == "me" && $this->session->userdata('user_role') == "owner") {
            $page_data['cuisines'] = $this->cuisine_model->paginate($page_size, $current_page, ['created_by' => $this->session->userdata('user_id')])->result_array();
        } else {
            $page_data['cuisines'] = $this->cuisine_model->paginate($page_size, $current_page)->result_array();
        }
        /**PAGINATION ENDS**/

        $this->load->view('backend/index', $page_data);
    }

    // Create method is responsible for showing create view
    function create()
    {
        $page_data['page_name'] = 'cuisine/create';
        $page_data['page_title'] = get_phrase("create_new_cuisine");
        $this->load->view('backend/index', $page_data);
    }

    // Store method is responsible for storing data
    function store()
    {
        $response = $this->cuisine_model->store();
        if ($response) {
            success(get_phrase('cuisine_added_successfully'), site_url('cuisine'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('cuisine'));
        }
    }

    // Edit method is responsible for showing edit view
    function edit($id)
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (!has_access('cuisines', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('cuisine'));
        }

        $page_data['cuisine'] = $this->cuisine_model->get_by_id($id);
        $page_data['page_name'] = 'cuisine/edit';
        $page_data['page_title'] = get_phrase("update_cuisine");
        $this->load->view('backend/index', $page_data);
    }

    // Update method is responsible for Updating the restaurant types
    function update()
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        $id = sanitize($this->input->post('id'));
        if (!has_access('cuisines', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('cuisine'));
        }

        $response = $this->cuisine_model->update();
        if ($response) {
            success(get_phrase('cuisine_updated_successfully'), site_url('cuisine'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('cuisine'));
        }
    }

    // Delete method is responsible for storing data
    function delete($id)
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (!has_access('cuisines', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('cuisine'));
        }

        $response = $this->cuisine_model->delete($id);
        if ($response) {
            success(get_phrase('cuisine_deleted_successfully'), site_url('cuisine'));
        } else {
            error(get_phrase('an_error_occurred'), site_url('cuisine'));
        }
        redirect(site_url('cuisine'), 'refresh');
    }
}
