
<?php
    $data = get_website_settings('advt_sliders');
    $limit = get_website_settings('advt_limit'); //frontend slider show limit
    $slider = !empty($data) ? json_decode($data) : [];
 ?>
<div>
    <!-- Swiper -->
    <div class="swiper-container" style="margin:10px;border-radius:10px;">
        <div class="swiper-wrapper" >
            <?php for ($counter = 0; $counter < $limit; $counter++): ?>
                <div class="swiper-slide" >
                    <?php $slider_image = isset($slider[$counter]) ? $slider[$counter] : "placeholder.jpg"; ?>
                    <a href="<?php echo base_url('uploads/system/sliders/'.sanitize($slider_image)); ?>" class="grid image-link">
                        <img src="<?php echo base_url('uploads/system/sliders/'.sanitize($slider_image)); ?>" class="img-fluid" alt="#" 
                        >
                    </a>
                </div>
            <?php endfor; ?>
        </div>
        <!-- Add Pagination 
        <div class="swiper-pagination swiper-pagination-white"></div>-->
        
    </div>
</div>

