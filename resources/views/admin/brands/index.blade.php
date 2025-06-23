@extends('admin.layouts.app')
@section('title','Brand')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Simple Datatable start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-black h4">List Brand</h4>
                        </div>
                        <div class="pull-right">
                            <a href="javascript:;" class="fill_data btn btn-primary" data-url="{!! route('admin.brands.create') !!}" data-method="get">
                                New Brand
                            </a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="categoryFilter">Filter by Category:</label>
                            <select id="categoryFilter" class="form-control">
                                <option value="">All</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <label class="form-check-label" for="col1">Image</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="2" checked id="col2">
                                        <label class="form-check-label" for="col2">Brand</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="3" checked id="col3">
                                        <label class="form-check-label" for="col3">Action</label>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap" id="BrandsTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Brand</th>
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
<div class="modal fade bs-example-modal-lg" id="BrandModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content"></div>
    </div>
</div>
@endpush
@endsection
@section('scripts')
<script type="text/javascript">
    window.list = "{!! route('admin.brands.index') !!}";
</script>
<script src="{!! asset('js/brands.js') !!}" type="text/javascript"></script>
@endsection
