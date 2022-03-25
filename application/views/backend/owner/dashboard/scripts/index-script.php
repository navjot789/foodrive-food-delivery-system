<?php
// OWNER REVENUE FOR THIS YEAR
$months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
$month_wise_income = array();
$owned_restaurant_ids = $this->restaurant_model->get_approved_restaurant_ids_by_owner_id($this->session->userdata('user_id'));
$order_codes = count($owned_restaurant_ids) ? $this->order_model->get_order_code_by_restaurant_id($owned_restaurant_ids) : array();

for ($i = 0; $i < 12; $i++) {
    $first_day_of_month = "1 " . ucfirst($months[$i]) . " " . date("Y") . ' 00:00:01';
    $last_day_of_month = date("t", strtotime($first_day_of_month)) . " " . ucfirst($months[$i]) . " " . date("Y") . ' 23:59:59';

    if (count($owned_restaurant_ids)) {
        if (count($order_codes)) {
            $this->db->select_sum('owner_commission');
            $this->db->where('date_added >=', strtotime($first_day_of_month));
            $this->db->where('date_added <=', strtotime($last_day_of_month));
            $this->db->where_in('restaurant_id', $owned_restaurant_ids);
            $total_restaurant_owner_avenue = $this->db->get('commission_details')->row()->owner_commission;
        } else {
            $total_restaurant_owner_avenue = 0;
        }
    } else {
        $total_restaurant_owner_avenue = 0;
    }
    $total_restaurant_owner_avenue > 0 ? array_push($month_wise_income, $total_restaurant_owner_avenue) : array_push($month_wise_income, 0);
}
// EACH DAY ORDER DATA
$each_day_orders = [];
for ($i = 1; $i <= date("t"); $i++) {
    if (count($owned_restaurant_ids)) {
        $order_codes = $this->order_model->get_order_code_by_restaurant_id($owned_restaurant_ids);
        if (count($order_codes)) {
            $conditions = [
                "order_placed_at >=" => strtotime("$i " . date("M") . " " . date("Y") . "00:00:01"),
                "order_placed_at <=" => strtotime("$i " . date("M") . " " . date("Y") . "23:59:59"),
                "code" => $order_codes
            ];
            $order_number = count($this->order_model->get_by_condition($conditions));
        } else {
            $order_number = 0;
        }
    } else {
        $order_number = 0;
    }
    array_push($each_day_orders, $order_number);
}

$number_of_approved_restaurants = count($owned_restaurant_ids) ? count($this->restaurant_model->get_approved_restaurant_ids_by_owner_id($this->session->userdata('user_id'))) : 0;
$number_of_pending_restaurants  = count($owned_restaurant_ids) ? count($this->restaurant_model->get_pending_restaurant_ids_by_owner_id($this->session->userdata('user_id'))) : 0;
?>

<!-- Resources -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/amcharts/core.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/amcharts/charts.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/amcharts/animated.js"></script>

