<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>

<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<!-- Custom script for init select2 -->
<script type="text/javascript">
    "use strict";

    // initialize select2
    initSelect2();
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
  });
  
</script>



