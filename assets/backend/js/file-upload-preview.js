"use strict";

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            const id = $(input).attr('id');
            const previewer = id + "_preview";
            $('#' + previewer).css('background-image', 'url(' + e.target.result + ')');
            $('#' + previewer).hide();
            $('#' + previewer).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(".imageUploadPreview").change(function () {
    readURL(this);
});