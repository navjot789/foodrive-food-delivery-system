<div class="card">
  <div class="card-body">
    <form action="<?php echo site_url('driver'); ?>" action="get">
      <div class="row justify-content-sm-center">
        <div class="col-lg-4">
          <div class="form-group">
            <label><?php echo get_phrase('status'); ?></label>
            <select class="form-control select2 w-100" name="status">
              <option value="approved" <?php if ($status == "approved") echo "selected"; ?>><?php echo get_phrase('approved'); ?></option>
              <option value="pending" <?php if ($status == "pending") echo "selected"; ?>><?php echo get_phrase('pending'); ?></option>
            </select>
          </div>
        </div>
        <div class="col-1">
          <div class="form-group mt-30">
            <button type="submit" class="btn btn-primary"><?php echo get_phrase('filter'); ?></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php if (count($drivers)) : ?>
  <div class="row justify-content-center">
    <?php foreach ($drivers as $key => $driver) : ?>
      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
        <div class="card bg-light">
          <div class="card-header text-muted border-bottom-0">
            <h2 class="lead"><b><?php echo sanitize($driver['name']); ?></b></h2>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <div class="text-muted text-sm mb-1"><i class="fas fa-calendar-week"></i> <b><?php echo get_phrase('This_week'); ?></b>:
                  <?php echo count($this->driver_model->get_this_week_delivered_order_data($driver['id'])) . ' ' . get_phrase('delivered'); ?>
                </div>
                <div class="text-muted text-sm mb-1"><i class="far fa-calendar-alt"></i> <b><?php echo get_phrase('This_Month'); ?></b>:
                  <?php echo count($this->driver_model->get_this_month_delivered_order_data($driver['id'])) . ' ' . get_phrase('delivered'); ?>
                </div>
                <div class="text-muted text-sm mb-1"><i class="far fa-calendar-check"></i> <b><?php echo get_phrase('Total'); ?></b>:
                  <?php echo count($this->driver_model->get_total_delivered_order_data($driver['id'])) . ' ' . get_phrase('delivered'); ?>
                </div>
                <div class="text-muted text-sm mb-1"><i class="fas fa-phone-square"></i> <b><?php echo get_phrase('Phone'); ?></b>: <?php echo sanitize($driver['phone']); ?> </div>
                <div class="text-muted text-sm mb-1"><i class="fas fa-truck-moving"></i> <b><?php echo get_phrase('vehicle'); ?></b>: <?php echo ucfirst(str_replace('_', ' ', sanitize($driver['vehicle_type']))); ?> </div>
              </div>
              <div class="col-5 text-center">
                <img src="<?php echo base_url('uploads/user/' . sanitize($driver['thumbnail'])); ?>" alt="" class="img-circle img-fluid">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-1">
                <?php if ($this->driver_model->in_ride(sanitize($driver['id']))) : ?>
                  <i class="fas fa-sm fa-circle text-success" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('currently_on_a_ride'); ?>"></i>
                <?php else : ?>
                  <i class="fas fa-sm fa-circle text-warning" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('ready_to_deliver'); ?>"></i>
                <?php endif; ?>
              </div>
              <div class="col-11">
                <div class="text-right">
                  <a href="<?php echo site_url('driver/profile/' . sanitize($driver['id'])); ?>" class="btn btn-sm btn-primary">
                    <?php echo get_phrase('View_Profile'); ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<nav aria-label="Page Navigation">
  <?php echo $this->pagination->create_links(); ?>
</nav>

<?php if (count($drivers) == 0) : ?>
  <?php isEmpty(); ?>
<?php endif; ?>
