<script type="text/javascript">
  "use strict";

  function showLargeModal(url, header) {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#large-modal .modal-body').html('...');
    jQuery('#large-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#large-modal').modal('show', {
      backdrop: 'true'
    });

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response) {
        jQuery('#large-modal .modal-body').html(response);
        jQuery('#large-modal .modal-title').html(header);
      }
    });
  }

  function showCartModal(url, header) {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#cart-modal .modal-body').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#cart-modal').modal('show', {
      backdrop: 'true'
    });

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response) {
        jQuery('#cart-modal .modal-content').html(response);
      }
    });
  }

  function showModalWithHeader(url, header) {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#modal-with-header .modal-body').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#modal-with-header').modal('show', {
      backdrop: 'true'
    });

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response) {
        jQuery('#modal-with-header .title').html(header);
        jQuery('#modal-with-header .modal-body').html(response);
      }
    });
  }

  function confirm_modal(delete_url) {
    jQuery('#alert-modal').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('update_link').setAttribute('href', delete_url);
  }
</script>

<!-- (Large Modal)-->
<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">...</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!--CART MODAL WITH AVATAR-->
<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

    </div>
  </div>
</div>


<!-- Info Alert Modal -->
<div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="text-center">
          <i class="dripicons-information h1 text-info"></i>
          <h4 class="mt-2"><?php echo site_phrase("heads_up"); ?>!</h4>
          <p class="mt-3"><?php echo site_phrase("are_you_sure"); ?>?</p>
          <button type="button" class="btn btn-info my-2" data-dismiss="modal"><?php echo site_phrase("cancel"); ?></button>
          <a href="#" id="update_link" class="btn btn-danger my-2"><?php echo site_phrase("continue"); ?></a>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--STYLISH MODAL WITH HEADER-->
<div class="modal fade modal-with-header" id="modal-with-header" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header light-blue darken-3 white-text">
        <h4 class="title">Loading...</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <!--Body-->
      <div class="modal-body mb-0">

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--STYLISH MODAL WITH HEADER-->

