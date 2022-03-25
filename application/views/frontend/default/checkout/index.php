<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php';

$cash_on_delivery_settings = get_payment_settings("cash_on_delivery");
$cash_on_delivery_settings = json_decode($cash_on_delivery_settings);

$credit_debit_on_delivery_settings = get_payment_settings("credit_debit_on_delivery");
$credit_debit_on_delivery_settings = json_decode($credit_debit_on_delivery_settings);

$paypal_settings = get_payment_settings("paypal");
$paypal_settings = json_decode($paypal_settings);

$stripe_settings = get_payment_settings("stripe");
$stripe_settings = json_decode($stripe_settings);

$wallet_settings = get_payment_settings("wallet");
$wallet_settings = json_decode($wallet_settings);
?>

<!-- MAIN CONTENT -->
<section class=" light-bg booking-details_wrap">
    <div class="container-fluid">
        <?php if ($this->session->userdata('customer_login') || $this->session->userdata('owner_login')) : ?>
            <?php $customer_details = $this->customer_model->get_by_id($this->session->userdata('user_id')); ?>
   
            <?php

            $restaurant_ids = $this->cart_model->get_restaurant_ids();
            $restaurant_details = $this->restaurant_model->get_by_id($restaurant_ids[0]);
            $wallet_balance = $this->transaction_model->wallet_balance();

     if (!empty($restaurant_ids)) :?> 
        <?php if (count($restaurant_ids) > 0) : ?>
            <div class="row justify-content-center">
                <div class="col-md-7 responsive-wrap">
                    <div class="booking-checkbox_wrap shadow-sm rounded">
                        <h6><?php echo site_phrase('choose_way_of_payment', true); ?></h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-5 payment-gateways">

                         <?php if(!empty($this->session->userdata('wallet')) && $this->session->userdata('wallet') == 1) :?> 
                                   <?php if($wallet_balance >= $this->cart_model->get_grand_total()):?>                     
                                        <?php if($wallet_settings[0]->active):?>
                                            <label for="wallet">
                                                <div class="callout col-div-wallet callout-primary">
                                                    <input type="radio" class="payment-gateway-radio" name="payment_gateway" value="wallet" id="wallet" checked>
                                                    <img src="<?php echo base_url('assets/payment/fdcredits.png'); ?>" alt="wallet">
                                                </div>
                                            </label>
                                        <?php endif;?>

                                    <?php else:?> 
                                        <?php include "method.php";?>
                                    <?php endif;?>

                        <?php else:?>
                            <?php include "method.php";?>
                        <?php endif;?>
                         </div>

                        
                            <div class="col-sm-6 text-left">
                                 <!--stripe tip system-->
                                 <div id="stripe-tip-system"></div>

                                  <div class="p-3"> 
                                    <span class="font-weight-bold">Order Summary</span>
                                    <div class="d-flex justify-content-between mt-2"> 
                                        <span class="fw-500"><?php echo site_phrase('total_menu_price'); ?></span> 
                                        <span><?php echo currency(sanitize(format($this->cart_model->get_total_menu_price()))); ?></span> 
                                    </div> 
                            
                                    <!--GST & SERVICE CHARGE--> 
                                      <div class="bg-remove">
                                        <a class="float-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                             <div class="d-flex justify-content-between mt-2"> 
                                                <span class="fw-500">Tax & Service charge <i class="fas fa-sort-down" ></i></span> 
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
                                        <span class="text-success"><?php echo currency(sanitize(format($this->cart_model->get_sub_total()))); ?></span> 
                                    </div>
                                     <hr>
                                    <div class="d-flex justify-content-between mt-2"> 
                                        <span class="fw-500"><?php echo site_phrase('delivery_charge'); ?> </span> 
                                        <span><?php $distance = $this->cart_model->distance_price();
                                                    echo currency(sanitize(format($distance['charge']))); ?></span> 
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

                                  
                                    <img id="loader" style="height:150px;display:block;" src="<?php echo base_url('assets/payment/loader.gif'); ?>" class="img-fluid mx-auto "> 
                                     
                                     <!--PAY VIA WALLET-->
                                     <div id="fd-wallet"></div>  
                                     <!--CASH ON DELIVERY-->
                                        <div id="cod"></div>
                                      <!--CREDIT DEBIT-->
                                       <div id="cd"></div>
                                      <!--STRIPE-->
                                        <div id="st"></div>

                                       <img src="<?php echo base_url('assets/payment/pay-methods.png'); ?>" class="img-fluid"> 
                                
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php else : ?>
                <div class="row justify-content-md-center">
                    <div class="col-md-12 responsive-wrap">
                        <div class="booking-checkbox_wrap mb-2">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img src="<?php echo base_url('assets/frontend/default/images/empty-cart.png'); ?>" class="img-fluid" alt="<?php echo "empty-cart-logo"; ?>">
                                    <span class="d-block mt-2"><?php echo site_phrase('you_got_nothing_to_order'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
        <?php endif; ?>

   <?php else : ?>     
     <?php redirect('/'); ?> 
   <?php endif; ?>

    <?php else : ?>
        <div class="text-center">
            <h5><?php echo site_phrase('user_is_not_logged_in'); ?></h5>
        </div>
    <?php endif; ?>
</div>
</section>
