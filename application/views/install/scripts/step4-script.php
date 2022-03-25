<script type="text/javascript">
    "use strict";
    $(document).ready(function() {
        $('#loader').hide();
        $('#install_button').click(function() {
            $('#loader').fadeIn();
            setTimeout(
                function() {
                    window.location.href = '<?php echo site_url('install/step4/confirm_install'); ?>';
                }, 5000);
        });
    });
</script>