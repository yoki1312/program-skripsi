$(document).ready(function () {
    $('#isi').summernote('disable');
    $('#isi').summernote({
        height: 100,
        toolbar: [
        
          ['font', ['bold', 'italic', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
     
        ],
      });
      $('#keterangan').summernote({
          height: 100,
          toolbar: [
              
              ['font', ['bold', 'italic', 'underline', 'clear']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              
            ],
            
        });
	const image_file = $('.artikel_img').val();
	let files = [];
	if (image_file != '' && image_file != null) {
		files = [image_file];
	}
	$("#file-0a").fileinput({
        browseClass: "btn btn-primary btn-block",
		showCaption: false,
		showRemove: false,
		showUpload: false,
		initialPreviewAsData: true,
		initialPreview: files
	});
    $(".kv-file-remove").click(function(){
        var id_tips = $('.id_tips').val();
        console.log(id_tips);
        $.ajax(
            {
                url: "/tipss/hapusGambar/"+id_tips,
                type: 'POST',
                dataType: "JSON",
                data: {
                    "_token": $('#token').val(),
                    "id": id_tips,
                },
                success: function (data){
                // swal("Sukses!", "Barang Dijual!", "success");
                    location.reload();
                }
            });
    });
});