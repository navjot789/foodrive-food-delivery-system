<?php if (isset($error_con_fail)) { ?>
  <div class="row mt-30">
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
        <strong><?php echo htmlspecialchars($error_con_fail); ?></strong>
      </div>
    </div>
  </div>
<?php } ?>
<?php if (isset($error_nodb)) { ?>
  <div class="row mt-30">
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
        <strong><?php echo htmlspecialchars($error_nodb); ?></strong>
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
              Below you should enter your database connection details. If you’re not sure about these, contact your host.
            </p>
            <br>
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal form-groups" method="post" action="<?php echo site_url('install/step3/configure_database'); ?>">
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Database Name</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="dbname" placeholder="" required autofocus>
                    </div>
                    <div class="col-sm-4 font-12">
                      The name of the database you want to use with this application
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="username" placeholder="" required>
                    </div>
                    <div class="col-sm-4 font-12">
                      Your database Username
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" name="password" placeholder="">
                    </div>
                    <div class="col-sm-4 font-12">
                      Your database Password
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Database Host</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="hostname" placeholder="" required>
                    </div>
                    <div class="col-sm-4 font-12">
                      If 'localhost' does not work, you can get the hostname from web host
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7">
                      <button type="submit" class="btn btn-info">Continue</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
