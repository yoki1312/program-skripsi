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
      
	const image_file = $('.artikel_img').val();
	let files = [];
	if (image_file != '' && image_file != null) {
		files = [image_file];
	}
	$("#file-0a").fileinput({
		initialPreviewAsData: true,
		initialPreview: files
  });
  
  
});
