$(document).ready(function () {
 
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
        ajax: 'subkategoridata',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_subKategori',
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
        url: "subKategori/destroy/" + id,
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
        url: "subKategori/edit/"+id,
        dataType: "json",
        success: function (data) {
            $('#nama_subKategori').val(data.result.nama_subKategori);
            $('#id_subKategori').val(id);
            $('#edit-form').modal('show');
            console.log('sad');

        }
    })
});
$('.btn-update').on('click', function () {
    var nama_subKategori = $('#nama_subKategori').val();
    var id_subKategori = $('#id_subKategori').val();
    $.ajax({
        type: 'post',
        url: 'subKategori/update',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "id_subKategori": id_subKategori,
            "nama_subKategori": nama_subKategori
        },
        success: function (data) {
            // swal("Sukses!", "subKategori Tersimpan!", "success");

            $('#id_subKategori').val(''),
                $('#nama_subKategori').val(''),
                $('#ngoding').DataTable().ajax.reload();
            $('#edit-form').modal('hide');
        }
    });
});
$('.btn-save').on('click', function () {
    var nama_subKategori = $('#nama_subKategoriadd').val();
    if(nama_subKategori == null || nama_subKategori == ''){
        notif('gagal');
    }else{
        $.ajax({
            type: 'post',
            url: 'subKategori/store',
            dataType: 'json',
            data: {
                "_token": $('#token').val(),
                "nama_subKategori": nama_subKategori
            },
            success: function (data) {
                notif('sukses');
                $('#ngoding').DataTable().ajax.reload();
                $('#nama_subKategori').val(''),
                    $('#exampleModalCenter').modal('hide');
            }
        });

    }
});
