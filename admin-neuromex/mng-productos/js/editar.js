$(function() {
  $.ajax({
  	url:"./control/categorias-select.php",
  	type:"GET",
  	success: function(response) {
  		$("select").html(response);
  	}
  });

  setTimeout(function () {
    $.ajax({
      url:"./control/get.php",
      data:{id:id},
      type:"GET",
      success:function( response ) {
        $("input[name='id']").val(response.p.prod_id);
        $("input[name='nombre']").val(fromHTML(response.p.prod_nombre));
        $("select").val(response.p.prod_categoria);
        CKEDITOR.instances['contenido'].setData(response.p.prod_contenido);
        if (response.p.prod_ficha == "") {
          $("input[name='ficha']").fileinput({
            language: 'es',
    		    showUpload:false,
    		    showRemove:false,
    		    showCaption: false,
    		    browseClass: "btn btn-primary btn-block",
    		    allowedFileExtensions: ['pdf'],
          });
        } else {
          $("input[name='ficha']").fileinput({
            language: 'es',
    		    showUpload:false,
    		    showRemove:false,
    		    showCaption: false,
    		    browseClass: "btn btn-primary btn-block",
    		    allowedFileExtensions: ['pdf'],
    		    initialPreviewAsData: true,
    		    initialPreviewFileType: 'pdf',
    		    initialPreview:"../../pdf/productos/"+response.p.prod_ficha
          });
        }
        $("input[name='slider[]']").fileinput({
          language: 'es',
          overwriteInitial:false,
          maxFileCount: 20,
          showUpload:false,
          showRemove:false,
          showCaption: false,
          browseClass: "btn btn-primary btn-block",
          allowedFileExtensions: ['jpg','png','gif'],
          deleteUrl: "./control/img.delete.php",
          initialPreviewAsData: true,
          initialPreviewFileType: 'image',
          initialPreview: response.preview,
          initialPreviewConfig: response.config
        });
      },
      error: function() {
        alerta("Error!","No fue posible recuperar la informacion","error","Aceptar");
      }
    });
  }, 100);


});
