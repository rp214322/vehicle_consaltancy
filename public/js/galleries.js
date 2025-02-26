var galleryTable = $("#GalleryTable").DataTable({
    dom: '<"top"lfB>rt<"bottom"ip>', // Added "B" for buttons
    processing: true,
    serverSide: true,
    pageLength: 10, // Default page length
    lengthMenu: [5, 10, 25, 50, 100, 500], // Pagination options
    scrollY: "60vh", // Set max height to 60% of viewport height
    scrollCollapse: true, // Allow table height to shrink when less data is shown
    ajax: list,
    buttons: [
        {
            extend: "copyHtml5",
            text: "Copy",
            className: "btn btn-secondary",
        },
        {
            extend: "excelHtml5",
            text: "Excel",
            className: "btn btn-success",
        },
        {
            extend: "csvHtml5",
            text: "CSV",
            className: "btn btn-info",
        },
        {
            extend: "pdfHtml5",
            text: "PDF",
            className: "btn btn-danger",
        },
        {
            extend: "print",
            text: "Print",
            className: "btn btn-primary",
        },
    ],

    columns: [
        { data: "id", name: "id", orderable: true, width: "4%" },
        { data: "file", name: "file", orderable: true },
        { data: "file_type", name: "file_type", orderable: true },
        { data: "is_featured", name: "is_featured", orderable: true },
        { data: "action", name: "action", orderable: false, width: "20%" },
    ],
    language: {
        emptyTable: "No matching records found",
    },
    fnDrawCallback: function (oSettings) {
        // Hide pagination when data is less than page limit
        if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
            $(oSettings.nTableWrapper).find(".dataTables_paginate").hide();
        } else {
            $(oSettings.nTableWrapper).find(".dataTables_paginate").show();
        }
    },
});

// Toggle column visibility based on checkbox
$(".toggle-column").on("change", function () {
    var columnIndex = $(this).data("column");
    var column = galleryTable.column(columnIndex);
    column.visible($(this).prop("checked"));
});

// Ensure checkboxes reflect initial column visibility
$(".toggle-column").each(function () {
    var columnIndex = $(this).data("column");
    var column = galleryTable.column(columnIndex);
    $(this).prop("checked", column.visible());
});
/* Custom Filter: Change page length dynamically */
$("#gallery_filter").on("change", function () {
    var selectedValue = $(this).val();
    galleryTable.page.len(selectedValue).draw();
});

$.fn.dataTable.ext.errMode = "none";
galleryTable.on("error", function () {
    alert("Something went wrong, Please try again later.");
});

jQuery(function () {
    var m = document.getElementById("GalleryModel"),
        table = document.getElementById("GalleryTable");

    var rack_types = {
        init: function () {
            jQuery(document).on("click", ".btn-submit", function (e) {
                e.preventDefault();
                rack_types.fire($(this), "save");
            });

            jQuery(document).on("click", ".fill_data", function (e) {
                e.preventDefault();
                rack_types.fire($(this), "fetch");
            });

            jQuery(document).on("click", ".btn-delete", function (e) {
                e.preventDefault();
                if (confirm("Are you sure?")) {
                    rack_types.fire($(this), "delete");
                }
            });

            $(document).ready(function () {
                $(window).keydown(function (event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
            });
        },
        fire: function (_this, action) {
            var _f = _this.closest("form");
            var method =
                action === "save" ? _f.attr("method") : _this.data("method");
            var url = action === "save" ? _f.attr("action") : _this.data("url");
            var data =
                action === "delete"
                    ? {
                          _token: jQuery('meta[name="csrf-token"]').attr(
                              "content"
                          ),
                      }
                    : _f.serialize();

            var ajax = {
                fire: function () {
                    $.ajax({
                        type: method,
                        url: url,
                        data: data,
                    })
                        .done(function (response) {
                            ajax.success(response);
                        })
                        .fail(function (response) {
                            ajax.error(response);
                        });
                },
                success: function (response) {
                    galleryTable.ajax.reload();

                    if (action === "fetch") {
                        jQuery(".modal-content").html(response);
                        jQuery(m).modal("show");
                    } else if (action === "delete") {
                        jQuery(_this).closest("tr").remove();
                        jQuery(m).modal("hide");
                    } else if (action === "save") {
                        jQuery(m).modal("hide");
                    }
                },
                error: function (error) {
                    jQuery(_f).find(".has-error").remove();
                    var response = JSON.parse(error.responseText);
                    $.each(error.responseJSON, function (key, value) {
                        var input = "[name=" + key + "]";
                        jQuery(_f)
                            .find(input)
                            .parent()
                            .append(
                                "<span class='has-error'>" + value + "</span>"
                            );
                    });
                },
            };
            ajax.fire();
        },
    };

    var model = {
        init: function () {
            jQuery(m).on("hidden.bs.modal", function () {
                jQuery(this).find("form")[0].reset();
                jQuery(this).find(".has-error").remove();
            });
        },
    };

    rack_types.init();
    model.init();
});
