<!-- DATE RANGE PICKER JS-->
<script src="<?php echo base_url('assets/backend/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>
<!-- Bootstrap toogle switch -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">
    "use strict";
    //Date range as a button
    initDateRangePicker(['daterange-btn']);

    // initialize datatable
    initDataTables(['orders']);

    // initialize tooltips
    initToolTip();

    // initialize select2
    initSelect2();
</script>


<!-- LIVE ORDER SCRIPT -->
<?php if ($order_type == "today") : ?>
    <script type="text/javascript">
        "use strict";
        setInterval(() => {
            var previousOrders = '<?php echo json_encode($orders); ?>';

            $.ajax({
                url: '<?php echo site_url('orders/live/data'); ?>',
                success: function(newOrders) {
                    if (JSON.stringify(newOrders) === JSON.stringify(previousOrders)) {
                        // console.log("Nothing changed");
                    } else {
                        // console.log("something changed");
                        $.ajax({
                            url: '<?php echo site_url('orders/live/view'); ?>',
                            success: function(liveOrders) {
                                $("#live-order-data").html(liveOrders);
                            }
                        });
                    }
                }
            });
        }, 5000);


    $( document ).ready(function() {
        $("input:checkbox").change(function() { 
            if($(this).is(":checked")) { 
                    $.ajax({
                            url: "<?php echo site_url('driver/mode'); ?>",
                            type: "POST",
                            dataType: "json",
                            data: { status: '1' },
                            success: function (msg) {
                                toastr.success('Driver Online');
                                $("#offline-mode").html("Loading...");
                            }
                        });
            }else{
                    $.ajax({
                            url: "<?php echo site_url('driver/mode'); ?>", 
                            type: "POST",
                            dataType: "json",
                            data: { status: '0' },
                            success: function (msg) {
                                toastr.warning('Driver Offline');    
                            }
                        });
            }
           
            });
    });   
        
    </script>
<?php endif; ?>