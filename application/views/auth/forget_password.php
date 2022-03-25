<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo sanitize(get_system_settings('system_title')); ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url('uploads/system/' . get_website_settings('favicon')); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/fonts/iconic/css/material-design-iconic-font.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/global/toastr/toastr.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/css/main.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/css/custom.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/global/css/font.css'); ?>">
</head>

<body>
	<div class="container-login100">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<div class="text-center">
				<img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="auth-logo" alt="">
			</div>
			<form action="<?php echo site_url('auth/resetpassword'); ?>" method="POST" class="login100-form">
				<span class="login100-form-title p-b-37">
					<?php echo get_phrase('forget_password'); ?>
				</span>

				<div class="wrap-input100 m-b-20">
					<input class="input100" type="text" name="email" placeholder="<?php echo get_phrase('enter_your_email'); ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						<?php echo get_phrase('reset_password'); ?>
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1 d-block">
						<a href="<?php echo site_url('auth'); ?>" class="txt2 hov1">
							<?php echo get_phrase('login_page'); ?>?
						</a>
					</span>
					<span class="txt1">
						<a href="<?php echo site_url(); ?>" class="txt2 hov1">
							<?php echo get_phrase('get_back_to_the_homepage'); ?>
						</a>
					</span>
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url('assets/auth/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/auth/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets/auth/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/global/toastr/toastr.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/auth/js/main.js'); ?>"></script>
	<!-- Initialize common scripts for frontend and backend here -->
	<?php include APPPATH . "views/common/script.php"; ?>
</body>

</html>