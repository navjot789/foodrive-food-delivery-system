<?php
$order_details = $this->order_model->get_by_code(sanitize($param2));
?>
<form action="<?php echo site_url('orders/add_driver_tip'); ?>" method="post" enctype="multipart/form-data">
<blockquote class="blockquote mt-0 text-right">
  <p class="mb-0 text-sm">Please note that, actual tip will be calculated after submitted the received cash from COD & CREDIT-DEBIT payment methods.</p>
  <footer class="blockquote-footer">foodrive</footer>
</blockquote>
<div class="input-group">
      <input type="hidden" name="code" value="<?php echo sanitize($param2); ?>">
           <input class="form-control" type="number" step="0.01" name="tip" id="tip"  placeholder="0.00" value="<?php echo sanitize($order_details['tip']); ?>"/>
        <span class="input-group-btn ml-2">
                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save </button>
        </span>
    </div>
</div>
<small class="text-danger">Note: leave blank if you already seperate the tip from the cash.</small>

    
</form>