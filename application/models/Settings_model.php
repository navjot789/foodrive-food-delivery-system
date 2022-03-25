<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 07 - July - 2020
 * Author : TheDevs
 * Settings model handles all the database queries of settings related data
 */

class Settings_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
    }

    // GET CURRENCIES
    public function get_system_currencies()
    {
        return $this->db->get('currencies')->result_array();
    }
    // UPDATE METHOD UPDATES THE SETTINGS DATA
    public function update()
    {
        $settings_type = required(sanitize($this->input->post('settings_type')));
        $dynamic_function_name = "update_" . $settings_type . '_settings';
        return $this->$dynamic_function_name();
        
    }

    // UPDATE DELIVERY SETTINGS
    public function update_delivery_settings()
    {
        authorization(['admin'], true);


        $delivery_charge = !empty(sanitize($this->input->post('delivery_charge'))) ? sanitize($this->input->post('delivery_charge')) : 0;
        $this->db->where('key', 'delivery_charge');
        $this->db->update('delivery_settings', ['value' => $delivery_charge]);

        $maximum_time_to_deliver = (sanitize($this->input->post('maximum_time_to_deliver'))) ? sanitize($this->input->post('maximum_time_to_deliver')) : sanitize($this->input->post('avg_time_to_deliver'));
        
        $this->db->where('key', 'maximum_time_to_deliver');
        $this->db->update('delivery_settings', ['value' => $maximum_time_to_deliver]);

        $base_meter = !empty(sanitize($this->input->post('base_meter'))) ? sanitize($this->input->post('base_meter')) : 0;
        $this->db->where('key', 'base_meter');
        $this->db->update('delivery_settings', ['value' => $base_meter]);

        return true;
    }

    // UPDATE SYSTEM SETTINGS
    public function update_system_settings()
    {
        authorization(['admin'], true);

        $system_infos = ['purchase_code', 'system_name', 'system_title', 'system_email', 'address', 'phone', 'author', 'website_description', 'website_keywords', 'footer_text', 'footer_link', 'timezone'];
        foreach ($system_infos as $system_info) {
            if ($system_info == "address" || $system_info == "website_keywords" || $system_info == "website_description") {
                $updater = sanitize($this->input->post($system_info));
            } else {
                $updater = sanitize($this->input->post($system_info));
            }
            $this->db->where('key', $system_info);
            $this->db->update('system_settings', ['value' => $updater]);
        }
        return true;
    }

    // UPDATE PHONE VALIDATION API KEY SETTINGS
    public function update_phone_validation_api_settings()
    {
        authorization(['admin'], true);

            $updater = sanitize($this->input->post('Phone_validation_api'));
            $this->db->where('key', 'phone_validation');
            $this->db->update('system_settings', ['value' => $updater]);
        
        return true;
    }

    // UPDATE PHONE VALIDATION API KEY SETTINGS
    public function update_inspect_elements_settings()
    {
        authorization(['admin'], true);

            $updater = sanitize($this->input->post('elements'));
            $this->db->where('key', 'inspect_elements');
            $this->db->update('system_settings', ['value' => $updater]);
        
        return true;
    }

    // UPDATE SMTP SETTINGS
    public function update_smtp_settings()
    {
        authorization(['admin'], true);

        $smtp_infos = ['sender', 'protocol', 'host', 'username', 'password', 'port', 'security', 'from'];
        foreach ($smtp_infos as $smtp_info) {
            $updater = required(sanitize($this->input->post($smtp_info)));
            $this->db->where('key', $smtp_info);
            $this->db->update('smtp_settings', ['value' => $updater]);
        }
        return true;
    }
    // UPDATE WEBSITE SETTINGS
    public function update_website_settings()
    {
        authorization(['admin'], true);

        $website_infos = ['title', 'sub_title', 'about_us', 'terms_and_conditions', 'privacy_policy'];
        foreach ($website_infos as $website_info) {
            if ($website_info == 'about_us' || $website_info == 'terms_and_conditions' || $website_info == 'privacy_policy') {
                // SKIP SANITIZER FOR THE TEXT EDITOR VALUES
                $updater = $this->input->post($website_info);
            } else {
                $updater = required(sanitize($this->input->post($website_info)));
            }

            $this->db->where('key', $website_info);
            $this->db->update('website_settings', ['value' => $updater]);
        }

        // SOCIAL LINKS
        $social_link['facebook'] = sanitize($this->input->post('facebook_link'));
        $social_link['twitter'] = sanitize($this->input->post('twitter_link'));
        $social_link['instagram'] = sanitize($this->input->post('instagram_link'));
        $social_links = json_encode($social_link);

        $this->db->where('key', 'social_links');
        $this->db->update('website_settings', ['value' => $social_links]);
        return true;
    }

    // WEBSITE GALLERY UPDATE
    public function update_gallery_settings()
    {
        authorization(['admin'], true);

        $gallery_type = sanitize($this->input->post('gallery_type'));
        $previous_data = get_website_settings($gallery_type);

        if (!empty($_FILES[$gallery_type]['name'])) {
            $gallery_data  = $this->upload('system', $_FILES[$gallery_type], $previous_data);
        } else {
            $gallery_data  = $previous_data;
        }
        $this->db->where('key', $gallery_type);
        $this->db->update('website_settings', ['value' => $gallery_data]);
        return true;
    }

      // WEBSITE ADVERTISEMENT UPDATE
      public function update_sliders_settings()
      {
        authorization(['admin'], true);
        $slider_limit = sanitize($this->input->post('slider_limit'));
        $slider_type = sanitize($this->input->post('slider_type'));
        $previous_data = get_website_settings($slider_type);

        $previous_sliders = empty($previous_data) ? ['placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png'] : json_decode($previous_data);

        for ($counter = 1; $counter <= 6; $counter++) {
            if (!empty($_FILES["advt_sliders_$counter"]['name'])) {
                $previous_sliders[$counter - 1]  = $this->upload('system/sliders/', $_FILES["advt_sliders_$counter"], $previous_sliders[$counter - 1] ? $previous_sliders[$counter - 1] : NULL);
            }
    
        }


        $this->db->where('key', $slider_type);
        $this->db->update('website_settings', ['value' => json_encode($previous_sliders)]);
        $this->update_slider_limit($slider_limit); //settingup slider limit
        return true;

      }

    // UPDATE ADVERTISEMENT SLIDER VISIBILITY LIMIT
    public function update_slider_limit($limit)
    {
        $this->db->where('key', 'advt_limit');
        $this->db->update('website_settings', ['value' => $limit]);
        return true;

    }

    // UPDATE LOGGED IN USER PROFILE
    public function update_profile_settings()
    {
        $updater = sanitize($this->input->post('updater'));
        if ($updater == 'profile') {
            $response = $this->user_model->update_profile();
        }
        else if ($updater == 'profile_address') {
            $response = $this->user_model->update_profile();
        }
        else if ($updater == 'phone') {
            $response = $this->user_model->update_profile();
        }
         else {
            $response = $this->user_model->update_password();
        }
        return $response;
    }



    // UPDATE VAT SETTINGS
    public function update_vat_settings()
    {
        authorization(['admin'], true);

        $vat = required(sanitize($this->input->post('vat')));
        if ($vat >= 0) {
            $this->db->where('key', 'vat');
            $this->db->update('delivery_settings', ['value' => $vat]);
            return true;
        } else {
            error(get_phrase('invalid_number'), site_url('settings/vat'));
        }
    }

    // UPDATE RECAPTCHA SETTINGS
    public function update_recaptcha_settings()
    {
        authorization(['admin'], true);
        $recaptcha_data = ['recaptcha_sitekey', 'recaptcha_secretkey'];
        foreach ($recaptcha_data as $recaptcha_info) {
            $updater = required(sanitize($this->input->post($recaptcha_info)));
            $this->db->where('key', $recaptcha_info);
            $this->db->update('system_settings', ['value' => $updater]);
        }

        $gmap_data = ['gmap_api_key'];
        foreach ($gmap_data as $gmap_info) {
            $updater = sanitize($this->input->post($gmap_info));
            $this->db->where('key', $gmap_info);
            $this->db->update('system_settings', ['value' => $updater]);
        }
        return true;
    }


}
