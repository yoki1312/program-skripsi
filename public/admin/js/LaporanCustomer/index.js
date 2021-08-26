$(document).ready(function () {
    $('#ngoding').DataTable({
        "searching": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "displayLength": 10,
        "paginate": true,
        "lengthChange": true,
        "filter": true,
        "bInfo": false,
        ajax: 'customer',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama',
                class: 'text-left'
            },
            {
                data: 'alamat',
                class: 'text-center',
                render : function(meta,data,row){
                    return row.alamat == null ? '-' : row.alamat;
                }
            },
            {
                data: 'email',
                class: 'text-center'
            },
            {
                data: 'jumlah_pembelian',
                class: 'text-center',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    });
    

});