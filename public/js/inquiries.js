var inquiryTable = $("#InquiryTable").DataTable({
    dom: '<"top"lf>tr<"bottom"ip>',
    processing: true,
    serverSide: true,
    pageLength: 10, // Default page length
    lengthMenu: [5, 10, 25, 50, 100], // Dropdown for pagination
    scrollY: "60vh",
    scrollCollapse: true,
    ajax: list,

    columns: [
        { data: "id", name: "id", orderable: true, width: "4%" },
        { data: "type", name: "type", orderable: true },
        { data: "vehical", name: "vehical", orderable: true },
        { data: "name", name: "name", orderable: true },
        { data: "email", name: "email", orderable: true },
        { data: "phone", name: "phone", orderable: true },
        { data: "status", name: "status", orderable: true },
        { data: "created", name: "created", orderable: true },
        { data: "action", name: "action", orderable: false, width: "10%" },
    ],
    language: {
        emptyTable: "No matching records found",
    },
    fnDrawCallback: function (oSettings) {
        // Hide pagination if total records are less than the selected page length
        if (oSettings.fnRecordsDisplay() <= oSettings._iDisplayLength) {
            $(oSettings.nTableWrapper).find(".dataTables_paginate").hide();
        } else {
            $(oSettings.nTableWrapper).find(".dataTables_paginate").show();
        }
    },
});

// Handle Datatable Errors
$.fn.dataTable.ext.errMode = "none";
inquiryTable.on("error", function () {
    alert("Something went wrong, Please try again later.");
});

jQuery(function () {
    var m = document.getElementById("InquiryModel"),
        table = document.getElementById("InquiryTable");

    var inquiryHandler = {
        init: function () {
            jQuery(document).on("click", ".btn-submit", function (e) {
                e.preventDefault();
                inquiryHandler.fire($(this), "save");
            });

            jQuery(document).on("click", ".fill_data", function (e) {
                e.preventDefault();
                inquiryHandler.fire($(this), "fetch");
            });

            jQuery(document).on("click", ".btn-delete", function (e) {
                e.preventDefault();
                if (confirm("Are you sure?")) {
                    inquiryHandler.fire($(this), "delete");
                }
            });

            $(document).ready(function () {
                $(window).keydown(function (event) {
                    if (event.keyCode === 13) {
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
                    inquiryTable.ajax.reload();

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

    inquiryHandler.init();
    model.init();

    // Status Update Handler
    $(document).on("click", ".change_status", function () {
        var status = $(this).data("status");
        var id = $(this).data("id");

        $.ajax({
            url: updateStatus,
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            data: {
                id: id,
                status: status,
            },
            success: function (response) {
                inquiryTable.ajax.reload(null, false); // reload DataTable without full refresh
            },
            error: function (xhr) {
                alert("Failed to update status: " + xhr.responseText);
            },
        });
    });

    // Dynamic Pagination
    $("#inquiry_filter").on("change", function () {
        var selectedValue = $(this).val();
        inquiryTable.page.len(selectedValue).draw();
    });
});
