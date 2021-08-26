$(document).ready(function () {

    $('#ngoding').DataTable({
        "searching": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "paginate": true,
        "lengthChange": true,
        "filter": true,
        "bInfo": false,
        ajax: 'bdata',
        columns: [{
                "data": null,
                "sortable": false,
                class:'text-center',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_tanaman',class:'text-center'
            },
            {
                data: 'nama_latin',
                class: 'text-center',
            },
         
            {
                data: 'nama_kategori',
                class: 'text-center',
            },
            {
                data: 'nama_jenisTanaman',
                class: 'text-center',
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
$(document).on('click', '.delete', function () {
    id_barang = $(this).attr('id');
    $('#confirmModal').modal('show');
});

$('#ok_button').click(function () {
    $.ajax({
        url: "barang/destroy/" + id_barang,
        beforeSend: function () {
            $('#ok_button').text('Deleting....');
        },
        success: function (data) {
            setTimeout(function () {
                $('#confirmModal').modal('hide');
                $('#ngoding').DataTable().ajax.reload();
                swal("Sukses!", "Barang dihapus!", "success");
            }, 2000);
        }
    })
});
