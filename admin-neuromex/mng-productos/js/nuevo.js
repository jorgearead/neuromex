$.get("./control/getCates.php", { id: 0 },
    function(response) {
        $("select[name='categoria[]']").html(response);
    }
);

$.get("./control/getMarcas.php",
    function(response) {
        $("select[name='marca']").html(response);
    }
);

$(document).on("change", "select[name='categoria[]']", function() {
    id = $(this).val();
    var parent = $(this).parent();
    var next = null;

    while ($(this).next('select').length) {
        $(this).next('select').remove();
    }

    next = $('<select class="form-control" name="categoria[]"></select>');

    $.get("./control/getCates.php", { id: id },
        function(response) {
            if (response != "0") {
                parent.append(next);
                next.html(response);
            }
        }
    ).fail(function() {
        alerta("Error", "No se pudieron recuperar las categorias", "error")
    });

});

$("input[name='slider[]']").fileinput({
    language: 'es',
    maxFileCount: 20,
    showUpload: false,
    showCaption: false,
    showRemove: false,
    browseClass: "btn btn-primary btn-block",
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
});

/*$("input[name='caracteristicas']").fileinput({
    language: 'es',
    showPreview: false,
    showRemove: false,
    browseClass: "btn btn-primary btn-block",
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
});*/

$("input[name='files[]']").fileinput({
    language: 'es',
    showPreview: false,
    showRemove: false,
    browseClass: "btn btn-primary btn-block",
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg', 'pdf', 'zip']
});

CKEDITOR.replace('contenido', {
    filebrowserBrowseUrl: url + 'vendors/ckfinder/ckfinder.html',
    filebrowserUploadUrl: url + 'vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
});

/* Manipular los archivos múltiples*/
const box = '<div class="form-group"><div class="input-group"><input type="form-control" class="form-control" name="filename[]" placeholder="Nombre para mostrar el archivo" style="width:70%;" required/><select class="form-control" name="privado[]"><option value="0">Libre</option><option value="1">Restringido</option></select></div><div class="input-group"><input type="file" name="files[]" required/><button class="btn btn-danger btn-addon" type="button"><i class="fa fa-times"></i></button></div></div>';
var docs = $("#documentos");
$(".btn-info").click(function() {
    $("#documentos").append(box);
    docs.last(".form-gorup").find("input[type='file']").fileinput({
        language: 'es',
        showPreview: false,
        showRemove: false,
        browseClass: "btn btn-primary btn-block",
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg', 'pdf', 'zip']
    });
});

$(document).on("click", ".btn-danger", function() {
    $(this).closest(".form-group").remove();
});