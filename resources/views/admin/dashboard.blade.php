@extends('admin.layouts.app')
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">Overview</h2>
            </div>
            <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <a href="{{ route('admin.users.index') }}">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">
                                        {{ App\Models\User::where('role', '!=', 'admin')->count() }}</div>
                                    <div class="font-14 text-secondary weight-500">Total Users</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf">
                                        <i class="fa fa-users text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <a href="{{ route('admin.brands.index') }}">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ App\Models\Brand::count() }}</div>
                                    <div class="font-14 text-secondary weight-500">Total Brands</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ffcc00">
                                        <span class="fa fa-tags text-white"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <a href="{{ route('admin.models.index') }}">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ App\Models\VehicalModel::count() }}</div>
                                    <div class="font-14 text-secondary weight-500">Total Models</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b">
                                        <span class="fa fa-cubes text-white"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <a href="{{ route('admin.vehicals.index') }}">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ App\Models\Vehical::count() }}</div>
                                    <div class="font-14 text-secondary weight-500">Total Vehicles</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon">
                                        <i class="fa fa-car text-white" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card-box height-100-p pd-20">
                        <h2 class="h4 mb-20">
                            <a href="{{ route('admin.inquiries.index') }}" class="text-dark font-weight-bold">
                                Total Inquiry: {{ App\Models\Inquiry::count() }}
                            </a>
                        </h2>
                        <div id="chart5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <script type="text/javascript">
        var data = JSON.parse('{!! $data !!}');
        var options5 = {
            chart: {
                height: 350,
                type: 'bar',
                fontFamily: 'Poppins, sans-serif',
                toolbar: {
                    show: false
                },
            },
            colors: ['#db2d2e', '#008000'],
            grid: {
                borderColor: '#c7d2dd',
                strokeDashArray: 5
            },
            plotOptions: {
                bar: {
                    columnWidth: '25%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                    name: "Pending Inquiries",
                    data: data['0']['pending']
                },
                {
                    name: "Completed Inquiries",
                    data: data['0']['completed']
                }
            ],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '16px'
                    }
                }
            },
            legend: {
                horizontalAlign: 'right',
                position: 'top',
                fontSize: '16px'
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };
        var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
        chart5.render();
    </script>
@endsection
