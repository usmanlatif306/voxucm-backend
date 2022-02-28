@extends('layouts.master')@section('title', 'My Account') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @endif

    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <div class="row mb-3">
                <div class="text-white py-2 px-3 ml-3" style="background: rgba(0, 145, 234, 0.95);">
                    Welcome {{$user->username}}
                </div>
                <div class="text-white py-2 px-3 ml-3" style="background: #0071bc;">
                    Balance {{number_format((float)$user->credit, 4, '.', '')}}
                </div>

            </div>
            <div class="row">
                <!-- pie graph show here -->
                <div class="col-8 offset-2 col-md-12 offset-md-0">
                    <div id="google-line-chart" style="height: 300px;"></div>
                </div>
                <div class="col-12 col-md-6">
                    <table class="table table-bordered table-hover tenant-dash">
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
                    <table class="table table-bordered table-hover tenant-dash">
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
                                <td>2</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
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