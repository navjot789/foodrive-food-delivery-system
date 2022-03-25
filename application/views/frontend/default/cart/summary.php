<?php   $distance = $this->cart_model->distance_price(); ?>
<form action="<?php echo site_url('checkout'); ?>" method="post">
  <div class="row">
    <div class="col-md-12 text-right">
      <div class="p-3"> <span class="font-weight-bold"><i class="fas fa-spinner fa-pulse summary-loader mr-2 d-none"></i> <i class="fas fa-receipt"></i> Order Recap</span>
        <div class="d-flex justify-content-between mt-2">
          <span class="fw-500"><?php echo site_phrase('total_menu_price'); ?></span>
          <span><?php echo currency(sanitize(format($this->cart_model->get_total_menu_price()))); ?></span>
        </div>

        <!--GST & SERVICE CHARGE-->
        <div class="bg-remove">
          <a class="float-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
            aria-controls="collapseOne">
            <div class="d-flex justify-content-between mt-2">
              <span class="fw-500">Tax & Service charge <i class="fas fa-sort-down"></i></span>
              <span><?php echo currency(sanitize(format($this->cart_model->get_price_tax_amount() + $this->cart_model->get_price_pst_amount() + $this->cart_model->get_service_charge($this->cart_model->get_total_menu_price())))); ?></span>
            </div>
          </a>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <div class="d-flex justify-content-between mt-2">
                <span class="fw-500">GST</span>
                <span><?php echo currency(sanitize(format($this->cart_model->get_price_tax_amount()))); ?></span>
              </div>
              <div class="d-flex justify-content-between mt-2">
                <span class="fw-500">PST</span>
                <span><?php echo currency(sanitize(format($this->cart_model->get_price_pst_amount()))); ?></span>
              </div>
              <div class="d-flex justify-content-between mt-2">
                <span class="fw-500">Service Charge</span>
                <span><?php echo currency(sanitize(format($this->cart_model->get_service_charge($this->cart_model->get_total_menu_price())))); ?></span>
              </div>
            </div>
          </div>
        </div>

        <hr>
        <div class="d-flex justify-content-between mt-2">
          <span class="fw-500"><?php echo site_phrase('sub_total'); ?></span>
          <span
            class="text-success"><?php echo currency(sanitize(format($this->cart_model->get_sub_total()))); ?></span>
        </div>
        <hr>
        <div class="d-flex justify-content-between mt-2">
          <span class="fw-500"><?php echo site_phrase('delivery_charge'); ?> </span>
          <span><?php echo currency(sanitize(format($distance['charge']))); ?></span>
        </div>

        <?php if(!empty($this->session->userdata('wallet')) && $this->session->userdata('wallet') == 1) :?>
          <?php $wallet_balance = $this->transaction_model->wallet_balance();?>
         <!--credits-->
          <div class="d-flex justify-content-between mt-2">
            <span class="fw-500">FD Credits</span>
            <?php if($wallet_balance >= $this->cart_model->get_grand_total()):?>
                <span class="text-danger">-<?php echo currency(sanitize(format($this->cart_model->get_grand_total()))); ?></span>
            <?php else:?>
                <span class="text-danger">-<?php echo currency(sanitize(format($wallet_balance))); ?></span>
            <?php endif;?>
          </div>
        <?php endif;?>
        <hr>

        <!--tipping-->
        <?php if (!empty($this->session->userdata('custom_tip'))): ?>
        <div class="d-flex justify-content-between mt-2">
          <span class="fw-500"><?php echo site_phrase('tip_for_your_foodriver'); ?></span>
          <span class="text-success"><strong
              class="tip-responce"><?php echo currency($this->session->userdata('custom_tip')); ?></strong></span>
        </div>
        <?php endif ?>
        <div class="d-flex justify-content-between mt-2">
          <span class="fw-500"><?php echo site_phrase('grand_total'); ?> </span>
          <span class="text-success"><strong>
          <?php echo currency(sanitize($this->cart_model->display_grand_total())); ?>
          </strong></span>
        </div>

        <div class="featured-btn-wrap text-right mt-3"><button type="submit"
            class="btn-block btn btn-danger btn-sm pl-5 pr-5 pt-2 pb-2"><?php echo site_phrase('continue', true); ?> <i
              class="fas fa-arrow-right"></i></button>
        </div>

      </div>
    </div>

  </div>
</form>