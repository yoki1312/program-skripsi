$(document).ready(function () {
    $(".rupiah").inputmask({
        removeMaskOnSubmit: true,
        autoUnmask: true,
        unmaskAsNumber: true
    });


    $('.select2').select2({
        theme: "bootstrap4"
    });

    const image_file = $('.sampul').val();
    let files = [];
    if (image_file != '' && image_file != null) {
        files = [image_file];
    }
    $("#input").fileinput({
        initialPreviewAsData: true,
        initialPreview: files
    });
});
