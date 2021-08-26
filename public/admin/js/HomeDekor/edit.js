$(document).ready(function () {
    $(".rupiah").inputmask({
        removeMaskOnSubmit: true,
        autoUnmask: true,
        unmaskAsNumber: true
    });


    $('.select2').select2({
        theme: "bootstrap4"
    });

    const image_file = $('.sampul_data').val();
    let files = [];
    if (image_file != '' && image_file != null) {
        files = [image_file];
    }
    $(".fs").fileinput({
        initialPreviewAsData: true,
        initialPreview: files
    });

    var langkah;
    let i = 0;
    var end = $('.countt').val();
    for (langkah= 0; langkah< end; langkah++) {

        const image_file = $('.detail'+ i++).val();
        let files = [];
        if (image_file != '' && image_file != null) {
            files = [image_file];
        }
        $(".detailData"+i++).fileinput({
            showCaption: false,
            initialPreviewAsData: true,
            initialPreview: files
        });
    }
});
