<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/select2/css/select2.min.css">

<style>
/* Picker */
.picker {
    display: flex;
    overflow: hidden;
    border: 1px solid #dedede;
    border-radius: 4px;
}

/* Picker focus ring */
.picker:focus-within {
    outline: none;
}

/* Inputs */
input.foreground_color{
    height: 40px;
    border:none;
    text-align: center;
    text-transform: uppercase;
    position: absolute;
    width: 92%;
    color: #fff;
}
input.foreground_color:focus{
    color: #fff;
}

/* Color picker */
input[type="color"] {
    -webkit-appearance: none;
    height: 40px;
    border: none;
    outline: 0;
    padding: 0;
    width: 100%;
}

input[type="color"]::-webkit-color-swatch-wrapper {
    padding: 0;
}

input[type="color"]::-webkit-color-swatch {
    border: none;
    border-right: 1px solid rgba(0, 0, 0, 0.1);
}

.qr-menu-preview {
    text-align: center;
}
.qr-menu-preview img{
    height: 200px;
}
.qr-menu-preview img#qr-menu-preview-preloader{
    position: absolute;
    background-color: rgba(250,250,250 ,0.8);
}
</style>
