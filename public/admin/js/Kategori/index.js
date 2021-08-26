$(document).ready(function () {
    $("#input_file").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
    $('#ngoding').DataTable({
        "searching": false,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "displayLength": 10,
        "paginate": false,
        "lengthChange": false,
        "filter": true,
        "bInfo": false,
        ajax: 'dataKategori',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_kategori',
                class: 'text-center'
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
    $.ajax({
        url: "dataKategori/destroy/" + id,
        dataType: "json",
        success: function (data) {
            $('#ngoding').DataTable().ajax.reload();
        }
    })
});

$(document).on('click', '.edit', function () {
    var id = $(this).attr('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });    
    $.ajax({
        url: "dataKategori/edit/"+id,
        dataType: "json",
        success: function (data) {
            $('#nama_kategori').val(data.result.nama_kategori);
            $('#id_kategori').val(id);
            $('#edit-form').modal('show');
            console.log('sad');

        }
    })
});
$('.btn-update').on('click', function () {
    var nama_kategori = $('#nama_kategori').val();
    var id_kategori = $('#id_kategori').val();
    $.ajax({
        type: 'post',
        url: 'dataKategori/update',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "id_kategori": id_kategori,
            "nama_kategori": nama_kategori
        },
        success: function (data) {
            // swal("Sukses!", "Kategori Tersimpan!", "success");

            $('#id_kategori').val(''),
                $('#nama_kategori').val(''),
                $('#ngoding').DataTable().ajax.reload();
            $('#edit-form').modal('hide');
        }
    });
});
$('.btn-save').on('click', function () {
    var nama_kategori = $('#namakategori').val();
    if(nama_kategori == null || nama_kategori == ''){
        Swal.fire(
            'Gagal Menambahkan Data!',
            'Data Tidak Boleh Kosong!',
            'error'
        )
    }else{

        $.ajax({
            type: 'post',
            url: 'dataKategori/store',
            dataType: 'json',
            data: {
                "_token": $('#token').val(),
                "nama_kategori": nama_kategori
            },
            success: function (data) {
                Swal.fire(
                    'Berhasil!',
                    'Data Tersimpan!',
                    'success'
                )
                $('#ngoding').DataTable().ajax.reload();
                $('#namakategori').val(''),
                $("#exampleModalCenter").removeClass("in");
                $(".modal-backdrop").remove();
                $('body').removeClass('modal-open');
                $('#exampleModalCenter').modal('hide');
            }
        });
    }
});
