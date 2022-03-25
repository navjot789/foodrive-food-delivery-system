<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<script>
"use strict";
// Inputs
const valueInput = document.querySelector('input[type="text"]');
const colorInput = document.querySelector('input[type="color"]');

// Sync the color from the picker
const syncColorFromPicker = () => {
    valueInput.value = colorInput.value;
};

// Sync the color from the field
const syncColorFromText = () => {
    colorInput.value = valueInput.value;
};

// Bind events to callbacks
colorInput.addEventListener("input", syncColorFromPicker, false);
valueInput.addEventListener("input", syncColorFromText, false);

// Optional: Trigger the picker when the text field is focused
valueInput.addEventListener("focus", () => colorInput.click(), false);
valueInput.addEventListener("click", () => colorInput.click(), false);

// Refresh the text field
syncColorFromPicker();


// SHOW PREVIEW
function generateQrCode() {
    $("#qr-menu-preview-preloader").show();

    let restaurant_id = $("#restaurant_id").val();
    let foreground_color = $("#foreground_color").val();
    if(restaurant_id === '' || foreground_color === ''){
        toastr.error('<?php echo get_phrase('restaurant_and_foreground_color_can_not_be_empty'); ?>');
        $("#qr-menu-preview-preloader").hide();
    }else{
        $.ajax({
            url: '<?php echo site_url('qrmenu/generate'); ?>',
            type: 'POST',
            data: {
                restaurant_id : restaurant_id,
                foreground_color : foreground_color
            },
            success: function(response) {
                $("#qr-menu-preview").attr('src', '<?php echo base_url('uploads/qrcode/'); ?>'+response);
                $("#download-qrcode-btn").attr('href', '<?php echo site_url('qrmenu/download/'); ?>'+response);
                $("#delete-qrcode-btn").attr('href', '<?php echo site_url('qrmenu/delete/'); ?>'+response);
                $("#qrcode-name").val(response);
                $("#qr-menu-preview-preloader").hide();
                $("#qr-code-actions").show();
            }
        });
    }
}

// Custom script for init select2
initSelect2();
</script>
