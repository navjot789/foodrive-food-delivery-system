<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>

<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<script type="text/javascript">
    "use strict";

    // initialize select2
    initSelect2();
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("input:checkbox").change(function() { 

             var string = this.id;
             var type = string.split('-')[0];
             var menu = string.split('-')[1];
            if($(this).is(":checked")) { 
                $.ajax({
                    url: '<?php echo site_url('menu/activator'); ?>',
                    type: 'POST',
                    dataType: "json",
                    data: { menu:menu, type:type, status: "1" },
                    success:function(data) {
                        if(data.code == 503){
                            toastr.warning('your are not authorized');
                        }else if(data.code == 200 && data.type == "availability"){
                            toastr.success('Menu has been enabled');
                            $('#stock-'+ menu).removeClass('badge-danger');
                            $('#stock-'+ menu).addClass('badge-success');
                            $('#stock-'+ menu).html('Available');
                            $('#card-container-'+ menu).addClass('card-primary');
                            $('#card-container-'+ menu).removeClass('card-danger');
                            $('#menu-btn-'+ menu).addClass('btn-primary');
                            $('#menu-btn-'+ menu).removeClass('btn-secondary');

                        }
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo site_url('menu/activator'); ?>',
                    type: 'POST',
                    dataType: "json",
                    
                    data: { menu:menu, type:type, status: "0" },
                    success:function(data) {

                        if(data.code == 503){
                            toastr.warning('your are not authorized');
                        }else if(data.code == 200 && data.type == "availability"){
                            toastr.success('Menu has been Disabled');
                            $('#stock-'+ menu).removeClass('badge-success');
                            $('#stock-'+ menu).addClass('badge-danger');
                            $('#stock-'+ menu).html('Not available');
                            $('#card-container-'+ menu).addClass('card-danger');
                            $('#card-container-'+ menu).removeClass('card-primary');
                            $('#menu-btn-'+ menu).addClass('btn-secondary');
                            $('#menu-btn-'+ menu).removeClass('btn-primary');
                        }
                    }
                });
            }
        }); 
    });
</script>