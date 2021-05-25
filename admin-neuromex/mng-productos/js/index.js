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
        { data: 'producto', name: "prod_name" },
        { data: 'categoria', name: "prod_cat" },
        { data: 'marca', name: "prod_trademark" },
        { data: 'precio', name: "prod_price" },
        { data: 'oferta', name: "prod_offer_price" },
        { data: 'renta', name: "prod_rent" },
        { data: 'opciones', searchable: false, orderable: false },
    ],
    language: lang
});

$(document).on("click", ".fa-trash-o", function() {
    var id = $(this).data('id');
    Swal.fire({
        title: '¿Eliminar producto?',
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
                url: 'control/delete.php',
                type: 'GET',
                data: { "id": id },
                success: function(data) {
                    var r = JSON.parse(data);
                    alerta(r.title, r.msg, r.class, 'Aceptar');
                    tabla.ajax.reload();
                }
            });
        }
    });
});