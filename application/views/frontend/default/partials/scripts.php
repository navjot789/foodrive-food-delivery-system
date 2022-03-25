 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="<?php echo base_url('assets/frontend/default/js/jquery-3.2.1.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/frontend/default/js/popper.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/frontend/default/js/bootstrap.min.js') ?>"></script>
 <!-- Toastr -->
 <script src="<?php echo base_url() . 'assets/global/toastr/toastr.min.js'; ?>"></script>
 <!-- Page wise script -->
 <?php if (file_exists("application/views/frontend/default/$parent_dir/scripts/$file_name-script.php")) : ?>
     <?php include APPPATH . "views/frontend/default/$parent_dir/scripts/$file_name-script.php"; ?>
 <?php endif; ?>
 <!-- Initialize common scripts for frontend and backend here -->
 <?php include APPPATH . "views/common/script.php"; ?>

 <!-- Initialize Gmap scripts -->
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=<?php echo sanitize(get_system_settings('gmap_api_key')); ?>"></script> 

<!-- HTTP client  scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>


<script>
  "use strict";
    $(window).scroll(function() {
        // 100 = The point you would like to fade the nav in.

        if ($(window).scrollTop() > 10) {
    
            $('.sticky-top').addClass('bg-light');
  
        } else {
            $('.test').removeClass('bg-light');
            
        };
    });


 //gmap auto complete
 var search = 'search-location';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(search)), {
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

    

    $("#find").click(function(e){
        e.preventDefault();
        var addressInput = $("#search-location");        
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
//https://maps.googleapis.com/maps/api/geocode/json?address=8888+Odlin+Crescent%2C+Richmond%2C+BC%2C+Canada&key=AIzaSyA6FFVGq29kQZws-OzhuCYwcSdirU3tjWI

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
var addressInput = $("#search-location").val();
var l = addressInput.trim().length;

if (!strNumber || !strName || !cityName) {
  toastr.warning('Invalid address! Please enter you full address including house number and street number.');
 }
 else if (l < 10) {
    toastr.warning('Invalid address! Address should contain house number, street number and city.');
  }
else{

  var lat = $("#latitude_1").val();
  var long = $("#longitude_1").val();

  Restaurants(lat, long, strNumber, strName, cityName, formatted_address, place_id);
}
  
}

function Restaurants(lat, long, strNumber, strName, cityName, Address, place_id) {  
$.ajax({
  url: '<?php echo site_url('site/lookup'); ?>',
  method: 'post',
  dataType: 'json',
  data: {'lat': lat,'long': long, 'streetNumber': strNumber, 'streetName': strName, 'cityName':cityName, 'fullAddress': Address,'place_id': place_id },
  beforeSend: function() {
      $("#find").css("background-color","#770211");
      $("#find").html("<i class='fas fa-circle-notch fa-spin'></i> Searching..."); 
  },
  success:function(response){        
    if (response.status == 200 && response.msg == '') {
       window.location = '/site/findRestaurants';
    } else if (response.status == 200 && response.msg !== '') {
      
       if (response.type == 'success') {
         toastr.success(response.msg);
      } 

       window.location = '/site/findRestaurants';
    } else {

       $("#find").html("<i class='fas fa-exclamation'></i> Error");
       $("#find").css("background-color","#fb0000");
       $("#find").prop('disabled', false);  
       toastr.error('Oops, something went wrong! Try again');

    }
  }
});

}




</script>




 <?php if(get_system_settings('inspect_elements') == 'true'){ ?> 
   <script>
   //Disable shotcuts and menu from body
   document.onkeydown = function(e) {
   if(event.keyCode == 123) {
      return false;
   }
   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
      return false;
   }
   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
      return false;
   }
   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
      return false;
   }
   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
      return false;
   }
   }
   </script> 
 <?php }?>