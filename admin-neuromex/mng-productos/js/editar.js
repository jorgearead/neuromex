var IDPROD = 0;
$(function() {

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
    $(document).on("change","select[name='categoria[]']", function() {
        let idc = $(this).val();
        var parent = $(this).parent();
        var next = null;
    
        while( $(this).next('select').length ){
          $(this).next('select').remove();
        }
    
        next = $('<select class="form-control" name="categoria[]"></select>');
    
        $.get("./control/getCates.php", { id: idc },
          function (response) {
            if (response != "0") {
              parent.append(next);
              next.html(response);
            }
          }
        ).fail( function() {
          alerta("Error","No se pudieron recuperar las categorias","error")
        });
    
      });

    setTimeout(function() {
        $.get('./control/get.php', { id: id },
            function(response) {
                const r = response.producto;
                IDPROD = r.prod_id;
                $("input[name='id']").val(r.prod_id);
                $("input[name='urlprod']").val(r.prod_url);
                $("input[name='nombre']").val(fromHTML(r.prod_name));
                //$("input[name='resumen']").val(fromHTML(r.prod_desc));
                //$("input[name='video']").val(r.prod_video);
                $("select[name='marca']").val(r.prod_trademark);
                $("select[name='categoria[]']").val(response.categorias[0]);

                var parent = $("select[name='categoria[]']").parent();
                for (var i = 1, len = response.categorias.length; i < len; i++) {
                    var padre = response.categorias[i - 1];
                    var valor = response.categorias[i];
                    $.get("./control/getCates.php", { id: padre, val: valor },
                        function(res) {
                            setTimeout(function() {
                                parent.append('<select class="form-control" name="categoria[]"></select>');
                                $("select[name='categoria[]']").last().append(res);
                            }, 100);
                        }
                    );
                }

                $("#archivos tbody").html(response.docs);

                $("input[name='slider[]']").fileinput({
                    language: 'es',
                    overwriteInitial: false,
                    showUpload: false,
                    showRemove: false,
                    showCaption: false,
                    browseClass: "btn btn-primary btn-block",
                    allowedFileExtensions: ['jpg', 'png', 'gif'],
                    deleteUrl: "./control/img.delete.php",
                    initialPreviewAsData: true,
                    initialPreviewFileType: 'image',
                    initialPreview: response.preview,
                    initialPreviewConfig: response.config
                });

                $("input[name='caracteristicas']").fileinput({
                    language: 'es',
                    overwriteInitial: true,
                    showUpload: false,
                    showRemove: false,
                    showPreview: false,
                    browseClass: "btn btn-primary",
                    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
                    initialPreviewAsData: true,
                    initialPreviewFileType: 'image',
                    initialPreview: '../../img/productos/' + r.prod_img
                });

                $("input[name='diagrama']").fileinput({
                    language: 'es',
                    overwriteInitial: true,
                    showUpload: false,
                    showRemove: false,
                    showPreview: false,
                    browseClass: "btn btn-primary",
                    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
                    initialPreviewAsData: true,
                    initialPreviewFileType: 'image',
                    initialPreview: '../../img/productos/' + r.prod_diagrama
                });

                CKEDITOR.instances["contenido"].setData(r.prod_desc);

            }
        );
    }, 100);

});

CKEDITOR.replace('contenido', {
    filebrowserBrowseUrl: url + 'vendors/ckfinder/ckfinder.html',
    filebrowserUploadUrl: url + 'vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
});

$(document).on("click", ".fa-pencil", function() {
    const id = $(this).data("id");
    var form = $("#ed-doc form");
    $.get('./control/get.doc.php', { id: id },
        function(response) {
            form.find("input[name='id']").val(response.doc_id);
            form.find("input[name='nombre']").val(fromHTML(response.doc_nombre));
            if (response.doc_privado == "1") {
                form.find("input[name='privado']").prop("checked", "checked");
            } else {
                form.find("input[name='privado']").prop("checked", false);
            }
            form.find("input[name='documento[]']").fileinput("destroy");
            form.find("input[name='documento[]']").fileinput({
                language: 'es',
                overwriteInitial: true,
                showUpload: false,
                showRemove: false,
                browseClass: "btn btn-primary",
                allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg', 'pdf', 'zip'],
                initialPreviewAsData: true,
                initialPreviewFileType: "pdf",
                initialPreview: '../../docs/' + response.doc_file
            });
            $("#ed-doc").modal("show");
        });
});

$(document).on("click", ".fa-trash-o", function() {
    var id = $(this).data('id');
    Swal.fire({
        title: '¿Eliminar documento?',
        text: "Dejará de existir en el sistema",
        type: 'warning',
        showCancelButton: true,
        showLoaderOnConfirm: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'control/delete.doc.php',
                type: 'GET',
                data: { "id": id },
                success: function(data) {
                    var r = JSON.parse(data);
                    alerta(r.title, r.msg, r.class, 'Aceptar');
                    llenarTabla();
                }
            });
        }
    });
});

function llenarTabla() {
    $.get('./control/lista.documentos.php', { id: IDPROD },
        function(response) {
            $("tbody").html(response);
        }
    );
}

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