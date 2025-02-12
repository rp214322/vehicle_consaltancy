var userTable = $("#UserTable").DataTable({
    dom: '<"top"lfB>rt<"bottom"ip>', // Added "B" for buttons
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
        { data: "id", name: "id", orderable: true, width: "4%" },
        { data: "full_name", name: "full_name", orderable: true },
        { data: "phone", name: "phone", orderable: true },
        { data: "email", name: "email", orderable: true },
        { data: "status", name: "status", orderable: true },
        { data: "action", name: "action", orderable: false, width: "10%" },
    ],
    language: {
        emptyTable: "No matching records found",
    },
});

// ✅ Add custom status filter dropdown
$("#statusFilter").on("change", function () {
    userTable.column(4).search(this.value).draw();
});

/* Custom Filter: Change page length dynamically */
$("#user_filter").on("change", function () {
    var selectedValue = $(this).val();
    userTable.page.len(selectedValue).draw();
});

$.fn.dataTable.ext.errMode = "none";
userTable.on("error", function () {
    alert("Something went wrong, Please try again later.");
});

jQuery(function () {
    var m = document.getElementById("UserModel"),
        table = document.getElementById("UserTable");

    var users = {
        init: function () {
            jQuery(document).on("click", ".btn-submit", function (e) {
                e.preventDefault();
                users.fire($(this), "save");
            });

            jQuery(document).on("click", ".fill_data", function (e) {
                e.preventDefault();
                users.fire($(this), "fetch");
            });

            jQuery(document).on("click", ".btn-delete", function (e) {
                e.preventDefault();
                if (confirm("Are you sure?")) {
                    users.fire($(this), "delete");
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
                    userTable.ajax.reload();

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
                        if (key === "agree_terms") {
                            jQuery(".confirm-read-tc").append(
                                "<span class='has-error'>" + value + "</span>"
                            );
                        } else {
                            var input = "[name=" + key + "]";
                            jQuery(_f)
                                .find(input)
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
            jQuery(m).on("hidden.bs.modal", function () {
                jQuery(this).find("form")[0].reset();
                jQuery(this).find(".has-error").remove();
            });
        },
    };

    users.init();
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
                // Reload DataTable to reflect changes
                userTable.ajax.reload(null, false);
            },
            error: function (xhr) {
                alert("Failed to update status: " + xhr.responseText);
            },
        });
    });

    // Trigger country-state functionality when modal is shown
    $('#UserModel').on('show.bs.modal', function () {
        initializeCountryState();
    });

    function initializeCountryState() {
        const countrySelect = $("#countrySelect");
        const stateSelect = $("#stateSelect");
        const phoneInput = $("input[name='phone']");
        const geonamesUsername = "ritesh10_shivlab"; // Replace with your Geonames username

        // Fetch all countries and filter only Canada & India
        fetch("https://restcountries.com/v3.1/all")
            .then(response => response.json())
            .then(data => {
                countrySelect.empty().append('<option value="">Select Country</option>');

                // Filter only Canada & India
                const filteredCountries = data.filter(country => country.cca2 === "CA" || country.cca2 === "IN");

                filteredCountries.forEach(country => {
                    const countryName = country.name.common;
                    const countryCode = country.cca2;
                    const geonameId = countryCode === "CA" ? 6251999 : 1269750; // Canada & India geoname IDs

                    countrySelect.append(
                        `<option value="${countryCode}" data-geonameid="${geonameId}">${countryName}</option>`
                    );
                });

                countrySelect.select2({
                    theme: 'bootstrap4',
                    width: '100%',
                    placeholder: 'Select Country'
                });
            })
            .catch(error => console.error("API Error (Countries):", error));

        countrySelect.on("change", function() {
            const selectedCountryCode = $(this).val();
            stateSelect.empty().append('<option value="">Select State</option>');

            if (selectedCountryCode) {
                const selectedGeonameId = $(this).find(":selected").data("geonameid");
                fetchStates(selectedGeonameId);
            }

            updatePhoneCode(selectedCountryCode);

            stateSelect.select2({
                theme: 'bootstrap4',
                width: '100%',
                placeholder: 'Select State'
            });
        });

        function fetchStates(geonameId) {
            if (!geonameId) return;

            fetch(`http://api.geonames.org/childrenJSON?geonameId=${geonameId}&username=${geonamesUsername}`)
                .then(response => response.json())
                .then(data => {
                    stateSelect.empty().append('<option value="">Select State</option>');

                    if (data.geonames.length > 0) {
                        data.geonames.forEach(state => {
                            stateSelect.append(
                                `<option value="${state.name}">${state.name}</option>`);
                        });
                    }
                })
                .catch(error => console.error("API Error (States):", error));
        }

        function updatePhoneCode(countryCode) {
            if (countryCode === "CA") {
                phoneInput.val("+1 " + phoneInput.val().replace(/^\+\d+\s*/, ""));
            } else if (countryCode === "IN") {
                phoneInput.val("+91 " + phoneInput.val().replace(/^\+\d+\s*/, ""));
            } else {
                phoneInput.val(phoneInput.val().replace(/^\+\d+\s*/, ""));
            }
        }
    }
});
