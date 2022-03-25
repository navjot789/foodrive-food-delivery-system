<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 08 - July - 2020
 * Author : TheDevs
 * Settings Controller controlls all the settings related data
 */

include 'Authorization.php';

class Settings extends Authorization
{
    // delivery function responsible for showing the delivery settings page.
    function delivery()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/delivery';
        $page_data['page_title'] = get_phrase("delivery_settings");
        $this->load->view('backend/index', $page_data);
    }

    // revenue function responsible for showing the revenue settings page.
    function revenue()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/revenue';
        $page_data['page_title'] = get_phrase("revenue_settings");
        $this->load->view('backend/index', $page_data);
    }


    // system function responsible for showing the System settings page.
    function system()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/system';
        $page_data['page_title'] = get_phrase("system_settings");
        $this->load->view('backend/index', $page_data);
    }

    // Website function responsible for showing the Website settings page.
    function website()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/website';
        $page_data['page_title'] = get_phrase("website_settings");
        $this->load->view('backend/index', $page_data);
    }

    // Gallery function is also responsible for showing the Website settings page.
    function gallery()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/website';
        $page_data['page_title'] = get_phrase("website_settings");
        $this->load->view('backend/index', $page_data);
    }

     // sliders function is also responsible for showing the Website settings page.
     function sliders()
     {
         authorization(['admin'], true);
         $page_data['page_name'] = 'settings/website';
         $page_data['page_title'] = get_phrase("website_settings");
         $this->load->view('backend/index', $page_data);
     }

    // Profile function is also responsible for showing the user profile page.
    function profile()
    {
        $page_data['page_name'] = 'settings/profile';
        $page_data['page_title'] = get_phrase("user_profile");

        // GET USER INFO BY USER ROLE
        if ($this->session->userdata('user_role') == "admin") {
            $page_data['user_info'] = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
        } elseif ($this->session->userdata('user_role') == "customer" || $this->session->userdata('user_role') == "owner") {
            $page_data['user_info'] = $this->customer_model->get_by_id($this->session->userdata('user_id'));
        } elseif ($this->session->userdata('user_role') == "driver") {
            $page_data['user_info'] = $this->driver_model->get_by_id($this->session->userdata('user_id'));
        }
        $this->load->view('backend/index', $page_data);
    }

    // recaptcha function responsible for showing the Recaptcha settings page.
    function recaptcha()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/recaptcha';
        $page_data['page_title'] = get_phrase("recaptcha_settings");
        $this->load->view('backend/index', $page_data);
    }

    // smtp function responsible for showing the smtp settings page.
    function smtp()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/smtp';
        $page_data['page_title'] = "SMTP " . get_phrase("settings");
        $this->load->view('backend/index', $page_data);
    }

    // Update method is responsible for Updating settings data
    function update()
    {   
        $updater = sanitize($this->input->post('updater'));
        $response = $this->settings_model->update();

        if ($response) {
  
            if($updater == 'profile_address'){
                echo "200";
            }
           
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
        }
        
         //REDIRECT
        if(sanitize($this->input->post('settings_type') == 'phone_validation_api' || sanitize($this->input->post('settings_type') == 'inspect_elements'))) {
            redirect(site_url('settings/system'), 'refresh');
        }    
        else{
             redirect(site_url('settings/' . sanitize($this->input->post('settings_type'))), 'refresh');
        }
    }
}
