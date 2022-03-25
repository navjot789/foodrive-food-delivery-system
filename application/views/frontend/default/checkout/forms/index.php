<?php 

$cash_on_delivery_settings = get_payment_settings("cash_on_delivery");
$cash_on_delivery_settings = json_decode($cash_on_delivery_settings);

$credit_debit_on_delivery_settings = get_payment_settings("credit_debit_on_delivery");
$credit_debit_on_delivery_settings = json_decode($credit_debit_on_delivery_settings);

$paypal_settings = get_payment_settings("paypal");
$paypal_settings = json_decode($paypal_settings);

$stripe_settings = get_payment_settings("stripe");
$stripe_settings = json_decode($stripe_settings);

$wallet_settings = get_payment_settings("wallet");
$wallet_settings = json_decode($wallet_settings);

switch ($action) {
   case "wallet":
      if($this->checkout_model->clear_tip()) {//CLEAR TIP FOR THIS PAYMENT METHOD FIRST
          if($wallet_settings[0]->active) { //CASH ON DELIVERY
             include "wallet/wallet_form.php";
          }
      }else{
           echo "<span class='text-danger'>ERROR: TIP NOT CLEARED!</span>";
        } 
         
   break;
  case "cod":
          if($this->checkout_model->clear_tip()) {//CLEAR TIP FOR THIS PAYMENT METHOD FIRST
              if($cash_on_delivery_settings[0]->active) { //CASH ON DELIVERY
                 include "cash_on_delivery/cash_on_delivery_form.php";
              }
          }else{
               echo "<span class='text-danger'>ERROR: TIP NOT CLEARED!</span>";
            } 
			    
  break;
  case "cd":
            if($this->checkout_model->clear_tip()) {//CLEAR TIP FOR THIS PAYMENT METHOD FIRST
              if($credit_debit_on_delivery_settings[0]->active) { //CREDIT AND DEBIT 
                   include "credit_debit_on_delivery/credit_debit_on_delivery_form.php";
              }
            }else{
               echo "<span class='text-danger'>ERROR: TIP NOT CLEARED!</span>";
            }
			    
  break;
  case "paypal":
    echo "NOT INSTALLED, TRY DIFFERENT PAY MENTHOD";
   break;
	             if($paypal_settings[0]->active) {  //<!-- PAYPAL FORM -->
	                include "paypal/paypal_form.php";
	            }
   
  case "stripe":

                if($stripe_settings[0]->active) { //STRIPE
                    include "stripe/stripe_form.php";
                }
    break;
  default:
    		 echo "NOT INSTALLED, TRY DIFFERENT PAY MENTHOD";
}


?>
