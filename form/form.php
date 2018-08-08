<?php 
  session_start();
  $nombre=$_SESSION['nombre'];
  $dni=$_SESSION['dni'];
  
  include "../includes/common.php";
  //Información acerca del trámite en curso.
  $idTramite 					          = $_GET['tramite'];   
  $tramite 						          = infoTramite($idTramite);
  $_SESSION['nombreTramite'] 	  = $tramite[0];
  $_SESSION['areaTramite'] 		  = $tramite[1];
  $_SESSION['urlTramite'] 		  = $tramite[2];
  $_SESSION['urlProcTramite']   = $tramite[3];
  $_SESSION['urlSubTramite']    = $tramite[4];
  $_SESSION['docTramite'] 		  = $tramite[5];
  $_SESSION['nombreDocTramite'] = $tramite[6];
  $_SESSION['urlResultTramite'] = $tramite[7];
?>
<?php include "../templates/headForm.php"; ?>
<body class="fixed-nav" id="page-top">
<?php include "../templates/navForm.php"; ?>
<?php include "./".$tramite[2]; ?>
<?php include "../templates/footerForm.php"; ?>
 </body>
</html>