<!-- DataTables -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<script type="text/javascript">
    "use strict";

    // initialize datatable
    initDataTables(['favourites']);

   
 // CART OPERATIONS
  function addToCart() {
    var resID = $('#rest-id').val();
    var menuId = $('#menu-id').val();
    var quantity = $('#quantity_for_menu').val();
    var variantId = $('#variant-id').val();
    var addons = $('#addons').val();

    $.ajax({
      url: '<?php echo site_url('cart/add_to_cart'); ?>',
      type: 'POST',
      data: {
        resID: resID,
        menuId: menuId,
        quantity: quantity,
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
            $('.btn-success').prop("disabled", false);
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

</script>