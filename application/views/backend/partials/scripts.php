<!-- jQuery -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/backend/'); ?>js/adminlte.js"></script>

<!-- Initialize Gmap scripts for frontend and backend here -->
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=<?php echo sanitize(get_system_settings('gmap_api_key')); ?>"></script> 

<!-- Page wise script -->
<?php if (file_exists("application/views/backend/$role/$parent_dir/scripts/$file_name-script.php")) : ?>
	<?php include APPPATH . "views/backend/$role/$parent_dir/scripts/$file_name-script.php"; ?>
<?php endif; ?>


<!-- Toastr -->
<script src="<?php echo base_url() . 'assets/global/toastr/toastr.min.js'; ?>"></script>

<!-- Initialize common scripts for frontend and backend here -->
<?php include APPPATH . "views/common/script.php"; ?>

<script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
}); 
</script>


<?php if(get_system_settings('inspect_elements') == 'true'){ ?> 
   <script>
   //Disable shotcuts and menu from body
   document.onkeydown = function(e) {
   if(event.keyCode == 123) {
      return false;
   }
   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
      return false;
   }
   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
      return false;
   }
   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
      return false;
   }
   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
      return false;
   }
   }
   </script> 
 <?php }?>