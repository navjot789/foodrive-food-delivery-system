<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo get_system_settings('system_title'); ?></title>
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
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
	<div class="container-login100" 
	     style="background-image: url('<?php if ($role == "customer"){
												echo site_url('assets/auth/images/bg.jpg');
												}else if ($role == "owner"){
													echo site_url('assets/auth/images/owner-bg.jpg');
												}else if ($role == "driver"){
												echo site_url('assets/auth/images/driver-bg.jpg');
												}else{
													echo site_url('assets/auth/images/admin-bg.jpg');
												} ?>');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<div class="text-center">
				<img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="auth-logo" alt="">
			</div>
			<?php if ($role == "customer" || $role == "owner" || $role == "driver") : ?>
				<form action="<?php echo site_url('auth/register'); ?>" method="POST" class="login100-form">
					<span class="login100-form-title p-b-37">
						<?php echo get_phrase('register_as') . ' ' . ucfirst(sanitize($role)); ?>
					</span>

					<input type="hidden" name="role" value="<?php echo sanitize($role); ?>">
					<div class="wrap-input100 m-b-20">
						<input class="input100" type="text" name="name" placeholder="<?php echo get_phrase('enter_your_name'); ?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-20">
						<input class="input100" type="email" name="email" placeholder="<?php echo get_phrase('enter_your_email'); ?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-25">
						<input class="input100" type="password" name="password" placeholder="<?php echo get_phrase('enter_your_password'); ?>" required>
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 m-b-20">
						<input class="input100" type="text" name="phone" placeholder="<?php echo get_phrase('10_digit_mobile_number'); ?>" maxlength="10" pattern="[0-9]*" required>
						<span class="focus-input100"></span>
					</div>
					<!--
					<div class="wrap-input100 m-b-20">
						<textarea  style="line-height: 3;" class="input100" name="address" placeholder="<?php echo get_phrase('Address...'); ?>"  ></textarea> 
						<span class="focus-input100"></span>
					</div>
					-->

					<div class="wrap-input100 m-b-20">
						<div class="g-recaptcha mb-2" data-sitekey="<?php echo get_system_settings('recaptcha_sitekey') ?>" required></div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							<?php echo get_phrase('register'); ?>
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
			<?php else : ?>
				<span class="login100-form-title p-b-37">
					<?php echo get_phrase('wait') . '...' . get_phrase('what') . '!'; ?>
					<img src="<?php echo base_url('assets/auth/images/confused.png'); ?>" alt="" class="confused">
				</span>
				<div class="text-center p-b-20">
					<span class="txt1 d-block">
						<a href="<?php echo site_url('auth/roles'); ?>" class="txt2 hov1">
							<?php echo get_phrase('valid_user_roles'); ?>?
						</a>
					</span>
					<span class="txt1">
						<a href="<?php echo site_url(); ?>" class="txt2 hov1">
							<?php echo get_phrase('get_back_to_the_homepage'); ?>
						</a>
					</span>
				</div>
			<?php endif; ?>
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