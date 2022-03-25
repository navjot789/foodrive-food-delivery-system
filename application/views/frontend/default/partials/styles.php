<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/bootstrap.min.css'); ?>">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">

<!-- Simple line Icon -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/simple-line-icons.css'); ?>">

<!-- Themify Icon -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/themify-icons.css'); ?>">

<!-- Fontawesome Icon -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/font-awesome.min.css'); ?>">

<!-- Hover Effects -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/set1.css'); ?>">

<!-- Main CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/style.css'); ?>">

<!-- Toastr -->
<link rel="stylesheet" href="<?php echo base_url() . 'assets/global/toastr/toastr.css' ?>">

<!-- Page wise style -->
<?php if (file_exists("application/views/frontend/default/$parent_dir/styles/$file_name-style.php")) : ?>
    <?php include APPPATH . "views/frontend/default/$parent_dir/styles/$file_name-style.php"; ?>
<?php endif; ?>

<!-- Custom MODAL CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/modal.css'); ?>">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/custom.css'); ?>">

<style>

    /* PREVENT SCOLLING WHEN MODEL IS OPEN */
  body.modal-open {
    overflow: hidden !important;
  }

    /* FLOTING CART BUTTON */
  .float{
	position:fixed;
	width:70px;
	height:70px;
	bottom:30px;
	right:23px;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:26px;
}

.cart-items {
  position: absolute;
  right: 0px;
  width: 25px;
  height: 25px;
  text-align: center;
  margin: -4px 3px 0 0;
  font-size: 8px;
  background: #f44336;
  color: #fff;
  padding: 8px 5px;
  border-radius: 50%;
}

.back-to-top {
    position: fixed;
    bottom: 115px;
    right: 40px;
    border-radius:60px;
    display: none;
}

</style>