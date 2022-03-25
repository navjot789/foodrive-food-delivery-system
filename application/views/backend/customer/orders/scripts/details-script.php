<script>
  // MAP INITIALIZING
  //https://developers.google.com/maps/documentation/embed/embedding-map

//POPOVER
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});

//INIT GMAPS
$(document).ready(function() {   
  
    var width = 350;
    var height = 350;
    var zoom = 20;
    var embed='';

    <?php
      if (!empty($order_data['landmark'])) {
    ?>   
         var addr = '<?php echo sanitize($order_data['landmark']); ?>';  

          embed= "<iframe width='"+width+"' height='"+height+"' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'src='https://www.google.com/maps?q="+addr+"&amp;output=embed'></iframe>";

     <?php
      }else {
    ?>
      embed= "<p class='text-danger'>Error: Gmap coordinates and address not defined on this order! contact admin of this website.</p>"; 

    <?php
      }
    ?>
         
    $('#mapid').html(embed);
}); 

</script>
