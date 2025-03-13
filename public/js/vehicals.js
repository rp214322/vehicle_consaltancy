var vehicalsTable = $("#VehicalsTable").DataTable({
    dom: '<"top"lfB>rt<"bottom"ip>',
    processing: true,
    serverSide: true,
    pageLength: 5,
    lengthMenu: [5, 10, 25, 50, 100, 500],
    scrollY: "60vh",
    scrollCollapse: true,
    ajax: {
        url: list,
        data: function (d) {
            d.category = $("#categoryFilter").val();
            d.status = $("#statusFilter").val(); // Send status filter value correctly
            d.fuel = $("#fuelFilter").val(); // Send selected fuel type
        },
    },
    buttons: [
        { extend: "copyHtml5", text: "Copy", className: "btn btn-secondary" },
        { extend: "excelHtml5", text: "Excel", className: "btn btn-success" },
        { extend: "csvHtml5", text: "CSV", className: "btn btn-info" },
        { extend: "pdfHtml5", text: "PDF", className: "btn btn-danger" },
        { extend: "print", text: "Print", className: "btn btn-primary" },
    ],
    columns: [
        { data: "id", name: "id", orderable: true, width: "4%" },
        { data: "category", name: "category.name", orderable: true },
        { data: "brand", name: "brand.name", orderable: true },
        { data: "title", name: "title", orderable: true },
        { data: "price", name: "price", orderable: true },
        { data: "status", name: "status", orderable: true },
        { data: "action", name: "action", orderable: false, width: "20%" },
    ],
    language: {
        emptyTable: "No matching records found",
    },
});

// Toggle column visibility
$(".toggle-column").on("change", function () {
    var columnIndex = $(this).data("column");
    var column = vehicalsTable.column(columnIndex);
    column.visible($(this).prop("checked"));
});

// Ensure checkboxes reflect initial column visibility
$(".toggle-column").each(function () {
    var columnIndex = $(this).data("column");
    var column = vehicalsTable.column(columnIndex);
    $(this).prop("checked", column.visible());
});

// Filter by Category
$("#categoryFilter").on("change", function () {
    vehicalsTable.draw();
});

// Filter by Fuel
$("#fuelFilter").on("change", function () {
    vehicalsTable.draw();
});

// Filter by Status
$("#statusFilter").on("change", function () {
    vehicalsTable.draw();
});

// Handle errors
$.fn.dataTable.ext.errMode = "none";
vehicalsTable.on("error", function () {
    alert("Something went wrong, Please try again later.");
});

jQuery(function () {
    var m = document.getElementById("VehicalModel"),
        table = document.getElementById("VehicalsTable");

    var rack_types = {
        init: function () {
            jQuery(document).on("click", ".btn-submit", function (e) {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
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
                    vehicalsTable.ajax.reload();

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

    // Fetch brands based on category selection
    $(document).on("change", "#CategoryId", function () {
        var id = $(this).val();
        $.ajax({
            url: fetchData,
            type: "GET",
            data: {
                id: id,
                type: "brand",
            },
            success: function (response) {
                $("#BrandId").html(response);
            },
        });
    });

    // Fetch models based on brand selection
    $(document).on("change", "#BrandId", function () {
        var id = $(this).val();
        $.ajax({
            url: fetchData,
            type: "GET",
            data: {
                id: id,
                type: "model",
            },
            success: function (response) {
                $("#ModelId").html(response);
            },
        });
    });

    // Change status action
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
                vehicalsTable.ajax.reload(null, false); // reload datatable ajax
            },
        });
    });
});
