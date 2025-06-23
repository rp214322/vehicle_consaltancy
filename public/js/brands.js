var brandsTable = $("#BrandsTable").DataTable({
    dom: '<"top"lfB>rt<"bottom"ip>', // Added "B" for buttons
    processing: true,
    serverSide: true,
    pageLength: 5,
    lengthMenu: [5, 10, 25, 50, 100, 500],
    scrollY: "60vh",
    scrollCollapse: true,
    ajax: {
        url: list,
        data: function (d) {
            d.category = $("#categoryFilter").val(); // Send category filter value
        }
    },
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
        { 
            data: null, 
            name: "no", 
            orderable: false, 
            searchable: false, 
            width: "4%",
            render: function (data, type, row, meta) {
                return meta.row + 1;  // Serial No starting from 1
            }
        },
        { data: "image", name: "image", orderable: false }, // Ensure this column is included
        { data: "name", name: "name", orderable: true },
        { data: "action", name: "action", orderable: false, width: "10%" },
    ],
    language: {
        emptyTable: "No matching records found",
    },
    fnDrawCallback: function (oSettings) {
        if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
            $(oSettings.nTableWrapper).find(".dataTables_paginate").hide();
        } else {
            $(oSettings.nTableWrapper).find(".dataTables_paginate").show();
        }
    },
});

$(document).ready(function () {
    var table = $("#BrandsTable").DataTable(); // Ensure correct table variable

    $(".toggle-column").on("change", function () {
        var columnIndex = $(this).data("column");
        var column = table.column(columnIndex);

        // Toggle visibility based on checkbox state
        column.visible($(this).prop("checked"));
    });

    // ✅ Ensure checkboxes reflect initial column visibility
    $(".toggle-column").each(function () {
        var columnIndex = $(this).data("column");
        var column = table.column(columnIndex);
        $(this).prop("checked", column.visible());
    });

    // Category Filter
    $("#categoryFilter").on("change", function () {
        table.draw();
    });
});

$.fn.dataTable.ext.errMode = "none";
brandsTable.on("error", function () {
    alert("Something went wrong, Please try again later.");
});

jQuery(function () {
    var m = document.getElementById("BrandModel");

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

            var data, contentType, processData;
            if (action === "delete") {
                data = {
                    _token: jQuery('meta[name="csrf-token"]').attr("content"),
                };
                contentType = "application/x-www-form-urlencoded";
                processData = true;
            } else {
                data = new FormData(_f[0]); // Use FormData for file upload
                contentType = false;
                processData = false;
            }

            var ajax = {
                fire: function () {
                    $.ajax({
                        type: method,
                        url: url,
                        data: data,
                        contentType: contentType,
                        processData: processData,
                        cache: false,
                        enctype: "multipart/form-data",
                    })
                        .done(function (response) {
                            ajax.success(response);
                        })
                        .fail(function (response) {
                            ajax.error(response);
                        });
                },

                success: function (response) {
                    brandsTable.ajax.reload();

                    if (action === "fetch") {
                        jQuery(".modal-content").html(response);
                        jQuery(m).modal("show");
                    } else if (action === "delete") {
                        jQuery(_this).closest("tr").remove();
                        jQuery(m).modal("hide");
                    } else if (action === "save") {
                        jQuery(m).modal("hide");
                        _f[0].reset(); // Reset form fields
                    }
                },

                error: function (error) {
                    jQuery(_f).find(".invalid-feedback").remove(); // Remove old errors

                    if (error.responseJSON && error.responseJSON.errors) {
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                var input = "[name='" + key + "']";
                                jQuery(_f)
                                    .find(input)
                                    .after(
                                        "<div class='invalid-feedback d-block'>" +
                                            value +
                                            "</div>"
                                    );
                            }
                        );
                    }
                },
            };

            ajax.fire();
        },
    };

    var model = {
        init: function () {
            jQuery(m).on("hidden.bs.modal", function () {
                jQuery(this).find("form")[0].reset();
                jQuery(this).find(".invalid-feedback").remove();
            });
        },
    };

    rack_types.init();
    model.init();
});
