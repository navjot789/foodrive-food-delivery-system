<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 09 - June - 2020
 * Author : TheDevs
 * AUTH CONTROLLER FOR LOGGIN IN AND LOGGIN OT=UT FUNCTIONALITIES
 */

include 'Base.php';
class Auth extends Base
{

	public function index()
	{
		if ($this->session->userdata('is_logged_in')) {
			redirect(site_url('dashboard'), 'refresh');
		}

		$this->load->view('auth/login');
	}

	// Validating a user
	public function validate()
	{
		if ($this->session->userdata('is_logged_in')) {
			redirect(site_url('dashboard'), 'refresh');
		}

		$validity = $this->auth_model->validate_login();

		if ($validity) {
			$userdata = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
			$this->session->set_flashdata('flash_message', get_phrase('welcome') . ", " . $userdata['name']);
			if ($this->session->userdata('user_role') == "admin") {
				redirect(site_url('dashboard'), 'refresh');
			}else if ($this->session->userdata('user_role') == "owner") {
				redirect(site_url('orders/live'), 'refresh');
			}else if ($this->session->userdata('user_role') == "driver") {
				redirect(site_url('orders/today'), 'refresh');
			}else {
				redirect(site_url('/'), 'refresh');
			}
		} else {
			error(get_phrase('invalid_login_credentials'), site_url('auth'));
		}
	}


	/**
	 * ROLES FUNCTION SHOW THE ROLES VIEW FOR REGISTRAION
	 *
	 * @return void
	 */
	public function roles()
	{
		if ($this->session->userdata('is_logged_in')) {
			redirect(site_url('dashboard'), 'refresh');
		}

		$this->load->view('auth/roles');
	}


	/**
	 * REGISTRATION FUNCTION IS RESPONSI
	 *
	 * @param [type] $role
	 * @return void
	 */
	public function registration($role)
	{
		if ($this->session->userdata('is_logged_in')) {
			redirect(site_url('dashboard'), 'refresh');
		}
		$page_data['role'] = sanitize($role);
		$this->load->view('auth/registration', $page_data);
	}

	/**
	 * VERIFY FUNCTION IS RESPONSIBLE FOR EMAIL VERIFICATION OF CUSTOMER | OWNER
	 *
	 * @return void
	 */
	public function verify($token = "")
	{
	 if (!empty($token)) {

				$this->db->where('verify_token', sanitize($token));
		        $user_data = $this->db->get('users')->row_array();
		        if (is_countable($user_data) && count($user_data) > 0) {

								$created = $user_data['created_at']; // time when link is created in int format
								$expire_date = date('Y-m-d H:i',strtotime('+5 minutes', $created));
								//+1 day = adds 1 day
								//+1 hour = adds 1 hour
								//+10 minutes = adds 10 minutes
								//+10 seconds = adds 10 seconds
								//To sub-tract time its the same except a - is used instead of a +

								$now = date("Y-m-d H:i:s"); //current time

								if ($now > $expire_date) { //if current time is greater then created time
								 // if token expired!

									$updater['verify_token']  = $this->auth_model->generateRandomString();
					                $updater['created_at'] = strtotime(date("Y-m-d H:i:s"));
					                $this->db->where('verify_token', $user_data['verify_token']);
					                $this->db->update('users', $updater);

									//resend new email if time expired
					                $this->auth_model->email_verification($user_data['id'], $user_data['email']); 
									//error(get_phrase('Your_link_has_been_expired_but_we_resend_new_link_on_your_registered_mail_please_check'), site_url('auth'));


								} else {//still has a time
								    $updater['status'] = 1; //verify
					                $this->db->where('verify_token', $user_data['verify_token']);
					                $this->db->update('users', $updater);
					                success(get_phrase('email_verification_successful'), site_url('auth'));
								}

		          
		        } else {
		            error(get_phrase('email_expired_please_check_inbox_again_for_reverification'), site_url('auth'));
		        }

		 } else {
		            redirect(site_url('/'), 'refresh');
		        }	        
	}



	/**
	 * FORGET PASSWORD FUNCTION IS RESPONSIBLE FOR RESETTING PASSWORD
	 *
	 * @return void
	 */
	public function forget_password()
	{
		$this->load->view('auth/forget_password');
	}

	/**
	 * FORGET PASSWORD FUNCTION IS RESPONSIBLE FOR RESETTING PASSWORD
	 *
	 * @return void
	 */
	public function resetpassword()
	{
		$this->auth_model->reset_password();
	}

	/**
	 * REGISTER FUNCTION IS FOR REGISTERING USERS
	 *
	 * @return void
	 */
	public function register()
	{
		if ($this->session->userdata('is_logged_in')) {
			redirect(site_url('dashboard'), 'refresh');
		}
		$validate_recaptcha = $this->validate_captcha();
		if ($validate_recaptcha) {
			$this->auth_model->registration();
		} else {
			error(get_phrase('recaptcha_validation_failed'), $_SERVER['HTTP_REFERER']);
		}
	}

	/**
	 * VALIDATE RECAPTHCA FUNCTION IS RESPONSIBLE FOR VALIDATING THE REACAPTCHA
	 *
	 * @return boolean
	 */
	function validate_captcha()
	{
		$recaptcha = trim($this->input->post('g-recaptcha-response'));
		$userIp = $this->input->ip_address();
		$secret = get_system_settings('recaptcha_secretkey');
		$data = array(
			'secret' => "$secret",
			'response' => "$recaptcha",
			'remoteip' => "$userIp"
		);

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);
		$status = json_decode($response, true);

		if (empty($status['success'])) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Destroying session
	public function logout()
	{	
		//OFFLINE THE DRIVER FIRST
 		if ($this->session->userdata('user_role_id') == 4 && $this->session->userdata('user_role') == "driver"){
			$this->db->where_in("user_id", $this->logged_in_user_id);
			$this->db->update('drivers', array("status" => 0));
		 } 
		$this->session->sess_destroy();
		redirect(site_url('auth'), 'refresh');
	}
}
