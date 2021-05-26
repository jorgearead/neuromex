CKEDITOR.replace('descripcion', {
    filebrowserBrowseUrl: url + 'vendors/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: url + 'vendors/ckfinder/ckfinder.html?type=Images',
    filebrowserUploadUrl: url + 'vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: url + 'vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
$("input[type='file']").fileinput({
    language: 'es',
    maxFileCount: 20,
    showUpload: false,
    showRemove: false,
    showCaption: false,
    browseClass: "btn btn-primary btn-block",
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
});