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
</head>

<body>
    <div class="container-login100">
        <div class="wrap-login600 p-l-55 p-r-55 p-t-80 p-b-30">
            <div class="text-center">
                <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="auth-logo" alt="">
            </div>
            <span class="login100-form-title p-b-37">
                <?php //echo site_phrase('what_are_you', true); ?>
            </span>
            <div class="row">

                <div class="col-sm-4 mb-2 text-center">
                    <div class="button-images">
                        <div class="button-container">
                            <a href="<?php echo site_url('auth/registration/customer'); ?>"><?php echo site_phrase('customer'); ?></a>
                            <img src="<?php echo base_url('assets/auth/images/customer.jpg'); ?>" />
                        </div>
                    </div>
                </div>
              
                <div class="col-sm-4 mb-2">
                    <div class="button-container">
                        <a href="<?php //echo site_url('auth/registration/owner'); ?>"><?php echo site_phrase('restaurant_owner'); ?></a>
                        <div class="button-image"> <img src="<?php echo base_url('assets/auth/images/owner.png'); ?>" /></div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="button-container">
                        <a href="<?php //echo site_url('auth/registration/driver'); ?>"><?php echo site_phrase('driver'); ?></a>
                        <img src="<?php echo base_url('assets/auth/images/driver.jpg'); ?>" />
                    </div>
                </div>
            
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