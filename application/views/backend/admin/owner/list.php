<div class="card">
  <div class="card-body">
    <form action="<?php echo site_url('owner'); ?>" action="get">
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

<?php if (count($owners)) : ?>
  <div class="row justify-content-center">
    <?php foreach ($owners as $key => $owner) : ?>
      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
        <div class="card bg-light">
          <div class="card-header text-muted border-bottom-0">
            <h2 class="lead"><b><?php echo sanitize($owner['name']); ?></b></h2>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <div class="text-muted text-sm mb-1"><i class="far fa-calendar-check"></i> <b><?php echo get_phrase('approved_restaurants'); ?></b>:
                  <?php if (sanitize($owner['number_of_approved_restaurants'])) : ?>
                    <?php echo sanitize($owner['number_of_approved_restaurants']); ?>
                  <?php else : ?>
                    <span class="badge badge-danger lighten-danger"><?php echo sanitize($owner['number_of_approved_restaurants']); ?></span>
                  <?php endif; ?>
                </div>
                <div class="text-muted text-sm mb-1"><i class="far fa-calendar-times"></i> <b><?php echo get_phrase('pending_restaurants'); ?></b>:
                  <?php if (sanitize($owner['number_of_pending_restaurants'])) : ?>
                    <?php echo sanitize($owner['number_of_pending_restaurants']); ?>
                  <?php else : ?>
                    <span class="badge badge-danger lighten-danger"><?php echo sanitize($owner['number_of_pending_restaurants']); ?></span>
                  <?php endif; ?>
                </div>
                <div class="text-muted text-sm mb-1"><i class="fas fa-phone-square"></i> <b><?php echo get_phrase('Phone'); ?></b>: <?php echo getter(sanitize($owner['phone']), get_phrase('not_found')); ?> </div>
                <div class="text-muted text-sm mb-1"><i class="fas fa-map-signs"></i> <b><?php echo get_phrase('adress'); ?></b>: <?php echo getter(ellipsis(sanitize($owner['address_1']), 40), get_phrase('not_found')); ?> </div>
              </div>
              <div class="col-5 text-center">
                <img src="<?php echo base_url('uploads/user/' . sanitize($owner['thumbnail'])); ?>" alt="" class="img-circle img-fluid">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-12">
                <div class="text-right">
                  <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('owner/delete/' . sanitize($owner['id'])); ?>')" class="btn btn-sm bg-danger" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('delete'); ?>">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                  <a href="<?php echo site_url('owner/profile/' . sanitize($owner['id']) . '/profile'); ?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('edit'); ?>">
                    <i class="fas fa-user-edit"></i>
                  </a>
                  <a href="<?php echo site_url('owner/profile/' . sanitize($owner['id'])); ?>" class="btn btn-sm btn-primary">
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

<?php if (count($owners) == 0) : ?>
  <?php isEmpty(); ?>
<?php endif; ?>
