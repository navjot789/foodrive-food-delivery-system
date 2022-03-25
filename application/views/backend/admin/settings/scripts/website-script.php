<!-- Summernote -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/summernote/summernote-bs4.js"></script>

<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<!-- IMAGE PREVIEW -->
<script src="<?php echo base_url('assets/backend/'); ?>js/file-upload-preview.js"></script>

<!-- Custom script for init select2 -->
<script type="text/javascript">
    "use strict";

    // init summernote
    initSummernote(['about_us', 'faq', 'privacy_policy']);

    // FOR LOADING THE IMAGE FOR WEBSITE GALLERY SECTION. I'VE DONE THIS FOR AVOIDING INLINE CSS.
    initPreviewer(['banner_image_preview', 'backend_logo_preview', 'website_logo_preview', 'favicon_preview']);

    // FOR LOADING THE RESTAURANT GALLERY IMAGE. I'VE DONE THIS FOR AVOIDING INLINE CSS
    for (let i = 1; i <= 6; i++) {
        initPreviewer(['advt_sliders_' + i + '_preview']);
    }
</script>
