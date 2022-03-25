<script>
    "use strict";

$(document).ready(function () {

    <?php if(!empty($this->session->userdata('wallet')) && $this->session->userdata('wallet') == 1) :?> 
       <?php if($wallet_balance >= $this->cart_model->get_grand_total()):?> 

         //loading default payment method
            localStorage.setItem('remainonpage', '0');
            var i = $("input[type=radio][name=payment_gateway]:checked").val();
            if (i === "wallet") {
                    //default wallet
                    $.ajax({
                            type: 'GET',
                            url: "<?php echo site_url('checkout/forms/wallet'); ?>",
                            beforeSend: function () {
                                $("#loader").show();
                            },
                            success: function (result) {
                                $('#fd-wallet').html(result);
                                $("#loader").hide();
                            },
                            error: function (result) {
                                alert('error');
                                window.location.reload();
                            }
                        });
                }
         <?php else:?>

                //CALLING DEFAULT
                    $('#tip-system').hide();
                    var retrievedObject = localStorage.getItem('remainonpage');

                    if (retrievedObject == 1) {
                        $("#pay-with-cash-on-delivery-form").hide();
                        $("#pay-with-credit-debit-on-delivery-form").hide();


                        $("#stripe").prop("checked", true); //enable stripe
                        //Enable the selected class 
                        $(".col-div-cod").removeClass("callout-primary");
                        $(".col-div-cd").removeClass("callout-primary");
                        $(".col-div-st").addClass("callout-primary");

                        //firing ajax if tip already enabled
                        $.ajax({
                            type: 'GET',
                            url: "<?php echo site_url('checkout/forms/stripe'); ?>",
                            beforeSend: function () {
                                $("#loader").show();
                            },
                            success: function (result) {
                                $('#st').html(result);

                                $.ajax({
                                    type: 'GET',
                                    url: "<?php echo site_url('checkout/tipping'); ?>",
                                    beforeSend: function () {
                                        $("#loader").show();
                                    },
                                    success: function (result) {
                                        $('#stripe-tip-system').html(result);
                                        $("#loader").hide();
                                    },
                                    error: function (result) {
                                        alert('unable to load tip structure!');
                                    }
                                });

                                $("#loader").hide();
                            },
                            error: function (result) {
                                alert('stripe payment method error!');
                                window.location.reload();
                            }
                        });


                    } else {
                        //loading default payment method
                        localStorage.setItem('remainonpage', '0');

                        var i = $("input[type=radio][name=payment_gateway]:checked").val();
                        if (i === "cash_on_delivery") {
                            $("#pay-with-credit-debit-on-delivery-form").hide();
                            $("#pay-with-stripe-form-structure").hide();

                            $.ajax({
                                type: 'GET',
                                url: "<?php echo site_url('checkout/forms/cod'); ?>",
                                beforeSend: function () {
                                    $("#loader").show();
                                },
                                success: function (result) {
                                    $('#cod').html(result);
                                    $("#loader").hide();
                                },
                                error: function (result) {
                                    alert('error');
                                    window.location.reload();
                                }
                            });
                        } 
                    }

        <?php endif;?>
 <?php else:?>
    
      //CALLING DEFAULT
      $('#tip-system').hide();
    var retrievedObject = localStorage.getItem('remainonpage');

    if (retrievedObject == 1) {
        $("#pay-with-cash-on-delivery-form").hide();
        $("#pay-with-credit-debit-on-delivery-form").hide();


        $("#stripe").prop("checked", true); //enable stripe
        //Enable the selected class 
        $(".col-div-cod").removeClass("callout-primary");
        $(".col-div-cd").removeClass("callout-primary");
        $(".col-div-st").addClass("callout-primary");

        //firing ajax if tip already enabled
        $.ajax({
            type: 'GET',
            url: "<?php echo site_url('checkout/forms/stripe'); ?>",
            beforeSend: function () {
                $("#loader").show();
            },
            success: function (result) {
                $('#st').html(result);

                $.ajax({
                    type: 'GET',
                    url: "<?php echo site_url('checkout/tipping'); ?>",
                    beforeSend: function () {
                        $("#loader").show();
                    },
                    success: function (result) {
                        $('#stripe-tip-system').html(result);
                        $("#loader").hide();
                    },
                    error: function (result) {
                        alert('unable to load tip structure!');
                    }
                });

                $("#loader").hide();
            },
            error: function (result) {
                alert('stripe payment method error!');
                window.location.reload();
            }
        });


    } else {
        //loading default payment method
        localStorage.setItem('remainonpage', '0');

        var i = $("input[type=radio][name=payment_gateway]:checked").val();
        if (i === "cash_on_delivery") {
            $("#pay-with-credit-debit-on-delivery-form").hide();
            $("#pay-with-stripe-form-structure").hide();

            $.ajax({
                type: 'GET',
                url: "<?php echo site_url('checkout/forms/cod'); ?>",
                beforeSend: function () {
                    $("#loader").show();
                },
                success: function (result) {
                    $('#cod').html(result);
                    $("#loader").hide();
                },
                error: function (result) {
                    alert('error');
                    window.location.reload();
                }
            });
        } 
    }

 <?php endif;?>
  
});


