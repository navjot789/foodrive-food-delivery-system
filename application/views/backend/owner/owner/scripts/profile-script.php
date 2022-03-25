<!-- File Upload with Preview -->
<script src="<?php echo base_url('assets/backend/'); ?>js/file-upload-preview.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Initializer -->
<!-- DataTables -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Leaflet JS -->
<script src="<?php echo base_url('assets/global/leaflet/leaflet.js'); ?>"></script>

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

    // initialize tooltips
    initToolTip();

    // MAP 1 INITIALIZING
    var map = L.map('mapid1').setView([<?php echo !empty($owner['coordinate_1']['latitude']) ? floatval(sanitize($owner['coordinate_1']['latitude'])) : 0; ?>, <?php echo !empty($owner['coordinate_1']['longitude']) ? floatval(sanitize($owner['coordinate_1']['longitude'])) : 0; ?>], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.marker([<?php echo !empty($owner['coordinate_1']['latitude']) ? floatval(sanitize($owner['coordinate_1']['latitude'])) : 0; ?>, <?php echo !empty($owner['coordinate_1']['longitude']) ? floatval(sanitize($owner['coordinate_1']['longitude'])) : 0; ?>]).addTo(map)
        .bindPopup('<?php echo sanitize($owner['address_1']); ?>');


    // MAP 2 INITIALIZING
    var map = L.map('mapid2').setView([<?php echo !empty($owner['coordinate_2']['latitude']) ? floatval(sanitize($owner['coordinate_2']['latitude'])) : 0; ?>, <?php echo !empty($owner['coordinate_2']['longitude']) ? floatval(sanitize($owner['coordinate_2']['longitude'])) : 0; ?>], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.marker([<?php echo !empty($owner['coordinate_2']['latitude']) ? floatval(sanitize($owner['coordinate_2']['latitude'])) : 0; ?>, <?php echo !empty($owner['coordinate_2']['longitude']) ? floatval(sanitize($owner['coordinate_2']['longitude'])) : 0; ?>]).addTo(map)
        .bindPopup('<?php echo sanitize($owner['address_2']); ?>');

    // MAP 3 INITIALIZING
    var map = L.map('mapid3').setView([<?php echo !empty($owner['coordinate_3']['latitude']) ? floatval(sanitize($owner['coordinate_3']['latitude'])) : 0; ?>, <?php echo !empty($owner['coordinate_3']['longitude']) ? floatval(sanitize($owner['coordinate_3']['longitude'])) : 0; ?>], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.marker([<?php echo !empty($owner['coordinate_3']['latitude']) ? floatval(sanitize($owner['coordinate_3']['latitude'])) : 0; ?>, <?php echo !empty($owner['coordinate_3']['longitude']) ? floatval(sanitize($owner['coordinate_3']['longitude'])) : 0; ?>]).addTo(map)
        .bindPopup('<?php echo sanitize($owner['address_3']); ?>');
</script>
