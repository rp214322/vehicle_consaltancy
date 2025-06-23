@extends('admin.layouts.app')
@section('title', 'Gallery')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Simple Datatable start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <div class="clearfix mb-20">
                                <div class="d-flex flex-column">
                                    <h4 class="text-black h4 mt-2">Vehical Gallery</h4>
                                    <a href="{{ route('admin.vehicals.index') }}" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix mb-20">
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
                                            <label class="form-check-label" for="col1">File</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="2" checked id="col2">
                                            <label class="form-check-label" for="col2">File Type</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="3" checked id="col3">
                                            <label class="form-check-label" for="col3">Featured</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input toggle-column" type="checkbox" data-column="4" checked id="col4">
                                            <label class="form-check-label" for="col4">Action</label>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                   
                        </div>
                        <div class="pull-right">
                            <div class="pd-20">
                                <div class="row" style="margin-left: 3px;">
                                    <div id="filelist">
                                        <form method="post" id="galleryform">
                                            @csrf
                                        </form>
                                    </div>
                                    <div id="progressbar"></div>
                                    <br />
                                    <div class="form-group">
                                        <div id="container" class="gallary-btn">
                                            <a id="pickfiles" href="javascript:;" class="btn btn-primary">Upload Photo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap" id="GalleryTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>File</th>
                                    <th>File Type</th>
                                    <th>Featured</th>
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
        <div class="modal fade bs-example-modal-lg" id="GalleryModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content"></div>
            </div>
        </div>
    @endpush
@endsection
@section('scripts')
    <script type="text/javascript">
        window.list = "{!! route('admin.vehical.galleries.index', $vehical_id) !!}";
    </script>
    <script src="{!! asset('js/galleries.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/plupload.full.min.js') !!}"></script>
    <script type="text/javascript">
        var uploader = new plupload.Uploader({
            runtimes: 'html5,flash,silverlight,html4',
            browse_button: 'pickfiles',
            container: document.getElementById('container'),
            url: "{!! route('admin.vehical.galleries.store', $vehical_id) !!}",
            dragdrop: true,
            chunk_size: '1mb',
            filters: {
                max_file_size: '20mb',
                mime_types: [
                    { title: "Image files", extensions: "jpg,png,jpeg" },
                    { title: "Video files", extensions: "mp4,mkv" },
                ]
            },
            flash_swf_url: "{{ asset('plupload/Moxie.swf') }}",
            silverlight_xap_url: "{{ asset('plupload/Moxie.xap') }}",

            init: {
                PostInit: function () {
                    console.log("Uploader initialized");
                },
                FilesAdded: function (up, files) {
                    uploader.start();
                    $('#progressbar').fadeIn();
                },
                UploadProgress: function (up, file) {
                    $('#progressbar').css('width', file.percent + '%');
                },
                FileUploaded: function (up, file, response) {
                    console.log("File uploaded:", response.response);
                },
                UploadComplete: function (up, files) {
                    var formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('vehical_id', '{{ $vehical_id }}');

                    // Append each uploaded file
                    plupload.each(files, function (file) {
                        var blob = file.getSource().getSource();
                        formData.append('files[]', blob, file.name);
                    });

                    $.ajax({
                        type: "POST",
                        url: "{!! route('admin.vehical.galleries.store', $vehical_id) !!}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log("Upload Success:", response);
                            location.reload();
                        },
                        error: function (error) {
                            console.error("Upload Failed:", error);
                            alert("Something went wrong. Please try again.");
                        }
                    });
                },
            }
        });
        uploader.init();
    </script>
@endsection
