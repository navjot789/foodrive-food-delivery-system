<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                   <div class="col-12">
                        <h4 class="mt-1 text-dark"><?php echo ucwords($page_title); ?>
                             <?php if ($order_type == "live") : ?>
                                <div class="pulse"></div>
                                <div class="checkbox float-right">
                                    <!-- Default dropleft button -->
                                    <?php $approved_res = $this->restaurant_model->get_all_approved();?>
                                   <?php if(count($approved_res) > 1) :?>
                                    <!-- IF HAS MORE THAN 1 RESTAURANT -->
                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <code><strong><i class="fas fa-store"></i> OPEN/CLOSED</strong></code> 
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- Dropdown menu links -->
                                            <?php
                                            foreach($approved_res as $approved) :?>
                                                <a class="dropdown-item m-0"href="#"><?php echo sanitize($approved['name']) ?> &nbsp;<input <?php echo (sanitize($approved['online_status'])) ? "checked":"";?> 
                                                                                                                type="checkbox" 
                                                                                                                id="<?php echo sanitize($approved['id']); ?>" 
                                                                                                                data-size="mini" 
                                                                                                                data-width="57" 
                                                                                                                data-height="25"
                                                                                                                data-onstyle="success" 
                                                                                                                data-offstyle="danger" 
                                                                                                                data-toggle="toggle" 
                                                                                                                data-on="open" 
                                                                                                                data-off="closed"></a>
                                          <?php endforeach;?>       
                                        </div>
                                    </div>
                                <?php else : ?>
                                     <!-- IF HAS SINGLE RESTAURANT -->
                                            <?php
                                                    foreach($approved_res as $approved) :?>
                                                        <input <?php echo (sanitize($approved['online_status'])) ? "checked":"";?> 
                                                                                                                        type="checkbox" 
                                                                                                                        id="<?php echo sanitize($approved['id']); ?>" 
                                                                                                                        data-size="normal" 
                                                                                                                        data-width="90" 
                                                                                                                        data-height="25"
                                                                                                                        data-onstyle="success" 
                                                                                                                        data-offstyle="danger" 
                                                                                                                        data-toggle="toggle" 
                                                                                                                        data-on="open" 
                                                                                                                        data-off="closed">
                                            <?php endforeach;?>    

                                <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </h4>
                        
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>