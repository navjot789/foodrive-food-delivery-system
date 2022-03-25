<?php if (count($transactions)) : ?>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="refund-tab" data-toggle="tab" href="#refund" role="tab"
                    aria-controls="refund" aria-selected="true">Refunds</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="refund" role="tabpanel" aria-labelledby="refund-tab">
                <?php foreach ($transactions as $transaction) :  ?>
                     <?php  $support_detail = $this->support_model->get_by_support_id(sanitize($transaction['s_id']));?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-2">
                                <div class="d-flex d-block">
                                    <div class="d-flex d-block">
                                        <img src="https://foodrive.ca/uploads/system/wallet.png" class="img-icon img-fluid mt-0" alt="">
                                        <div class="ml-2 ml-0">
                                            <?php if($transaction['type'] == 'credit'):?>
                                                <h6 class="mb-0 refund-cause"> Refund from foodrive</h6>
                                            <?php elseif($transaction['type'] == 'debit'):?>
                                                <h6 class="mb-0 refund-cause"> Paid on foodrive</h6>
                                            <?php endif;?>
                                            <small class="text-muted refund-order-id">Order ID 
                                                <?php if(!empty($transaction['s_id'])) :?>
                                                    <a href="<?php echo site_url('orders/details/'.$support_detail['order_id']);?>">#<?php echo sanitize($support_detail['order_id']);?></a>
                                                <?php elseif(!empty($transaction['code'])) :?>
                                                    <a href="<?php echo site_url('orders/details/'.$transaction['code']);?>">#<?php echo sanitize($transaction['code']);?></a>
                                                <?php endif;?>
                                            </small></br>
                                            <small class="text-muted refund-timing">Credited on:
                                                <?php echo date('d M Y, h:i A', sanitize($transaction['add_date']));?></small>
                                        </div>
                                    </div>

                                    <div class="ml-auto d-block">
                                        <div class="d-flex  flex-column h-100 text-right">
                                              <?php if($transaction['type'] == 'credit'):?>
                                                    <span class="text-success">+ <?php echo currency(sanitize(format($transaction['amt'])));?></span>
                                                <?php elseif($transaction['type'] == 'debit'):?>
                                                    <span class="text-danger">- <?php echo currency(sanitize(format($transaction['amt'])));?></span>
                                                <?php endif;?>
                                                
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<?php endif; ?>

<?php if (!count($transactions)) : ?>
<?php isEmpty(); ?>
<?php endif; ?>