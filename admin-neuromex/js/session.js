function loginUser(){
  		var formData = new FormData($("#formSession")[0]);    
  	if(formData.get('email') == ""){
  		alerta('Error', "Falto ingresar Email.", "error", "btn-danger","Cerrar");
		$('#email').focus();
  	}else if(!validar_email(formData.get('email'))){
  		alerta('Error', "Ingrese un correo valido.", "error", "btn-danger","Cerrar");
		$('#email').focus();
  	}else if(formData.get('password') == ""){
  		alerta('Error', "Falto ingresar Contraseña.", "error", "btn-danger","Cerrar");
		$('#password').focus();
  	}else{
		$.ajax({
		    url: 'functions/user.login.php',  
		    type: 'POST',
		    data: formData,
		    cache: false,
		    contentType: false,
		    processData: false,
		    success: function( data ){        
		      var array = eval("(" + data + ")");
		      if(array.success == true){
		        alerta('Correcto', array.msg, "success", "btn-success","OK");
		        setTimeout(function(){ location.href = "inicio.php" }, 1000);
		      }else{
		      	alerta('Error', array.msg, "error", "btn-danger","Cerrar");
		      	grecaptcha.reset();
		      }
		    },
		    error: function(){
		    	alerta('Error', "Ocurrio un problema al conectar con el servicio REST.", "error", "btn-danger","Cerrar");
		    }
		  }); 
  	}
}

function passRecuperar(){
	  var formData = new FormData($("#formRecuperar")[0]);

	  if(formData.get('email') == ""){
	  	alerta('Error', 'Falto ingresar Email', 'error', 'btn-danger', 'Cerrar');
	  	$('#m_email').focus();
	  }else if(!validar_email(formData.get('email'))){
	  	alerta('Error', 'Ingrese un Email valido', 'error', 'btn-danger', 'Cerrar');
	  	$('#m_email').focus();
	  }else{
  		  $.ajax({
		    url: 'functions/user.pass.php',  
		    type: 'POST',
		    data: formData,
		    cache: false,
		    contentType: false,
		    processData: false,
		    success: function( data ){        
		      var array = eval("(" + data + ")");
		      if(array.success == true){
		        alerta('Correcto', array.msg, "success", "btn-success","OK");
		            $.ajax({
		              url: 'mail/recuperar-admin.php',  
		              type: 'GET',
		              data: 'cliente=' + array.id,
		              success: function( data ){
		                console.log('Se envio correo electronico al cliente');
		                setTimeout(function(){ location.href = "index.php" }, 2000);
		              }
		            });
		      }else{
		        alerta('Error', array.msg, "error", "btn-danger","Cerrar");
		        grecaptcha.reset();
		      }
		    },
		    error: function(){
		      alerta('Error', "Ocurrio un problema al conectar con el servicio REST.", "error", "btn-danger","Cerrar");
		    }
		  }); 
	  }
}
