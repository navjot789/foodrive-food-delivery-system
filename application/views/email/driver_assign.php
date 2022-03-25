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
<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">
 New order has been assigned to you, please login to check order details.
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
                                                    <div style="color: rgb(79, 79, 79); font-size: 20px; font-family: Roboto, sans-serif; --darkreader-inline-color:#b6b0a6;color: #28a745!important;" data-darkreader-inline-color=""><?php echo currency($order['grand_total']); ?></div>
                                                    <div style="color: rgb(130, 130, 130); font-size: 14px; font-family: Roboto, sans-serif;" data-darkreader-inline-color="">Order at <?php echo date("D, d M Y H:i", $order['order_placed_at']); ?></div>
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
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://ik.imagekit.io/l4f8iqzrdp1c/driver_Uh0VAaJSk.png?updatedAt=1641147297520" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> NEW ORDER ASSIGN! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                            Hi <?php echo $order['driver_name']; ?>,<br><br>
                                            You have assigned a new order. For more details click <a href="<?php echo site_url('orders/details/'.$order['code']); ?>">(here)</a>. 
                                         </p>
                                    </td>
                                </tr>
                                <tr>

                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                          

                                            <tr>
                                                <td width="100%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; text-align: center;">#<?php echo $order['code']; ?></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                  <td style="border-collapse:collapse">
                                                    

                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="margin-top:5px;border-spacing:0;border-collapse:collapse">
                                                      
                                                      <tbody>


                                                    <tr>
                                                        <td width="70%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; font-weight: bold; --darkreader-inline-color:#b6b0a6;" data-darkreader-inline-color="">
                                                          You will get:
                                                        </td>
                                                        <td width="30%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: right; font-weight: bold; --darkreader-inline-color:#b6b0a6; color: #28a745!important;" data-darkreader-inline-color="">
                                                          <?php echo currency($order['total_delivery_charge']); ?>
                                                        </td>
                                                      </tr>

                                                       <tr>
                                                        <td width="70%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: left; font-weight: bold; --darkreader-inline-color:#b6b0a6;border-top: 3px solid #eeeeee;" >
                                                          Total charge:
                                                        </td>
                                                        <td width="30%" style="padding-top: 4%; padding-bottom: 4%; border-collapse: collapse; font-family: Roboto, sans-serif; font-size: 18px; line-height: 30px; color: rgb(79, 79, 79); text-align: right; font-weight: bold; --darkreader-inline-color:#b6b0a6;border-top: 3px solid #eeeeee;color: #28a745!important;">
                                                          <?php echo currency($order['grand_total']); ?>
                                                        </td>
                                                    </tr>


                                                    </tbody>
                                                </table>

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
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="center" valign="top" style="font-family: Roboto, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: center;">
                                                        <p style="font-weight: 800;">Customer Delivery Address</p>
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