<?php
$order_details = $this->order_model->get_by_code(sanitize($param2));
?>
<form  method="post" >
<p class=" text-sm">Please note that, actual tip will be calculated after submitted the received cash from COD & CREDIT-DEBIT payment methods.</p>
<div class="input-group ">
  <div class="input-group-prepend">
    <span class="input-group-text" ><i class="fas fa-hand-holding-usd" ></i></span>
  </div>
  <input type="hidden" name="code" id="code" value="<?php echo sanitize($param2); ?>">
  <input class="form-control" type="number" step="0.01" name="tip" id="tip"  placeholder="0.00" value="<?php echo sanitize(format($order_details['tip'])); ?>"/>
    <span class="input-group-btn ml-2">
            <button class="btn btn-secondary" type="submit" id="save-tip"><i class="fas fa-save"></i> Save </button>
    </span>
</div>

<small class="text-danger ">Note: leave blank if you already seperate the tip from the cash.</small>
<hr>
<div class="row mt-2">
  <div class="col-md-12">
    <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($param2) . '/delivered'); ?>')" class="btn btn-success btn-block btn-sm text-xs mb-2">
      <i class="fas fa-check-circle" ></i> <?php echo get_phrase('paid_and_delivered'); ?> 
  </a>
  </div>
</div>
</form>

<script>
      $(function () {
        $('#save-tip').click(function(event){ 
        // using this page stop being refreshing 
        event.preventDefault();
          var tip = $("#tip").val();
          var code = $("#code").val();

          $.ajax({
            method: 'post',
            dataType: 'json',
            url: '<?php echo site_url('orders/add_driver_tip'); ?>',
            data: {code: code, tip: tip},
            beforeSend: function() {
              $("#save-tip").css("background-color","#434343");
              $("#save-tip").html("Saving..."); 
            },
            success: function (data) {
              if (data.status == 200) {
                //window.location = data.url; 
                $("#save-tip").css("background-color","#28a745");
                $("#save-tip").html("<i class='fas fa-save'></i> Saved"); 
                toastr.success(data.msg);
              }else{
                toastr.error('ERROR! TIP NOT SAVED');
              }
             
            }
          });
        });
      });
  </script>
