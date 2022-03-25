
<script>
 
  // MAP INITIALIZING CUSTOMER
  //https://developers.google.com/maps/documentation/embed/embedding-map
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
      embed= "<p class='text-danger'>Error: Gmap coordinates and address not defined! Driver will not findout where to deliver the food.</p>"; 

    <?php
      }
    ?>
         
    $('#mapid').html(embed);
}); 

// MAP INITIALIZING RESTAURANT
  //https://developers.google.com/maps/documentation/embed/embedding-map
$(document).ready(function() {   
  
    var width = 350;
    var height = 350;
    var zoom = 20;
    var embed='';

    <?php
      if (!empty($restaurant_details['address'])) {
    ?>   
         var addr = '<?php echo sanitize($restaurant_details['address']); ?>';  

          embed= "<iframe width='"+width+"' height='"+height+"' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'src='https://www.google.com/maps?q="+addr+"&amp;output=embed'></iframe>";

     <?php
      }else if (!empty($restaurant_details['latitude']) && !empty($restaurant_details['longitude'])) {
    ?>
         
           var lat = '<?php echo sanitize($restaurant_details['latitude']); ?>';
           var lon = '<?php echo sanitize($restaurant_details['longitude']); ?>';

          embed= "<iframe width='"+width+"' height='"+height+"' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?q="+lat+","+lon+"&hl=es&z="+zoom+"&amp;output=embed' ></iframe>"; 

    <?php
      }else {
    ?>
      embed= "<p class='text-danger'>Error: Gmap coordinates and address not defined by restaurant!</p>"; 

    <?php
      }
    ?>
         
    $('#maps').html(embed);
}); 
</script>
