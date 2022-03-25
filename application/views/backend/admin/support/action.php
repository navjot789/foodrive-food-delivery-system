<?php
  $tickets = $this->support_model->get_by_order_code(sanitize($param2));
  $support = $this->support_model->get_by_support_id(sanitize($param3)); 
  $order_details = $this->order_model->get_by_code(sanitize($param2));
  $payment_data = $this->payment_model->get_payment_data_by_order_code(sanitize($param2));

  $ordered_items = $this->order_model->details($param2);  
  $restaurant_details = $this->restaurant_model->get_by_id($ordered_items[0]['restaurant_id']);
 // print_r($restaurant_details);
 ?>
 <?php if($order_details['credits'] >= 0.01) :?>
    <div class="alert bg-pink " role="alert">
        <p>This support ticket contain foodrive credits worth:(<span class="text-warning">-<?php echo currency(format($order_details['credits']));?></span>)
            Follow the refund proceedure as it is. 
            </p>
    </div>
<?php endif;?>

<?php if(count($tickets) > 1) :?>
        <div class="alert bg-purple " role="alert">
            <h4 class="alert-heading">(<?php echo count($tickets); ?>) Dublicate Ticket found!</h4>
            <p>This support ticket has dublicate entries into the database. Please consider to look all for better under-standing. 
             </p>
            <hr>
            <p class="mb-0">
                <strong>Ticket history</strong>
                <?php foreach($tickets as $ticket) :?>  
                    <a class="dropdown-item <?php echo ($param3 == sanitize($ticket['s_id'])) ? "active": ""; ?>" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/support/action/' . sanitize($ticket['order_id']) . '/'.sanitize($ticket['s_id'])); ?>', '<?php echo get_phrase('#'.sanitize($ticket['s_id']).' Action_center', true) ?>')">
                        #<?php echo $ticket['s_id'].' ('.$ticket['order_id'].')';?> 
                        <?php
                            if ($ticket['status'] == 0) {
                                echo  '<span class="badge badge-danger lighten-warning float-right">Pending</span>';
                            }else if ($ticket['status'] == 1) {
                                echo  '<span class="badge badge-success float-right">Approved</span>';
                            }else {
                                echo  '<span class="badge badge-danger float-right">Rejected</span>';
                            }
                        ?> 
                    </a>
                <?php endforeach;?>
            </p>
        </div>
    <?php endif;?>



 <div class="alert alert-light" role="alert">
  <strong><?php echo '#'.$param2;?></strong>
  <p class="float-right">
      <?php 
         if (sanitize($support['status']) == 0) {
            echo  '<span class="badge badge-warning lighten-warning">Pending</span>';
          }else if ($support['status'] == 1) {
              echo  '<span class="badge badge-success">Approved</span>';
          }else {
              echo  '<span class="badge badge-danger">Rejected</span>';
          }
      ?>
  </p>
    <ul class="list-unstyled text-xs">
        <li>Restaurant: <?php echo  $restaurant_details['name']; ?></li>
        <li>  <strong>Order Details</strong>
            <ul>
            <li>Customer Name: <?php echo $order_details['customer_name'];?></li>
            <li>Customer Email: <?php echo $order_details['customer_email'];?></li>
            <li>Addon Price: <?php echo currency(format($order_details['total_addons_price']));?></li>
            <li>Varient Price: <?php echo currency(format($order_details['total_varient_price']));?></li>
            <li>GST: <?php echo currency(format($order_details['total_vat_amount']));?></li>
            <li>PST: <?php echo currency(format($order_details['total_pst_amount']));?></li>
            <li>Service charge: <?php echo currency(format($order_details['service_charge']));?></li>
            <li>Delivery Charge: <?php echo currency(format($order_details['total_delivery_charge']));?></li>
            <li>Grand Total: <?php echo currency(format($order_details['grand_total']));?></li>
            </ul>
        </li>
        <li>Payment Method:  <?php echo ucfirst(str_replace('_',' ',sanitize($payment_data['payment_method']))); ?></li>
        <?php if (!empty($order_details['tip']) && $order_details['tip'] !== 0) : ?>
            <li>Foodriver Tip : <?php echo currency(sanitize(format($order_details['tip']))); ?></li>
        <?php endif; ?>  
        <li>Payment Status:
                        <?php if($payment_data['amount_to_pay'] == $payment_data['amount_paid'] && $payment_data['refund_status'] == 0):?>
                            <span class="badge badge-success lighten-success"><?php echo get_phrase(sanitize('paid'));?></span>
                        
                        <?php elseif($payment_data['amount_to_pay'] == $payment_data['amount_paid'] && $payment_data['refund_status'] == 1):?>
                                <span class="badge badge-danger lighten-info"><?php echo get_phrase(sanitize('refunded'));?></span>
                        <?php else:?>
                            <span class="badge badge-danger lighten-danger"><?php echo get_phrase(sanitize('unpaid'));?></span>
                        <?php endif;?>
        </li>
          
    </ul>
