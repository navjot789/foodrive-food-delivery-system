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

// THIS HELPER METHOD RETURN THE USER ROLE
if (!function_exists('get_user_role')) {
	function get_user_role($type = "", $user_id = '')
	{
		$CI	= &get_instance();
		$CI->load->database();

		$role_id	=	$CI->db->get_where('users', array('id' => $user_id))->row()->role_id;
		$user_role	=	$CI->db->get_where('role', array('id' => $role_id))->row()->type;

		if ($type == "user_role") {
			return $user_role;
		} else {
			return $role_id;
		}
	}
}

// THIS HELPER METHOD CHECKS IF THE EMAIL IS VALID OR NOT. IT BASICALLY CHECKES THE DUPLICATION
if (!function_exists('email_duplication')) {
	function email_duplication($email = "", $user_id = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //FILTER MAIL FIRST
			
			$query = $CI->db->get_where('users', ['email' => $email]);
			if (!empty($user_id)) { //IF USER-ID EXIST
				$query_result = $query->row_array();
				if ($query->num_rows() == 0 || $query_result['id'] == $user_id) { //IF NOT FIND ANY DUBLICATE
					return true;
				} else { //IF FIND
					$CI->session->set_flashdata('notice_message', get_phrase('Email_already_exists'));
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			} else { //WHEN USER ID NOT EXIST
				if ($query->num_rows() > 0) { //FIND DUBLICATE
					$CI->session->set_flashdata('notice_message', get_phrase('Email_already_exists'));
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				} else { //NOT FIND
					return true;
				}
			}

		} else { //INVALID EMAIL
			$CI->session->set_flashdata('error_message', get_phrase('Invalid_email'));
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
		

	}
}

// THIS HELPER METHOD CHECKS IF THE PHONE IS VALID OR NOT. IT BASICALLY CHECKES THE DUPLICATION AND VERIFY
if (!function_exists('phone_verify')) {
	function phone_verify($phone = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		$query = $CI->db->get_where('users', ['phone' => $phone]);
		$query_result = $query->row_array();

			if ($query->num_rows() > 0) {
				$CI->session->set_flashdata('error_message', get_phrase('Phone_already_exists_try_different_number'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			} else {

				 return phone_validator_curl($phone);

			}
		
	}
}


// THIS HELPER METHOD CHECKS IF THE PHONE IS VALID OR NOT. IT BASICALLY FILTER THE CA NUMBERS AND VALID AND INVALID USING API
// VISIT https://app.abstractapi.com/ FOR API KEY IF QUOTA EXCEED ABOVE 250
function phone_validator_curl($phone)
{
	$CI	= &get_instance();
	//https://app.abstractapi.com/
					
			// Initialize cURL.
			$ch = curl_init();

			// Set the URL that you want to GET by using the CURLOPT_URL option.
			curl_setopt($ch, CURLOPT_URL, 'https://phonevalidation.abstractapi.com/v1/?api_key='.get_system_settings('phone_validation').'&phone=1'.$phone); //+1

			// Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			// Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

			// Execute the request.
			$data = curl_exec($ch);

			// Close the cURL handle.
			curl_close($ch);

			// Print the data out onto the page.
		   $response = json_decode($data, TRUE);
		   //print_r($response);

		   if (!array_key_exists("error", $response)) {
				    if ($response['valid'] == TRUE) {
						  if ($response['country']['code'] == 'CA') {
						  	return true;
						  }else {
						  	//US PHONE NUMBERS NOT ALLOW
						  	$CI->session->set_flashdata('error_message', get_phrase('Only_canadians_number_allow'));
					        redirect($_SERVER['HTTP_REFERER'], 'refresh');
						  }
						
				    }else {

				   	 $CI->session->set_flashdata('error_message', get_phrase('Invalid_phone_number'));
					 redirect($_SERVER['HTTP_REFERER'], 'refresh');

				   }

			} else {

				//NOTIFY ADMIN IF NECESSORY
				$message = "";
				$message .= "250 montly Quota exceed its limit, please change the phone validation API key.";
				$message .= "API RESPONCE: ".$response['error']['message'];
				$CI->email_model->admin_alert($message);

				$CI->session->set_flashdata('error_message', get_phrase($response['error']['message'].' '.'Please_try_after_some_time'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');

			}

}

// THIS HELPER METHOD CHECKS IF THE USER IS A RESTAURANT OWNER OR NOT
if (!function_exists('is_restaurant_owner')) {
	function is_restaurant_owner($user_id = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		if (empty($user_id)) {
			$user_id = $CI->session->userdata('user_id');
		}
		$user_data = $CI->db->get_where('users', array('id' => $user_id))->row_array();

		$owner_role = $CI->db->get_where('role', ['type' => 'owner'])->row_array();
		if (count($user_data) > 0) {
			return ($user_data['role_id'] == $owner_role['id']) ? true : false;
		}

		return false;
	}
}


// THIS HELPER METHOD CHECKS IF THE USER HAS ANY RESTAURANT OWNED
if (!function_exists('has_restaurant')) {
	function has_restaurant($user_id = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		if (empty($user_id)) {
			$user_id = $CI->session->userdata('user_id');
		}
		$query = $CI->db->get_where('restaurants', array('owner_id' => $user_id))->num_rows();
		if ($query > 0) {
			return true;
		}

		return false;
	}
}



// ------------------------------------------------------------------------
/* End of file user_helper.php */
/* Location: ./system/helpers/user_helper.php */
