<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>

<!-- Tags-Input -->
<script src="<?php echo base_url('assets/backend/'); ?>js/tags-input.js"></script>

<!-- IMAGE UPLOAD WITH PREVIEW -->
<script src="<?php echo base_url('assets/backend/'); ?>js/file-upload-preview.js"></script>

<!-- TIME PICKER -->
<script src="<?php echo base_url('assets/backend/'); ?>js/bootstrap-clockpicker.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<!-- Custom script for init datatable -->
<script type="text/javascript">
    "use strict";
    // initialize datatable
   initDataTables(['reordering'])
</script>

<!-- HTTP client  scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>

<script type="text/javascript">
  //selection of delivery time 

$(function() {
    $('input[name="time"]').on('click', function() {
        if ($(this).val() == 'max') {
            $('#max-time-selection').show();
            $('#avg-time-selection').hide();
            $("#avg_time_to_deliver").val('');
        }
        else if ($(this).val() == 'avg') {
            $('#avg-time-selection').show();
            $('#max-time-selection').hide();
            $("#maximum_time_to_deliver").val('');
        }
       
    });
});

</script>

<!-- Custom script for init select2 -->
<script type="text/javascript">
    "use strict";

    // toggle user view while clicking on radio btn
    function toggleUserArea(elem) {

        if (elem.value === "existing") {
            $("#existing_user_area").show();
            $("#new_user_area").hide();
        } else if (elem.value === "new") {
            $("#new_user_area").show();
            $("#existing_user_area").hide();
        }
    }

    // initializing select2
    initSelect2();

    // initializing clockpicker
    initClockPicker();

    // FOR LOADING THE RESTAURANT THUMBNAIL. I'VE DONE THIS FOR AVOIDING INLINE CSS
    initPreviewer(['restaurant_thumbnail_preview']);

    // FOR LOADING THE RESTAURANT GALLERY IMAGE. I'VE DONE THIS FOR AVOIDING INLINE CSS
    for (let i = 1; i <= 6; i++) {
        initPreviewer(['restaurant_gallery_' + i + '_preview']);
    }
</script>

<script type="text/javascript">

  //gmap auto complete
  var searchInput = 'restaurant_address';

  $(document).ready(function () {
      var autocomplete;
      autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
          types: ['geocode'],
          componentRestrictions: {
            country: "CA"
          }
      });

      google.maps.event.addListener(autocomplete, 'place_changed', function () {
           var place = autocomplete.getPlace();

          if (!place.geometry) {
                  return;
              }

          var address = '';
          if (place.address_components) {
              address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                  ].join(' ');
          }
          /*********************************************************************/
          /* var address contain your autocomplete address *********************/
          /* place.geometry.location.lat() && place.geometry.location.lat() ****/
          /* will be used for current address latitude and longitude************/
          /*********************************************************************/
          document.getElementById('restaurant_latitude').value = place.geometry.location.lat();
          document.getElementById('restaurant_longitude').value = place.geometry.location.lng();
      });

       $("#update_address").click(function(e){
            e.preventDefault();
            var addressInput = $("#restaurant_address");

            //$("#update_address").prop('disabled', true);
             
            geocode(addressInput.val()); 
            //alert(addressInput.val());  
         });

  });


//HTTP client CALLING JSON VIA AXIOS
async function geocode(search) {
  // Prevent actual submit
    var location = search;
  
      axios.get('https://maps.googleapis.com/maps/api/geocode/json', {

                params:{
                  address:location,
                  key:'<?php echo sanitize(get_system_settings('gmap_api_key')); ?>',
                }

          }).then(function(response) {    

                passResponse(response);

          }).catch(function(error) {    

             console.log(error);

          });
 }

var strName='',strNumber='',cityName='',postal='', fullAddress='';

function passResponse(response) {
    var response = response; 
    
    // Check if response is OK
    if (response.status != 200) {
      alert('We could not locate your address. Try again without unit / apartment number.')
      return false;
    } 

    // Loop over data to find components
  
    var addressComponents = response.data.results[0].address_components;
    var place_id = response.data.results[0].place_id;
    var formatted_address = response.data.results[0].formatted_address;
    var keepGoing = true;
    for(var i = 0;i < addressComponents.length;i++){         
      for (var j = 0; j < addressComponents[i].types.length; j++){    

        console.log(addressComponents[i].types[j]);
        console.log(addressComponents[i].long_name);

        switch (addressComponents[i].types[j]) {
          case 'route':
            strName = addressComponents[i].long_name;                                  
            break;
          case 'street_number':
            strNumber = addressComponents[i].long_name;   
            break;   
          case 'locality':
            cityName = addressComponents[i].long_name;    
            keepGoing = false;              
            break;              
          case 'sublocality':
            cityName = addressComponents[i].long_name;  
            keepGoing = false;            
            break;       
          case 'administrative_area_level_3':
            cityName = addressComponents[i].long_name;
            keepGoing = false;                
            break;       
          case 'postal_code':
            postal = addressComponents[i].long_name;   
            keepGoing = false;           
            break;  

        }    

      }     
      if (!keepGoing) {
          break;
        } 
    }    
    
     //console.log(place_id);    
    // console.log(formatted_address);
   
      
   if (!cityName) {
       alert('Opps, you forget to enter your city?');
     }

    if (cityName) {

      var restaurant_id        = $("#restaurant_id").val();
      var restaurant_latitude  = $("#restaurant_latitude").val();
      var restaurant_longitude = $("#restaurant_longitude").val();
      var restaurant_phone     = $("#restaurant_phone").val();
      var restaurant_website_link = $("#restaurant_website_link").val();

       var num = phone_valid(restaurant_phone);
        if(restaurant_phone !== '' && num == false){ 
          restaurant_phone = $('#restaurant_phone').val('');
          alert('Invalid CA phone number');

        } 

        var url_validate = /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;
        if(restaurant_website_link !== '' && !url_validate.test(restaurant_website_link)){
           restaurant_website_link = $('#restaurant_website_link').val('');
           alert('Invalid website link');
           
        }
       
        Restaurants(restaurant_id, strNumber, strName, cityName, formatted_address, place_id, restaurant_latitude, restaurant_longitude,restaurant_phone, restaurant_website_link);

    }
    
}


function phone_valid(value)
{
    value = $.trim(value).replace(/\D/g, '');

    if (value.substring(0, 1) == '1') {
        value = value.substring(1);
    }

    if (value.length == 10) {

        return value;
    }

    return false;
}

function Restaurants(id, strNumber, strName, cityName, Address, place_id, lat, lon, phone, link) {  
    $.ajax({
      url: '<?php echo site_url('restaurant/update/address'); ?>',
      method: 'post',
      data: {'id':id, 
             'streetNumber': strNumber,
             'streetName': strName, 
             'cityName':cityName, 
             'fullAddress': Address,
             'place_id': place_id, 
             'restaurant_latitude':lat,
             'restaurant_longitude':lon,
             'restaurant_phone':phone,
             'restaurant_website_link':link  
           },
      success:function(response){        
        if (response) {
 
         location.reload();
           
        } else {

           $("#update_address").html("Error!");
           $("#update_address").prop('disabled', false);  
           alert("Oops, something went wrong! Address not updated.");

        }
      }
    });
  
}


  
</script>
