<?php

include "../templates/headForm.php";?>
<body class="fixed-nav" id="page-top">
<?php include "../templates/navForm.php"; ?>

<?php include "./".$tramite[2]; ?>

<?php include "../templates/footerForm.php"; ?>
</body>
</html>


$formularioFinal='<?php 
session_start();
$nombre=$_SESSION["nombre"];
$dni=$_SESSION["dni"];

include "../includes/common.php";
//Información acerca del trámite en curso.
$idTramite 					          = $_GET["tramite"];   
$tramite 						          = infoTramite($idTramite);
$_SESSION["nombreTramite"] 	  = $tramite[0];
$_SESSION["areaTramite"] 		  = $tramite[1];
$_SESSION["urlTramite"] 		  = $tramite[2];
$_SESSION["urlProcTramite"]   = $tramite[3];
$_SESSION["urlSubTramite"]    = $tramite[4];
$_SESSION["docTramite"] 		  = $tramite[5];
$_SESSION["nombreDocTramite"] = $tramite[6];
$_SESSION["urlResultTramite"] = $tramite[7];
include "../templates/headForm.php"; ?>
<body class="fixed-nav" id="page-top">
<?php 
include "../templates/navForm.php"; 
include "./".$tramite[2];
<div class="content-wrapper">
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item">Procedimientos</li>
    <li class="breadcrumb-item active"><?php echo $_SESSION["nombreTramite"]; ?></li>
  </ol>
  <div id="page-wrapper">
    <!-- form start -->
    <section id="form">
      <h3 class="text-tdgov ml-3"><i class="fa fa-file-text-o mr-3"></i><?php echo $_SESSION["nombreTramite"]; ?></h1>
      <hr class="my-4">
      <!-- <form action="../result/<?php echo $_SESSION["urlResultTramite"]; ?>" method="post" enctype="multipart/form-data" data-parsley-validate> -->
        <input type="hidden" id="app" name="app" value="<?php echo $app?>">'.$_POST["generado"].'
        <div class="form-row">
          <div class="form-group col-lg-12 text-right">
            <button class="btn btn-outline-success" type="submit"><i class="fa fa-cogs"></i> Continuar</button>
            <button type="button" class="btn btn-outline-secondary" onclick="window.history.back();"><i class="fa fa-history"></i> Volver</button>
          </div>
        </div>
        <!-- /.row -->
      <!-- </form> -->
    </section>
  </div>
</div>
</div>
</body>
<?php include "../templates/footerForm.php";?>
</html>';

<?php print_r($formularioFinal);


$fileName = 'prueba.php';

$handle = fopen("prueba.txt", "w");

fwrite($handle,$formularioFinal);
fclose($fop);

/*if (is_writable($fileName)) {
  fwrite(fopen($fileName, 'a'), $formularioFinal);
}*/

?>