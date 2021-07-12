<script>var CLIID = 0;</script>
<?php if ( $CUENTA['status'] ): ?>
<div class="sufee-login d-flex align-content-center flex-wrap m-5 p-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="alert alert-success">
          <h1>Su cuenta ha sido verificada con exito.</h1>
          <p>En un momento se iniciar&aacute; sesi&oacute;n</p>
          <script> var CLIID = <?=$CUENTA['cli']['customer_id']?>;</script>
        </div>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
<div class="sufee-login d-flex align-content-center flex-wrap m-5 p-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="alert alert-warning">Ocurri&oacute; un error al verificar su cuenta, cont&aacute;ctanos para activarla</div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>