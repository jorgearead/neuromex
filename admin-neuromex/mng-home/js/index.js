var tabla = $('#resultados').DataTable({
	processing: true,
  serverSide: true,
  stateSave: true,
	ajax: {
		type: 'GET',
		url : "./control/lista.php",
	},
	stateSaveCallback: function(settings,data) { localStorage.setItem( 'DataTables_' + settings.sInstance, JSON.stringify(data) ) },
	stateLoadCallback: function(settings) { return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance ) ) },
  columns: [
		{ data: 'texto', name: "sli_texto" },
		{ data: 'desk', name: "sli_desk" },
		{ data: 'mobile', name: "sli_mobile" },
    { data: 'opciones', searchable:false, orderable:false },
  ],
	language:  {
		sProcessing:     "Procesando...",
		sLengthMenu:     "Mostrar _MENU_ resultados",
		sZeroRecords:    "Tabla vacía",
		sEmptyTable:     "Ningún resultado disponible en esta tabla",
		sInfo:           "Mostrando del _START_ al _END_ de un total de _TOTAL_ resultados",
		sInfoEmpty:      "No se encontraron resultados",
		sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
		sInfoPostFix:    "",
		sSearch:         "Buscar:",
		sUrl:            "",
		sInfoThousands:  ",",
		sLoadingRecords: "Cargando...",
		oPaginate: {
			sFirst:    "<<",
			sLast:     ">>",
			sNext:     ">",
			sPrevious: "<"
		},
		oAria: {
			sSortAscending:  ":Ordenar de manera ascendente",
			sSortDescending: ":Ordenar de manera descendente"
		}
	}
});

$("input[type='file']").fileinput({
  language: 'es',
  showUpload:false,
  showRemove:false,
  showCaption: false,
  browseClass: "btn btn-primary btn-block",
  allowedFileExtensions: ['jpg','png','gif']
});

$(document).on("click", ".fa-pencil", function() {
	var desk = $(this).data('desk');
	var mobi = $(this).data('mobi');
	var text =  $(this).data('text');
	var id = $(this).data('id');
	$("input[name='id']").val(id);
	$("input[name='texto']").val(fromHTML(text));
	$("#editar input[type='file']").fileinput('destroy');
	$("#editar input[name='desk']").fileinput({
		language: 'es',
		showUpload:false,
		showRemove:false,
		showCaption: false,
		browseClass: "btn btn-primary btn-block",
		allowedFileExtensions: ['jpg','png','gif'],
		initialPreviewAsData: true,
		initialPreviewFileType: 'image',
		initialPreview: '../../img/slider/'+desk
	});
	$("#editar input[name='mobile']").fileinput({
		language: 'es',
		showUpload:false,
		showRemove:false,
		showCaption: false,
		browseClass: "btn btn-primary btn-block",
		allowedFileExtensions: ['jpg','png','gif'],
		initialPreviewAsData: true,
		initialPreviewFileType: 'image',
		initialPreview: '../../img/slider/'+mobi
	});
  $("#nuevo").hide();
  $("#editar").show();
});

$('#editar .btn-secondary').click( function() {
	$("#editar").hide();
  $("#nuevo").show();
});

$(document).on("click",".fa-trash-o", function() {
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
				data: { "id" : id },
				success: function( response ){
					alerta(response.title,response.msg,response.class,'Aceptar');
					tabla.ajax.reload();
				}
			});
		}
	});
});
