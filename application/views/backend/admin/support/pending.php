
<?php if (count($support)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("Pending_support_requests", true); ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="pending" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("User_ID"); ?></th>
                                <th><?php echo get_phrase("Reason"); ?></th>
                                <th><?php echo get_phrase("description"); ?></th>
                                <th><?php echo get_phrase("status"); ?></th>
                                <th><?php echo get_phrase("created"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($support as $key => $ticket) :?>
                     
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('orders/details/'.$ticket['order_id']); ?>" target="_blank"><?php echo sanitize($ticket['order_id']); ?></a>
                                    </td>
                                    <td>
                                       <a href="<?php echo site_url('customer/profile/'.$ticket['user_id'].'/profile'); ?>"><?php echo sanitize($ticket['user_id']); ?></a>
                                    </td>
                                  
                                    <td class="text-danger">
                                         <?php echo sanitize($ticket['sub']); ?>
                                    </td>
                                   <td class="text-success">
                                      <?php echo sanitize(read_more($ticket['brief'])); ?>
                                    </td>
                                     <td class="text-warning">
                                     <?php
                                           if ($ticket['status'] == 0) {
                                              echo  '<span class="badge badge-danger lighten-warning">Pending</span>';
                                            }else if ($ticket['status'] == 1) {
                                                echo  '<span class="badge badge-success">Approved</span>';
                                            }else {
                                                echo  '<span class="badge badge-danger">Rejected</span>';
                                            }
                                     ?>
         
                                    </td>
                                    <td class="text-secondary"> <?php echo date("d-m-Y", sanitize($ticket['add_date'])); ?></td>

                                    <td class="text-center">
                                        <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/support/action/' . sanitize($ticket['order_id']) . '/'.sanitize($ticket['s_id'])); ?>', '<?php echo get_phrase('#'.sanitize($ticket['s_id']).' Action_center', true) ?>')"><?php echo get_phrase("details"); ?></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                               <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("User_ID"); ?></th>
                                <th><?php echo get_phrase("Reason"); ?></th>
                                <th><?php echo get_phrase("description"); ?></th>
                                <th><?php echo get_phrase("status"); ?></th>
                                <th><?php echo get_phrase("created"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!count($support)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>
