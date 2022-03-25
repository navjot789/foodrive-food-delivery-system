<script type="text/javascript">
"use strict";

function updatePhrase(key) {
  let value = $("#"+key+"-value").val();
  var currentLanguageCode = '<?php echo sanitize($language_code); ?>';
  $("#"+key+"-btn").html('<i class="fas fa-spinner"></i>');
  $.ajax({
    type : "POST",
    url  : "<?php echo site_url('language/update_phrase'); ?>",
    data : {key : key, value : value, currentLanguageCode : currentLanguageCode},
    success : function(response) {
      $("#"+key+"-btn").html('<i class="fas fa-check"></i>');
      toastr.success('<?php echo get_phrase('phrase_updated');?>');
    }
  });
}

</script>
