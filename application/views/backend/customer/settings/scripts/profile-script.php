<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<!-- IMAGE PREVIEW -->
<script src="<?php echo base_url('assets/backend/'); ?>js/file-upload-preview.js"></script>

<!-- HTTP client  scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>


<!-- Custom script for init select2 -->
<script type="text/javascript">
    "use strict";

    // FOR LOADING THE IMAGE FOR WEBSITE GALLERY SECTION. I'VE DONE THIS FOR AVOIDING INLINE CSS.
    initPreviewer(['image_preview']);

</script>

<script type="text/javascript">


  //gmap auto complete
  var searchInput = 'address_1';

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
          document.getElementById('latitude_1').value = place.geometry.location.lat();
          document.getElementById('longitude_1').value = place.geometry.location.lng();
      });

       $("#update_address").click(function(e){
            e.preventDefault();
            var addressInput = $("#address_1");

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
      toastr.error('We could not locate your address. Try again without unit / apartment number.');
      return false;
    } 

    // Loop over data to find components
    var addressComponents = response.data.results[0].address_components;
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
    var addressInput = $("#address_1").val();
    var l = addressInput.trim().length;
      
   if (!strNumber || !strName || !cityName) {
      toastr.warning('Invalid address! Please enter you full address including house number and street number.');
     }
   else if (l < 10) {
        toastr.warning('Invalid address! Address should contain house number, street number and city.'); 
      }
  else {

    var latitude        = $("#latitude_1").val();
    var longitude       = $("#longitude_1").val();
    var settings_type   = $("#settings_types").val();
    var updater         = $("#updaters").val();
    var id              = $("#uid").val();

    update_geocode(settings_type,updater,id,formatted_address,latitude,longitude,strNumber,strName,cityName);
  }
    
}

function update_geocode(settings_type,updater,id,formatted_address,latitude,longitude,strNumber,strName,cityName) {  
    $.ajax({
      url: '<?php echo site_url('settings/update'); ?>',
      method: 'post',
      data: {'settings_type':settings_type,
              'updater':updater,
              'id':id,
              'address_1':formatted_address,
              'latitude_1':latitude,
              'longitude_1':longitude,
              'strNumber':strNumber,
              'strName':strName,
              'cityName':cityName
           },
      success:function(response){        
        if (response) {
 
         location.reload();
           
        } else {

           $("#update_address").html("Error!");
           $("#update_address").prop('disabled', true);  
           toastr.error('Oops, something went wrong! Address not updated');

        }
      }
    });
  
}


  
</script>