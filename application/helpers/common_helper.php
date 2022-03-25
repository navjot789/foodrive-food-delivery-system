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

if (!function_exists('get_system_settings')) {
    function get_system_settings($key = '')
    {
        $CI    = &get_instance();
        $CI->load->database();

        $CI->db->where('key', $key);
        $result = $CI->db->get('system_settings')->row('value');
        return $result;
    }
}

if (!function_exists('get_website_settings')) {
    function get_website_settings($key = '')
    {
        $CI    = &get_instance();
        $CI->load->database();

        $CI->db->where('key', $key);
        $result = $CI->db->get('website_settings')->row()->value;
        return $result;
    }
}

if (!function_exists('get_delivery_settings')) {
    function get_delivery_settings($key = '')
    {
        $CI    = &get_instance();
        $CI->load->database();

        $CI->db->where('key', $key);
        $result = $CI->db->get('delivery_settings')->row('value');
        return $result;
    }
}

if (!function_exists('get_smtp_settings')) {
    function get_smtp_settings($key = '')
    {
        $CI    = &get_instance();
        $CI->load->database();

        $CI->db->where('key', $key);
        $result = $CI->db->get('smtp_settings')->row('value');
        return $result;
    }
}

if (!function_exists('get_payment_settings')) {
    function get_payment_settings($key = '')
    {
        $CI    = &get_instance();
        $CI->load->database();

        $CI->db->where('key', $key);
        $result = $CI->db->get('payment_settings')->row()->value;
        return $result;
    }
}

if (!function_exists('currency')) {
    function currency($price = "")
    {
        $CI    = &get_instance();
        $CI->load->database();
        $CI->db->where('key', 'system_currency');
        $currency_code = $CI->db->get('system_settings')->row()->value;

        $CI->db->where('code', $currency_code);
        $symbol = $CI->db->get('currencies')->row()->symbol;

        $CI->db->where('key', 'currency_position');
        $position = $CI->db->get('system_settings')->row()->value;

        if ($position == 'right') {
            return $price . $symbol;
        } elseif ($position == 'right-space') {
            return $price . ' ' . $symbol;
        } elseif ($position == 'left') {
            return $symbol . $price;
        } elseif ($position == 'left-space') {
            return $symbol . ' ' . $price;
        }
    }
}

if (!function_exists('currency_code_and_symbol')) {
    function currency_code_and_symbol($type = "")
    {
        $CI    = &get_instance();
        $CI->load->database();
        $CI->db->where('key', 'system_currency');
        $currency_code = $CI->db->get('system_settings')->row()->value;

        $CI->db->where('code', $currency_code);
        $symbol = $CI->db->get('currencies')->row()->symbol;
        if ($type == "") {
            return $symbol;
        } else {
            return $currency_code;
        }
    }
}

if (!function_exists('ellipsis')) {
    function ellipsis($long_string, $max_character = 30)
    {
        $short_string = strlen($long_string) > $max_character ? substr($long_string, 0, $max_character) . "..." : $long_string;
        return $short_string;
    }
}

if (!function_exists('trimmer')) {
    function trimmer($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
            return 'n-a';
        return $text;
    }
}

// RANDOM NUMBER GENERATOR FOR ELSEWHERE
if (!function_exists('random')) {
    function random($length_of_string)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }
}

// RETURN AN EMPTY GRAPHICS IF DATA IS EMPTY
if (!function_exists('isEmpty')) {
    function isEmpty()
    {
        return include './application/views/backend/partials/empty.php';
    }
}

// FRONTEND VIEW LOADER WITH THEME
if (!function_exists('frontend')) {
    function frontend($view)
    {
        if ($view) {
            $theme = get_website_settings('theme');
            $view_path = "frontend/$theme/$view";
            return $view_path;
        }
    }
}

// SLUGIFY A TEXT
if (!function_exists('slugify')) {
    function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = strtolower($text);
        //$text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
            return 'n-a';
        return $text;
    }
}

// limit text length in php and provide 'Read more' link
if (!function_exists('read_more')) {
    function read_more($string)
    {
      // strip tags to avoid breaking any html
        $string = strip_tags($string);
        if (strlen($string) > 35) {

            // truncate string
            $stringCut = substr($string, 0, 35);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }
}

// limit text length in php and provide 'Read more' link
if (!function_exists('calc_percent')) {
    function calc_percent($per, $amt)
    {
      $output = ($per/100 * $amt);
      return format($output);
    }
}



// ------------------------------------------------------------------------
/* End of file common_helper.php */
/* Location: ./system/helpers/common.php */
