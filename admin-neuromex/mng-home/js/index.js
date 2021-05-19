var tabla = $('#resultados').DataTable({
    processing: true,
    serverSide: true,
    stateSave: true,
    ajax: {
        type: 'GET',
        url: "./control/lista.php",
    },
    stateSaveCallback: function(settings, data) { localStorage.setItem('DataTables_' + settings.sInstance, JSON.stringify(data)) },
    stateLoadCallback: function(settings) { return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance)) },
    columns: [
        { data: 'texto', name: "slider_titulo" },
        { data: 'imagen', name: "slider_imagen" },
        { data: 'opciones', searchable: false, orderable: false },
    ],
    language: lang
});

$("input[type='file']").fileinput({
    language: 'es',
    showUpload: false,
    showRemove: false,
    showCaption: false,
    browseClass: "btn btn-primary btn-block",
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
});

$(document).on("click", ".fa-pencil", function() {
    var imagen = $(this).data('imagen');
    var titulo = $(this).data('titulo');
    var texto = $(this).data('texto');
    var id = $(this).data('id');
    $("#editar input[name='id']").val(id);
    $("#editar input[name='titulo']").val(fromHTML(titulo));
    $("#editar textarea[name='texto']").html(fromHTML(texto));
    $("#editar input[type='file']").fileinput('destroy');
    $("#editar input[name='imagen']").fileinput({
        language: 'es',
        showUpload: false,
        showRemove: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-block",
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        initialPreviewAsData: true,
        initialPreviewFileType: 'image',
        initialPreview: '../../img/slider/' + imagen
    });
    $("#nuevo").hide();
    $("#editar").show();
});

$('#editar .btn-secondary').click(function() {
    $("#editar").hide();
    $("#nuevo").show();
});

$(document).on("click", ".fa-trash-o", function() {
    var id = $(this).data('id');
    Swal.fire({
        title: '¿Eliminar diapositiva?',
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
                url: './control/delete.php',
                type: 'GET',
                data: { "id": id },
                success: function(response) {
                    alerta(response.title, response.msg, response.class, 'Aceptar');
                    tabla.ajax.reload();
                }
            });
        }
    });
});