</div>

<div class="alert alert-light" role="alert">
    <strong >Ordered Items</strong>
    <?php
        foreach ($ordered_items as $key => $ordered_item) :
            $menu_details = $this->menu_model->get_by_id($ordered_item['menu_id']); 
            $category_data = $this->category_model->get_by_id(sanitize($menu_details['category_id']));
            //print_r($category_data);
            ?>
        <ul class="list-unstyled text-xs">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-1 text-primary">
                    ( X<?php echo sanitize($ordered_item['quantity']); ?> ) <?php echo sanitize($menu_details['name']); ?>  
                   
                        <div>  
                            <span class="badge badge-warning badge-pill">
                                GST:<?php echo  currency(calc_percent(sanitize($category_data['tax']), sanitize(format($ordered_item['total'])))); ?> 
                            </span>
                            <span class="badge badge-info badge-pill">
                                PST:<?php echo  currency(calc_percent(sanitize($category_data['pst']), sanitize(format($ordered_item['total'])))); ?> 
                            </span>
                            <span class="badge badge-primary badge-pill">
                               Sc:<?php echo  currency(calc_percent(get_delivery_settings('admin_revenue'), sanitize(format($ordered_item['total'])))); ?>  
                            </span>
                             <span class="badge badge-success badge-pill">
                                M:<?php echo currency(sanitize(format($ordered_item['total']))); ?>
                            </span>
                        </div>
                       
                    </li>
                </ul>
                <!--variables-->
                <ul class="list-unstyled mt-1">
                       
                        <?php if (!empty($ordered_item['variant_id'])) : ?>
                            <!--Variants-->
                            <?php
                                    $variant_exploded = explode(',', $ordered_item['variant_id']);
                                    foreach ($variant_exploded as $key => $variant) {
                                        $this->db->where('id' , $variant);
                                        $query  = $this->db->get('variants');
                                        if($query->num_rows() > 0){
                                                $variant_details = $query->row_array();
                                                //$variant_details = $this->db->get_where('variants', ['id' => $variant])->row_array();
                                                echo '<li class="float-right"> <i class="fas fa-dot-circle ml-1"></i> '.ucfirst(sanitize($variant_details['variant'])) . ': ' . currency(format($variant_details['price'])) . '</li>';
                                        }
                                        
                                    }
                                ?>     
                              <div class="clearfix"></div>                                        
                        <?php endif; ?>

                            <?php if (!empty($ordered_item['addons'])) : ?>
                                <?php
                                $addons_exploded = explode(',', $ordered_item['addons']);
                                foreach ($addons_exploded as $key => $addon) {
                                    $addon_details = $this->db->get_where('addons', ['aid' => $addon])->row_array();
                                    echo '<li class="float-right"> <i class="far fa-dot-circle ml-1"></i> '.ucfirst(sanitize($addon_details['addon_name'])) . ': ' . currency($addon_details['addon_price']) . '</li>';
                                }
                                ?>    
                            <div class="clearfix"></div>                                       
                        <?php endif; ?>
                    </ul>
           
        </ul>
    <?php endforeach; ?>
    </div>

    <div class="form-group">  
        <blockquote class="blockquote">
                        <p class="mb-0"> <h5 class="alert-heading">Selected reason
                        <small class="float-right"><?php echo date("d-m-Y h:i A", sanitize($support['add_date'])); ?></small>   
                        </h5></p>
                        <footer class="blockquote-footer mb-2"><?php echo  sanitize($support['sub']); ?>.</footer>
                        <p class="mb-0"> <h5 class="alert-heading">Explanation  
                        </h5></p>
                        <footer class="blockquote-footer"><?php echo  sanitize($support['brief']); ?>.</footer>
        </blockquote>
    </div>
    <hr>

