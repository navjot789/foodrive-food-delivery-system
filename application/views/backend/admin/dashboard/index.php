<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <?php include "tiles.php"; ?>

        <!-- MONTHLY SALES GRAPH -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="far fa-chart-bar"></i> <?php echo get_phrase("admin_income_graph_of_year", true) . ": " . date("Y"); ?></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div id="sales-graph" class="graph-style"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <!-- DAILY ORDER GRAPH -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-chart-bar"></i> <?php echo get_phrase("placed_order_in_each_day_for_month", true) . ": <strong>" . date("F") . "</strong>"; ?></h3>
                    </div>
                    <div class="card-body">
                        <div id="order-graph" class="graph-style"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <!-- DAILY ORDER GRAPH -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-chart-bar"></i> <?php echo get_phrase("restaurants"); ?></h3>
                    </div>
                    <div class="card-body">
                        <div id="restaurant-status" class="graph-style"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
