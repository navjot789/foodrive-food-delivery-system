
<style media="screen">
    .btn-group1 {
        width: 73%;
    }

    @media (max-width: 576px) {
        .btn-group1 {
            width: 100%;
            border-radius: 3px;
            margin: 0 0 10px;
            padding: 17px;
        }
    }

    .slider {
        background: linear-gradient(0deg, rgba(33, 33, 33, 0.3), rgba(33, 33, 33, 0.4)), url(<?php echo base_url('uploads/system/' . sanitize(get_website_settings('banner_image'))); ?>) no-repeat;
        background-size: cover;
        min-height: 800px;
    }

    .slider-content_wrap h5 {
        color: #fff;
    }

    .slider-link a {
        color: #fff;
    }

    .slider-link {
        color: #fff;
    }

   
  .border-upper-radius {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }  
  .border-downer-radius {
    border-bottom: 1px solid #bdbdbd;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
  }   
</style>
