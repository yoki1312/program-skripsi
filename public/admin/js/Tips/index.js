$(document).ready(function () {
  
    $('#ngoding').DataTable({
        "searching": false,
        "autoWidth": true,
        // "responsive": false,
        // "processing": true,
        "serverSide": true,
        "displayLength": 100,
        "paginate": false,
        "lengthChange": false,
        "filter": true,
        "bInfo": false,
        ajax: 'dataTips',
        columns: [{
            "data": null,
            class: 'text-center',
            "sortable": false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'judul',
            class: 'text-center',
        },
        {
            data: 'nama_kategori',
            class: 'text-center',
            render: function (data, type, row, meta) {
                return ((row.nama_kategori = null || row.nama_kategori == '' ? '-' : row.nama_kategori));
            }
            },

        {
                data: 'action',
                class: 'text-center',
                name: 'action',
                orderable: false,
                searchable: false
        },
        ],
       

    });


});