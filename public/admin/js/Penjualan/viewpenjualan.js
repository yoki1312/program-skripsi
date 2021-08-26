$(document).ready(function () {
  closeSidebar();
  $(document).on('click', '.btn-edit-harga', function(){
      $(this).closest('tr').find('.harga').removeAttr("readonly");
  })

// document.getElementById("bdy").classList.remove('MyClass');
    $('table').on('click', 'tr .btn-pre-edit', function (e) {
        e.preventDefault();
        var to = $(this).closest("tr").find(".id_barang").val();
        $("#modal" + to).modal("show");
        let bf = $('#detailBarang' + to).DataTable({
            "searching": false,
            "autoWidth": true,
            "responsive": true,
            "processing": true,
            // "serverSide": true,
            "displayLength": 1,
            "lengthChange": false,
            "filter": true,
            "bInfo": false,
            "destroy": true,
            ajax: {
                url: 'detail_barang',
                data: function (d) {
                    d.id_barang = to
                }
            },
            columns: [{
                    data: 'foto',
                    class: 'text-center',
                    render: function (data, type, row) {
                        return '<img width="300px" src="' + 'upload/img_detail_barang/' + row.foto + '"/>';
                    }
                },

            ],
        });
    });
    $('#sbdata').DataTable({
        "searching": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "displayLength": 10,
        "paginate": true,
        "lengthChange": true,
        "filter": true,
        "bInfo": false,
        "select": true,
        ajax: {
            url: 'barangAll',
            data: function (d) {
                d.id_induk = (($('.id_induk').val() != null ? $('.id_induk').val() : null))
            }
        },
        columns: [{
                data: 'blank',
            },
            {
                data: 'nama_barang',
                render: function (data, type, row) {
                    return data + "<br><span class='badge badge-primary'>Kode Barang " + row.kode + "</span>";
                }
            },

            {
                data: null,
                class: 'text-right rupiah',
                render: function (data, type, row) {
                    var jenisCust = $('.jenisCustomer').val();
                    return (jenisCust == '1' ? convertToRupiah(row.hargaReseler, 2) : convertToRupiah(row.hargaPersonal, 2));
                }

            },
            {
                data: 'diskon',
                class: 'text-right',
                render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
            },
        ],
        rowGroup: {
            dataSrc: 'nama_kategori',
            startRender: function (rows, group) {
                return group + ' <button type="button" class=" text-right btn btn-xs btn-info"> Stock <span class="badge badge-light">' + rows.count() + ' Pcs </span></button>';
            }
        },
        orderFixed: [
            [2, 'asc']
        ],
    });
    $('.select2').select2({});
    $('.id_induk').on('change', function () {
        $('#sbdata').DataTable().ajax.reload();
    });
    $('.jenisCustomer').on('change', function () {
        $('#sbdata').DataTable().ajax.reload();
    });

    $('#assa thead').on('click', 'tr', function () {
        summHarga();
        $('input:radio[name=bedStatus]:checked').change(function () {
            if ($("input[name='bedStatus']:checked").val() == '1') {
                $(".diskonRp").hide();
                $(".diskone").show();
                $('.diskon').val('');
                $(".diskonRp").attr('disabled', true);
                $(".diskon").removeAttr('disabled');
                summHarga();
            }
            if ($("input[name='bedStatus']:checked").val() == '2') {
                $(".diskonRp").show();
                $(".diskone").hide();
                $(".diskon").attr('disabled', true);
                $(".diskonRp").removeAttr('disabled');
                summHarga();
            }
        });
    });

    $(".rupiah").inputmask({
        removeMaskOnSubmit: true,
        autoUnmask: true,
        unmaskAsNumber: true
    });

    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy',
    });

    $('#assa tbody').on('click', 'tr', function () {
        summHarga();
        let san = 0;
        let kl = 0;
        if ($("input[name='bedStatus']:checked").val() == '2') {
            var item = $(this).closest("tr").find(".diskonRupiah").val();
            var harga = $(this).closest("tr").find(".harga").val();
            san = harga - item;
            $(this).closest("tr").find(".totalss").val(san);
            summHarga();
        }
        if ($("input[name='bedStatus']:checked").val() == '1') {
            var hargaJual = $(this).closest("tr").find(".harga").val();
            var diskonPersen = $(this).closest("tr").find(".diskon").val();

            kl = hargaJual * diskonPersen;
            $(this).closest("tr").find(".totalss").val(kl / 100);
            summHarga();
        }
    });

    $('#assa thead').on('click', 'tr', function () {
        var cek = $(this).closest('tr').find('[type=checkbox]');
        if (cek.prop('checked') != false) {
            $('.diskon').attr('readonly', false);
            $('.diskonRupiah').attr('readonly', false);
            $(".aa").show();
            summHarga();
        } else {
            $(".aa").hide();
            $('.diskon').attr('readonly', true);
            $('.diskonRupiah').attr('readonly', true);
            summHarga();
        }
    });

    $('table').on('click', 'tr .btn-hapus', function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        summHarga();
    });

});
var i = 1;
var sum = 0;


