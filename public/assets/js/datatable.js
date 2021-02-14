$(document).ready(function() {
    $("#datatable").DataTable({
        pagingType: "numbers",
        lengthMenu: [
            [5, 10, 15, 20, 25, 50, 75, 100, -1],
            [5, 10, 15, 20, 25, 50, 75, 100, "All"]
        ],
        language: {
            url:
                "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
        }
    });

    $('select').select2();
});