<form action="<?php echo site_url('support/action'); ?>" method="post" enctype="multipart/form-data">
         <input type="hidden" value="<?php echo $param2;?>" name="order_code"/>
         <input type="hidden" value="<?php echo $param3;?>" name="refund_id"/>
    <div class="row">
             <div class="col-md-6">
                <div class="form-group">
                        <label for="status"><?php echo get_phrase("Ticket status"); ?></label>
                        <select class="custom-select" id="status" name="status">
                            <option value="" >Choose...</option>
                            <option value="0" <?php echo  (sanitize($support['status']) == 0) ? 'selected':''; ?>>Pending</option>
                            <option value="1" <?php echo  (sanitize($support['status']) == 1) ? 'selected':''; ?>>Approved</option>
                            <option value="2" <?php echo  (sanitize($support['status']) == 2) ? 'selected':''; ?>>Rejected/Ignore</option>
                        </select>
                        <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> : Change ticket status.</small>
                </div>
            </div>
            <div class="col-md-6 fault-structure">
                <div class="form-group">
                            <label for="status"><?php echo get_phrase("Refund faulter"); ?></label>
                            <select class="custom-select" id="r-fault" name="r-fault">
                                <option value="" >Choose...</option>
                                <option value="restaurant" <?php echo  (sanitize($support['refund_fault']) == 'restaurant') ? 'selected':''; ?>>Restaurant</option>
                                <option value="system" <?php echo  (sanitize($support['refund_fault']) == 'system') ? 'selected':''; ?>>FD System</option>
                                <option value="partial" <?php echo  (sanitize($support['refund_fault']) == 'partial') ? 'selected':''; ?>>Partial</option>
                            </select>
                            <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> : Findout the faulter.</small>
                </div>
                
            </div>
    </div>

    <div class="row">
        <div class="col-md-12 reason-structure">
                <div class="form-group">
                    <label for="refund-reason"><?php echo get_phrase("refund reason"); ?> (Required)</label>
                    <textarea class="form-control" rows="3" id="refund-reason" name="refund-reason"  placeholder="Describe the reason here..."><?php echo sanitize($support['refund_reason']); ?></textarea>
                    <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> : This reason will visible to Owner end only.</small>
                </div>
        </div>
       
    </div>

    <div class="row amt-structure">
                <div class="col-md-4">
                    <div class="form-group owner-structure">
                        <label for="restaurant-amt"><?php echo get_phrase("Restaurant debt"); ?></label>
                        <input  type="number" step="0.01" class="form-control" id="restaurant-amt" name="restaurant-amt" placeholder="$0.00" value="<?php echo format(sanitize($support['owner_debt'])); ?>">
                        <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> : Cannot pay more than <?php echo currency(format($order_details['grand_total']));?></small>
                    </div>
                </div>
                <div class="col-md-4 tax-structure">
                     <div class="form-group">
                        <label for="tax-debit-amt"><?php echo get_phrase("GST Deduct"); ?></label>
                        <input  type="number" step="0.01" class="form-control" id="tax-debit-amt" name="tax-debit-amt" placeholder="$0.00"  value="<?php echo format(sanitize($support['tax_deduct'])); ?>">
                        <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> :Refundable GST amount Cannot pay more than <?php echo currency(format($order_details['total_vat_amount']));?></small>
                    </div>
                </div>

                <div class="col-md-4 pst-structure">
                     <div class="form-group">
                        <label for="pst-debit-amt"><?php echo get_phrase("PST Deduct"); ?></label>
                        <input  type="number" step="0.01" class="form-control" id="pst-debit-amt" name="pst-debit-amt" placeholder="$0.00"  value="<?php echo format(sanitize($support['pst_deduct'])); ?>">
                        <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> :Refundable PST amount Cannot pay more than <?php echo currency(format($order_details['total_pst_amount']));?></small>
                    </div>
                </div>

        </div>
        <div class="row amt-structure">
            <div class="col-md-12 admin-structure">
                <div class="form-group">
                    <label for="system-debit"><?php echo get_phrase("Foodrive debt"); ?><span class="text-danger">*</span></label>
                    <input  type="number" step="0.01" class="form-control" id="system-debit" name="system-debit" placeholder="$0.00"  value="<?php echo format(sanitize($support['system_debt'])); ?>">
                    <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> : Refundable System amount Cannot pay more than <?php echo currency(format($order_details['grand_total']));?></small>
                </div>
            </div>
        </div>

    <div class="row">  
      
        <div class="col-md-12 general-structure">
                <div class="form-group">
                    <label for="refund-reason"><?php echo get_phrase("General note"); ?> (Required)</label>
                    <textarea class="form-control" rows="3" id="general-reason" name="general-reason"  placeholder="Describe the reason for rejection..."><?php echo sanitize($support['gen_cmt']); ?></textarea>
                    <small class="text-danger"><strong><?php echo get_phrase('note') ?></strong> : General reason for future purpose.</small>
                </div>
        </div>

    </div>
 <?php if($support['status'] == 1) :?>
    <button type="submit" class="btn btn-danger" name="button" disabled>submit</button>
 <?php else :?> 
    <button type="submit" class="btn btn-primary" name="button"  onclick="return confirm('Are you sure？This action is irreversible!')" ><?php echo get_phrase("Submit"); ?></button>
 <?php endif;?>
