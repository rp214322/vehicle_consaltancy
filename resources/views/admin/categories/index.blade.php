@extends('admin.layouts.app')
@section('title','Categories')
@section('content')    
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-black h4">List Categories</h4>
                    </div>
                    <div class="pull-right">
                        <a href="javascript:;" class="fill_data btn btn-primary" 
                           data-url="{!! route('admin.categories.create') !!}" data-method="get">
                            New Category
                        </a>
                    </div>
                </div>

                <!-- Filter UI -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Show Columns:</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" 
                                    id="columnToggleDropdown" data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false">
                                Select Columns
                            </button>
                            <div class="dropdown-menu p-3" aria-labelledby="columnToggleDropdown">
                                <div class="form-check">
                                    <input class="form-check-input toggle-column" type="checkbox" 
                                           data-column="0" checked id="col0">
                                    <label class="form-check-label" for="col0">ID</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input toggle-column" type="checkbox" 
                                           data-column="1" checked id="col1">
                                    <label class="form-check-label" for="col1">Category</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input toggle-column" type="checkbox" 
                                           data-column="2" checked id="col2">
                                    <label class="form-check-label" for="col2">Action</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap" id="CategoriesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
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
<div class="modal fade bs-example-modal-lg" id="CategoryModel" tabindex="-1" role="dialog" 
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content"></div>
    </div>
</div>
@endpush
@endsection

@section('scripts')
<script type="text/javascript">
    window.list = "{!! route('admin.categories.index') !!}";
</script>
<script src="{!! asset('js/categories.js') !!}" type="text/javascript"></script>
@endsection
