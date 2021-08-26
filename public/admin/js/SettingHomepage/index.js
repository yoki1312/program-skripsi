$(document).ready(function () {
    $(".sidebar-mini").addClass("sidebar-collapse");
    for (i = 0; i <= 6; i++) {
        var value = $('.value'+i).val();
        if( value == '' || value == null || value === undefined){
            $(".images"+i).fileinput({
                showCaption: false,
                showRemove: false,
                showUpload: false,
                showBrowse: true,
                initialPreviewAsData: true,
                initialPreview: value
            });
        }else{
            $(".images"+i).fileinput({
                showCaption: false,
                showRemove: false,
                showUpload: false,
                showBrowse: false,
                initialPreviewAsData: true,
                initialPreview: value
            });

        }
        console.log(value);
      }

    for (y = 0; y <= 4; y++) {
        var values = $('.value-kecil'+y).val();
        if( values == '' || values == null || values === undefined){
            $(".imagesz"+y).fileinput({
                showCaption: false,
                showRemove: false,
                showUpload: false,
                showBrowse: true,
                initialPreviewAsData: true,
                initialPreview: values
            });
        }else{
            $(".imagesz"+y).fileinput({
                showCaption: false,
                showRemove: false,
                showUpload: false,
                showBrowse: false,
                initialPreviewAsData: true,
                initialPreview: values
            });

        }
        console.log(value);
      }

      $(document).on('click','.btn-hapus', function(){
        axios.post('/hapus/gambar/homepage/' + this.id).then((response) => {
           location.reload();
        }).catch((error) => {
            location.reload();
        });
      })
});
