<?php
  session_start();
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);
  $_SESSION['notCarg']="true";

  if ($_SESSION["loggedIn"]===1){
    $location = "Location: listadoFormularios.php";
    header($location);
    exit();  
  }
  include "templates/head.php";
?>
  <body class="fixed-nav sticky-footer bg-tdgov-dark" id="page-top">
  <?php include "templates/nav.php"; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb" style="margin-top: 25px;">
        <li class="breadcrumb-item">
          <a href="index.php">Generador de formularios</a>
        </li>
        <li class="breadcrumb-item active">Acceso</li>
      </ol>      
      <div id="page-wrapper">
        <section>
          <div class="jumbotron">
            <h1 class="display-4">Acceso al generador de formularios</h1>
            <hr class="my-4">
            <div class="row justify-content-md-center">
              <div class="col col-lg-2">
                <img src="img/icos-acceso.png">
              </div>
              <div class="col-md-9">
                <p class="lead">Para acceder al generador de formularios, Ud. debe acreditar su identidad mediante el uso de un certificado electrónico o de credenciales de acceso.</p>
                <p class="lead">Elija el método de acceso</p>                
              </div>
            </div>
            <div class="row justify-content-md-center">
                <a href="auth/loginCert.php" class="btn btn-primary btn-lg mr-3" role="button" aria-pressed="true"><i class="fa fa-address-card-o mr-3"></i>Certificado electrónico</a>
		            <a href="auth/login.php" class="btn btn-success btn-lg" role="button" aria-disabled="true"><i class="fa fa-key mr-3"></i>Credenciales (usuario y contraseña)</a>
            </div>
          </div>  
        </section>
      </div>
      <!-- /.page-wrapper -->
    </div>
    <!-- /.content-wrapper -->

    <?php include "templates/footer.php"; ?>
  </body>
  <script type="text/javascript" src="js/miniapplet.js"></script>
</html>