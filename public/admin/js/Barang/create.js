
$(document).ready(function () {
    $('.itemName').select2({
        placeholder: 'Pilih Kategori',
        ajax: {
          url: '/select2-autocomplete-ajax',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.nama_kategori,
                        id: item.id_kategori
                    }
                })
            };
          },
          cache: true
        }
      });
    let table = $('#sbdata').DataTable({
        "searching": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "paginate": true,
        "lengthChange": true,
        "filter": true,
        "bInfo": false,
        ajax: '/referensi/bankdata',
        columns: [{
                "data": null,
                "sortable": false,
                class:'text-center',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_tanaman',class:'text-center'
            },
            {
                data: 'nama_latin',
                class: 'text-center',
            },
         
            {
                data: 'nama_kategori',
                class: 'text-center',
            },
            {
                data: 'nama_jenisTanaman',
                class: 'text-center',
            }
        ],
    });
    $('#sbdata tbody').on('click', 'td', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        let v = $('#id_kategori').val();
        $('#nama_tanaman').val(data.nama_tanaman);
        $('#nama_latin').val(data.nama_latin);
        $('.id_bankdata').val(data.id_bankdata);
        $('.bankdata-kebutuhan-air').val(data.kebutuhanAir);
        $('.bankdata-kebutuhan-cahaya').val(data.kebutuhanSinar);
        $('.bankdata-cara-perawatan').val(data.caraPerawatan);
        $('.bankdata-hargaMin').val(data.hargaMin);
        $('.bankdata-hargaMax').val(data.hargaMax);
        $('.data-bank').show();
        $('#bankdata').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
      
    });
    $('.select2').select2({
        theme: "bootstrap4"
    });
    const image_file = $('.foto_tips').val();
    let files = [];
    if (image_file != '' && image_file != null) {
        files = [image_file];
    }
    $(".rupiah").inputmask({
        removeMaskOnSubmit: true,
        autoUnmask: true,
        unmaskAsNumber: true
    });
    $(".foto_tips").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        initialPreviewAsData: true,
        initialPreview: files
    });
    $('#keterangan').summernote({
        height: 100,
        toolbar: [

            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],

        ],
    })
    $("#fs").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
    $("#input").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
    $("#inputss").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
    $("body").on("click", ".remove", function () {
        $(this).parents(".hap").remove();
    });
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
});
$(".add-more").on("click", function (e) {
    var html = $(".copy").html();
    $(".after-add-more").after(html);
    $("#input-24").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
});


$(function () {
    $("#chkPassport").click(function () {
        if ($(this).is(":checked")) {
            $("#dvPassport").show();
            $("#AddPassport").hide();
        } else {
            $("#dvPassport").hide();
            $("#AddPassport").show();
        }
    });
});
$(function () {

    $("#diskon").attr('readonly', true);

    var checkbox = $("#trigger");
    checkbox.change(function () {

        if (checkbox.is(':checked')) {

            $('#diskon').prop('readonly', false);
        } else {
            $("#diskon").attr('readonly', true);

        }
    });
});
