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

// Success Notificaation and redirect
if (!function_exists('success')) {
    function success($message = '', $redirectTo = '')
    {
        $CI = &get_instance();
        $CI->session->set_flashdata('flash_message', $message);
        redirect($redirectTo, 'refresh');
    }
}

// error Notificaation and redirect
if (!function_exists('error')) {
    function error($message = '', $redirectTo = '')
    {
        $CI = &get_instance();
        $CI->session->set_flashdata('error_message', $message);
        redirect($redirectTo, 'refresh');
    }
}

// warning Notificaation and redirect
if (!function_exists('notice')) {
    function notice($message = '', $redirectTo = '')
    {
        $CI = &get_instance();
        $CI->session->set_flashdata('notice_message', $message);
        redirect($redirectTo, 'refresh');
    }
}
// ------------------------------------------------------------------------
/* End of file notification_helper.php */
/* Location: ./system/helpers/notification_helper.php */