$('input[type=radio][name=payment_gateway]').click(function (e) {

    //Remove the default class on COD
    $(".col-div-cod").removeClass("callout-primary");
    //SWITCHING CLASS BASED ON SELECTION 
    var selected_Id = $(this).attr('id');
    switch (selected_Id) {
        case 'wallet':
            $(".col-div-wallet").addClass("callout-primary");
            break;
        case 'cash-on-delivery':
            $(".col-div-cd").removeClass("callout-primary");
            $(".col-div-st").removeClass("callout-primary");
            $(".col-div-cod").addClass("callout-primary");
            break;
        case 'credit-debit-on-delivery':
            $(".col-div-cod").removeClass("callout-primary");
            $(".col-div-st").removeClass("callout-primary");
            $(".col-div-cd").addClass("callout-primary");
            break;
        case 'stripe':
            $(".col-div-cod").removeClass("callout-primary");
            $(".col-div-cd").removeClass("callout-primary");
            $(".col-div-st").addClass("callout-primary");
            break;
    }

    if ($(this).val() === "wallet") {
        localStorage.setItem('remainonpage', '0');
        //FIRING AJAX TO GET CASH ON DELIVERY            
        $.ajax({
            type: 'GET',
            url: "<?php echo site_url('checkout/forms/wallet'); ?>",
            beforeSend: function () {
                $("#loader").show();
            },
            success: function (result) {
                $('#fd-wallet').html(result);
                $("#loader").hide();

            },
            error: function (result) {
                alert('error');
                window.location.reload();
            }
        });

    } else if ($(this).val() === "cash_on_delivery") {
        $("#pay-with-credit-debit-on-delivery-form").hide();
        $("#pay-with-stripe-form-structure").hide();
        $('#tip-system').hide();


        localStorage.setItem('remainonpage', '0');
        //FIRING AJAX TO GET CASH ON DELIVERY            
        $.ajax({
            type: 'GET',
            url: "<?php echo site_url('checkout/forms/cod'); ?>",
            beforeSend: function () {
                $("#loader").show();
            },
            success: function (result) {
                $('#cod').html(result);
                $("#loader").hide();
                localStorage.setItem('remainonpage', '0');
            },
            error: function (result) {
                alert('error');
                window.location.reload();
            }
        });

    } else if ($(this).val() === "credit_debit_on_delivery") {
        $("#pay-with-cash-on-delivery-form").hide();
        $("#pay-with-stripe-form-structure").hide();
        $('#tip-system').hide();

        //LOAD CREDIT/DEBIT
        $.ajax({
            type: 'GET',
            url: "<?php echo site_url('checkout/forms/cd'); ?>",
            beforeSend: function () {
                $("#loader").show();
            },
            success: function (result) {
                $('#cd').html(result);
                $("#loader").hide();
                localStorage.setItem('remainonpage', '0');
            },
            error: function (result) {
                alert('error');
                window.location.reload();
            }
        });


    } else if ($(this).val() === "paypal") {
        $("#pay-with-paypal-form").show();



    } else if ($(this).val() === "stripe") {
        $("#pay-with-cash-on-delivery-form").hide();
        $("#pay-with-credit-debit-on-delivery-form").hide();


        //Enable the selected class 
        $(".col-div-cod").removeClass("callout-primary");
        $(".col-div-cd").removeClass("callout-primary");
        $(".col-div-st").addClass("callout-primary");

        //LOAD TIP STRUCTURE
        $.ajax({
            type: 'GET',
            url: "<?php echo site_url('checkout/tipping'); ?>",
            beforeSend: function () {
                $("#loader").show();
            },
            success: function (result) {
                $('#stripe-tip-system').html(result);
                $("#loader").hide();
                //LOAD STRIPE
                $.ajax({
                    type: 'GET',
                    url: "<?php echo site_url('checkout/forms/stripe'); ?>",
                    beforeSend: function () {
                        $("#loader").show();
                    },
                    success: function (result) {
                        $('#st').html(result);



                        $("#loader").hide();
                    },
                    error: function (result) {
                        alert('error');
                        window.location.reload();
                    }
                });
            },
            error: function (result) {
                alert('unable to load tip structure!');
                window.location.reload();
            }
        });

    }
});


</script>