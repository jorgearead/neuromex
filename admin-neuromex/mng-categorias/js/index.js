/***** inicializar *****/
var id2 = 0;
var id3 = 0;

var tabla = $('#resultados').DataTable({
    processing: true,
    serverSide: true,
    stateSave: true,
    ajax: {
        type: 'GET',
        url: "./control/lista.php",
        data: {
            nivel: 0
        }
    },
    stateSaveCallback: function(settings, data) { localStorage.setItem('DataTables_' + settings.sInstance, JSON.stringify(data)) },
    stateLoadCallback: function(settings) { return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance)) },
    columns: [
        { data: 'orden', name: "pc_orden" },
        { data: 'nombre', name: "pc_nombre" },
        { data: 'opciones', searchable: false, orderable: false },
    ],
    language: lang
});

var tabla2 = $('#resultados2').DataTable({
    processing: true,
    serverSide: true,
    stateSave: true,
    ajax: {
        type: 'GET',
        url: "./control/lista.php",
        data: function(d) {
            d.nivel = 1,
                d.padre = id2
        }
    },
    stateSaveCallback: function(settings, data) { localStorage.setItem('DataTables_' + settings.sInstance, JSON.stringify(data)) },
    stateLoadCallback: function(settings) { return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance)) },
    columns: [
        { data: 'orden', name: "pc_orden" },
        { data: 'nombre', name: "pc_nombre" },
        { data: 'opciones', searchable: false, orderable: false },
    ],
    language: lang
});

var tabla3 = $('#resultados3').DataTable({
    processing: true,
    serverSide: true,
    stateSave: true,
    ajax: {
        type: 'GET',
        url: "./control/lista.php",
        data: function(d) {
            d.nivel = 2,
                d.padre = id3
        }
    },
    stateSaveCallback: function(settings, data) { localStorage.setItem('DataTables_' + settings.sInstance, JSON.stringify(data)) },
    stateLoadCallback: function(settings) { return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance)) },
    columns: [
        { data: 'orden', name: "pc_orden" },
        { data: 'nombre', name: "pc_nombre" },
        { data: 'opciones', searchable: false, orderable: false },
    ],
    language: lang
});

select(0, 0, "select[name='cat']");

$("input[type='file']").fileinput({
    language: 'es',
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary btn-block",
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
});

/***** Buscar hijos *****/
$(document).on("click", ".fa-list-ul", function() {
    var ni = $(this).data("nivel");
    if (ni == 0) {
        id2 = $(this).data("id");
        tabla2.ajax.reload();
    } else {
        id3 = $(this).data("id");
        tabla3.ajax.reload();
    }
});

$("#ncat").change(function() {
    select($(this).val(), 1, "#nscat")
});

$("#ecat").change(function() {
    select($(this).val(), 1, "#escat")
});

/***** Manipular categorias *****/

$(document).on("click", ".edit", function() {
    var id = $(this).data('id');
    var form = $("#ed-cat form");

    $.get('./control/get.php', { id: id },
        function(response) {
            form.find("input[name='id']").val(response.pc_id);
            form.find("input[name='nombre']").val(fromHTML(response.pc_nombre));
            form.find("input[name='imagen']").fileinput('destroy');
            form.find("input[name='imagen']").fileinput({
                language: 'es',
                showUpload: false,
                showRemove: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-block",
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreview: '../../img/categorias/' + response.pc_imagen
            });
            switch (response.pc_nivel) {
                case '0':
                    form.find("select[name='cat']").val(0);
                    form.find("select[name='subcat']").val(0);
                    break;
                case '1':
                    select(response.pc_depende, 1, "#escat");
                    form.find("select[name='cat']").val(response.pc_depende);
                    form.find("select[name='subcat']").val(0);
                    break;
                case '2':
                    select(response.depende2, 1, "#escat");
                    form.find("select[name='cat']").val(response.depende2);
                    setTimeout(function() {
                        form.find("select[name='subcat']").val(response.pc_depende);
                    }, 100);
                    break;
                default:
                    console.log("Salto todo el switch");
            }
        }).fail(function() {
        alerta("Error!", "No se ha podido recuperar la informaci??n de la categor??a.", "error", "Aceptar");
    });

    $("#ed-cat").modal("show");
});

$(document).on("click", ".del", function() {
    var id = $(this).data('id');
    Swal.fire({
        title: '??Eliminar Categor??a?',
        text: "Dejar?? de existir en el sistema, sus im??genes tambi??n se eliminar??n",
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
                success: function(r) {
                    alerta(r.title, r.msg, r.class, 'Aceptar');
                    tabla.ajax.reload();
                }
            });
        }
    });
});

$(document).on("click", ".fa-sort", function() {
    var id = $(this).data('id');
    var po = $(this).data('orden');
    var form = $("#orden form");
    form.find("input[name='id']").val(id);
    form.find("input[name='pos']").val(po);
    $('#orden').modal('show');
});

function select(padre, nivel, select) {
    var params = {
        id: padre,
        ni: nivel
    };
    $.get('./control/getcats.php',
        params,
        function(response) {
            $(select).html('')
            $(select).html(response)
        }
    );
}