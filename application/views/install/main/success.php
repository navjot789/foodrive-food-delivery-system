<div class="row mt-30">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-body">
        <div class="panel panel-default border-gray" data-collapsed="0">
          <!-- panel body -->
          <div class="panel-body font-14">
            <h3>Success!!</h3>
            <br>
            <p class="font-14">
              <strong>Installation was successfull. Please login to continue..</strong>
            </p>
            <br>
            <table>
              <tbody>
                <tr>
                  <td class="font-14"><strong>Administrator Email |</strong></td>
                  <td class="font-14"><?php echo htmlspecialchars($admin_email); ?></td>
                </tr>
                <tr>
                  <td class="font-14"><strong>Password |</strong></td>
                  <td class="font-14">Your chosen password</td>
                </tr>
              </tbody>
            </table>
            <br>
            <p>
              <a href="<?php echo site_url('install/success/login'); ?>" class="btn btn-info">
                <i class="entypo-login"></i> &nbsp; Log In
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
