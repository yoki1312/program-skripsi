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
        ajax: 'json',
        columns: [{
                data: 'SubModul',
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bars" aria-hidden="true"></i> ' +
                        data
                }
            },
            {
                data: 'modul',
                visible: false,
                class: 'text-center',
                render: function (data, type, row, meta) {
                    return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bars" aria-hidden="true"></i> ' +
                        data
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
            dataSrc: 'modul'
        },


    });

});
$(document).on('click', '.editNoUrut', function () {
    var id = $(this).attr('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "modul/editUrutan/" + id,
        dataType: "json",
        success: function (data) {
            $('#no_urut').val(data.result.no_urut);
            $('#nama_modul').val(data.result.modul);
            $('#id').val(id);
            $('#editModul').modal('show');

        }
    })
});
$('.no_urut_save').on('click', function () {
    var no_urut = $('#no_urut').val();
    var id_modul = $('#id').val();
    $.ajax({
        type: 'post',
        url: 'update/no_urut/modul',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "id_modul": id_modul,
            "no_urut": no_urut
        },
        success: function (data) {
            location.reload();
        }
    });
});
$(document).ready(function () {

    $('#modul').DataTable({
        "searching": false,
        "autoWidth": true,
        // "responsive": false,
        // "processing": true,
        "serverSide": true,
        "displayLength": 100,
        "paginate": false,
        "lengthChange": false,
        "filter": false,
        "bInfo": false,
        ajax: 'data_modul',
        columns: [{
                data: 'modul',
                class: 'text-center',
            },
            {
                data: 'NoUrut',
                class: 'text-center',
            },
            {
                data: 'action',
                class: 'text-center',
                name: 'action',
            },
        ],
        "order": [[ 2, "asc" ]]

    });

});