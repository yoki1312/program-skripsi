$(document).ready(function () {

    $('#ngoding').DataTable({
        "searching": false,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "paginate": true,
        "displayLength": 5,
        "lengthChange": false,
        "filter": true,
        "bInfo": false,
        ajax: 'datahomedekor',
        columns: [
           
            {
                data: 'foto', class:'text-center',
                render: function (data, type, row) {
                    return '<img width="300px" src="'+ 'produk/detailProduk/'+ data +'"/>';
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
        rowGroup: {
            dataSrc: 'judul'
        },
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
