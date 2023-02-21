var datatable = document.querySelector(".datatable");

var newDataTable = new DataTable(datatable, {
    perPage: 2,
    perPageSelect: [2, 5, 10, 15]
});