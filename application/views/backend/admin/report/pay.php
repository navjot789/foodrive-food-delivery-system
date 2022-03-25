<?php
    $restaurant_details =  $this->restaurant_model->get_by_id(sanitize($param2));
 ?>
<form action="<?php echo site_url('report/pay'); ?>" method="post" enctype="multipart/form-data">
    <div class="alert bg-purple" role="alert">
        Restaurant: <?php echo sanitize($restaurant_details['name']); ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="hidden" name="restaurant_id" value="<?php echo sanitize($param2); ?>">
                <label for="amount_to_pay"><?php echo get_phrase("amount_to_pay"); ?></label>
                <input type="number" step="0.01" class="form-control" id="amount_to_pay" name="amount_to_pay" placeholder="Menu Total without tax" required>
               
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tax_to_pay">GST to pay</label>
                <input type="number" step="0.01" class="form-control" id="tax_to_pay" name="tax_to_pay" placeholder="GST Amount" required>
                
            </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
                <label for="pst_to_pay">PST to pay</label>
                <input type="number" step="0.01" class="form-control" id="pst_to_pay" name="pst_to_pay" placeholder="PST Amount" required>  
            </div>
        </div>
    </div>

    <div class="row">    
        <div class="col-md-12">
        <div class="form-group">
                <label for="pst_to_pay">Remark (Optional)</label>
                <textarea rows="2" class="form-control" id="remark" name="remark" placeholder="<?php echo get_phrase("write_something_to_remember_later_on..."); ?>"></textarea>
                <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> : <?php echo get_phrase('for_future_purposes'); ?></small>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase("pay"); ?></button>
</form>
