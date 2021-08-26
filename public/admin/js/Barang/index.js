let table;
let status;
$(document).ready(function () {

    var groupColumn = 2;

    $(document).on('change', '#inlineRadio1', function () {
        status = this.value;
        table.ajax.reload(null, false);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    table = $('#ngoding').DataTable({
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
        "ajax": {
            url: 'databarang',
            data: function (data) {
                data.status = status;
            }
        },
        columns: [{
                data: 'blank',
            },
            {
                data: 'nama_barang',
            },

            {
                data: 'kode',
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
        rowGroup: {
            dataSrc: 'nama_kategori',
            startRender: function (rows, group) {
                return group + ' <button type="button" class="btn btn-xs btn-info"> Stock <span class="badge badge-light">' + rows.count() + ' Pcs </span></button>';
            }
        },
        orderFixed: [
            [2, 'asc']
        ],
        // "order": [[ 0, 'asc' ], [ 1, 'asc' ]]
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
