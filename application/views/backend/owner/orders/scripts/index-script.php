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
    initDataTables(['orders'], 25);

    // initialize select2
    initSelect2();

    // initialize tooltips
    initToolTip();
</script>


<!-- live order script -->
<?php if ($order_type == "live") : ?>
    <script type="text/javascript">
        "use strict";
        setInterval(() => {
            var previousOrders = '<?php echo json_encode($orders); ?>';

            $.ajax({
                url: '<?php echo site_url('orders/live/data'); ?>',
                success: function(newOrders) {
                    if (JSON.stringify(newOrders) === JSON.stringify(previousOrders)) {
                        // nothing changed yet
                    } else {
                        $.ajax({
                            url: '<?php echo site_url('orders/live/view'); ?>',
                            success: function(liveOrders) {
                                $("#live-order-data").html(liveOrders);
                                // GET THE NUMBER OF PENDING ORDERS
                                $.ajax({
                                    url: '<?php echo site_url('orders/get_number_of_orders/pending'); ?>',
                                    success: function(numberOfPendingOrders) {
                                        $("#number-of-pending-orders-in-navbar").html(numberOfPendingOrders);
                                    }
                                });
                                // GET THE NUMBER OF PENDING ORDERS FOR TODAY
                                $.ajax({
                                    url: '<?php echo site_url('orders/get_number_of_todays_pending_orders'); ?>',
                                    success: function(numberOfPendingOrdersToday) {
                                        $("#number-of-pending-orders-in-navigation").html(numberOfPendingOrdersToday);
                                    }
                                });
                            }
                        });
                    }
                }
            });
        }, 5000);

        //Open close
        $( document ).ready(function() {
        $("input:checkbox").change(function() { 
              var id = this.id; 
              var interval = 500; 
                if($(this).is(":checked")) {
                        $.ajax({
                                url: "<?php echo site_url('restaurant/mode'); ?>",
                                type: "POST",
                                dataType: "json",
                                data: {id: id, status: '1' },
                                success: function (msg) {
                                    toastr.success(msg.for_res + ' Shop Online');
                                    $("#offline-mode").html("Loading...");
                                    setTimeout(function () {
                                        location.reload(true);
                                    }, interval);
                                }
                            });
                }else{
                        $.ajax({
                                url: "<?php echo site_url('restaurant/mode'); ?>", 
                                type: "POST",
                                dataType: "json",
                                data: {id: id, status: '0' },
                                success: function (msg) {
                                    toastr.warning(msg.for_res + ' Shop Offline');    
                                    setTimeout(function () {
                                        location.reload(true);
                                    }, interval);
                                }
                            });
                }
            
                });
        });   
            
//LIVE ORDER NOTIFICATION ALERT
    var old_count = 0;   
    var i = 0;
    let src = '<?php echo site_url('assets/backend/plugins/mp3/pristine.mp3'); ?>';
    let audio = new Audio(src);
    setInterval(function(){    
    $.ajax({
        type : "POST",
        url : "<?php echo site_url('orders/get_number_of_todays_pending_orders'); ?>",
        success : function(data)
        {
            if (data > old_count)
             {

                    if (i == 0) {
                        old_count = data;
                    } 
                    else {  
                            audio.play();
                            old_count = data;
                    }

            } i=1;
        }
    }); },500);

    </script>
<?php endif; ?>