<script>
    "use strict";

    // SALES GRAPH
    am4core.ready(function() {
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("sales-graph", am4charts.XYChart);

        var data = [];

        chart.data = [{
            "month": "Jan",
            "income": '<?php echo sanitize($month_wise_income[0]); ?>'
        }, {
            "month": "Feb",
            "income": '<?php echo sanitize($month_wise_income[1]); ?>'
        }, {
            "month": "Mar",
            "income": '<?php echo sanitize($month_wise_income[2]); ?>'
        }, {
            "month": "Apr",
            "income": '<?php echo sanitize($month_wise_income[3]); ?>'
        }, {
            "month": "May",
            "income": '<?php echo sanitize($month_wise_income[4]); ?>'
        }, {
            "month": "Jun",
            "income": '<?php echo sanitize($month_wise_income[5]); ?>'
        }, {
            "month": "Jul",
            "income": '<?php echo sanitize($month_wise_income[6]); ?>'
        }, {
            "month": "Aug",
            "income": '<?php echo sanitize($month_wise_income[7]); ?>'
        }, {
            "month": "Sep",
            "income": '<?php echo sanitize($month_wise_income[8]); ?>'
        }, {
            "month": "Oct",
            "income": '<?php echo sanitize($month_wise_income[9]); ?>'
        }, {
            "month": "Nov",
            "income": '<?php echo sanitize($month_wise_income[10]); ?>'
        }, {
            "month": "Dec",
            "income": '<?php echo sanitize($month_wise_income[11]); ?>'
        }];

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.ticks.template.disabled = true;
        categoryAxis.renderer.line.opacity = 0;
        categoryAxis.renderer.grid.template.disabled = true;
        categoryAxis.renderer.minGridDistance = 40;
        categoryAxis.dataFields.category = "month";
        categoryAxis.startLocation = 0.4;
        categoryAxis.endLocation = 0.6;


        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.renderer.line.opacity = 0;
        valueAxis.renderer.ticks.template.disabled = true;
        valueAxis.min = 0;

        var lineSeries = chart.series.push(new am4charts.LineSeries());
        lineSeries.dataFields.categoryX = "month";
        lineSeries.dataFields.valueY = "income";
        lineSeries.tooltipText = "<?php echo get_phrase('income'); ?>: {valueY.value}";
        lineSeries.fillOpacity = 0.5;
        lineSeries.strokeWidth = 3;
        lineSeries.propertyFields.stroke = "lineColor";
        lineSeries.propertyFields.fill = "lineColor";

        var bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
        bullet.circle.radius = 6;
        bullet.circle.fill = am4core.color("#fff");
        bullet.circle.strokeWidth = 3;

        chart.cursor = new am4charts.XYCursor();
        chart.cursor.behavior = "panX";
        chart.cursor.lineX.opacity = 0;
        chart.cursor.lineY.opacity = 0;
    });

    // ORDER GRAPH
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("order-graph", am4charts.XYChart);

        var data = [];
        var value = 0;

        '<?php foreach ($each_day_orders as $key => $each_day_order) : ?>'
        value = 0;
        data.push({
            category: '<?php echo sanitize($key) + 1; ?>',
            value: '<?php echo sanitize($each_day_orders[$key]); ?>'
        });
        '<?php endforeach; ?>'

        chart.data = data;
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "category";
        categoryAxis.renderer.minGridDistance = 15;
        categoryAxis.renderer.grid.template.location = 0.5;
        categoryAxis.renderer.grid.template.strokeDasharray = "1,3";
        categoryAxis.renderer.labels.template.rotation = -90;
        categoryAxis.renderer.labels.template.horizontalCenter = "left";
        categoryAxis.renderer.labels.template.location = 0.5;

        categoryAxis.renderer.labels.template.adapter.add("dx", function(dx, target) {
            return -target.maxRight / 2;
        })

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.renderer.ticks.template.disabled = true;
        valueAxis.renderer.axisFills.template.disabled = true;
        valueAxis.maxPrecision = 0;

        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryX = "category";
        series.dataFields.valueY = "value";
        series.tooltipText = "{valueY.value}";
        series.sequencedInterpolation = true;
        series.fillOpacity = 0;
        series.strokeOpacity = 1;
        series.strokeDashArray = "1,3";
        series.columns.template.width = 0.01;
        series.tooltip.pointerOrientation = "horizontal";

        var bullet = series.bullets.create(am4charts.CircleBullet);

        chart.cursor = new am4charts.XYCursor();
    });

    // RESTAURANTS PIE CHART
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("restaurant-status", am4charts.PieChart);

        // Set data
        var selected;
        var types = [{
            type: '<?php echo get_phrase('approved_restaurant'); ?>',
            percent: '<?php echo sanitize($number_of_approved_restaurants); ?>',
            color: am4core.color("#4CAF50")
        }, {
            type: '<?php echo get_phrase('requested_restaurant'); ?>',
            percent: '<?php echo sanitize($number_of_pending_restaurants); ?>',
            color: am4core.color("#FFCA28")
        }];

        // Add data
        chart.data = generateChartData();

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "percent";
        pieSeries.dataFields.category = "type";
        pieSeries.slices.template.propertyFields.fill = "color";
        pieSeries.slices.template.propertyFields.isActive = "pulled";
        pieSeries.slices.template.strokeWidth = 0;

        // CUSTOM CODES
        pieSeries.ticks.template.disabled = true;
        pieSeries.alignLabels = false;
        pieSeries.labels.template.text = "{value.percent.formatNumber('#.0')}%";
        pieSeries.labels.template.radius = am4core.percent(-40);
        pieSeries.labels.template.fill = am4core.color("white");

        function generateChartData() {
            var chartData = [];
            for (var i = 0; i < types.length; i++) {
                if (i == selected) {
                    for (var x = 0; x < types[i].subs.length; x++) {
                        chartData.push({
                            type: types[i].subs[x].type,
                            percent: types[i].subs[x].percent,
                            color: types[i].color,
                            pulled: true
                        });
                    }
                } else {
                    chartData.push({
                        type: types[i].type,
                        percent: types[i].percent,
                        color: types[i].color,
                        id: i
                    });
                }
            }
            return chartData;
        }

        pieSeries.slices.template.events.on("hit", function(event) {
            if (event.target.dataItem.dataContext.id != undefined) {
                selected = event.target.dataItem.dataContext.id;
            } else {
                selected = undefined;
            }
            chart.data = generateChartData();
        });
    });
</script>
