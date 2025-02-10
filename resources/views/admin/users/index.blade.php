@extends('admin.layouts.app')
@section('title', 'User')
@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-black h4">List User</h4>
                        </div>
                        <div class="pull-right">
                            <a href="javascript:;" class="fill_data btn btn-primary" data-url="{!! route('admin.users.create') !!}"
                                data-method="get">
                                New User
                            </a>
                        </div>
                    </div>

                    <!-- Filter UI -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="statusFilter">Filter by Status:</label>
                            <select id="statusFilter" class="form-control">
                                <option value="">All</option>
                                <option value="Active">Active</option>
                                <option value="Blocked">Blocked</option>
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
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="0"
                                            checked id="col0">
                                        <label class="form-check-label" for="col0">ID</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="1"
                                            checked id="col1">
                                        <label class="form-check-label" for="col1">Name</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="2"
                                            checked id="col2">
                                        <label class="form-check-label" for="col2">Contact</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="3"
                                            checked id="col3">
                                        <label class="form-check-label" for="col3">Email</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="4"
                                            checked id="col4">
                                        <label class="form-check-label" for="col4">Status</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="5"
                                            checked id="col5">
                                        <label class="form-check-label" for="col5">Action</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap" id="UserTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        <div class="modal fade" id="UserModel" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content"></div>
            </div>
        </div>
    @endpush

@endsection

@section('scripts')
    <script type="text/javascript">
        window.list = "{!! route('admin.users.index') !!}";
        window.updateStatus = "{!! route('admin.users.status') !!}";
    </script>
    <script src="{!! asset('js/users.js') !!}" type="text/javascript"></script>
@endsection
