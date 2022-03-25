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

// THIS HELPER METHOD SANITIZES INPUT FIELDS
if (!function_exists('sanitize')) {
    function sanitize($input = '')
    {
        // AT FIRST TRIMMING THE INPUT, REMOVING THE WHITE SPACES.
        $trimmed_input = trim(preg_replace('/\s\s+/', ' ', $input));
        $type = gettype($trimmed_input);
        if ($type == "integer") {
            $sanitized_input = filter_var($trimmed_input, FILTER_SANITIZE_NUMBER_INT);
        } elseif ($type == "double") {
            $sanitized_input = filter_var($trimmed_input, FILTER_SANITIZE_NUMBER_FLOAT);
        } else { // LETS ASSUME IT IS A STRING
            // $sanitized_input = filter_var($trimmed_input, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
            $sanitized_input = html_entity_decode(htmlspecialchars($trimmed_input));
        }

        return $sanitized_input;
    }
}


// THIS HELPER METHOD SANITIZES AN ARRAY FIELDS
if (!function_exists('sanitize_array')) {
    function sanitize_array($array)
    {
        $sanitized_array = array();
        foreach ($array as $key => $item) {
            $sanitized_array[$key] = sanitize($item);
        }

        return $sanitized_array;
    }
}

// THIS HELPER METHOD SANITIZES INPUT FIELDS AND MAKE SURE THAT IT IS NOT EMPTY
if (!function_exists('required')) {
    function required($input = '')
    {
        $trimmed_value = trim($input);
        if (strlen($trimmed_value) > 0) {
            return $trimmed_value;
        } else {
            error(get_phrase('required_fields_can_not_be_empty'), $_SERVER['HTTP_REFERER']);
        }
    }
}

// THIS HELPER METHOD CHECKS IF AN INPUT FIELD IS EMPTY. IF IT IS, THEN IT WILL RETURN A PREDEFINED VALUE
if (!function_exists('getter')) {
    function getter($value, $predefined = "-")
    {
        if (empty($value)) {
            return $predefined;
        } else {
            return $value;
        }
    }
}

// THIS HELPER METHOD CHECKS IF AN INPUT FIELD IS EMPTY. IF IT IS, THEN IT WILL RETURN NULL
if (!function_exists('nuller')) {
    function nuller($value)
    {
        return $value ? $value : null;
    }
}

// THIS HELPER METHOD CHECKS IF AN INPUT IS INT OR NOT
if (!function_exists('integer_validate')) {
    function integer_validate($value)
    {
        if(is_numeric($value) || is_float($value)) {
            return true;
        }else{
            return false;
            error(get_phrase('only_integer_and_float_values_allowed'), $_SERVER['HTTP_REFERER']);
        }
    }
}


// THIS HELPER METHOD ROUNDOFF THE PRICE 
if (!function_exists('roundoff')) {
  function roundoff($value)
     {
       $value = $value * 20;
       $near_int = round($value);
       $round = $near_int / 20;
       return $round;
       
     }
   
}

// THIS HELPER METHOD CONVERT PRICE INTO 0.00 
if (!function_exists('format')) {
  function format($price = "")
     {
     
      $format_price = number_format($price, 2, '.', '');
      return $format_price;
       
     }
   
}

// ------------------------------------------------------------------------
/* End of file sanitizer_helper.php */
/* Location: ./system/helpers/sanitizer_helper.php */
