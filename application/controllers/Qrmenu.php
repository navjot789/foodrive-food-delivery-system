<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* Product name : FoodMob
* Date : 06 - November - 2020
* Author : TheDevs
* Qrmenu Controller controlls the task for creating a QR Code
*/

include 'Base.php';
class Qrmenu extends Base
{
    /**
    * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
    */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin'], true);
        $this->load->library('ciqrcode');
        $this->load->helper('download');
        $this->load->helper('file');
    }

    /**
    * INDEX FUNCTION FOR SHOWING THE INDEX PAGE
    */
    public function index() {
        $page_data['page_name']  = 'qrmenu/create';
        $page_data['page_title'] = "QR ".get_phrase("menu_builder", true);
        $page_data['restaurants'] = $this->restaurant_model->get_all_approved();
        $this->load->view('backend/index', $page_data);
    }

    public function generate() {
        $restaurant_id = sanitize($this->input->post('restaurant_id'));
        $foreground_color = sanitize($this->input->post('foreground_color'));
        $restaurant_details = $this->restaurant_model->get_by_id($restaurant_id);
        list($r, $g, $b) = sscanf($foreground_color, "#%02x%02x%02x");

        $config['quality']		= true; //boolean, the default is true
        $config['size']			= '1024'; //interger, the default is 1024
        $config['black']		= array(255,255,255); // THIS IS THE BACKGROUND, IT SHOULD BE WHITE
        $config['white']		= array($r, $g, $b); // THIS IS THE FOREGROUND, IT SHOULD BE WHITE

        $config['data'] = site_url('site/restaurant/' . sanitize(rawurlencode($restaurant_details['slug'])) . '/' . sanitize($restaurant_details['id']));
        $config['level'] = 'H';
        $config['size'] = 10;
        $random_title = substr(sha1(rand(100000000, 20000000000)), 0, 5);
        $config['savename'] = FCPATH.'uploads/qrcode/'.$random_title.'.png';
        $this->ciqrcode->generate($config);
        echo sanitize($random_title).'.png';
    }

    public function download($qrcodeName) {
        $qrcode_path = "uploads/qrcode/".$qrcodeName;
        force_download($qrcode_path, NULL);
    }

    public function delete($qrcodeName) {
        $qrcode_path = "uploads/qrcode/".$qrcodeName;
        if(unlink($qrcode_path)) {
            success(get_phrase('qr_code_deleted_successfully'), site_url('qrmenu'));
        }
        else {
            error(get_phrase('an_error_occurred'), site_url('qrmenu'));
        }
    }
}
