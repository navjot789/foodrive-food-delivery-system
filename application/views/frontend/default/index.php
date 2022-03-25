<?php
$exploded = explode('/', $page_name);
$parent_dir = $exploded[0];
$file_name  = $exploded[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- METAS -->
    <?php include "partials/metas.php"; ?>
    <!-- STYLES -->
    <?php include 'partials/styles.php'; ?>
</head>
<body <?php if(get_system_settings('inspect_elements') == 'true'){ ?> oncontextmenu="return false" <?php }?>>
    <!-- MAIN CONTENT -->
    <?php include $page_name . '.php'; ?>
    <!-- FOOTER -->
    <?php include 'partials/footer.php'; ?>
    <!-- SCRIPTS -->
    <?php include 'partials/scripts.php'; ?>
    <!-- MODAL -->
    <?php include 'partials/modal.php'; ?>

</body>
</html>
