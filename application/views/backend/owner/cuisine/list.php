<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><?php echo get_phrase('filter_cuisine'); ?></div>
            <div class="card-body">
                <form action="<?php echo site_url('cuisine/index'); ?>" method="GET">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><?php echo get_phrase('cuisine_type'); ?></label>
                                <select class="form-control select2 w-100" name="cuisine_type" id="cuisine_type">
                                    <option value="all" <?php if ($cuisine_type == "all") echo "selected"; ?>><?php echo get_phrase('all'); ?></option>
                                    <option value="me" <?php if ($cuisine_type == "me") echo "selected"; ?>><?php echo get_phrase('created_by_me'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <label class="text-white"><?php echo get_phrase('submit'); ?></label>

                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> <?php echo get_phrase('filter'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="alert alert-info alert-dismissible fade show lighten-info" role="alert">
            <strong><?php echo get_phrase('heads_up'); ?>!</strong>
            <p>
                <?php echo get_phrase('these_are_all_the_existing_cuisines'); ?>. <?php echo get_phrase('you_are_authorized_to_update_only_those_cuisines_which_are_created_by_yours'); ?>.
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <?php foreach ($cuisines as $cuisine) : ?>
        <div class="col-lg-3">

            <!-- Profile Image -->
            <div class="card min-height-266">
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

                    <p class=" text-center"><small class="text-muted"><?php echo count($this->restaurant_model->get_restaurants_by_cuisine(sanitize($cuisine['id']))) . ' ' . get_phrase('restaurants_registered'); ?></small></p>

                    <?php if ($cuisine['created_by'] == $this->session->userdata('user_id')) : ?>
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
                    <?php endif; ?>
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
