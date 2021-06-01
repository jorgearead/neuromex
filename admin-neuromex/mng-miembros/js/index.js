var tabla = $('#tblusers').DataTable({
    ajax: "./control/lista.php",
    responsive: true,
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior"
        },
        oAria: {
            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
            sSortDescending: ": Activar para ordenar la columna de manera descendente"
        }
    }
});

$(document).on("click", ".pre_eraseFN", function() {
    var id = $(this).data('pro');
    Swal.fire({
        title: '¿Eliminar usuario?',
        text: "El usuario se eliminará completamente",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'control/delete.php',
                type: 'GET',
                data: { "id": id },
                success: function(data) {
                    Swal.fire('Eliminado!', 'Ususario Eliminado', 'success');
                    table.ajax.reload();
                }
            });
        }
    });
});

function editar(id) {
    $.ajax({
        url: 'control/get.php',
        data: { 'id': id },
        type: 'GET',
        success: function(r) {
            $('#edus').val(r.customer_id);
            $('#edname').val(r.name);
            $('#lastName').val(r.lastname);
            $('#edusname').val(r.mail);
            $('#phone').val(r.phone);
            $('#edcontra').val(r.pass);
            $('#salon').val(r.classroom);
            $('#horario').val(r.horary);
            $('#mem').val(r.memb);
            $('#EdUs').modal('show');
        },
        error: function() { alerta('Error!', 'No se pudo conectar al servidor', 'error', 'Aceptar'); }
    });
}