function additem() {
    $('#bankdata').modal('show');
    var itemlist = document.getElementById('itemlist');
    var row = document.createElement('tr');
    var jenis = document.createElement('td');
    var jumlah = document.createElement('td');
    var diskons = document.createElement('td');
    diskons.setAttribute('class', 'diskone');
    diskons.setAttribute('style', 'display:none');
    var rp = document.createElement('td');
    rp.setAttribute('class', 'diskonRp');
    var totall = document.createElement('td');
    var id = document.createElement('td');

    var aksi = document.createElement('td');

    itemlist.appendChild(row);
    row.appendChild(jenis);
    row.appendChild(jumlah);
    row.appendChild(diskons);
    row.appendChild(rp);
    row.appendChild(totall);
    row.appendChild(aksi);
    row.appendChild(id);

    var jenis_input = document.createElement('input');
    jenis_input.setAttribute('name', 'nama_barang');
    jenis_input.setAttribute('class', 'form-control form-control-sm namabarang');
    jenis_input.setAttribute('type', 'text');
    jenis_input.setAttribute('readonly', true);

    var jumlah_input = document.createElement('input');
    jumlah_input.setAttribute('name', 'harga[]');
    jumlah_input.setAttribute('class', 'form-control form-control-sm rupiah harga ai');
    jumlah_input.setAttribute('readonly', true);
    jumlah_input.setAttribute('data-inputmask', "'alias': 'currency', 'prefix': ''");

    var diskon = document.createElement('input');
    diskon.setAttribute('name', 'diskonPersen[]');
    diskon.setAttribute('class', 'form-control form-control-sm diskon rupiah dis text-right');
    diskon.setAttribute('id', 'diskon');
    diskon.setAttribute('readonly', true);

    var diskonRp = document.createElement('input');
    diskonRp.setAttribute('name', 'diskonRupiah[]');
    diskonRp.setAttribute('class', 'form-control form-control-sm diskonRupiah rupiah text-right');
    diskonRp.setAttribute('data-inputmask', "'alias': 'currency', 'prefix': ''");
    diskonRp.setAttribute('readonly', true);

    var total = document.createElement('input');
    total.setAttribute('name', 'totalDiskon[]');
    total.setAttribute('class', 'form-control form-control-sm totalss rupiah to');
    total.setAttribute('readonly', true);
    total.setAttribute('data-inputmask', "'alias': 'currency', 'prefix': ''");


    var idbarang = document.createElement('input');
    idbarang.setAttribute('name', 'id_barang[]');
    idbarang.setAttribute('style', 'display:none');
    idbarang.setAttribute('readonly', true);
    idbarang.setAttribute('class', 'id_barang');

    var hapus = document.createElement('span');

    id.appendChild(idbarang);
    jenis.appendChild(jenis_input);
    jumlah.appendChild(jumlah_input);
    diskons.appendChild(diskon);
    rp.appendChild(diskonRp);
    totall.appendChild(total);
    aksi.appendChild(hapus);



    hapus.innerHTML = '<button type="button" class="btn btn-hapus btn-circle btn-default"><i class="fa fa-trash"></i></button> <button type="button" class="btn btn-edit-harga btn-circle btn-success"><i class="fa fa-edit"></i></button>';
    $(".total").val(sum);

    // detail.innerHTML = '';


    $('#sbdata tbody').on('click', 'td', function () {
        var cust = $('.jenisCustomer').val();
        var hargaRedy;
        $(".rupiah").inputmask({
            removeMaskOnSubmit: true,
            autoUnmask: true,
            unmaskAsNumber: true
        });
        var data = $('#sbdata').DataTable().row($(this).parents('tr')).data();
        var table = $('#sbdata').DataTable();
        table.row($(this).parents('tr')).remove().draw();
        if (typeof data !== 'undefined') {
            if (cust == "0") {
                hargaRedy = data.hargaPersonal;
                $(".harga").last().val(data.hargaPersonal);
            } else {
                hargaRedy = data.hargaReseler;
                $(".harga").last().val(data.hargaReseler);
            }
            $(".namabarang").last().val(data.nama_barang);
            $(".id_barang").last().val(data.id_barang);
            $(".diskon").last().val(data.diskon);
            $(".diskonRupiah").last().val(data.diskon);
            if(data.diskon != 0){
                $(".totalss").last().val(data.hargaJual - data.diskon);
            }else{
                $(".totalss").last().val(hargaRedy);

            }
            $('#bankdata').modal('hide');
            summHarga();

        }
    });
    i++;
}

function reset() {
    $('#sbdata').DataTable().ajax.reload();
}

function summHarga() {
    var sum = 0;
    var t = 0;
    var g = 0;
    var y = 0;
    $('.ai').each(function () {
        sum += parseFloat(this.value);
    });
    $('.totalss').each(function () {
        t += parseFloat(this.value);
    });


    $('.total').val(sum);
    $('.totalDiskon').val(t);
    if ($('.totalDiskon').val() != 0) {
        g = $('.total').val() - $('.totalDiskon').val();
    }
    var dskn = "";
    dskn = $('.jumlahHargaSemua').val() - $('.totalHargaSemua').val();
    console.log(parseFloat(dskn));
    if(dskn != 0){
        $('#hemat').text('Anda Hemat Rp ' + dskn + ' Bro');
    }

}
function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('')+',00';
}