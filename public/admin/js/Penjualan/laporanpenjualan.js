let table;
$(document).ready(function () {

    let table = $('#ngoding').DataTable({
        "searching": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "paginate": true,
        "lengthChange": true,
        "filter": true,
        "bInfo": false,
        ajax: 'datap',
        columns: [{
                "data": null,
                "sortable": false,
                class: 'text-center',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'name',
                class: 'text-center'
            },
            {
                data: 'no_invoice',
                class: 'text-center',
                render: function (data, type, row) {
                    return data + '<input hidden type="text" value="' + row.id_penjualan + '" class="id_penjualan" />'
                }
            },
            {
                data: 'keterangan',
                class: 'text-center',
                render: function (data, type, row) {
                    return '<select style="width:250px !important;" class="status form-contro form-control-sm">' + (row.id_status_penjualan == null ? '<option> Konfirmasi Segera</option>' : '<option value="' + row.id_status_penjualan + '">' + row.keterangan + '</option>') + '</select>';
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
        "drawCallback": function (settings) {
            statusPembayaran();
        }
    });

});
$(document).on('click', '.delete', function () {
    id_barang = $(this).attr('id');
    $('#confirmModal').modal('show');
});
$(document).on('change', '.status', function () {
    var id_penjualan = $(this).closest('tr').find('.id_penjualan').val();
    var id = this.value;
    axios.get('/update/status/bayar', {
            params: {
                status: id,
                id_penjualan: id_penjualan

            }
        })
        .then(function (response) {

        })
        .catch(function (error) {})
        .then(function () {
            Swal.fire(
                'Berhasil!',
                'Data berhasil dirubah',
                'success'
            );
            table.ajax.reload(null, false);
            // always executed
        });
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

function statusPembayaran() {
    $('.status').select2({
        placeholder: 'Pilih Status',
        ajax: {
            url: '/status/bayar',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.keterangan,
                            id: item.id_status
                        }
                    })
                };
            },
            cache: true
        }
    });
}

function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('') + ',00';
}
