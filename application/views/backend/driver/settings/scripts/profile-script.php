<!-- IMAGE PREVIEW -->
<script src="<?php echo base_url('assets/backend/'); ?>js/file-upload-preview.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>
<!-- Custom script for init select2 -->
<script type="text/javascript">
    "use strict";

    // initializing select2
    initSelect2();
    // FOR LOADING THE IMAGE FOR WEBSITE GALLERY SECTION. I'VE DONE THIS FOR AVOIDING INLINE CSS.
    initPreviewer(['image_preview']);
</script>

<script type="text/javascript">

	//gmap auto complete
	var searchInput = 'address';

	$(document).ready(function () {
	    var autocomplete;
	    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
	        types: ['geocode'],
	        componentRestrictions: {
	          country: "CA"
	        }
	    });

	    google.maps.event.addListener(autocomplete, 'place_changed', function () {
	        var near_place = autocomplete.getPlace();
	    });
	});
	
</script>