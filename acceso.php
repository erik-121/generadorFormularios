<?php 
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);
  $_SESSION['notCarg']="true";

  include "includes/common.php";
  $idTramite = $_GET['tramite'];   
  $tramite   = infoTramite($idTramite);
  $url       = '../form/form.php?tramite='.$idTramite;

  include "templates/head.php"; 
?>
<body class="fixed-nav" id="page-top">
  <?php include "templates/nav.php"; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item">
           <a href="javascript:window.history.back();">Procedimientos</a>
        </li>
        <li class="breadcrumb-item active">Acceso</li>
      </ol>
      <div id="page-wrapper">
        <section>
          <div class="jumbotron">
            <h1 class="display-4">Acceso con certificado electrónico</h1>
            <hr class="my-4">
            <div class="row justify-content-md-center">
              <div class="col col-lg-2">
                <img src="img/icos-acceso.png">
              </div>
              <div class="col-md-9">
                <p class="lead">Para acceder a la tramitación electrónica, así como a la carpeta del ciudadano y a toda la información personal relacionada, Ud. debe acreditar su identidad mediante el uso de un certificado electrónico.</p>
                <p class="lead">Actualmente, la Sede Electrónica del Ayuntamiento admite certificados electrónicos de los siguientes proveedores de servicios de certificación:</p>
                <p class="lead">
                  <ul class="lead">
                    <li ><strong>DNI electrónico</strong> (Dirección General de Policía - Ministerio del Interior)</li>
                    <li><strong>ACCV</strong> (Agencia de Tecnología y Certificación Electrónica de la Generalitat Valenciana)</li>
                    <li>En general, todos aquellos certificados reconocidos en la plataforma <strong>@Firma</strong> del Ministerio de Hacienda y Administraciones Públicas</li>
                  </ul>
                </p>
                <p class="lead">Puede acceder con su certificado electrónico a través del siguiente enlace:</p>
              </div>
            </div>
            <form id="form-id" action="result/middle.php" method="get">
              <input type="hidden" id="certificadoUsuario" name="certificadoUsuario" class="form-control" placeholder="Resultado" required>
              <input type="hidden" id="url" name="url" class="form-control" value="<?php echo $url ?>">
            </form>
            <div class="row justify-content-md-center">
                <button class="btn btn-success btn-lg" type="button" onclick="MiniApplet.selectCertificate('SHA1withRSA',showCertCallback,showErrorCallback);">Acceso con certificado electrónico</button>
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
  <script type="text/javascript">
    function showErrorCallback(errorType, errorMessage) {}
    function showCertCallback(certificateB64) {
      document.getElementById('certificadoUsuario').value = certificateB64;
      var form = document.getElementById("form-id");
      form.submit();
    }
  </script>
</html>