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
        ajax: '/laporan/stok/tersedia',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_barang',
                class: 'text-left'
            },
            {
                data: 'nama_latin',
                class: 'text-left'
            },
            {
                data: 'nama_kategori',
                class: 'text-center'
            },
            {
                data: 'nama_barang',
                class: 'text-center'
            },
        ],
    });
    

});