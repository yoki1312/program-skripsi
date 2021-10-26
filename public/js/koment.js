let oTable;
$(document).ready(function () {
    $(".test").click(function () {
        var token = document.head.querySelector('meta[name="csrf-token"]');
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

        // send contact form data.
        axios.post('/post-coment', {
            name: $('.preview-name').val(),
            email: $('.preview-email').val(),
            koment: $('#review_comment').val(),
            produk_id: $('.produk').val()
        }).then((response) => {
            location.reload();
        }).catch((error) => {
            console.log(error.response.data)
        });
    });
    $(".add-to-cart").click(function () {
        var token = document.head.querySelector('meta[name="csrf-token"]');
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

        // send contact form data.
        axios.post('/add-to-cart', {
            qty: $('.qty').val(),
            produk_id: $('.produk').val()
        }).then((response) => {
            Swal.fire(
                'Berhasil',
                'Barang ditambahan kedalam keranjang belanja',
                'success'
              )
        }).catch((error) => {
            console.log(error.response)
        });
    });
    oTable = $('#preorder').DataTable({
        "searching": false,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "paginate": false,
        "displayLength": false,
        "lengthChange": false,
        "filter": true,
        "bInfo": false,
        'select': {
            'style': 'multi'
        },
        ajax: 'datapreorder',
        columns: [{
                data: 'gambar_sampul',
                class: 'text-center',
                render: function (data, type, row) {
                    return '<input class="ckbox" type="checkbox" />';
                }
            }, {
                data: 'action',
                class: 'text-center',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return '<button type="button" data-row="' + meta.row + '" class="delete remove-order btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i></button>';
                },
            },

            {
                data: 'gambar_sampul',
                class: 'text-center',
                render: function (data, type, row) {
                    return '<img width="100px" src="' + 'upload/img_barang/' + data + '"/>';
                }
            },
            {
                data: 'nama_barang'
            },
            {
                data: 'hargaJual',
                className: 'text-rigth',
                render : function(data, type, row, ){
                    var harga = parseFloat(row.hargaJual);
                    var diskon = parseFloat(row.diskon);
                    var total = parseFloat(harga-diskon);
                    var hasilRp = convertToRupiah(total);
                    return hasilRp;
                }
            },
        ],
    });

    $('#preorder tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
        var closeCheckbox = $(this).closest('tr').find('input[type=checkbox]');
        if (closeCheckbox.prop('checked') == false) {
        closeCheckbox.prop('checked', true);
        } else {
            closeCheckbox.prop('checked', false);
        }
    });

    $('.btn-bayar').click(function () {
        $('#bayar').modal('show');
        var data = oTable.rows('.selected').data();
        var i;
        for (i = 0; i < data.length; i++) {
            var harga = parseFloat(data[i]['hargaJual']) - parseFloat(data[i]['diskon']);
           var hargaRp =  convertToRupiah(harga);
            $('#aaa').append('<div style="margin-bottom:5px;" class="row" id="aaa"><div class="col"><input name="id_barang[]" hidden value="'+ data[i]['id_barang'] +'" /><input value="'+ data[i]['nama_barang'] +'" type="text" class="form-control nama_barang" placeholder="First"></div><div class="col"><input style="border:none;" type="text" name="hargaJual[]" class="form-control harga_barang text-right"  value="'+ hargaRp +'" placeholder="Last name"></div></div><br>');
            console.log(data[i]);

        }
    });


   

});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
function reload(){
    location.reload();
}
function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('')+',00';
}
