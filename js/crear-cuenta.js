$("#registro").submit(function (e) {
    e.preventDefault();
    var form = $(this).serialize();
    $.post('./admin-neuromex/mng-miembros/control/insert.php', form,
      function (response) {
        if (response) {
          location.href = "./fin";
        } else {
          location.href = "./error";
        }
      }
    );
  });
  