<?php

/**
 * Escapes HTML for output
 *
 */

function escape($html)
{
	return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}


/**
 * Subir documento a la carpeta temporal
 *
 */

function uploadDocument($file){
	$createDate = date("Ymdhis");
	$target_dir = "../tmp/";
	$target_file = $target_dir . $createDate . basename($file["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "pdf") {
	    echo "Sorry, only PDF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($file["tmp_name"], $target_file)) {
	        //echo "The file ". basename( $file["name"]). " has been uploaded.";
	        return $target_file;
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}

/**
 * Reordenar array de documentos adjuntados en formulario, para subida múltiple de archivos.
 *
 */
function rearrange( $arr ){
  foreach( $arr as $key => $all ){
      foreach( $all as $i => $val ){
          $new[$i][$key] = $val;    
      }    
  }
  return $new;
}

/**
 * Obtener la información sobre el procedmiento que se va a tramitar
 *
 */
function infoTramite($idTramite)
{
	$result = []; 
	switch ($idTramite) {
    case "8913972365a7b0513bfb141057199150":
        $result[0] = "Solicitud Licencia de Vado";
		$result[1] = "Área de Urbanismo y Vivienda";
		$result[2] = "solLicenciaVado.php";
		$result[5] = "6908193895aa241856037b0012925789";
		$result[6] = "solicitudLicenciaVado";
        break;
    case "1537388105b1519f1201d03015808582":
        $result[0] = "Solicitud Instancia General";
		$result[1] = "Área de Servicios Generales";
		$result[2] = "solInstanciaGeneral.php";
		$result[3] = "instanciaGeneral.php";
		$result[4] = "subInstanciaGeneral.php";
		$result[5] = "6908193895aa241856037b0012925789"; //REEMPLAZAR ESTE VALOR
		$result[6] = "instanciaGeneral";
		$result[7] = "resultInstanciaGeneral.php";
        break;
    case "8389278985a96663e88f1b1086018668":
        $result[0] = "Solicitud Certificado de Empadronamiento";
		$result[1] = "Área de Urbanismo y Vivienda";
		$result[2] = "solCertificadoEmpadronamiento.php";
		$result[3] = "certificadoEmpadronamiento.php";
		$result[4] = "subCertificadoEmpadronamiento.php";
		$result[5] = "6908193895aa241856037b0012925789"; //REEMPLAZAR ESTE VALOR
		$result[6] = "certificadoEmpadronamiento";
		$result[7] = "resultCertificadoEmpadronamiento.php";
        break;
    case "8913972365a7b0513bfb141057199151": //REEMPLAZAR ESTE VALOR CUANDO ESTE CREADO EL PROCEDIMIENTO EN PM
        $result[0] = "Solicitud Autorización Eventos Culturales";
		$result[1] = "Área de Cultura";
		$result[2] = "solAutorizacionEventosCulturales.php";
		$result[3] = "autorizacionEventosCulturales.php";
		$result[4] = "subAutorizacionEventosCulturales.php";
		$result[5] = "6908193895aa241856037b0012925789"; //REEMPLAZAR ESTE VALOR
		$result[6] = "autorizacionEventosCulturales";
		$result[7] = "resultAutorizacionEventosCulturales.php";
        break;
    case "8913972365a7b0513bfb141057199152": //REEMPLAZAR ESTE VALOR CUANDO ESTE CREADO EL PROCEDIMIENTO EN PM
        $result[0] = "Solicitud Ocupación de la via pública";
		$result[1] = "Área de Urbsanismo y Vivienda";
		$result[2] = "solOcupacionViaPublica.php";
		$result[3] = "ocupacionViaPublica.php";
		$result[4] = "subOcupacionViaPublica.php";
		$result[5] = "6908193895aa241856037b0012925789"; //REEMPLAZAR ESTE VALOR
		$result[6] = "ocupacionViaPublica";
		$result[7] = "resultOcupacionViaPublica.php";
        break;
    case "8913972365a7b0513bfb141057199153": //REEMPLAZAR ESTE VALOR CUANDO ESTE CREADO EL PROCEDIMIENTO EN PM
        $result[0] = "Quejas y Sugerencias";
		$result[1] = "Servicios Generales";
		$result[2] = "solQuejasYSugerencias.php";
		$result[3] = "quejasYSugerencias.php";
		$result[4] = "subQuejasYSugerencias.php";
		$result[5] = "6908193895aa241856037b0012925789"; //REEMPLAZAR ESTE VALOR
		$result[6] = "quejasYSugerencias";
		$result[7] = "resultQuejasYSugerencias.php";
        break;
    case "carpeta":
		$result[0] = "Carpeta Ciudadana";
		$result[1] = "Carpeta Ciudadana";
		$result[2] = "carpeta/carpeta.php";
	break;
	}
	return $result;
}


/**
 * Obtener el documento correspondiente a la Solicitud
 *
 */
function docSolicitud($app, $doc){
	try 
	{	
		require "../includes/config.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT A.APP_DOC_UID FROM APP_DOCUMENT A WHERE A.DOC_UID = '$doc' AND A.APP_UID = '$app'";
		$statement = $connection->prepare($sql);
		$statement->bindParam(':app', $app, PDO::PARAM_STR);
		$statement->bindParam(':doc', $doc, PDO::PARAM_STR);
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
				$idDocumento = $row['APP_DOC_UID'];
	    	}	    	
	}
	else 
		{
			echo "<blockquote>No results found for <?php echo escape($app); ?>.</blockquote>";
		}  

	return $idDocumento;
}

/**
 * Obtener el documento correspondiente a la Solicitud de Licencia de Vado
 *
 */
function docLicenciaVadoiId($app)
{
	try 
	{	
		require "../includes/config.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT A.APP_DOC_UID FROM APP_DOCUMENT A WHERE A.DOC_UID = '6908193895aa241856037b0012925789' AND A.APP_UID = '$app'";
		$statement = $connection->prepare($sql);
		$statement->bindParam(':app', $app, PDO::PARAM_STR);
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
				$idDocumento = $row['APP_DOC_UID'];
	    	}	    	
	}
	else 
		{
			echo "<blockquote>No results found for <?php echo escape($app); ?>.</blockquote>";
		}  

	return $idDocumento;
}

?>