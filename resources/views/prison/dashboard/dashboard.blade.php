@extends('layouts.account')@section('title', 'Dashboard') @section('content')

<div class="container-fluid">
    <div class="row">
        <!-- pie graph show here -->
        <div class="col-12">
            <div id="google-line-chart" style="height: 300px;"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <table class="table table-bordered table-striped table-hover tenant-dash">
                <thead>
                    <tr>
                        <th colspan="2" style="background: rgba(0, 145, 234, 0.95); color: #fff;">Live Calls
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Active Calls</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Total Calls Calls</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Total Minutes</td>
                        <td>0.0</td>
                    </tr>
                    <tr>
                        <td>PSTN Minutes</td>
                        <td>0.0</td>
                    </tr>
                    <tr>
                        <td>DID Minutes</td>
                        <td>0.0</td>
                    </tr>
                    <tr>
                        <td>Total Cost</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-md-6">
            <table class="table table-bordered table-striped table-hover tenant-dash">
                <thead>
                    <tr>
                        <th colspan="2" style="background: rgba(0, 145, 234, 0.95); color: #fff;">Extensions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Active</td>
                        <td>{{count($extensions)}}</td>
                    </tr>
                    <tr>
                        <td>Inactive</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Online</td>
                        <td>0</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Mintues'],
            ['January', 120], ['February', 140], ['March', 80], ['April', 65], ['May', 180],
        ]);

        // var options = {
        //     title: 'Register Users Month Wise',
        //     curveType: 'function',
        //     legend: { position: 'bottom' }
        // };

        var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));

        chart.draw(data);
    }
</script>
@endpush
@endsection