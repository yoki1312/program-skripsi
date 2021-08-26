$(document).ready(function () {

    $('#ngoding').DataTable({
        "searching": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "displayLength": 10,
        "paginate": true,
        "lengthChange": false,
        "filter": true,
        "bInfo": false,
        ajax: 'barang_sale',
        columns: [{
                "data": null,
                class: 'text-center',
                "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_barang',
                render: function (data, type, row) {
                    return data + "<br><span class='badge badge-primary'>Kode Barang " + row.kode + "</span>";
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
            dataSrc: 'nama_kategori',
            startRender: function (rows, group) {
                return group + ' <button type="button" class="btn btn-xs btn-info"> Stock <span class="badge badge-light">' + rows.count() + ' Pcs </span></button>';
            }
        },
        orderFixed: [[1, 'asc']],
    });

});
$(document).on('click', '.post', function () {
    id_barang = $(this).attr('id');
    $('#confirmModal').modal('show');
});
$(document).on('click', '.totalStock', function () {
    id_barang = $(this).attr('id');
    $('#stock').val($(this).text());
    $('#editStock').modal('show');
    
});
$('.btn-sale').on('click', function () {
    var stock = $('.stock').val();
    $.ajax({
        type: 'post',
        url: 'barang/sale',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            "id_barang": id_barang,
            "stock" : stock 
        },
        success: function (data) {
            swal("Sukses!", "Barang Dijual!", "success");
            $('#ngoding').DataTable().ajax.reload();
            $('#confirmModal').modal('hide');
        }
    });
});
$(document).ready(function() {
    $('.minus').click(function () {
        var count = parseInt($('.stock').val()) - 1;
        $('.stock').val(count);
        return false;
    });
    $('.plus').click(function () {
        var count = parseInt($('.stock').val()) + 1;
        $('.stock').val(count);
        return false;
    });
});
