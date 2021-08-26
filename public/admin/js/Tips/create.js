$(document).ready(function () {
    $('#hastag').summernote({
        height: 100,
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
});