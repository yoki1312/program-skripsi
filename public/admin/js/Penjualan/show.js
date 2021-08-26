$(document).ready(function () {
    $(".rupiah").inputmask({
        removeMaskOnSubmit: true,
        autoUnmask: true,
        unmaskAsNumber: true
    });
    $('#assa').DataTable({
        "searching": false,
        "autoWidth": true,
        "responsive": true,
        "processing": false,
        "serverSide": false,
        "paginate": false,
        "lengthChange": false,
        "filter": false,
        "bInfo": false,
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
