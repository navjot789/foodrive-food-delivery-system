 <div  >
    <hr>
     <div class="d-flex justify-content-between mt-2"> 
        <span class="fw-500"><?php echo site_phrase('grand_total'); ?> </span> 
      
        <span class="text-success"><strong id="grand-total">
        <?php echo currency(sanitize($this->cart_model->display_grand_total())); ?>
        </strong></span>
    </div>
        
    <form action="<?php echo site_url('checkout/wallet'); ?>" method="post" >
         <div class="form-group">
        <label><strong>Any delivery instructions?</strong></label>
        <textarea class="form-control" name="delivery_info"  rows="3" placeholder="Describe here..."></textarea>
      </div>
        <div class="featured-btn-wrap text-right mt-3">
            <button type="submit" class="btn btn-danger btn-sm pl-5 pr-5 pt-2 pb-2 btn-block"><?php echo site_phrase('confirm_order', true); ?> <i class="fas fa-check-circle" ></i></button>
        </div>
    </form> 
 </div>
 

