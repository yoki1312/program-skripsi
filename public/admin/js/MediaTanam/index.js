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
        ajax: 'datamediatanam',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_mediaTanam',
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
        url: "mediatanam/destroy/" + id,
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
        url: "mediatanam/edit/"+id,
        dataType: "json",
        success: function (data) {
            $('#nama_mediaTanam').val(data.result.nama_mediaTanam);
            $('#id_mediaTanam').val(id);
            $('#edit-form').modal('show');
            console.log('sad');

        }
    })
});
$('.btn-update').on('click', function () {
    var nama_mediaTanam = $('#nama_mediaTanam').val();
    var id_mediaTanam = $('#id_mediaTanam').val();
    $.ajax({
        type: 'post',
        url: 'mediatanam/update',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "id_mediaTanam": id_mediaTanam,
            "nama_mediaTanam": nama_mediaTanam
        },
        success: function (data) {
            // swal("Sukses!", "mediaTanam Tersimpan!", "success");

            $('#id_mediaTanam').val(''),
                $('#nama_mediaTanam').val(''),
                $('#ngoding').DataTable().ajax.reload();
            $('#edit-form').modal('hide');
        }
    });
});
$('.btn-save').on('click', function () {
    var nama_mediaTanam = $('#nama_mediaTanam').val();
    $.ajax({
        type: 'post',
        url: 'mediatanam/store',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "nama_mediaTanam": nama_mediaTanam
        },
        success: function (data) {
            swal("Sukses!", "Media Tanam Tersimpan!", "success");
            $('#ngoding').DataTable().ajax.reload();
            $('#nama_mediaTanam').val(''),
                $('#exampleModalCenter').modal('hide');
        }
    });
});
