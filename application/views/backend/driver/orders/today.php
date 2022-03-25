<?php $driver_data = $this->driver_model->get_yesterday_orders();  ?>
<?php if(count($driver_data) > 0) :?>
        <div class="row">
            <div class="card text-white bg-dark w-100" >
                <div class="card-header"><i class="fas fa-concierge-bell" ></i> Yesterday Orders</div>
                    <div class="card-body">
                        <?php foreach($driver_data as $yesterday) :?>
                            <div class="card bg-light w-100" style="margin-bottom:1px;">
                                <div class="card-header">
                                     <div class="row">
                                        <div class="col-8 "> 
                                             <div class="row">
                                                    <div class="col-8">
                                                        <small><a href="<?php echo site_url('orders/details/'.$yesterday['code']); ?>">#<?php echo sanitize($yesterday['code']);?></a></small>
                                                    </div> 
                                                    <div class="col-4">
                                                      
                                                    <?php if (sanitize($yesterday['order_status']) == 'pending') : ?>
                                                        <span class="badge badge-warning lighten-warning"><?php echo get_phrase(sanitize($yesterday['order_status'])); ?></span>
                                                    <?php elseif (sanitize($yesterday['order_status']) == 'preparing') : ?>
                                                        <span class="badge badge-success bg-maroon"><?php echo get_phrase(sanitize($yesterday['order_status'])); ?></span>
                                                    <?php elseif (sanitize($yesterday['order_status']) == 'prepared') : ?>
                                                        <span class="badge badge-danger bg-purple"><?php echo get_phrase(sanitize($yesterday['order_status'])); ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-primary lighten-primary"><?php echo get_phrase(sanitize($yesterday['order_status'])); ?></span>
                                                    <?php endif; ?>

                                                    </div> 
                                                </div>
                                        </div>
                                        <div class="col-4">
                                              <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                  <a type="button" class="btn btn-default btn-xs"><?php echo date('h:i A', sanitize($yesterday['order_placed_at'])); ?></a>
                                                  <a type="button" href="<?php echo site_url('orders/details/'.$yesterday['code']); ?>" class="btn btn-info btn-xs"><i class="fas fa-info-circle"></i></a>
                                               </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
<?php endif;?>

<div class="row justify-content-center" id="live-order-data">
    <?php include 'live-data.php'; ?>
</div>