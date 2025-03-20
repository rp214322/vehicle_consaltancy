@extends('admin.layouts.app')
@section('title', 'Inquiries')
@section('content')    
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-black h4">Inquiries</h4>
                        </div>
                    </div>

                    <!-- Add Filter Section -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inquiryForFilter">Inquiry For:</label>
                            <select id="inquiryForFilter" class="form-control">
                                <option value="">All</option>
                                <option value="Vehical">Vehicle</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="typeFilter">Type:</label>
                            <select id="typeFilter" class="form-control">
                                <option value="">All</option>
                                <option value="buy">Buy</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="statusFilter">Status:</label>
                            <select id="statusFilter" class="form-control">
                                <option value="">All</option>
                                <option value="0">Pending</option>
                                <option value="1">Answered</option>
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
                                        <label class="form-check-label" for="col0">No</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="1"
                                            checked id="col1">
                                        <label class="form-check-label" for="col1">Inquiry For</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="2"
                                            checked id="col2">
                                        <label class="form-check-label" for="col2">Type</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="3"
                                            checked id="col3">
                                        <label class="form-check-label" for="col3">Vehicle</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="4"
                                            checked id="col4">
                                        <label class="form-check-label" for="col4">Name</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="5"
                                            checked id="col5">
                                        <label class="form-check-label" for="col5">Phone</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="6"
                                            checked id="col6">
                                        <label class="form-check-label" for="col6">Status</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="7"
                                            checked id="col7">
                                        <label class="form-check-label" for="col7">Inquired On</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input toggle-column" type="checkbox" data-column="8"
                                            checked id="col8">
                                        <label class="form-check-label" for="col8">Action</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap" id="InquiryTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Inquiry For</th>
                                    <th>Type</th>
                                    <th>Vehical</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Inquired On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Modal -->
    <div class="modal fade" id="showInquiryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inquiry Details</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        <div class="modal fade bs-example-modal-lg" id="InquiryModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content"></div>
            </div>
        </div>
    @endpush
@endsection

@section('scripts')
    <script type="text/javascript">
        window.list = "{!! route('admin.inquiries.index') !!}";
        window.updateStatus = "{!! route('admin.inquiries.status') !!}";
    </script>
    <script src="{{ asset('js/inquiries.js') }}" type="text/javascript"></script>
@endsection