<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/modal.css'); ?>">


<style media="screen">
  html {
    scroll-behavior: smooth;
  }

  .food-item-card {
    box-shadow: 0px 3px 40px 0 rgba(206, 205, 205, 0.3);
  }

  .reserve-rating {
    margin-top: -6px;
    font-size: 18px;
  }


  .popup {
    width: 100%;
    height: 100%;
    display: none;
    position: fixed;
    top: 0px;
    left: 0px;
    background: rgba(0, 0, 0, 0.75);
    z-index: 1070;
  }

  .popup {
    text-align: center;
  }

  .popup:before {
    content: '';
    display: inline-block;
    height: 100%;
    margin-right: -4px;
    vertical-align: middle;
  }

  .popup-inner {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
    position: relative;
    max-width: 700px;
    width: 90%;
    padding: 40px;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
    border-radius: 3px;
    background: #fff;
    text-align: center;
  }

  .popup-inner h1 {
    font-family: 'Roboto Slab', serif;
    font-weight: 700;
  }

  .popup-inner p {
    font-size: 24px;
    font-weight: 400;
  }

  .popup-close {
    width: 34px;
    height: 34px;
    padding-top: 4px;
    display: inline-block;
    position: absolute;
    top: 20px;
    right: 20px;
    -webkit-transform: translate(50%, -50%);
    transform: translate(50%, -50%);
    border-radius: 100%;
    background: transparent;
    border: solid 4px #808080;
  }

  .popup-close:after,
  .popup-close:before {
    content: "";
    position: absolute;
    top: 11px;
    left: 5px;
    height: 4px;
    width: 16px;
    border-radius: 30px;
    background: #808080;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  .popup-close:after {
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }

  .popup-close:hover {
    -webkit-transform: translate(50%, -50%) rotate(180deg);
    transform: translate(50%, -50%) rotate(180deg);
    background: #f00;
    text-decoration: none;
    border-color: #f00;
  }

  .popup-close:hover:after,
  .popup-close:hover:before {
    background: #fff;
  }

  .back-to-top {
    position: fixed;
    bottom: 25px;
    right: 25px;
    display: none;
}

 
/**Gmap resizing **/
.iframe-rwd  {
  position: relative;
  padding-bottom: 65.25%;
  padding-top: 30px;
  height: 0;
  overflow: hidden;
}
.iframe-rwd iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

/**Product item styling **/
.ratings i {
    font-size: 16px;
    color: red
}

.strike-text {
    color: red;
    text-decoration: line-through
}

.product-image {
    width: 100%
}

.dot {
    height: 7px;
    width: 7px;
    margin-left: 6px;
    margin-right: 6px;
    margin-top: 3px;
    background-color: blue;
    border-radius: 50%;
    display: inline-block
}

.spec-1 {
    color: #938787;
    font-size: 15px
}

h5 {
    font-weight: 400
}

.para {
    font-size: 16px
}

.txt-wrp-on-btn
{
    overflow: hidden;
  white-space: nowrap;
  display: inline-block;
  text-overflow: ellipsis;
}


  /* INCREMENTER AND DECREMENTER BUTTON */
  .quantity-incrementar {
    border-color: #d9d9d9;
    border-radius: 4px 0px 0px 4px;
    border-right: none;
  }

  .quantity-decrementer {
    border-color: #d9d9d9;
    border-radius: 0px 4px 4px 0px;
    border-left: none;
  }

  .quantity-incrementar:focus,
  .quantity-decrementer:focus {
    box-shadow: none;
  }

  .quantity-incrementar:active,
  .quantity-decrementer:active {
    background-color: #c7c7c7;
  }

</style>

