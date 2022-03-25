<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>

<!-- MAIN CONTENT -->
<section class=" light-bg booking-details_wrap">
    <div class="container-fluid">
        <?php if ($this->session->userdata('customer_login')) : ?>
            <?php $customer_details = $this->customer_model->get_by_id($this->session->userdata('user_id')); ?>
            <div class="row">

                <?php if (!$this->session->flashdata('confirm_order')) : //remove once only?>
                    <div class="col-md-3 responsive-wrap">

                        <div class="contact-info p-2 shadow-sm rounded">
                            <div class="delivery-address-list"><i class="ti-direction-alt"></i> <?php echo site_phrase('choose_delivery_address', true); ?></div>
                            <div class="iframe-rwd">
                                <div id="mapid" class="mb-1 address-map img-thumbnail"></div>
                                <span id="error-map"> </span>
                            </div>
                        
                            <?php if (!empty($customer_details['address_1'])) : ?>
                                <div class="callout callout-warning">
                                    <a href="<?php echo site_url('settings/profile');?>" class="btn btn-sm btn-success rounded-circle float-right"><i class="fas fa-pencil-alt" ></i></a>
                                    <input type="radio" name="address" value="1" onchange="toggleMap(this.value)" checked disabled> <strong><?php echo site_phrase('address'); ?> : </strong> <?php echo sanitize($customer_details['address_1']); ?> 
                                </div>
                            <?php endif; ?>
                        
                        </div>
                    </div>
                    <?php endif; ?>

                <div class="col-md-6 responsive-wrap">
                    <?php include 'list.php'; ?>
                </div>

                <?php
                $restaurant_ids = $this->cart_model->get_restaurant_ids();
                if (count($restaurant_ids) > 0) : ?>
                    <div class="col-md-3 responsive-wrap">
                        <div class="booking-checkbox_wrap mt-1 shadow-sm rounded" >
                            <?php $wallet_balance = $this->transaction_model->wallet_balance();
                                    if($wallet_balance > 0):?>
                                    <!--Wallet structure-->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card p-2">
                                            <div class="d-flex d-block">
                                                <div class="form-check">
                                                <input class="mt-2" id="check-wallet" type="checkbox" style="zoom:1.4;"  <?php echo ($this->session->userdata('wallet') == 1) ? "checked":"";?>>
                                                <label for="check-wallet"></label>
                                                </div>
                                                <div class="ml-2">   
                                                    <h6 class="mb-0" style="font-size:20px;">FD Credits</h6>
                                                    <small class="text-muted">Available Balance: <strong class="text-success" id="show-balance"><?php echo currency($wallet_balance);?></strong></small>     
                                                </div> 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                            <div id="cart-summary">
                                <?php include 'summary.php'; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        <?php else : ?>

            <div class="container-fluid"> 
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-12">  
                            <div class="alert alert-info" role="alert">
                                    <h5><i class="fas fa-exclamation-circle"></i> User is not logged in!</h5>
                                </div>
                                <img src="https://ik.imagekit.io/l4f8iqzrdp1c/Tablet_login-pana_XQCKn1Asj.png?updatedAt=1641293223144" class="img-fluid">    
                            <a  href="<?php echo site_url('login');?>" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </div>
                        </div>
                        
                    </div>
            </div>
        <?php endif; ?>
    </div>
</section>
