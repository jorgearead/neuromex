$(function() {
    $.ajax({
        url: "./control/get.php",
        data: { id: id },
        type: "GET",
        success: function(response) {
            $("input[name='id']").val(response.mem_id);
            $("input[name='name']").val(fromHTML(response.mem_name));
            $("input[name='precio']").val(fromHTML(response.mem_price));
            $("input[name='disponible']").val(fromHTML(response.mem_status));
            $("input[type='file']").fileinput({
                language: 'es',
                showUpload: false,
                showRemove: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-block",
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreview: "../../img/membresia/" + response.mem_logo,
            });
            CKEDITOR.instances["descripcion"].setData(response.mem_desc);
        },
        error: function() {
            alerta("Error!", "No fue posible recuperar la informacion", "error", "Aceptar");
        }
    });
});

CKEDITOR.replace('descripcion', {
    filebrowserBrowseUrl: url + 'vendors/ckfinder/ckfinder.html',
    filebrowserUploadUrl: url + 'vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
});