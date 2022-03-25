<div id="pay-with-credit-debit-on-delivery-form">
  <hr>
   <div class="d-flex justify-content-between mt-2"> 
      <span class="fw-500"><?php echo site_phrase('grand_total'); ?> </span> 
      <span class="text-success"><strong id="grand-total">   <?php echo currency(sanitize($this->cart_model->display_grand_total())); ?></strong></span> 
  </div>

  <form  method="post">
       <div class="form-group">
      <label><strong>Any delivery instructions?</strong></label>
      <textarea class="form-control" name="delivery_info"  id="delivery_info_cd" rows="3" placeholder="Describe here...."></textarea>
    </div>

      <div class="featured-btn-wrap text-right mt-3">
        <button type="submit" id="cd-btn" class="btn btn-danger btn-sm pl-5 pr-5 pt-2 pb-2 btn-block"><?php echo site_phrase('confirm_order', true); ?> <i class="fas fa-check-circle" ></i></button>
      </div>
  </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      $("#cd-btn").click(function(e) {
         e.preventDefault();
         var info = $('#delivery_info_cd').val();
                $.ajax({
                    url: '<?php echo site_url('checkout/credit_debit_on_delivery'); ?>',
                    type: 'POST',
                    dataType: "json",
                    data: { delivery_info:info},
                    beforeSend: function() {
                      $("#cd-btn").html('Placing order....');
                      $("#cd-btn").prop('disabled', true); // disable button
                    },
                    success:function(data) {
                        if(data.code == 503){
                            toastr.danger(data.msg);
                            window.location.href = "<?php echo site_url('cart'); ?>";
                        }else if(data.code == 200){
                            toastr.success(data.msg);
                            window.location.href = "<?php echo site_url('cart'); ?>";
                        }
                    }
                });
         
        }); 
    });
</script>

