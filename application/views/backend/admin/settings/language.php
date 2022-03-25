<!-- Content Header -->
<?php include 'header.php'; ?>

<!-- MAIN CONTENT -->
<section class="content">
    <div class="container-fluid">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo get_phrase('system_language', true); ?></h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><?php echo sanitize($system_language['name']); ?></td>
                                            <td class="text-center"> <a href="<?php echo site_url('language/phrase/' . sanitize($system_language['code'])); ?>" class="btn btn-xs bg-teal"><?php echo get_phrase('edit_phrase'); ?></a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo get_phrase('add_new_language', true); ?></h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo site_url('language/store'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="language_name"><?php echo get_phrase("language_name"); ?><span class="text-danger">*</span></label>
                                        <input type="text" id="language_name" class="form-control" name="language_name" placeholder="<?php echo get_phrase("enter_language_name"); ?>" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="language_code"><?php echo get_phrase("language_code"); ?><span class="text-danger">*</span></label>
                                        <input type="text" id="language_code" class="form-control" name="language_code" placeholder="<?php echo get_phrase("enter_language_code"); ?>, <?php echo get_phrase("it_has_to_be_two_characters"); ?>" value="" required>
                                        <small class="text-danger"><b>N.B:</b> <?php echo get_phrase('special_characters_in_language_code_is_not_allowed'); ?></small>
                                    </div>
                                    <button class="btn btn-primary"><?php echo get_phrase('add_new_language'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <?php if (count($languages)) : ?>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <?php echo get_phrase("list_of_languages", true); ?>
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="languages" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo get_phrase("language"); ?></th>
                                                        <th><?php echo get_phrase("code"); ?></th>
                                                        <th><?php echo get_phrase("action"); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($languages as $language) : ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo ucfirst(sanitize($language['name'])); ?>
                                                                <?php if ($system_language['code'] == $language['code']) : ?>
                                                                    <span class="badge badge-success lighten-success"><?php echo get_phrase('active'); ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo sanitize($language['code']); ?></td>
                                                            <td class="text-center">
                                                                <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('language/set_system_language/' . sanitize($language['code'])); ?>')"><?php echo get_phrase("set_as_system_language"); ?></a></li>
                                                                    <li><a class="dropdown-item" href="<?php echo site_url('language/phrase/' . sanitize($language['code'])); ?>"><?php echo get_phrase("edit_phrase"); ?></a></li>
                                                                    <?php if ($system_language['code'] != $language['code']) : ?>
                                                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('language/delete/' . sanitize($language['id'])); ?>')"><?php echo get_phrase("delete"); ?></a></li>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th><?php echo get_phrase("language"); ?></th>
                                                        <th><?php echo get_phrase("code"); ?></th>
                                                        <th><?php echo get_phrase("action"); ?></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!count($languages)) : ?>
                            <?php isEmpty(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>