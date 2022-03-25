<div class="row mt-3">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-body">
        <div class="panel panel-default" data-collapsed="0">
          <!-- panel body -->
          <div class="panel-body">
            <div class="text-center">
              <i class="entypo-thumbs-up"></i>
              <h3>Congratulations!! The installation was successfull</h3>
            </div>
            <br>
            <div class="text-center">
              <strong>
                Before you start using your application, make it yours. Set your application name and title, admin login email and
                password. Remember the login credentials which you will need later on for signing into your account. After this step,
                you will be redirected to application's login page.
              </strong>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <form class="" method="post" action="<?php echo site_url('install/finalizing_setup/setup_admin'); ?>">
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">System Name</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="system_name" placeholder="" required autofocus>
                    </div>
                    <div class="col-sm-4">
                      <small>The name of your application</small>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Admin Name</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="name" placeholder="" required>
                    </div>
                    <div class="col-sm-4">
                      <small>Full name of Administrator</small>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Admin Email</label>
                    <div class="col-sm-5">
                      <input type="email" class="form-control" name="email" placeholder="" required>
                    </div>
                    <div class="col-sm-4">
                      <small>Email address for administrator login</small>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" name="password" placeholder="" required>
                    </div>
                    <div class="col-sm-4">
                      <small>Admin login password</small>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" id="timezone">TimeZone</label>
                    <div class="col-sm-5">
                      <select class="form-control" id="timezone" name="timezone">
                        <?php $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL); ?>
                        <?php foreach ($tzlist as $tz) : ?>
                          <option value="<?php echo htmlspecialchars($tz); ?>" <?php if (get_system_settings('timezone') == $tz) echo 'selected'; ?>><?php echo htmlspecialchars($tz); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7">
                      <button type="submit" class="btn btn-info">Set me up</button>
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
