$(function() {
    $.ajax({
        url: "./control/get.php",
        data: { id: id },
        type: "GET",
        success: function(response) {
            $("input[name='id']").val(response.trademarck_id);
            $("input[name='name']").val(fromHTML(response.name));
            $("input[name='orden']").val(response.orden);
            $("input[type='file']").fileinput({
                language: 'es',
                showUpload: false,
                showRemove: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-block",
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreview: "../../img/marcas/" + response.logo,
            });
        },
        error: function() {
            alerta("Error!", "No fue posible recuperar la informacion", "error", "Aceptar");
        }
    });
});

$(".datepicker").datepicker({
    autoclose: true,
    format: "yyyy-mm-dd"
});

CKEDITOR.replace('contenido', {
    filebrowserBrowseUrl: url + 'vendors/ckfinder/ckfinder.html',
    filebrowserUploadUrl: url + 'vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
});