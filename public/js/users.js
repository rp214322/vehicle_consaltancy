var userTable = $("#UserTable").DataTable({
    dom: '<"top"lfB>rt<"bottom"ip>', // Buttons added
    processing: true,
    serverSide: true,
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100, 500],
    scrollY: "60vh",
    scrollCollapse: true,
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
        { data: "id", name: "id", orderable: true, width: "4%" }, // Always visible
        { data: "full_name", name: "full_name", orderable: true },
        { data: "phone", name: "phone", orderable: true },
        { data: "email", name: "email", orderable: true },
        { data: "status", name: "status", orderable: true },
        { data: "action", name: "action", orderable: false, width: "10%" },
    ],
    columnDefs: [
        { targets: 0, visible: true, searchable: true }, // Ensure ID column always visible
    ],
    language: {
        emptyTable: "No matching records found",
    },
});

// ✅ Toggle Column Visibility (excluding ID)
$(".toggle-column").on("change", function () {
    var column = userTable.column($(this).data("column"));
    column.visible($(this).prop("checked"));
});

// ✅ Status Filter
$("#statusFilter").on("change", function () {
    userTable.column(4).search(this.value).draw();
});

// ✅ Change Page Length
$("#user_filter").on("change", function () {
    var selectedValue = $(this).val();
    userTable.page.len(selectedValue).draw();
});

// ✅ Handle Ajax Errors
$.fn.dataTable.ext.errMode = "none";
userTable.on("error", function () {
    alert("Something went wrong, Please try again later.");
});

// ✅ Form Submission and Actions
jQuery(function () {
    var m = document.getElementById("UserModel");

    var users = {
        init: function () {
            $(document).on("click", ".btn-submit", function (e) {
                e.preventDefault();
                users.fire($(this), "save");
            });

            $(document).on("click", ".fill_data", function (e) {
                e.preventDefault();
                users.fire($(this), "fetch");
            });

            $(document).on("click", ".btn-delete", function (e) {
                e.preventDefault();
                if (confirm("Are you sure?")) {
                    users.fire($(this), "delete");
                }
            });

            // Disable Enter Key Form Submission
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
                    ? { _token: $('meta[name="csrf-token"]').attr("content") }
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
                    userTable.ajax.reload();

                    if (action === "fetch") {
                        $(".modal-content").html(response);
                        $(m).modal("show");
                    } else if (action === "delete") {
                        _this.closest("tr").remove();
                        $(m).modal("hide");
                    } else if (action === "save") {
                        $(m).modal("hide");
                    }
                },
                error: function (error) {
                    _f.find(".has-error").remove();
                    var response = JSON.parse(error.responseText);
                    $.each(error.responseJSON, function (key, value) {
                        if (key === "agree_terms") {
                            $(".confirm-read-tc").append(
                                "<span class='has-error'>" + value + "</span>"
                            );
                        } else {
                            var input = "[name=" + key + "]";
                            _f.find(input)
                                .parent()
                                .append(
                                    "<span class='has-error'>" +
                                        value +
                                        "</span>"
                                );
                        }
                    });
                },
            };
            ajax.fire();
        },
    };

    var model = {
        init: function () {
            $(m).on("hidden.bs.modal", function () {
                $(this).find("form")[0].reset();
                $(this).find(".has-error").remove();
            });
        },
    };

    users.init();
    model.init();

    // ✅ Status Update
    $(document).on("click", ".change_status", function () {
        var status = $(this).data("status");
        var id = $(this).data("id");

        $.ajax({
            url: updateStatus,
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, status: status },
            success: function (response) {
                userTable.ajax.reload(null, false);
            },
            error: function (xhr) {
                alert("Failed to update status: " + xhr.responseText);
            },
        });
    });
});
