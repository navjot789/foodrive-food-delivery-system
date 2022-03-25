<?php if (isset($error)) { ?>
  <div class="row mt-20">
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
              <strong>Your database is successfully connected</strong>. All you need to do now is
              <strong>hit the 'Install' button</strong>.
              The auto installer will run a sql file, will do all the tiresome works and set up your application automatically.
            </p>
            <br>
            <div class="row">
              <div class="col-md-12">
                <button type="button" id="install_button" class="btn btn-info">
                  <i class="entypo-check"></i> &nbsp; Install
                </button>
                <div id="loader" class="mt-20">
                  &nbsp; Importing database....
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
