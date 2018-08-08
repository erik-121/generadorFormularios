<?php

$formulario1='<?php
  session_start();
  $nombre = $_SESSION["nombre"];
  $dni = $_SESSION["dni"];
  
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

include "../templates/headForm.php";?>
<body class="fixed-nav" id="page-top">
<?php include "../templates/navForm.php";

 /*if (!$_SESSION["loggedIn"]){
    $location = "Location: ../acceso.php";
    header($location);
    exit();  
  }*/
  
  //Identificador del expediente
  $app = $_GET["app"];    
  if (isset($app) && $app!=""){
    try 
    { 
      require "../includes/config.php";

      $connection = new PDO($dsn, $username, $password, $options);
      $sql = "SELECT L.*
              FROM PMT_LICENCIAVADO L 
              WHERE L.APP_UID =:App";
      $statement = $connection->prepare($sql);
      $statement->bindParam("App", $app, PDO::PARAM_STR);
      $statement->execute();

      $result = $statement->fetchAll();
    }
    
    catch(PDOException $error) 
    {
      echo $sql . "<br>" . $error->getMessage();
    }
    if ($result && $statement->rowCount() > 0){
      foreach ($result as $row) 
        { 
          //$nombre           = $row["nombre"];
          //$dni              = $row["dni"];
          $nombreRep        = $row["NOMBREREP"];
          $dniRep           = $row["DNIREP"];
          $telefono         = $row["TELEFONO"];
          $email            = $row["EMAIL"];
          $direccion        = $row["DIRECCION"];
          $cp               = $row["CP"];
          $municipio        = $row["MUNICIPIO"];
          $provincia        = $row["PROVINCIA"];
          $pais             = $row["PAIS"];
          $expone          = $row["EXPONE"];
          $solicita		= $row["SOLICITA"];
        }
    }  
  }   
	require "../includes/config.php";
	$connection = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT * 
          FROM PMT_TERCERO 
          WHERE DNI = :Dni";
	$statement = $connection->prepare($sql);
	$statement->bindParam("Dni", $dni, PDO::PARAM_STR);
	$statement->execute();
	$result = $statement->fetchAll();
	if($result!==null){
		$telefono = $result[0][TELEFONO];
		$email = $result[0][EMAIL];
		$cp = $result[0][CP];
		$direccion = $result[0][DIRECCION];
		$municipio = $result[0][MUNICIPIO];
		$provincia = $result[0][PROVINCIA];
		$pais = $result[0][PAIS];
	}
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb mt-3">
      <li class="breadcrumb-item">
        <a href="javascript:window.history.back();">Procedimientos</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $_SESSION["nombreTramite"]; ?></li>
    </ol>
    <div id="page-wrapper">
      <!-- form start -->
      <section id="form">
        <h3 class="text-tdgov ml-3"><i class="fa fa-file-text-o mr-3"></i><?php echo $_SESSION["nombreTramite"]; ?></h1>
        <hr class="my-4">';

      $formulario2='  
      </section>
    </div>
  </div>
</div>

<?php include "../templates/footerForm.php"; ?>
</body>
</html>';

$formularioFinal = $formulario1.$_POST['generado'].$formulario2;

?>

<?php
$file = "test".date("Ymdhis").".php";

$handle = fopen($file, "w");

fwrite($handle,$formularioFinal);
fclose($handle);

include "../templates/headForm.php";?>
<body class="fixed-nav" id="page-top">
  <p>Tu formulario ha sido generado</p> 
  <a href="/form/<?php echo $file ?>">Ver resultado</a>

<?php
  include "../templates/navForm.php";
  include "../templates/footerForm.php";
?>
 </body>
</html>