
<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/default/js/init.js') ?>"></script>
<script>
  "use strict";

  // INITIALIZE TOOLTIPS
  initToolTip();


  // CART OPERATIONS
  function addToCart() {
    var resID = $('#rest-id').val();
    var menuId = $('#menu-id').val();
    var quantity = $('#quantity_for_menu').val();
    var note = $('#note').val();
    var variantId = $('#variant-id').val();
    var addons = $('#addons').val();

    $.ajax({
      url: '<?php echo site_url('cart/add_to_cart'); ?>',
      type: 'POST',
      data: {
        resID: resID,
        menuId: menuId,
        quantity: quantity,
        note: note,
        variantId: variantId,
        addons: addons
      },
      dataType: "JSON",
      success: function(response) {

         var data = JSON.parse(JSON.stringify(response));
         var keyCount  = Object.keys(response).length;

        if (data.status == 0 || response == false || keyCount == 1) {
          toastr.warning('<?php echo site_phrase('please_login_first'); ?>');
        }
        else {

           if (data.status == 1 && data.total_cart_items !=='' && keyCount == 2) {
              $('.cart-items').text(data.total_cart_items);

              toastr.success('<?php echo site_phrase('added_to_the_cart'); ?>');
              $(".modal").modal('hide');
            }
            else if (data.status == 2 && data.status_msg == 'cleared' && data.total_cart_items !=='' && keyCount == 3) {
             $('.cart-items').text(data.total_cart_items);
              toastr.success('<?php echo site_phrase('cart_reset'); ?>');
               $(".modal").modal('hide');
            }
            else if (data.status == 3 && data.total_cart_items !=='' && keyCount == 3) {
             $('.cart-items').text(data.total_cart_items);
              //toastr.error('<?php echo site_phrase('Checkout_address_not_added_yet_please_update_your_address'); ?>');
              window.location.href = data.url;
            }
           //$('#json_decode').text(data.status);
        }

      }
    });
  }

  // CHANGING QUANTITY ON INCREMENT OR DECREMENT BUTTON CLICK
  function changeQuantity(flag) {
    var currentQuantity = $("#quantity_for_menu").val();
    if (flag === 1) {
      currentQuantity++;
    } else {
      if (currentQuantity > 1) {
        currentQuantity--;
      } else {
        currentQuantity = 1;
        toastr.warning('<?php echo site_phrase('minimum_quantity_is'); ?>: 1');
      }
    }

    $("#quantity_for_menu").val(currentQuantity);
    calculateMenuPrice();
  }


  // CALCULATE MENU PRICE AFTER CHOOSING MENU VARIANTS
  function calculateMenuPrice() {
    var selectedVariants;
    var selectedAddons;
    var quantity;
    var menuId = $("#menu-id").val();
    var count = $("#variant-count").val();

    quantity = $('#quantity_for_menu').val();

    $('input:radio').each(function() {
      if ($(this).is(':checked')) {
        selectedVariants = selectedVariants ? selectedVariants + ',' + $(this).val() : $(this).val();
      }
    });

    $('input:checkbox').each(function() {
      if ($(this).is(':checked')) {
        selectedAddons = selectedAddons ? selectedAddons + ',' + $(this).val() : $(this).val();
      }
    });

    $.ajax({
      url: '<?php echo site_url('cart/get_menu_details_with_variants_and_addons'); ?>',
      type: 'POST',
      data: {
        menuId: menuId,
        selectedVariants: selectedVariants,
        selectedAddons: selectedAddons,
        quantity: quantity
      },
      success: function(response) {
        response = JSON.parse(response);
        if (response.status) {
          $(".calculated-price").text(response.currencyCode + response.totalPrice);
          $(".calculated-price").removeClass("d-none");
          $(".fa-circle-notch").addClass('d-none');

          $("#menu-id").val(response.menuId);
          $("#addons").val(response.addons);
          if (response.hasVariant) {
            $("#variant-id").val(response.variantId);
              if(count == response.variantCount) {
                $('.btn-success').prop("disabled", false);
                $("#message-response").html("");
              } else {
                $('.btn-success').prop("disabled", true);
                $("#message-response").html('<div class="alert alert-warning p-1" role="alert"><i class="fas fa-hand-pointer" ></i> Please select all the required options above!</div>');
              }
          }
        } else {
          $("#addons").val(null);
          $("#variant-id").val(null);
          $('.btn-success').prop("disabled", true);
          $(".calculated-price").addClass("d-none");
          $(".fa-circle-notch").removeClass('d-none');
        }
      }
    });
  }

// scroll to top 
$(document).ready(function(){
  $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
      } else {
        $('#back-to-top').fadeOut();
      }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 400);
      return false;
    });
});


  // MAP INITIALIZING
  //https://developers.google.com/maps/documentation/embed/embedding-map
$(document).ready(function() {   
  
    var width = 350;
    var height = 350;
    var zoom = 20;
    var embed='';

    <?php
      if (!empty($restaurant_details['address'])) {
    ?>   
         var addr = '<?php echo sanitize($restaurant_details['address']); ?>';  

          embed= "<iframe width='"+width+"' height='"+height+"' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'src='https://www.google.com/maps?q="+addr+"&amp;output=embed'></iframe>";

     <?php
      }else if (!empty($restaurant_details['latitude']) && !empty($restaurant_details['longitude'])) {
    ?>
         
           var lat = '<?php echo sanitize($restaurant_details['latitude']); ?>';
           var lon = '<?php echo sanitize($restaurant_details['longitude']); ?>';

          embed= "<iframe width='"+width+"' height='"+height+"' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?q="+lat+","+lon+"&hl=es&z="+zoom+"&amp;output=embed' ></iframe>"; 

    <?php
      }else {
    ?>
      embed= "<p class='text-danger'>Error: Gmap coordinates and address not defined by restaurant!</p>"; 

    <?php
      }
    ?>
         
    $('#maps').html(embed);
}); 
</script>
