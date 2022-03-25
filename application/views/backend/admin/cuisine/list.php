<div class="row justify-content-center">
    <?php foreach ($cuisines as $cuisine) : ?>
        <div class="col-lg-3">

            <!-- Profile Image -->
            <div class="card">
                <?php if ($cuisine['is_featured']) : ?>
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-cyan">
                            <?php echo get_phrase('featured'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle light-thumb-circle" src="<?php echo base_url('uploads/cuisine/' . sanitize($cuisine['thumbnail'])); ?>" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"><?php echo sanitize($cuisine['name']); ?></h3>

                    <p class=" text-center"><small class="text-muted"><?php echo count($this->restaurant_model->get_restaurants_by_cuisine($cuisine['id'])) . ' ' . get_phrase('restaurants_registered'); ?></small></p>

                    <div class="row">
                        <div class="col">
                            <a href="<?php echo site_url('cuisine/edit/' . sanitize($cuisine['id'])); ?>" class="btn btn-block btn-rounded btn-outline-primary">
                                <i class="fas fa-pencil-alt"></i> <?php echo get_phrase('edit'); ?>
                            </a>
                        </div>
                        <div class="col">
                            <a href="javascript:void(0);" class="btn btn-block btn-rounded btn-outline-danger" onclick="confirm_modal('<?php echo site_url('cuisine/delete/' . sanitize($cuisine['id'])); ?>')">
                                <i class="fas fa-trash-alt"></i> <?php echo get_phrase('delete'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    <?php endforeach; ?>
</div>

<nav aria-label="Page Navigation">
    <?php echo $this->pagination->create_links(); ?>
</nav>

<?php if (count($cuisines) == 0) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>