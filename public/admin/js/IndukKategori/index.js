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
        ajax: 'indukKategori',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_indukKategori',
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
        url: "indukKategori/destroy/" + id,
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
        url: "indukKategori/edit/"+id,
        dataType: "json",
        success: function (data) {
            $('#nama_indukKategori').val(data.result.nama_indukKategori);
            $('#id_indukKategori').val(id);
            $('#edit-form').modal('show');
            console.log('sad');

        }
    })
});
$('.btn-update').on('click', function () {
    var nama_indukKategori = $('#nama_indukKategori').val();
    var id_indukKategori = $('#id_indukKategori').val();
    $.ajax({
        type: 'post',
        url: 'indukKategori/update',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "id_indukKategori": id_indukKategori,
            "nama_indukKategori": nama_indukKategori
        },
        success: function (data) {
            // swal("Sukses!", "Kategori Tersimpan!", "success");

            $('#id_indukKategori').val(''),
                $('#nama_indukKategori').val(''),
                $('#ngoding').DataTable().ajax.reload();
            $('#edit-form').modal('hide');
        }
    });
});
$('.btn-save').on('click', function () {
    var nama_indukKategori = $('#nama_indukKategori').val();
    $.ajax({
        type: 'post',
        url: 'indukKategori/store',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "nama_indukKategori": nama_indukKategori
        },
        success: function (data) {
            swal("Sukses!", "Kategori Tersimpan!", "success");
            $('#ngoding').DataTable().ajax.reload();
            $('#nama_indukKategori').val(''),
            $("#exampleModalCenter").removeClass("in");
            $(".modal-backdrop").remove();
            $('body').removeClass('modal-open');
            $('#exampleModalCenter').modal('hide');
        }
    });
});
