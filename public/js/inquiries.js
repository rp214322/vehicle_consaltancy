var inquiryTable = $("#InquiryTable").DataTable({
    dom: '<"top"lfB>rt<"bottom"ip>',
    orderCellsTop: true,
    order: [[1, "desc"]],
    processing: true,
    serverSide: true,
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100],
    scrollY: "600px",
    scrollCollapse: true,
    responsive: true,
    fixedHeader: { header: true },
    columnDefs: [{ responsivePriority: 1, targets: -1 }],
    select: false,
    ajax: {
        url: list,
        data: function (d) {
            d.inquiryFor = $("#inquiryForFilter").val();
            d.type = $("#typeFilter").val();
            d.status = $("#statusFilter").val();
        },
    },
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
        { data: "type1", name: "type1", orderable: true },
        { data: "type", name: "type", orderable: true },
        { data: "vehical", name: "vehical.title", orderable: true },
        { data: "name", name: "name", orderable: true },
        { data: "phone", name: "phone", orderable: true },
        { data: "status", name: "status", orderable: true },
        { data: "created_at", name: "created_at", orderable: true },
        {
            data: "action",
            name: "action",
            orderable: false,
            searchable: false,
            width: "10%",
        },
    ],
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
    language: {
        emptyTable: "No matching records found",
    },
});

// Apply filters
$("#inquiryForFilter, #typeFilter, #statusFilter").on("change", function () {
    inquiryTable.draw();
});
// Toggle column visibility
$(".toggle-column").on("change", function () {
    var columnIndex = $(this).data("column");
    var column = inquiryTable.column(columnIndex);

    // Toggle visibility based on checkbox state
    column.visible($(this).prop("checked"));
});

// Ensure checkboxes reflect initial column visibility
$(".toggle-column").each(function () {
    var columnIndex = $(this).data("column");
    var column = inquiryTable.column(columnIndex);
    $(this).prop("checked", column.visible());
});
$('a[data-toggle="tab"]').on("shown.bs.tab click", function (e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
});
$("div#sidebar").on("transitionend", function (e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
});
$.fn.dataTable.ext.errMode = "none";
inquiryTable.on("error.dt", function (e, settings, techNote, message) {
    console.error("An error occurred:", message);
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
