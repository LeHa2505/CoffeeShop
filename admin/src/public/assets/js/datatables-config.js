$.extend($.fn.dataTable.defaults, {
    pageLength: 20,
    paging: true,
    responsive: false,
    autoWidth: false,
    fixedHeader: {
        header: false,
        footer: true
    },
    scrollX: true,
    scrollCollapse: false,
    searching: true,
    ordering: false,
    info: false,
    bPaginate: true,
    dom: 'rt<"bottom"p><"clear">',
    columnDefs: [
        {
            targets: "no-sort",
            orderable: false,
        },
    ],
    processing: true,
    language: {
        sSearch: '<i class="fa fa-search"></i> 検索',
        emptyTable: "Không có dữ liệu",
        info: "Từ _START_ đến _END_ trong _TOTAL_",
        infoEmpty: "0 件中 0 から 0 まで表示",
        infoPostFix: "",
        infoThousands: ",",
        loadingRecords: `Loading...`,
        infoFiltered: "",
        processing: `
                <div class="spinner-border" role="status">
                  <span class="sr-only">読み込み中...</span>
                </div>
              `,
        zeroRecords: "Không có dữ liệu",
        paginate: {
            first: "Đầu",
            last: "Cuối",
            next: "<i class=\"fas fa-chevron-right\"></i>",
            previous: "<i class=\"fas fa-chevron-left\"></i>"
        },
    },
    drawCallback: function (oSettings) {
        // if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) {
        //     $(oSettings.nTableWrapper).find(".dataTables_paginate").hide();
        // } else {
        //     $(oSettings.nTableWrapper).find(".dataTables_paginate").show();
        // }
    },
});
