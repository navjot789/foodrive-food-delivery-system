<?php
$db_file_write_perm = is_writable('application/config/database.php');
$routes_file_write_perm = is_writable('application/config/routes.php');
$curl_enabled = function_exists('curl_version');
if ($db_file_write_perm == false || $routes_file_write_perm == false || $curl_enabled == false) {
    $valid = false;
} else {
    $valid = true;
}
?>
<div class="row mt-30">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default border-gray" data-collapsed="0">
                    <!-- panel body -->
                    <div class="panel-body font-14">
                        <p class="font-14">
                            We ran diagnosis on your server. Review the items that have a red mark on it. If everything is green, you
                            are good to go to the next step.
                        </p>
                        <br>
                        <p class="font-14">
                            <?php if ($db_file_write_perm == true) { ?>
                                <i class="fas fa-check-circle text-success"></i>
                            <?php } else { ?>
                                <i class="fas fa-times-circle text-danger"></i>
                            <?php } ?>
                            <strong>application/config/database.php </strong>: file has write permission
                        </p>
                        <p class="font-14">
                            <?php if ($routes_file_write_perm == true) { ?>
                                <i class="fas fa-check-circle text-success"></i>
                            <?php } else { ?>
                                <i class="fas fa-times-circle text-danger"></i>
                            <?php } ?>
                            <strong>application/config/routes.php </strong>: file has write permission
                        </p>
                        <p class="font-14">
                            <?php if ($curl_enabled == true) { ?>
                                <i class="fas fa-check-circle text-success"></i>
                            <?php } else { ?>
                                <i class="fas fa-times-circle text-danger"></i>
                            <?php } ?>
                            <strong>Curl Enabled</strong>
                        </p>
                        <p class="font-14">
                            <strong>To continue the installation process, all the above requirements are needed to be checked</strong>
                        </p>
                        <br>
                        <?php if ($valid == true) { ?>
                            <p>
                                <?php if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') { ?>
                                    <a href="<?php echo site_url('install/step3'); ?>" class="btn btn-info">
                                        Continue
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php echo site_url('install/step2'); ?>" class="btn btn-info">
                                        Continue
                                    </a>
                                <?php } ?>
                            </p>
                        <?php } ?>

                        <?php if ($valid != true) { ?>
                            <p>
                                <a href="<?php echo site_url('install/step1'); ?>" class="btn btn-info">
                                    <i class="mdi mdi-refresh"></i>Reload
                                </a>
                            </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
