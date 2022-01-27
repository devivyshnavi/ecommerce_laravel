@extends('layouts.app')

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
            var data = google.visualization.arrayToDataTable([
                ['Coupons', 'Status'],
                <?php echo $coupons_details ?>
            ]);

            var options = {
                title: 'Coupons'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="container border rounded shadow">
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <div class="">
        <a href="/coupansexport" class="btn btn-danger">Coupan</a>
    </div>
</div>
@stop
<style>
    .container {
        width: 500px;

        display: flex;
        margin-left: 500px;
        justify-content: center;
    }
</style>
<!-- /.content-wrapper -->