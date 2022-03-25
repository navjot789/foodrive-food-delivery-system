<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="FoodMob Software Installation" />
	<meta name="author" content="TheDevs" />

	<title>Installation | FoodMob</title>
	<?php include 'styles.php'; ?>
</head>

<body class="page-body">

	<div class="page-container horizontal-menu">


		<header class="navbar navbar-fixed-top bg">
			<div class="navbar-inner">
				<!-- logo -->
				<div class="navbar-brand">
					<a href="#">
						<img src="<?php echo base_url('uploads/system/backend-logo.jpg'); ?>" class="max-40" />
					</a>
				</div>
				<div class="navbar-brand pull-right mt-13">
					Installation
				</div>
			</div>
		</header>
		<div class="main-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php include 'main/' . $page_name . '.php'; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php include 'footer.php'; ?>
					</div>
				</div>

			</div>
		</div>

		<?php include 'scripts.php'; ?>

</body>

</html>