<!-- Swipper Slider -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/swiper.min.css'); ?>">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/magnific-popup.css'); ?>">


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


  /**RESTAURANT LIST STYLING */
  .border-upper-radius {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }  
  .border-downer-radius {
    border-bottom: 1px solid #bdbdbd;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
  }  

  .detail-options-wrap:hover {
    border-color: rgb(54, 59, 61);
    box-shadow: rgb(21 23 24 / 12%) 0px 0.4rem 1.8rem;
}

.card-thumb:hover {
    border-color: rgb(232, 232, 232);
    box-shadow: rgb(28 28 28 / 12%) 0px 0.4rem 1.8rem;
    box-sizing: border-box;
}

.thumb-anchor {
    display: block;
    position: relative;
}

.thumb-promoted-container {
    background-color: #d0e94b;
    
    position: absolute;
    top: 1rem;
    left: 1.1rem;
    width: max-content;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(0.4rem);
    border-radius: 0.2rem;
    padding: 0px 0.5rem;
    z-index: 1;
}

.thumb-promoted {
    font-weight: normal;
    font-size: 0.9rem;
    line-height: 1.2rem;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    text-align: right;
    color: rgb(255, 255, 255);
    opacity: 0.5;
}

.restaurant-thumb-container {
    position: relative;
    max-width: 100%;
    width: 100%;
    overflow: hidden;
}


.restaurant-thumbnail{
    padding: 10px;
    border-radius: 20px!important;
    position: relative;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: none;
    opacity: 1;
    will-change: transform, opacity;
    border-radius: inherit;
    filter: unset;
    transition: opacity 0.25s ease 0s, transform 0.25s ease 0s;
}

.thumb-left-badge-container {
    position: absolute;
    bottom: 1.2rem;
    max-width: calc(100% - 2.4rem);
}



.thum-left-badge-1 {
    background-image: initial;
    color: rgb(232, 230, 227);
    margin: 0px 0px 1rem;
    font-size: 1.4rem;
    line-height: 1.8rem;
    padding: 0px 0.6rem;
    color: rgb(255, 255, 255);
    font-weight: 400;
    width: max-content;
    border-radius: 0px 0.2rem 0.2rem 0px;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    opacity: 0.8;
}

.thum-left-badge-1:last-child {
    margin-bottom: 0px;
}

.thum-right-badge-1 {
    margin: 0px;
    position: absolute;
    bottom: 1.2rem;
    right: 1.2rem;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(0.4rem);
    border-radius: 0.4rem;
    font-weight: 500;
   
    line-height: 1.6rem;
    color: rgb(54, 54, 54);
    width: max-content;
    padding: 0.2rem 0.5rem 0.3rem;
}




  </style>