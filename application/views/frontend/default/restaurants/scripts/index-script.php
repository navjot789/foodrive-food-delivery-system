<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/default/js/init.js') ?>"></script>

<script>
  "use strict";
  $(window).scroll(function() {
    // 100 = The point you would like to fade the nav in.

    if ($(window).scrollTop() > 100) {

      $('.fixed').addClass('is-sticky');

    } else {

      $('.fixed').removeClass('is-sticky');

    };
  });

  // INITIALIZE TOOLTIPS
  initToolTip();
</script>