<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php foreach (openJSONFile($language_code) as $key => $value): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card card-prirary">
                        <div class="card-body">
                            <?php echo ucfirst(str_replace("_", " ", sanitize($key))); ?>
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <input type="text" id="<?php echo sanitize($key);?>-value" name="value" class="form-control" value="<?php echo htmlspecialchars($value); ?>"> <!-- DO NOT SANITIZE HERE SINCE IT CAN BE SPECIAL TEXT -->
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="<?php echo sanitize($key);?>-btn" onclick="updatePhrase('<?php echo sanitize($key); ?>')"><i class="fas fa-check"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
