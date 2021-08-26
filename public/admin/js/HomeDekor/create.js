
$(document).ready(function () {
  $(".rupiah").inputmask({
		removeMaskOnSubmit: true,
		autoUnmask: true,
		unmaskAsNumber: true
	});
	$("#input").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
	});
	
$('.select2').select2({ theme: "bootstrap4"});
});