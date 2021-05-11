$.ajax({
	url:"./control/categorias-select.php",
	type:"GET",
	success: function(response) {
		$("select").html(response);
	}
});

$("input[name='ficha']").fileinput({
  language: 'es',
  showUpload:false,
  showCaption: false,
  browseClass: "btn btn-primary btn-block",
  allowedFileExtensions: ['pdf']
});

$("input[name='slider[]']").fileinput({
  language: 'es',
  maxFileCount: 20,
  showUpload:false,
  showCaption: false,
  browseClass: "btn btn-primary btn-block",
  allowedFileExtensions: ['jpg','png','gif','jpeg']
});
