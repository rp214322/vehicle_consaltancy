@extends('admin.layouts.app')
@section('title', 'vehical')
@section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <!-- Simple Datatable start -->
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix mb-20">
                            <div class="pull-left">
                                <h4 class="text-black h4">List Vehical</h4>
                            </div>
                            <div class="pull-right">
                                <a href="javascript:;" class="fill_data btn btn-primary" data-url="{!! route('admin.vehicals.create') !!}" data-method="get">
                                    New Vehical
                                </a>
                            </div>
                        </div>
                        <!-- Filter UI -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="categoryFilter">Filter by Category:</label>
                                <select id="categoryFilter" class="form-control">
                                    <option value="">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="statusFilter">Filter by Status:</label>
                                <select id="statusFilter" class="form-control">
                                    <option value="">All</option>
                                    <option value="Sold">Sold</option>
                                    <option value="UnSold">UnSold</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="fuelFilter">Filter by Fuel:</label>
                                <select id="fuelFilter" class="form-control">
                                    <option value="">All</option>
                                    @foreach(App\Models\Vehical::$fules as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Show Columns:</label>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="columnToggleDropdown"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Columns
                                    </button>
                                    <div class="dropdown-menu p-3" aria-labelledby="columnToggleDropdown">
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="0" checked id="col0">
                                            <label class="form-check-label" for="col0">No</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="1" checked id="col1">
                                            <label class="form-check-label" for="col1">Category</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="2" checked id="col2">
                                            <label class="form-check-label" for="col2">Brand-Model</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="3" checked id="col3">
                                            <label class="form-check-label" for="col3">Details</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="4" checked id="col4">
                                            <label class="form-check-label" for="col4">Price</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="5" checked id="col5">
                                            <label class="form-check-label" for="col5">Status</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="6" checked id="col6">
                                            <label class="form-check-label" for="col6">Action</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap" id="VehicalsTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category</th>
                                        <th>Brand-Model</th>
                                        <th>Details</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    @push('modals')
        <div class="modal fade bs-example-modal-lg" id="VehicalModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content"></div>
            </div>
        </div>
    @endpush
@endsection
@section('scripts')
    <script type="text/javascript">
        window.list = "{!! route('admin.vehicals.index') !!}";
        window.fetchData = "{!! route('fetchData') !!}";
        window.updateStatus = "{!! route('admin.vehicals.status') !!}";
    </script>
    <script src="{!! asset('js/vehicals.js') !!}" type="text/javascript"></script>
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
@endsection
