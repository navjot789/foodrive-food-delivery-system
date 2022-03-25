<?php 

$stripe_settings = get_payment_settings("stripe");
$stripe_settings = json_decode($stripe_settings);
$tip = !empty($this->session->userdata('custom_tip')) ? sanitize($this->session->userdata('custom_tip')) : '';
?>

 <?php if($stripe_settings[0]->active) : ?>
 <div id="tip-system">
    <div class="alert alert-primary" role="alert">
       <i class="fas fa-check-circle"></i> Online payment issue resolved!
    </div>
     <h6>Please tip your Foodriver</h6>
     <small class="text-muted">Support your foodriver and make their day! 100% of your tip will be transfer to your foodriver.</small>
       
        <div class="col-sm-12">  
        <div class="row mt-2 text-center float-right tip-btns" id="border-line">
           
            <div  style="display: inline-flex;width:auto;"  class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-sm btn-secondary ">
                <input type="radio"  autocomplete="off" name="percentage" value="5" id="5-per"> <span id="five-per">5%</span>
              </label>
              <label class="btn  btn-sm btn-secondary">
                <input type="radio"  autocomplete="off"  name="percentage" value="15" id="15-per"> <span id="fifteen-per">15%</span>
              </label>
              <label class="btn  btn-sm btn-secondary">
                <input type="radio"  autocomplete="off"  name="percentage" value="20" id="20-per"> <span id="twinty-per">20%</span>
              </label>
            </div>

        <button type="button" id="custom" class="btn btn-success btn-sm ml-2"><i class="fas fa-edit"></i> Custom</button>
            
        </div>
      
      
            <form id="custom-form" class="float-right mt-2 hidden">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign" ></i></span>
                </div>
                  <input type="number" step="0.1" class="form-control" placeholder="0.00" name="custom-tip-input" id="custom-tip-input" value = "<?php echo $tip; ?>" required>
                      <span class="input-group-btn">
                        <a href="javascript:void(0);" class="btn text-danger" id="custom-close"><i class="fas fa-times-circle"></i></a>
                        <button class="btn hidden text-success" type="button" id="custom-go"><i class="fas fa-check-circle" ></i></button>
                      </span>
                </div><!-- /input-group -->     

            </form>  
     </div>

       <div class="clearfix"></div>
       <hr>
 </div>  

 <!--Stripe tip js-->
<script>

 //HIDE SHOW INPUT ON CUSTOM AMOUNT BTN CLICK
$('#custom').click(function () {
    $('.tip-btns').hide();
    $('#custom-form').fadeIn();
});

//HIDE SHOW INPUT/FORM ON CLOSE BUTTON 
$('#custom-close').click(function () {
    $('.tip-btns').show();  
    $('#custom-form').hide();
    $('#custom-tip-input').val('');
});

  //CLEAR EVERYTING
$('#clear-tip').click(function () {
    $('.tip-btns').show();  
    $('#custom-form').hide();
    $('#custom-tip-input').val('');
   // $('#tip-structure').hide(); 
});

//HIDING BUTTONS WHEN ENTERING CUSTOM TIP
$(document).ready(function(){
    $('#custom-close').show();
    $('#custom-go').hide();

    $('#custom-tip-input').keyup(function(){
        if($(this).val().length !=0){
             $('#custom-go').show();   
             $('#custom-close').hide();
         }else{
            
            $('#custom-close').show();
            $('#custom-go').hide();
            
        }                
    })
});

//CALCULATION FOR CUSTOM PERCENTAGES 
$(':radio[name=percentage]').on('change', function(e){ 
     var per = $(this).val();
     var selected_Id = $(this).attr('id');
    // alert(selected_Id);
     if (per !== '' && $.isNumeric(per)) {
         $.ajax({ 
                type:'GET',
                url: "<?php echo site_url('checkout/forms/stripe/percentage/');?>"+ per,
                beforeSend: function() {
                        
                             if (selected_Id == '5-per' && $("#5-per").is(":checked")) {
                                    $("#five-per").html('<i class="fas fa-circle-notch fa-spin"></i>');      
                              } else if (selected_Id == '15-per' && $("#15-per").is(":checked")) {
                                    $("#fifteen-per").html('<i class="fas fa-circle-notch fa-spin"></i>');      
                              }else{
                                  $("#twinty-per").html('<i class="fas fa-circle-notch fa-spin"></i>');   
                              }
                    },
                success: function(result) {
                    if (result) {

                            localStorage.setItem('remainonpage', '1');
                         
                               if (selected_Id == '5-per' && $("#5-per").is(":checked")) {
                                        $("#five-per").html('<i class="fas fa-check-circle"></i>');
                                        $('#five-per').css({color: "green"});
                                        //CHANGEING TXT AND COLOR
                                        $("#fifteen-per").html('15%');
                                        $('#fifteen-per').css({color: "#fff"});
                                        $("#twinty-per").html('20%');
                                        $('#twinty-per').css({color: "#fff"});

                                } else if (selected_Id == '15-per' && $("#15-per").is(":checked")) {
                                         $("#fifteen-per").html('<i class="fas fa-check-circle"></i>');
                                         $('#fifteen-per').css({color: "green"});
                                          //CHANGEING TXT AND COLOR
                                          $("#five-per").html('5%');
                                          $('#five-per').css({color: "#fff"});
                                          $("#twinty-per").html('20%');
                                          $('#twinty-per').css({color: "#fff"});
                                }else{
                                         $("#twinty-per").html('<i class="fas fa-check-circle"></i>');
                                         $('#twinty-per').css({color: "green"});
                                         //CHANGEING TXT AND COLOR
                                           $("#five-per").html('5%');
                                           $('#five-per').css({color: "#fff"});
                                           $("#fifteen-per").html('15%');
                                           $('#fifteen-per').css({color: "#fff"});
                                } 

                             $('#st').html(result); 
                               
                        }
                },
                error: function(result) {
                alert('error');
                window.location.reload();
               }
            });

     }else{
        $('#border-line').css({border: "1px solid red"});
    }

           
    }); 
        

//FIRING AJAX ON GREEN CUSTOM BUTTON
 $("#custom-go").click(function(e) {
    e.preventDefault();
    var tip = $('#custom-tip-input').val();
   
    if (tip !== '' && $.isNumeric(tip)) {

           $.ajax({ 
                type:'GET',
                url: "<?php echo site_url('checkout/forms/stripe/custom/');?>"+ tip,
                beforeSend: function() {
                        $("#custom-go").html('<i class="fas fa-circle-notch fa-spin"></i>');
                    },
                success: function(result) {
                    if (result) {
                           
                               localStorage.setItem('remainonpage', '1');
                               $("#custom-go").html('<i class="fas fa-check-circle"></i>');
                               $('#custom-form').fadeOut(500);
                               $('.tip-btns').show(500);  
                               $('#st').html(result); 
                        }
                },
                error: function(result) {
                alert('error');
                window.location.reload();
               }
            });

       
    } else{
        $('#custom-tip-input').css({border: "1px solid red"});
    }
  
});


</script>

 
<?php endif; ?>