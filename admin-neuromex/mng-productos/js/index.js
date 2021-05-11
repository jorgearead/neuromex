/* ++++ TABLA DE RESULTADOS ++++ */
var tabla = $('#resultados').DataTable({
	processing: true,
	serverSide: true,
	stateSave: true,
	ajax: {
		type: 'GET',
		url : "./control/lista.php",
		data: function ( d ) { d.cat = cat; }
	},
	stateSaveCallback: function(settings,data) { localStorage.setItem( 'DataTables_' + settings.sInstance, JSON.stringify(data) ) },
	stateLoadCallback: function(settings) { return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance ) ) },
	columns: [
		{ data: 'producto', name: "prod_nombre"},
		{ data: 'categoria', name: "cat_nombre"},
		{ data: 'opciones', searchable:false, orderable:false },
	],
	language: lang
});

$(document).on("click",".fa-trash-o", function() {
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
				url: 'control/producto.delete.php',
				type: 'GET',
				data: { "id" : id},
				success: function( data ){
					var r = JSON.parse(data);
					alerta(r.title,r.msg,r.class,'Aceptar');
					tabla.ajax.reload();
				}
			});
		}
	});
});
