<!-- Info boxes -->
<div class="row">


    <!-- TILE 1 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-lightblue"><i class="fas fa-hamburger"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total'); ?> <small>(<?php echo get_phrase('by_now'); ?>)</small></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('order_placed', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize($this->order_model->get_number_of_orders()); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 1 ENDS -->

    <!-- TILE 2 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-stroopwafel"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total'); ?> <small>(<?php echo get_phrase('by_now'); ?>)</small></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('order_processed', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize($this->order_model->get_number_of_orders('processed')); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 2 ENDS -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <!-- TILE 3 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-truck-loading"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total'); ?> <small>(<?php echo get_phrase('by_now'); ?>)</small></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('order_delivered', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize($this->order_model->get_number_of_orders('delivered')); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 3 ENDS -->

    <!-- TILE 4 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-gradient-warning"><i class="fas fa-exclamation-triangle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total'); ?> <small>(<?php echo get_phrase('by_now'); ?>)</small></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('order_canceled', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize($this->order_model->get_number_of_orders('canceled')); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 4 ENDS -->
</div>

<div class="row">
    <!-- TILE 5 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-gradient-olive"><i class="fas fa-utensils"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('approved'); ?></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('restaurant', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize(count($this->restaurant_model->get_all_approved())); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 5 ENDS -->

    <!-- TILE 6 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-gray-dark"><i class="fas fa-concierge-bell"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('pending'); ?></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('restaurant', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize(count($this->restaurant_model->get_all_pending())); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 6 ENDS -->

    <!-- TILE 7 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-gradient-maroon"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('registered'); ?></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('active_customers', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize(count($this->customer_model->get_approved_customers(2))); ?>

                </span>
            </div>
        </div>
    </div>
    <!-- TILE 7 ENDS -->

    <!-- TILE 8 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-gradient-gray"><i class="fas fa-biking"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('registered'); ?></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('delivery_man', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize(count($this->driver_model->get_approved_drivers())); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 8 ENDS -->
</div>
<!-- /.row -->

<div class="row">

    
    <!-- TILE 1 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-chart-line" ></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('After'); ?> <small>(<?php echo get_phrase('Refund'); ?>)</small></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('Total_Revenue', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo currency(sanitize(format($this->report_model->get_admin_comissions()))); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 1 ENDS -->

</div>