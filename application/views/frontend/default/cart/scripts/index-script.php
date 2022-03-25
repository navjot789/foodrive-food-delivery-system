
<script>
    "use strict";
    // CART OPERATIONS
    function updateCart(cartId, isIncreased) {
        var currentQuantity = $('#cart-quantity-' + cartId).text();

        // SHOWING PLACEHOLDERS
        $(".summary-loader").removeClass('d-none');
        $('#sub-total-' + cartId).html('<i class="fas fa-spinner fa-pulse"></i>');
        $('.cart-actions').prop('disabled', true);

        if (isIncreased) {
            currentQuantity = parseInt(currentQuantity) + 1;
        } else {
            currentQuantity = parseInt(currentQuantity) - 1;
            if (currentQuantity == 0) {
                currentQuantity = 1;
            }
        }
        $('#cart-quantity-' + cartId).text(currentQuantity);

        $.ajax({
            url: '<?php echo site_url('cart/update_cart'); ?>',
            type: 'POST',
            data: {
                cartId: cartId,
                quantity: currentQuantity,
            },
            success: function(updatedPrice) {
                $('#sub-total-' + cartId).text(updatedPrice);
                $.ajax({
                    url: '<?php echo site_url('cart/reload_cart_summary'); ?>',
                    success: function(response) {
                        $('#cart-summary').html(response);
                        $('.cart-actions').prop('disabled', false);
                        $(".summary-loader").addClass('d-none');
                    }
                });
            }
        });
    }


    function deleteCartAddon(addon) {
        $.ajax({
            url: '<?php echo site_url('cart/delete_addon'); ?>',
            type: 'POST',
            data: {
                addon: addon
            },
            success: function(response) {

                    if (response === "false") {
                        toastr.error('<?php echo site_phrase('Something_went_wrong!'); ?>');
                    } else {
                          toastr.success('<?php echo site_phrase('Addon_removed_successfully'); ?>');
                          $(".addon-delete-"+addon).fadeOut();
                           setTimeout(function() {
                              location.reload();
                          }, 800);
                        }
                }
        });
    }

    //INCLUDE BALANCE
    $( document ).ready(function() {
         $('#check-wallet').change(function () {
            if ($('#check-wallet').is(':checked')) {
                $.ajax({
                    url: '<?php echo site_url('cart/reload_cart_summary'); ?>',
                    type: 'POST',
                    data: {status:'1'},
                    success: function(response) {
                        $('#cart-summary').html(response);
                        $.ajax({
                                url: '<?php echo site_url('transactions/display_balance'); ?>',
                                type: 'GET',
                                success: function(balance) {
                                    $('#show-balance').html(balance);
                                }
                            });
                    }
                });
            }else{
                $.ajax({
                    url: '<?php echo site_url('cart/reload_cart_summary'); ?>',
                    type: 'POST',
                    data: {status:'0'},
                    success: function(response) {
                        $('#cart-summary').html(response);
                        $.ajax({
                                url: '<?php echo site_url('transactions/display_balance'); ?>',
                                type: 'GET',
                                success: function(balance) {
                                    $('#show-balance').html(balance);
                                }
                            });
                    }
                });
            }
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
      if (!empty($customer_details['address_1'])) {
    ?>   
         var addr = '<?php echo sanitize($customer_details['address_1']); ?>';  

          embed= "<iframe width='"+width+"' height='"+height+"' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'src='https://www.google.com/maps?q="+addr+"&amp;output=embed'></iframe>";

     <?php
      }else if (!empty($customer_details['coordinate_1']['latitude']) && !empty($customer_details['coordinate_1']['longitude'])) {
    ?>
         

         var lat = '<?php echo sanitize($customer_details['coordinate_1']['latitude']); ?>';
         var lon = '<?php echo sanitize($customer_details['coordinate_1']['longitude']); ?>';

          embed= "<iframe width='"+width+"' height='"+height+"' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?q="+lat+","+lon+"&hl=es&z="+zoom+"&amp;output=embed' ></iframe>"; 

    <?php
      }else {
    ?>
      embed= "<p class='text-danger'>Error: Gmap coordinates and address not defined! update your address by clicking <a href='/settings/profile#address'>here</a></p>"; 

    <?php
      }
    ?>
         
    $('#mapid').html(embed);
}); 

/*
 function toggleMap(addressNumber) {
        $(".address-map").hide();
        $("#mapid" + addressNumber).show();
        $("#address-number").val(addressNumber);
    }
    $(document).ready(() => {
        $("#mapid2").hide();
        $("#mapid3").hide();
        $("#address-number").val(1);
    });
*/
</script>
