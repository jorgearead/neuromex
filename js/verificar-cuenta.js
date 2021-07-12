if (CLIID != 0) {
    $.post('../admin-neuromex/mng-miembros/control/get.php',
      { ID: CLIID },
      function ( response ) {
        console.log(response);
        if (response == 1) {
          setTimeout(function() {
            location.href = "http://neuromex.com.mx/";
            //location.href = "http://localhost/neuro/";
          }, 3000);
        } else {
          setTimeout(function() {
            location.href = "http://neuromex.com.mx/login";
            //location.href = "http://localhost/neuro/login";
          }, 3000);
        }
      }
    );
  }