<!-- jQuery -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/backend/'); ?>js/adminlte.js"></script>

<!-- Page wise script -->
<?php if (file_exists("application/views/install/scripts/$page_name-script.php")) : ?>
    <?php include APPPATH . "views/install/scripts/$page_name-script.php"; ?>
<?php endif; ?>