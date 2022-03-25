<?php
$role = $this->session->userdata('user_role');
$current_user = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
$exploded = explode('/', $page_name);
$parent_dir = $exploded[0];
$file_name  = $exploded[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- LOAD METAS -->
    <?php include 'partials/metas.php'; ?>
    <!-- LOAD STYLES -->
    <?php include 'partials/styles.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" 
 <?php if(get_system_settings('inspect_elements') == 'true'){ ?> oncontextmenu="return false" <?php }?> >
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'partials/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include $role . '/navigation/index.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php include $role . '/' . $page_name . '.php'; ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include 'partials/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <!-- LOAD SCRIPTS -->
    <?php include 'partials/scripts.php'; ?>

    <!-- MODAL SCRIPTS -->
    <?php include 'partials/modal.php'; ?>
</body>

</html>