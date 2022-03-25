<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h4 class="mt-1 text-dark"><?php echo ucwords($page_title); ?>
                              <?php if ($order_type == "today") : ?>
                                <div class="pulse"></div>
                                <div class="checkbox float-right">
                                    <label>
                                        <input <?php echo ($this->session->userdata('driver_mode')) ? "checked":"";?> type="checkbox" id="drivermode" data-size="normal" data-width="95" data-onstyle="success" data-offstyle="default" data-toggle="toggle" data-on="online" data-off="offline">  
                                    </label>
                                </div>
                            <?php endif; ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>