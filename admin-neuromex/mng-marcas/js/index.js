/***** inicializar *****/
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
        { data: 'marca', name: "name" },
        { data: 'orden', name: "orden" },
        { data: 'logo', name: "logo" },
        { data: 'opciones', searchable: false, orderable: false },
    ],
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ resultados",
        sZeroRecords: "Tabla vacía",
        sEmptyTable: "Ningún resultado disponible en esta tabla",
        sInfo: "Mostrando del _START_ al _END_ de un total de _TOTAL_ resultados",
        sInfoEmpty: "No se encontraron resultados",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "<<",
            sLast: ">>",
            sNext: ">",
            sPrevious: "<"
        },
        oAria: {
            sSortAscending: ":Ordenar de manera ascendente",
            sSortDescending: ":Ordenar de manera descendente"
        }
    }
});


$(document).on("click", ".del", function() {
    var id = $(this).data('id');
    Swal.fire({
        title: '¿Eliminar Marca?',
        text: "Dejará de existir en el sistema, sus imágenes también se eliminarán",
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