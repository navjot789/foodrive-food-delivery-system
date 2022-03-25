<?php if (isset($error)) { ?>
  <div class="row mt-30">
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
        <strong><?php echo htmlspecialchars($error); ?></strong>
      </div>
    </div>
  </div>
<?php } ?>
<div class="row mt-30">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-body">
        <div class="panel panel-default border-gray" data-collapsed="0">
          <!-- panel body -->
          <div class="panel-body font-14">
            <p class="font-14">
              Provide your codecanyon <strong>purchase code</strong>
            </p>
            <br>
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal form-groups" method="post" action="<?php echo site_url('install/validate_purchase_code'); ?>">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Purchase Code</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="purchase_code" placeholder="Product's Purchase Code" required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7">
                      <button type="submit" class="btn btn-info">Continue</button>
                    </div>
                  </div>
                </form>
                <br>
                <p>
                  <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">
                    <strong>Where to get my purchase code ?</strong>
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
