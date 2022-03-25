<!-- TIME PICKER -->
<script src="<?php echo base_url('assets/backend/'); ?>js/bootstrap-clockpicker.min.js"></script>

<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<!-- Custom script for init select2 -->
<script type="text/javascript">
    "use strict";

    // initializing clockpicker
    initClockPicker();
</script>


<script type="text/javascript">
  //selection of delivery time 

$(function() {
    $('input[name="time"]').on('click', function() {
        if ($(this).val() == 'max') {
            $('#max-time-selection').show();
            $('#avg-time-selection').hide();
            $("#avg_time_to_deliver").val('');
        }
        else if ($(this).val() == 'avg') {
            $('#avg-time-selection').show();
            $('#max-time-selection').hide();
            $("#maximum_time_to_deliver").val('');
        }
       
    });
});

</script>
