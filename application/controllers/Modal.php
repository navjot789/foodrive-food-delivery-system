<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  @author   : TheDevs
 *  date    : 11 June 2020
 *  FoodMob
 *
 *  
 */
include 'Base.php';
class Modal extends Base
{
	function popup($parent_dir = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '')
	{
		$logged_in_user_role 		=   strtolower($this->session->userdata('user_role'));
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		$page_data['param4']		=	$param4;
		$page_data['param5']		=	$param5;
		$page_data['param6']		=	$param6;
		$page_data['param7']		=	$param7;
		$this->load->view('backend/' . $logged_in_user_role . '/' . $parent_dir . '/' . $page_name . '.php', $page_data);
	}

	function showup($parent_dir = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '')
	{
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		$page_data['param4']		=	$param4;
		$page_data['param5']		=	$param5;
		$page_data['param6']		=	$param6;
		$page_data['param7']		=	$param7;
		$this->load->view(frontend($parent_dir . '/' . $page_name . '.php'), $page_data);
	}
}
