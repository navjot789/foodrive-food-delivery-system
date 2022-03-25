
<div class="test sticky-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar">

                      <?php if(current_url() !== site_url('site/findRestaurants')) :?>

                              <?php if(current_url() == site_url('cart')) :?>
                                <!--WHEN USER ON CART PAGE-->
                                <?php $restaurant_ids = $this->cart_model->get_restaurant_ids();
                                      if(count($restaurant_ids) > 0) {
                                        foreach ($restaurant_ids as $restaurant_id) :
                                            $restaurant_details = $this->restaurant_model->get_by_id($restaurant_id);?>   
                                            <a class="shadow-sm btn btn-light rounded-pill" href="<?php echo site_url('site/restaurant/' . rawurlencode(sanitize($restaurant_details['slug'])) . '/' . sanitize($restaurant_details['id'])); ?>"><i class="far fa-arrow-alt-circle-left"></i> Go back</a> 
                                  <?php endforeach;
                                        } else { ?>
                                            <a class="shadow-sm btn btn-light rounded-pill" href="<?php echo site_url('site/findRestaurants'); ?>"><i class="far fa-arrow-alt-circle-left"></i> Go back</a> 
                                  <?php }?>
                               
                              <?php elseif(current_url() == site_url('checkout')) : ?>
                                <!--WHEN USER ON CHECKOUT PAGE-->
                                <a class="shadow-sm btn btn-light rounded-pill" href="<?php echo site_url('cart'); ?>"><i class="far fa-arrow-alt-circle-left"></i> Go back</a> 
                              <?php else : ?>
                                <!--WHEN USER ON RESTAURANT/SEARCH PAGE-->
                                <a class="shadow-sm btn btn-light rounded-pill" href="<?php echo site_url('site/findRestaurants'); ?>"><i class="far fa-arrow-alt-circle-left"></i> Go back</a>  
                              <?php endif;?>

                      <?php else: ?>
                        <!--WHEN PAGE RESTAURNAT LIST OR HOMEPAGE-->
                        <a class="navbar-brand p-0" href="<?php echo site_url(); ?>">
                            <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="system-icon"> 
                        </a> 
                      <?php endif;?>
                            
                    <div class="d-flex justify-content-end">
                        <div class="p-0"><a  href="javascript:void(0)" data-toggle="modal" data-target="#change-location" class="text-muted btn p-2 rounded-pill shadow-sm" style="margin-right:4px;" ><small><i class="fas fa-map-marked-alt fa-lg"></i>  <?php echo $this->session->userdata('streetNumber').', '.$this->session->userdata('streetName'); ?></small></a></div>
                        <div class="p-0"><a  href="<?php echo site_url('login'); ?>" class="text-info btn  rounded-pill p-2 shadow-sm"><?php echo sanitize($this->session->userdata('is_logged_in')) ? '<i class="far fa-user-circle fa-lg"></i>' : '<i class="fas fa-sign-in-alt fa-lg"></i>'; ?></a></div>
                    </div>
                     
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- LOCATION SEARCH MODEL (trigger found in navigation)-->
<div class="modal fade" id="change-location" tabindex="-1" role="dialog" aria-labelledby="change-location" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style=" border-bottom: 0 none;">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-search-location"></i> Change your location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  class="form-wrap" method="POST">
          <style>
                  /**This help to display google autofill address inside the model */
                  .pac-container {
                      z-index: 100000;
                  }
              
              </style>
              <div class="input-group mb-1">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                  </div>
                  <input type="text" id="search-location" name="search-location" class="form-control " placeholder="Enter your full address..." value=" <?php echo sanitize($this->session->userdata('fullAddress')); ?>">
                  <input type="hidden" name="latitude_1" id="latitude_1" value="" readonly>
                  <input type="hidden" id="longitude_1" name="longitude_1" value="" readonly>
              </div>
        </form>
        <div class="d-flex justify-content-center">
          <div class="p-2"><a href="<?php echo site_url('site/findRestaurants');?>" class="btn btn-warning text-white" ><i class="fas fa-store"></i> Restaurant List</a></div>
          <div class="p-2"><button type="submit" class="btn btn-success" id="find"><i class="fas fa-search"></i> Search</button></div>
        </div>
      </div>
       
    </div>
  </div>
</div>
