<!-- File Upload with Preview -->
<script src="<?php echo base_url('assets/backend/'); ?>js/file-upload-preview.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- DATE RANGE PICKER JS-->
<script src="<?php echo base_url('assets/backend/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<script type="text/javascript">
    "use strict";

    // initialize image previewer
    initPreviewer(['image_preview']);

    // Custom script for init select2
    initSelect2();

    // initialize datatable
    initDataTables(['orders'], 25);

    //Date range as a button
    initDateRangePicker(['daterange-btn']);

    // initialize tooltips
    initToolTip();
</script>