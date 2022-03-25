<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/fontawesome-free/css/all.min.css">

<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>css/adminlte.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="<?php echo base_url() . 'assets/global/toastr/toastr.css' ?>">

<!-- Page wise style -->
<?php if (file_exists("application/views/install/styles/$page_name-style.php")) : ?>
    <?php include APPPATH . "views/install/styles/$page_name-style.php"; ?>
<?php endif; ?>

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/install/'); ?>css/custom.css">

<link rel="shortcut icon" href="<?php echo base_url('uploads/system/favicon.jpg'); ?>">