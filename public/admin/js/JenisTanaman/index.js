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
        ajax: 'dataJenis',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_jenisTanaman',
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
        url: "dataJenisTanaman/destroy/"+id,
        dataType: "json",
        success: function (data) {
            $('#ngoding').DataTable().ajax.reload();
        }
    })
});
$(document).on('click', '.edit', function () {
    var id = $(this).attr('id');
    // $('#id_JenisTanaman').val(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });    
    $.ajax({
        url: "dataJenisTanaman/edit/"+id,
        dataType: "json",
        success: function (data) {
            $('#nama_JenisTanaman').val(data.result.nama_jenisTanaman);
            $('#id_JenisTanaman').val(id);
            $('#editform').modal('show');
            console.log(data);
           
        }
    })
});
$('.btn-update').on('click', function () {
    var nama_JenisTanaman = $('#nama_JenisTanaman').val();
    var id_JenisTanaman = $('#id_JenisTanaman').val();
    $.ajax({
        type: 'post',
        url: 'dataJenisTanaman/update',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "id_JenisTanaman": id_JenisTanaman,
            "nama_JenisTanaman" : nama_JenisTanaman 
        },
        success: function (data) {
            // swal("Sukses!", "JenisTanaman Tersimpan!", "success");
            
            $('#id_JenisTanaman').val(''),
            $('#nama_JenisTanaman').val(''),
            $('#ngoding').DataTable().ajax.reload();
            $('#editform').modal('hide');
        }
    });
});
$('.btn-save').on('click', function () {
    var nama_JenisTanaman = $('#namaJenisTanaman').val();
    if(nama_JenisTanaman == '' || nama_JenisTanaman == null){
        console.log(nama_JenisTanaman);
        notif('gagal');
    }else{
        $.ajax({
            type: 'post',
            url: 'dataJenisTanaman/store',
            dataType: 'json',
            data: {
                "_token": $('#token').val(),
                "nama_JenisTanaman" : nama_JenisTanaman 
            },
            success: function (data) {
                notif('sukses');
                $('#ngoding').DataTable().ajax.reload();
                $('#namaJenisTanaman').val(''),
                $("#exampleModalCenter").removeClass("in");
                $(".modal-backdrop").remove();
                $('body').removeClass('modal-open');
                $('#exampleModalCenter').modal('hide');
            }
        });

    }
});
