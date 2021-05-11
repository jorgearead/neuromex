const validar = {
  letras : "^$|^[A-Za-zñÑáéíóúüÁÉÍÓÚÜ ]+$",
  numletras : "^$|^[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚ#\\.,:_/\\-+ ]+$",
  texto : "^$|^[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\\.,:;_\\-+/*=<>#$%@&¢£¥€©®[\\]{}()¿?¡!\\\"\\' ]+$",
  textarea : "^$|^[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\\.,:;_\\-+/*=<>#$%@&¢£¥€©®[\\]{}()¿?¡!\\\"\\'\\n ]+$",
  correo : "^$|^[A-Za-z0-9\\-_\\.]+@[a-z0-9]+(\\.mx|\\.com|\\.com\\.mx|\\.net|\\.net\\.mx|\\.es|\\.org\\.mx|\\.org|\\.gob|\\.gob\\.mx)$",
  web: "^$|^(https:\\/\\/|http:\\/\\/){0,1}[A-Za-z0-9\\.]+(\\.mx|\\.com|\\.com\\.mx|\\.net|\\.net\\.mx|\\.es|\\.org\\.mx|\\.org|\\.gob|\\.gob\\.mx){1}[\\/A-Za-z0-9=?&\\.]*$",
  telefono : "^$|^[0-9 ]{10,15}$",
  clave : "^$|^[a-zA-Z0-9]+$",
  fecha : "^$|^(19|20)[0-9]{2}\\-(01|02|03|04|05|06|07|08|09|10|11|12)\\-[0-9]{2}$",
  hora : "^$|^[0-9]{2}:{1}[0-9]{2}:{0,1}[0-9]{0,2}$",
  entero : "^$|^[0-9]+$",
  decimal : "^$|^[0-9]+\\.{0,1}[0-9]{0,4}$",
  password : "^$|^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*?&#=+\\-])[A-Za-z\\d@$!%*?&#=+\\-]{8,}$"
}

var editorck = false;
var textBtn = "";

$('form').submit( function (event) {
	event.preventDefault();
	var form = $(this);
	var type = form.attr( "method" );
	var action = form.attr( "action" );
	var confirmar = form.data("confirmar");
	var correcto = false;
  var data = null;

	correcto = EsValido(form);

	if (correcto) {

    if (editorck) {
      for (var ck in CKEDITOR.instances) {
        CKEDITOR.instances[ck].updateElement();
      }
    }

    data = ( type == "GET" || type == "get" ) ? form.serialize() : new FormData( form[0] );

    if (confirmar) {

      var title = form.data('msg');
      Swal.fire({
        title: title,
        text: "¿Los datos ingresados son correctos?",
        type: "question",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {},
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
    		if (result.value) {
          sendToServer(form,action,type,data);
        }
    	});

    } else {
      sendToServer(form,action,type,data);
    }

	}

});

function sendToServer(formulario, url, method, datos) {
  $.ajax({
    url:url,
    type:method,
    data:datos,
    cache:false,
    processData:false,
    contentType:false,
    beforeSend: function() { DescButtonsV(formulario); },
    complete: function() {
      ActButtonsV(formulario);
      editorck = false;
    },
    error:function() {
      alerta (
        "Error",
        "Ocurrió un error al conectarse con el servidor, inténtelo más tarde por favor",
        "error",
        "Aceptar"
      );
    },
    success:function(response) {
      alerta(response.title,response.msg,response.class,"Aceptar");
      if ( response.success ) formulario.trigger("reset");
      setTimeout( function () {
        eval(response.final);
      }, 2000 );
    }
  });
}

//Botones de formularios
function DescButtonsV(f) {
  textBtn = f.find( "button[type='submit']" ).html();
	f.find( "button[type='submit']" ).html('');
	f.find( "button[type='submit']" ).html('<img width="50px" src="'+url+'images/Ellipsis-1.5s-200px.gif">');
	f.find( "button[type='submit']" ).attr('disabled','disabled');
	f.find( "button[type='reset']" ).attr('disabled','disabled');
}

function ActButtonsV(f) {
	f.find( "button[type='submit']" ).html('');
	f.find( "button[type='submit']" ).html(textBtn);
	f.find( "button[type='submit']" ).prop('disabled',null);
	f.find( "button[type='reset']" ).prop('disabled',null);
}

//Validar entradas
function EsValido(form) {
  var valido = true;

	form.find(":input").each( function() {
		var tipo = $(this).prop('type');
    var valor = $(this).val();
    var msg = $(this).data('msg');
    var bool = true;

    switch ( tipo ) {
      case 'password': bool = CheckRegex(validar.password,valor); break;
      case 'number': bool = CheckRegex(validar.entero,valor); break;
      case 'email': bool = CheckRegex(validar.correo,valor); break;
      case 'tel': bool = CheckRegex(validar.telefono,valor); break;
      case 'text':
        var regla = $(this).data('regla');
        bool = CheckRegex(validar[regla],valor);
      break;
      case 'textarea':
        if ( $(this).attr('class') == 'ckeditor' ) {
          bool = true;
          editorck = true;
        } else {
          bool = CheckRegex(validar.textarea,valor);
        }
      break;
    }

    if (!bool) {
      alerta('Error!',msg,'warning');
      $(this).focus();
      return valido = false;
    }

  });

  return valido;
}

function CheckRegex (regex,string) {
  const Regex = RegExp(regex, 'i');
  var valido = false;
  valido = Regex.test(string);
  return valido;
}
