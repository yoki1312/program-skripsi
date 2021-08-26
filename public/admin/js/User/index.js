let table;
$(document).ready(function () {
    $('.hps').empty();
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
        ajax: 'dataUser',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'name',
                class: 'text-center'
            },
            {
                data: 'email',
                class: 'text-center'
            },
            {
                data: 'level',
                class: 'text-center',
                render: function (data, meta, row) {
                    return data != '1' ? '<span class="badge badge-info">Pembeli</span>' : '<span class="badge badge-danger">Admin</span>';
                }
            },
            {
                data: 'total_pembelian',
                class: 'text-center'
            },
            {
                data: 'total_pembelian',
                class: 'text-center',
                render: function (data, meta, row) {
                    return row.level != '1' ? '<button id="' + row.id + '" type="button" class="btn btn-sm btn-primary riwayat-beli" data-toggle="modal" data-target=".bd-example-modal-xl">Cek</button>' : '';
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


$(document).on('click', '.deleted', function () {
    var id = $(this).attr('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.hps').empty();
    $('#delete_modal').modal('show');
    $('.hps').append('<a class="btn btn-sm btn-danger" href="hapusUser/' + id + '" >Hapus</a>   <button type="button" data-dismiss="modal" class="btn-default btn-sm btn">Cancel</button>')
    // $.ajax({
    //     url: "dataJenisTanaman/destroy/" + id,
    //     dataType: "json",
    //     success: function (data) {
    //         $('#ngoding').DataTable().ajax.reload();
    //     }
    // })
});
$(document).on('click', '.edit', function () {
    var data = table.row($(this).parents('tr')).data();
    $('.id-user').val(data.id);
    $('.edit-nama-lengkap').val(data.name),
        $('.edit-email').val(data.email),
        $('#editform').modal('show');
});
$(document).on('click', '.riwayat-beli', function () {

    $('#dt').DataTable().destroy();
    riwayatPembelian(this.id);
});
$('.btn-update').on('click', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: 'dataUser/update',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "id": $('.id-user').val(),
            "name": $('.edit-nama-lengkap').val(),
            "email": $('.edit-email').val(),
            "level": $('.edit-level').val(),
            "password": $('.edit-password').val()
        },
        success: function (data) {
            if (data == 'gagal') {
                Swal.fire(
                    'Gagal!',
                    'Email Sudah Terdaftar!',
                    'error'
                );
            } else {

                Swal.fire(
                    'Sukses!',
                    'Data terupdate!',
                    'success'
                );
                $('#ngoding').DataTable().ajax.reload();
                $("#editform").removeClass("in");
                $(".modal-backdrop").remove();
                $('body').removeClass('modal-open');
                $('#editform').modal('hide');
            }
        }
    });
});
$('.btn-save').on('click', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: 'tambahUser',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "name": $('.nama-lengkap').val(),
            "email": $('.email').val(),
            "level": $('.level').val(),
            "password": $('.password').val(),
        },
        success: function (data) {
            if (data == 'gagal') {
                Swal.fire(
                    'Gagal Menambahkan Data!',
                    'Email Sudah Terdaftar!',
                    'error'
                );
            } else {
                notif('sukses');
                $('.nama-lengkap').val(''),
                    $('.email').val(''),
                    $('.level').val(''),
                    $('.password').val(''),
                    $('#ngoding').DataTable().ajax.reload();
                $("#exampleModalCenter").removeClass("in");
                $(".modal-backdrop").remove();
                $('body').removeClass('modal-open');
                $('#exampleModalCenter').modal('hide');
            }
        }
    });
});

function riwayatPembelian(id) {
    $('#dt').DataTable({
        "searching": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "displayLength ": 10,
        "paginate": true,
        "lengthChange": true,
        "filter": true,
        "bInfo": false,
        "ajax": {
            url: 'riwayat/beli',
            data: function (data) {
                data.id_user = id;
            }
        },
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'no_invoice',
                class: 'text-center',
            },
            {
                data: 'tgl_penjualan',
                class: 'text-center',
            },
            {
                data: 'nama_barang',
                class: 'text-center',
            },

        ],
        rowGroup: {
            dataSrc: 'no_invoice',
            startRender: function (rows, group) {
                return group;
            }
        },
        orderFixed: [
            [2, 'asc']
        ],
        // "order": [[ 0, 'asc' ], [ 1, 'asc' ]]
    });
}
