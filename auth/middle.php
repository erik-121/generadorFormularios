<?php
	$url = $_GET['url'];
	$location = "Location: ../listadoFormularios.php";
	session_start();
	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
	$a="-----BEGIN CERTIFICATE-----\n";
	$b="\n-----END CERTIFICATE-----";
	$variable1 = $_GET['certificadoUsuario'];
	$z=$a.$variable1.$b;
	$cert_info= openssl_x509_parse($z);
	$tipo_cert = array_values($cert_info)[3]['OU'];

	if($tipo_cert == "Ceres"){
		$pieces=explode("-",array_values($cert_info)[1]['CN']);
		$_SESSION['cert_info']=$cert_info;
		$_SESSION['valores']=$pieces;
		$_SESSION['nombre']=$pieces[0];
		$dni=substr($pieces[1],strpos($pieces[1],':'));
    	$_SESSION['dni']=str_replace(' ','',$dni);
    }
	else if ($tipo_cert == "PKIACCV"){
		$pieces=explode("-",array_values($cert_info)[1]['CN']);
		$_SESSION['cert_info']=$cert_info;
		$_SESSION['valores']=$pieces;
		$_SESSION['nombre']=$pieces[0];
		$_SESSION['dni']=substr($pieces[1],strpos($pieces[1],':')+1);
	}else{
		$pieces1=explode("(",array_values($cert_info)[1]['CN']);
		$prueba=explode(",",$pieces1[0]);
    	$nombre =$prueba[0].$prueba[1];
    	$nomidni = array(0=>$nombre,1=>array_values($cert_info)[1]['serialNumber']);
		$_SESSION['cert_info']=$cert_info;
		$_SESSION['valores']=$nomidni;
		$_SESSION['nombre']=$nombre;
		$_SESSION['dni']=array_values($cert_info)[1]['serialNumber'];
	}
	//header("Location: ../index.php");
	$_SESSION["loggedIn"] = 1;
	header($location);
	//echo $location;
?>
