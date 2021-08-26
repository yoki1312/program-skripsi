$(document).ready(function () {
    $('#form1 input').attr('disabled', true);
    $('#form1 select').attr('disabled', true);
    $('#form1 textarea').attr('disabled', true);

    $(document).on('click','.btn-edit', function(){
        $('.btn-save').show();
        $('.btn-edit').hide();
        $('#form1 input').removeAttr('disabled');
        $('#form1 select').removeAttr('disabled');
        $('#form1 textarea').removeAttr('disabled');
    })
    $(".rupiah").inputmask({
        removeMaskOnSubmit: true,
        autoUnmask: true,
        unmaskAsNumber: true
    });
    $(".fs").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        initialPreviewAsData: true,
        initialPreview: $('.img-sampul').val()
    });

    var langkah;
    let i = 0;
    var end = $('.toloop').val();
    for (langkah = 0; langkah <= end; langkah++) {

        const image_file = $('.img-detail' + langkah).val();
        let files = [];
        if (image_file != '' && image_file != null) {
            files = [image_file];
        }
        $(".detail" + langkah).fileinput({
            browseClass: "btn btn-primary btn-block",
            showCaption: false,
            showRemove: false,
            showUpload: false,
            initialPreviewAsData: true,
            initialPreview: files
        });
        console.log(langkah)
    }


    $('.select2').select2({
        theme: "bootstrap4"
    });
    $(".add-image").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
});