</form>

<script type="text/javascript">
 
    $(document).ready(function () {
        //Hidden by default
        $('.fault-structure').hide();
        $('.amt-structure').hide();
        $('.reason-structure').hide();
        
        // onLoad by condition
           //Approved
           if ($('#status').val() == '1') {
                $('.fault-structure').show();
                $('.amt-structure').show();
                //$('.reason-structure').show();

                    //onLoad by condition selected
                        //Owner
                        if ($('#r-fault').val() == 'restaurant') {
                            $('.owner-structure').show(); 
                            $('.tax-structure').show();
                            $('.pst-structure').show();
                            $('.admin-structure').hide(); 
                            $('.reason-structure').show();
                        }
                        else if ($('#r-fault').val() == 'system') {
                        //foodrive
                            $('.tax-structure').hide();
                            $('.pst-structure').hide();
                            $('.owner-structure').hide(); 
                            $('.admin-structure').show(); 

                        } else if ($('#r-fault').val() == 'partial') {
                        //partial
                            $('.owner-structure').show(); 
                            $('.tax-structure').show();
                            $('.pst-structure').show();
                            $('.admin-structure').show(); 
                            $('.reason-structure').show();
                        
                        }else{
                            $('.owner-structure').hide(); 
                            $('.tax-structure').hide();
                            $('.pst-structure').hide();
                            $('.admin-structure').hide(); 
                        }

            }
            else if ($('#status').val() == '2') {
            //If rejection 
                $('.fault-structure').hide();
                $('.amt-structure').hide();
                $('.reason-structure').hide();
             
            }
            else {
                //pending
                $('.fault-structure').hide();
                $('.amt-structure').hide();
                $('.reason-structure').hide();
             
            }

        //Show if refund Approved
        $('#status').change(function () {
            if ($('#status').val() == '1') {
                $('.fault-structure').show();
                $('.amt-structure').hide();
                $('.reason-structure').hide();
                
                //refund faulter options
                $('#r-fault').change(function () {

                    $('.amt-structure').show();
                    
                    if ($('#r-fault').val() == 'restaurant') {
                        $('.owner-structure').show(); 
                        $('.tax-structure').show();
                        $('.pst-structure').show();
                        $('.admin-structure').hide(); 
                        $('.reason-structure').show();

                    }else if ($('#r-fault').val() == 'system') {
                        $('.tax-structure').hide();
                        $('.pst-structure').hide();
                        $('.owner-structure').hide(); 
                        $('.admin-structure').show(); 
                        $('.reason-structure').hide()
                    }
                    else if ($('#r-fault').val() == 'partial') {
                        $('.owner-structure').show(); 
                        $('.tax-structure').show();
                        $('.pst-structure').show();
                        $('.admin-structure').show(); 
                        $('.reason-structure').show();

                    }else{
                        //not selected
                        $('.owner-structure').hide(); 
                        $('.tax-structure').hide();
                        $('.pst-structure').hide();
                        $('.admin-structure').hide(); 
                        $('.reason-structure').hide();
                    }

                    });
              
            
            }
            else if ($('#status').val() == '2') {
            //If rejection 
                $('.fault-structure').hide();
                $('.amt-structure').hide();
                $('.reason-structure').hide();
              
                
            }
            else {
                $('.fault-structure').hide();
                $('.amt-structure').hide();
                $('.reason-structure').hide();
              
               
            }
        });

    });

</script>
