<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 09 - June - 2020
 * Author : TheDevs
 * Authorization Controller Authorize users
 */

include 'Base.php';
class Authorization extends Base
{
    protected $user_role = NULL;
    function __construct()
    {
        parent::__construct();
        $this->init();
    }

    function init()
    {
        if ($this->session->userdata('is_logged_in')) {
            $this->user_role = $this->session->userdata('user_role');
        } else {
            redirect('auth', 'refresh');
        }
    }
}
