<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
 
<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
<?php
 $customer_details = $this->customer_model->get_by_id($order['customer_id']);
 $restaurant_details = $this->restaurant_model->get_by_id($menu[0]['restaurant_id']);
 ?>
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">
        We hope you enjoy your meal from <?php echo $restaurant_details['name']; ?>. You can write them a review by clicking <a href="<?php echo site_url('orders/details/'.$order['code']); ?>">(here)</a>.
    </span>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                   
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 5px 0px;" bgcolor="">
                            <div style="display:inline-block; max-width:100%; min-width:100px; vertical-align:top; width:100%;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" >
                                   
                                    <tr>
                                      <td style="text-align:center;vertical-align:top;font-size:0;border-collapse:collapse;">

                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#F8F8F8" style="border-spacing: 0px; border-collapse: collapse;border-top: 4px solid #ff3a6d; " data-darkreader-inline-bgcolor="">

                                              <tbody><tr style="background-size:cover">
                                                <td style="width: 60%; text-align: left; border-collapse: collapse; background: rgb(255, 255, 255); border-radius: 10px 10px 0px 0px; color: white; height: 50px;padding: 10px;" data-darkreader-inline-bgimage="" data-darkreader-inline-bgcolor="" data-darkreader-inline-color="">
                                                  <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" width="60%" class="CToWUd">
                                                </td>
                                                <td style="width: 40%; text-align: right; border-collapse: collapse; background: rgb(255, 255, 255); border-radius: 10px 10px 0px 0px; color: white; height: 50px;padding: 10px;" data-darkreader-inline-bgimage="" data-darkreader-inline-bgcolor="" data-darkreader-inline-color="">
                                                    <div style="color: rgb(79, 79, 79); font-size: 20px; font-family: Roboto, sans-serif; --darkreader-inline-color:#b6b0a6;color: #28a745!important;" data-darkreader-inline-color="">
                                                            <?php if (!empty($order['credits']) && $order['credits'] !== 0) : ?>
                                                                <?php echo currency(sanitize(format($order['grand_total'] - $order['credits']))); ?>
                                                            <?php else : ?>  
                                                                <?php echo currency(sanitize(format($order['grand_total']))); ?>
                                                            <?php endif; ?>   
                                                       
                                                    </div>
                                                    <div style="color: rgb(130, 130, 130); font-size: 14px; font-family: Roboto, sans-serif;" data-darkreader-inline-color=""><?php echo date("D, d M Y H:i", $order['order_placed_at']); ?></div>
                                                  </td>
                                              </tr>
                                              

                                            </tbody>
                                        </table>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                         
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://ik.imagekit.io/l4f8iqzrdp1c/checked_R9fVTcNWK.png?updatedAt=1641294431428" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                            Hi <?php echo $customer_details['name']; ?>,<br>
                                            We hope you enjoy your meal from <?php echo $restaurant_details['name']; ?>. You can write them a review by clicking <a href="<?php echo site_url('orders/details/'.$order['code']); ?>">(here)</a>.
                                         </p>
                                    </td>
                                </tr>
                                <tr>

                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="center" width="100%" style="padding-top: 20px; border-collapse: collapse; font-family: Roboto, sans-serif; line-height: 21px; text-align: left; font-size: 18px; color: rgb(130, 130, 130); font-weight: normal; --darkreader-inline-color:#999083;" data-darkreader-inline-color="">Issued on behalf of
                                                </td>
                                            </tr>
                                            
                                            <td style="border-collapse:collapse">
                                                <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#F8F8F8" style="margin-bottom: 20px; margin-top: 20px; border-spacing: 0px; border-collapse: collapse; border-radius: 8px; --darkreader-inline-bgcolor:#181a1b; --darkreader-inline-bgimage: initial;" >
                                                    <tbody>
                                                        <tr>
                                                        <td style="width:30%;height:30%;padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px" valign="top">
                                                            <img src="<?php echo site_url('uploads/restaurant/thumbnail/'.$restaurant_details['thumbnail']);?>" alt="alt text" align="left" border="0" style="width: 100%; text-align: center; border: 0px; outline: none; text-decoration: none; border-radius: 8px; height: auto; --darkreader-inline-border-top: initial; --darkreader-inline-border-right: initial; --darkreader-inline-border-bottom: initial; --darkreader-inline-border-left: initial; --darkreader-inline-outline: initial;" class="CToWUd" data-darkreader-inline-border-top="" data-darkreader-inline-border-right="" data-darkreader-inline-border-bottom="" data-darkreader-inline-border-left="" data-darkreader-inline-outline="">
                                                        </td>
                                                        <td style="padding-top:15px;padding-bottom:15px;padding-right:15px;border-collapse:collapse">
                                                            <div style="font-size: 22px; color: rgb(54, 54, 54); font-weight: bold; font-family: Roboto, sans-serif; --darkreader-inline-color:#c6c1b9;" data-darkreader-inline-color=""><?php echo $restaurant_details['name'];?></div>
                                                            <div style="font-size: 18px; color: rgb(130, 130, 130); font-weight: normal; line-height: 21px; font-family: Roboto, sans-serif; --darkreader-inline-color:#999083;" data-darkreader-inline-color=""><?php echo $restaurant_details['address'];?></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                         </td>


                                            <tr>
                                                <td width="100%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">#<?php echo $order['code']; ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                  <td style="border-collapse:collapse">
                                                    
                                                    <table border="0" width="100%" cellpadding="0" align="center" cellspacing="0" style="margin-top:5px;border-spacing:0;border-collapse:collapse">
                
                                                      <tbody>

                                                        <?php foreach($menu as $menu_value) :?>
                                                            <?php $menu_details = $this->menu_model->get_by_id($menu_value['menu_id']); ?>
                                                        <tr>
                                                            <td style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; --darkreader-inline-color:#b6b0a6;" data-darkreader-inline-color="">
                                                              <?php echo $menu_details['name']; ?> <br>
                                                              <span style="font-size: 16px; color: rgb(130, 130, 130); font-family: Roboto, sans-serif; --darkreader-inline-color:#999083;" data-darkreader-inline-color="">
                                                                Serving: (<?php echo $menu_details['servings']; ?>) Qty: (<?php echo $menu_value['quantity']; ?>)</span>
                                                            </td>
                                                            <td valign="top" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: right; --darkreader-inline-color:#b6b0a6;color: #28a745!important;" data-darkreader-inline-color="">
                                                            <?php echo currency(format($menu_value['total'])); ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                                            
                                                      
                                                    </tbody>
                                                </table>

                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="margin-top:5px;border-spacing:0;border-collapse:collapse">
                                                      
                                                      <tbody><tr>
                                                        <td width="70%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; font-weight: bold; --darkreader-inline-color:#b6b0a6;border-top: 3px solid #eeeeee;" data-darkreader-inline-color="">
                                                          Total items price:
                                                        </td>
                                                        <td width="30%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: right; font-weight: bold; --darkreader-inline-color:#b6b0a6;border-top: 3px solid #eeeeee;color: #28a745!important;" data-darkreader-inline-color="">
                                                           <?php echo currency(format($order['total_menu_price'])); ?>
                                                        </td>
                                                      </tr>

                                                    <tr>
                                                        <td width="70%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; font-weight: bold; --darkreader-inline-color:#b6b0a6;" data-darkreader-inline-color="">
                                                           Tax & Service charge:
                                                        </td>
                                                        <td width="30%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: right; font-weight: bold; --darkreader-inline-color:#b6b0a6;color: #28a745!important;" data-darkreader-inline-color="">
                                                          <?php echo currency(format($order['total_vat_amount'] + $order['total_pst_amount'] + $order['service_charge'])); ?>
                                                        </td>
                                                      </tr>
                                                  

                                                    <tr>
                                                        <td width="70%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; font-weight: bold; --darkreader-inline-color:#b6b0a6;" data-darkreader-inline-color="">
                                                          Total delivery charge:
                                                        </td>
                                                        <td width="30%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: right; font-weight: bold; --darkreader-inline-color:#b6b0a6;color: #28a745!important;" data-darkreader-inline-color="">
                                                          <?php echo currency(format($order['total_delivery_charge'])); ?>
                                                        </td>
                                                      </tr>

                                             <?php if (!empty($order['credits']) && $order['credits'] !== 0) : ?>
                                                      <tr>
                                                        <td width="70%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; font-weight: bold; --darkreader-inline-color:#b6b0a6;" data-darkreader-inline-color="">
                                                          FD Credits:
                                                        </td>
                                                        <td width="30%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: red; text-align: right; font-weight: bold; --darkreader-inline-color:#b6b0a6;color: red!important;" data-darkreader-inline-color="">
                                                          -<?php echo currency(format($order['credits'])); ?>
                                                        </td>
                                                      </tr>
                                                <?php endif; ?>              


                                                <?php if (!empty($order['tip']) && $order['tip'] !== 0): ?>
                                                      <tr>
                                                        <td width="70%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; font-weight: bold; --darkreader-inline-color:#b6b0a6;" data-darkreader-inline-color="">
                                                          Foodriver Tip:
                                                        </td>
                                                        <td width="30%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: right; font-weight: bold; --darkreader-inline-color:#b6b0a6;color: #28a745!important;" data-darkreader-inline-color="">
                                                          <?php echo currency(format($order['tip'])); ?>
                                                        </td>
                                                      </tr>
                                                <?php endif; ?>

                                                    </tbody></table>

                                               
                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="margin-top:5px;border-spacing:0;border-collapse:collapse">
                                                    </table>
                                                    
                                                  </td>
                                                </tr>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                           

                                            <tr>
                                                        <td width="70%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; font-weight: bold; --darkreader-inline-color:#b6b0a6;border-top: 3px solid #eeeeee;" >
                                                          Total charge:
                                                        </td>
                                                        <td width="30%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: right; font-weight: bold; --darkreader-inline-color:#b6b0a6;border-top: 3px solid #eeeeee;color: #28a745!important;">
                                                          <?php if (!empty($order['credits']) && $order['credits'] !== 0) : ?>
                                                                <?php echo currency(sanitize(format($order['grand_total'] - $order['credits']))); ?>
                                                            <?php else : ?>  
                                                                <?php echo currency(sanitize(format($order['grand_total']))); ?>
                                                            <?php endif; ?>   
                                                       
                                                        </td>
                                                    </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <div style="display:inline-block; max-width:100%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Roboto, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Delivery Address</p>
                                                        <p><?php echo $order['landmark']; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                       
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style=" padding: 35px; background-color: #F8F8F8;" bgcolor="#1b9ba3">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <h2 style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ccc; margin: 0;"> Login to see full details of this order. </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 25px 0 15px 0;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7"> <a href="<?php echo site_url('orders/details/'.$order['code']); ?>" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #addb31; padding: 15px 30px; border: 1px solid #addb31; display: block;">View details</a> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center"> <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" width="154" height="70" style="display: block; border: 0px;" /> </td>
                                </tr>
                              
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                        <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;"> ©2021-Foodrive, All rights reserved. </p>
                                    </td>
                                </tr>
                               
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>