<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
*  @author   : TheDevs
*  date      : 13 September, 2020
*/

class Email_model extends Base_model
{

	function password_reset($email_to = "", $email_message = "")
	{
		$type = "reset";
		$email_sub = "Foodrive Password Resetting Mail";
		return $this->send_mail_using_php_mailer($email_message, $email_sub, $email_to, $type);
	}

	function send_verification($email_to = "", $email_message = "")
	{
		$type = "verify";	
		$email_sub = "Foodrive Verification Mail";
		return $this->send_mail_using_php_mailer($email_message, $email_sub, $email_to, $type);
	}

	function order_confirmation($email_to = "", $order_data, $menu_data)
	{
		$details = array('order' => $order_data, 'menu' => $menu_data);
		$type = "confirmation";
		$email_sub = "Your Foodrive Order Receipt #".$details['order']['code'];
		
		return $this->send_mail_using_php_mailer($details, $email_sub, $email_to, $type);
	}

	function order_cancellation($email_to = "", $order_code)
	{	
		$order_details = $this->order_model->get_by_code($order_code);
		$type = "cancellation";
		$email_sub = "Foodrive Order Cancellation #".$order_code;
		return $this->send_mail_using_php_mailer($order_details, $email_sub, $email_to, $type);
	}

	function driver_assign_mail($driver_data, $code)
	{
		$type = "driver_assign";
		$email_to = $driver_data['email'];
		$email_sub = "Foodrive Order Assign #".$code;

		$order_details = $this->order_model->get_by_code($code);

		return $this->send_mail_using_php_mailer($order_details, $email_sub, $email_to, $type);
	}

	function admin_alert($email_message = "")
	{
		$admin_details = $this->user_model->get_admin_details();

		$type = "admin_alert";
		$email_to = $admin_details['email'];
		$email_sub = "Critical Alert in foodrive system";
		
		return $this->send_mail_using_php_mailer($email_message, $email_sub, $email_to, $type);
	}

	function refund_mail($email_to = "", $email_message = "")
	{
		$type = "refund";
		$email_sub = "Your Foodrive Order Refund";
		return $this->send_mail_using_php_mailer($email_message, $email_sub, $email_to, $type);
	}


	public function send_mail_using_php_mailer($message = "", $subject = NULL, $to = NULL, $type = NULL)
	{
		// Load PHPMailer library
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host        = get_smtp_settings('host');
		$mail->Port        = get_smtp_settings('port');
		$mail->SMTPAuth    = true;
		$mail->Username    = get_smtp_settings('username');
		$mail->Password    = get_smtp_settings('password');
		$mail->SMTPSecure  = get_smtp_settings('security');
		$mail->SMTPOptions = array('ssl' => array(
								   'verify_peer' => false,
								   'verify_peer_name' => false,
								   'allow_self_signed' => true));
		

		$mail->setFrom(get_smtp_settings('username'), get_smtp_settings('from'));

		// Add a recipient
	   $mail->AddAddress($to);

		// Email subject
		$mail->Subject = $subject;

		// Set email format to HTML
		$mail->isHTML(true);

		// Enabled debug
		$mail->SMTPDebug = false;

        switch ($type) {
        	case 'reset':
        		$htmlContent = $this->load->view('email/reset', array('message' => $message), TRUE);
        		break;

        	case 'verify':
        		$htmlContent = $this->load->view('email/email_verify', array('message' => $message), TRUE);
        		break;	

        	case 'confirmation':
        		$htmlContent = $this->load->view('email/order_confirm', array('order' => $message['order'], 'menu' => $message['menu']), TRUE);
        		break;

        	case 'cancellation':
        		$htmlContent = $this->load->view('email/order_cancel', array('order_details' => $message), TRUE);
        		break;		

        	case 'driver_assign':
        		$htmlContent = $this->load->view('email/driver_assign', array('order' => $message) , TRUE);
        		break;	

    		case 'admin_alert':
	    		$htmlContent = $this->load->view('email/admin_notify', array('message' => $message) , TRUE);
	    		break;	

			case 'refund':
				$htmlContent = $this->load->view('email/refund', array('message' => $message) , TRUE);
				break;	
        	
        	default:
        		$htmlContent = "NO TEMPLATE SELECTED! CONTACT FOODRIVE";
        		break;
        }
		
		$mail->Body = $htmlContent;
		// Send email
		if (!$mail->send()) {
			// YOU CAN DEBUG HERE, WHETHER MAIL IS GOING OT NO. YOU CAN PRING THE "ErrorInfo" OF MAIL OBJECT
			return false;
		} else {
			// YOU CAN DEBUG HERE. WHETHER THE MAIL IS GOING OR NOT. YOU CAN ECHO HERE
			return true;
		}
	}
}
