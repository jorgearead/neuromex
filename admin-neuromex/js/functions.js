jQuery(document).ready(function($) {
	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});
});

// Funcion sweetalert
function alerta(titulo, texto, tipo,txt){
	swal.fire({
		title: titulo,
		text: texto,
		type: tipo,
		confirmButtonText: txt
	});
}

//Formateo de Fechas y horas
function formatTime(hour) {
	var hora = hour.split(':');
	var ho = ''; var ampm = '';
	ampm = (hora[0] < '12') ? 'am':'pm';
	switch (hora[0]) {
		case '13': ho = '01'; break;
		case '14': ho = '02'; break;
		case '15': ho = '03'; break;
		case '16': ho = '04'; break;
		case '17': ho = '05'; break;
		case '18': ho = '06'; break;
		case '19': ho = '07'; break;
		case '20': ho = '08'; break;
		case '21': ho = '09'; break;
		case '22': ho = '10'; break;
		case '23': ho = '11'; break;
		default: ho = hora[0];
	}
	return ho+':'+hora[1]+' '+ampm;
}

function formatDate(dat) {
	var me = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	var di = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
	var da = new Date(dat);
	return di[da.getDay()]+' '+da.getDate()+' de '+me[da.getMonth()]+' de '+da.getFullYear();
}

//html
function fromHTML(str) {
	var res = $.parseHTML(str);
	return res[0].data;
}

//Opciones de data table
const lang = {
		sProcessing:     "Procesando...",
		sLengthMenu:     "Mostrar _MENU_",
		sZeroRecords:    "Tabla vacía",
		sEmptyTable:     "Sin resultados disponibles.",
		sInfo:           "_START_ al _END_ de _TOTAL_",
		sInfoEmpty:      "No se encontraron resultados",
		sInfoFiltered:   "(de _MAX_ registros)",
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
};

