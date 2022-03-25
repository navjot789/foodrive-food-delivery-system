<?php 

$stripe_settings = get_payment_settings("stripe");
$stripe_settings = json_decode($stripe_settings);

if($stripe_settings[0]->active) { //STRIPE
    include "stripe_tip_system.php";
}



?>