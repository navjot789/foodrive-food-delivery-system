<?php if (count($payment_history)) : ?>
    <div class="alert alert-info" role="alert">
  
        <span class="text-warning">By default calculation shown as only for the current month below.</span>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("list_of_paid_enteries", true); ?>
                    </h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                <form action="<?php echo site_url('report/payment_history/'.$restaurant_details['id']); ?>" method="GET">      
                        <div class="input-group justify-content-center">
                        <input type="hidden" name="date_range" id="selected-date-range-value" value="<?php echo date('F d, Y', $starting_timestamp) . ' - ' . date('F d, Y', $ending_timestamp); ?>">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-default btn-block text-left" id="daterange-btn">
                                            <i class="far fa-calendar-alt"></i> <span id="selected-date-range"><?php echo date('F d, Y', $starting_timestamp) . ' - ' . date('F d, Y', $ending_timestamp); ?></span>
                                            <i class="fas fa-caret-down"></i>
                                        </button>
                                    </div>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success mt-1 mb-2"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                    <table id="history" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("Paid_amount"); ?></th>
                                <th>Paid GST</th>
                                <th>Paid PST</th>
                                <th><?php echo get_phrase("Total_due"); ?></th>
                                <th><?php echo get_phrase("Remark"); ?></th>
                                <th><?php echo get_phrase("Paid_on"); ?></th>   
                            </tr>
                        </thead>
                     <tbody>
                            <?php
                            
                            foreach ($payment_history as $key => $payment_detail) : ?>
                                <tr>
                                    <td class="text-success">
                                     <?php echo currency(format(sanitize($payment_detail['paid_amount'])));  ?>
                                    </td>
                                    <td class="text-success">
                                        <?php echo currency(format(sanitize($payment_detail['paid_tax'])));  ?>
                                    </td>
                                    <td class="text-success">
                                        <?php echo currency(format(sanitize($payment_detail['paid_pst'])));  ?>
                                    </td>
                                     <td class="text-danger">
                                        <?php 
                                        if($payment_detail['bal_due'] == 0.00 && $payment_detail['tax_due'] == 0.00 && $payment_detail['pst_due'] == 0.00){
                                               echo  '<span class="badge badge-success">FUNDS CLEARED</span>';
                                        }else{
                                             echo currency(format(sanitize($payment_detail['bal_due']))).' + 
                                             '.currency(format(sanitize($payment_detail['tax_due']))).' + 
                                             '.currency(format(sanitize($payment_detail['pst_due']))).' =
                                             '.currency(format(sanitize($payment_detail['bal_due'] + $payment_detail['tax_due'] +  $payment_detail['pst_due']))); 
                                          }
                                        ?>
                                    </td>
                                    <td >
                                    <?php echo (!empty(sanitize($payment_detail['remark']))) ? sanitize($payment_detail['remark']) : 'NULL';  ?>
                                    </td>
                                    
                                    <td >
                                        <?php echo date("d M Y H:i:s", sanitize($payment_detail['date_added'])); ?>
                                    </td>
                                  
                                   
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("Paid_amount"); ?></th>
                                <th>Paid GST</th>
                                <th>Paid PST</th>
                                <th><?php echo get_phrase("Total_due"); ?></th>
                                <th><?php echo get_phrase("Remark"); ?></th>
                                <th><?php echo get_phrase("Paid_on"); ?></th>
                                
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!count($payment_history)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>