
<?php 
  session_start();
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);
  $dni = $_SESSION['dni'];
  if (!$_SESSION["loggedIn"]){
    $location = "Location: ../index.php";
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
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item">
          <a href="../index.php">Generador de formularios</a>
        </li>
        <li class="breadcrumb-item active">Nuevo formulario</li>
      </ol>
      <div id="page-wrapper">
        <!-- form start -->
        <section id="form">
          <h3 class="text-tdgov ml-3"><i class="fa fa-file-o mr-3"></i>Nuevo formulario</h3>
          <hr class="my-4">
          <form id="form_id" action="formulario2.php" method="post" enctype="multipart/form-data" data-parsley-validate>
            <div class="card border-secondary mb-3">
              <div class="card-header bg-tdgov-dark text-white">
                Datos del formulario
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="area">Título formulario</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-file-text-o"></i></div>
                      </div>
                      <input type="text" id="tramite" name="tramite" class="form-control" placeholder="nombre del trámite" value="">

                    </div>
                  </div>
                </div>
                <!-- /.row -->

                <div class="form-row">                
                  <div class="form-group col-lg-6">
                    <label for="area">Nombre archivo</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-file-text-o"></i></div>
                      </div>
                      <input type="text" id="nomArchivo" name="nomArchivo" class="form-control" placeholder="nombre del archivo" value="">
                      <a href="#" data-toggle="tooltip" title="" data-original-title="Escriba sólo el nombre, sin extensión (.php)" class="pl-1"><i class="fa fa-exclamation-circle text-tdgov-dark"></i></a>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="origen">Área</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-bank"></i></div>
                      </div>
                      <select class="form-control" name="area" id="area">
                        <?php

                        try 
                        {
                          require "/includes/config.php";

                          $connection = new PDO($dsn, $username, $password, $options);
                          $sql = "SELECT * 
                                  FROM PROCESS_CATEGORY 
                                  ORDER BY `CATEGORY_NAME` DESC";
                          $statement = $connection->prepare($sql);
                          // $statement->bindParam(PDO::PARAM_STR);
                          $statement->execute();
                          $result = $statement->fetchAll();
                        }
                          catch(PDOException $error) 
                        {
                          echo $sql . "<br>" . $error->getMessage();
                        }
                        
                        if ($result && $statement->rowCount() > 0){
                          foreach($result as $row){
                            $area = $row['CATEGORY_NAME'];
                            $idArea = $row['CATEGORY_UID']
                        ?>
                        <option value="<?php echo $area?>"><?php echo $area?></option>
                        <?php
                            /*sql-> array['Urbanismo y vivienda' => [['l503602450230540','licencia vado'],['31254235235','responsable']],'Recursos humanos'=>[['213421321','traslado a MUFACE']]];
                            tareas -> array ['l503602450230540'=>[['task1',12421321],[task2,24121421]]];*/
                          }
                          var_dump ($idArea) ;
                          $area = '3889570025a7afea3548f05047547130';


                        }  
                        ?> 
                      </select>
                      <script>
                        var areaSelected = document.getElementById('area').addEventListener('change', function(){
                          this.value;
                        });
                      </script>
                    </div>
                  </div>
                </div>  
                <!-- /.row -->
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="nomArchivo">ID trámite</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-file-o"></i></div>
                      </div>
                      <select class="form-control" name="idTramite" id="idTramite">
                          <?php
  
                          try 
                          {
                            require "/includes/config.php";
  
                            $connection = new PDO($dsn, $username, $password, $options);

                            $sql = "SELECT L.*
                            FROM PROCESS L 
                            WHERE L.PRO_CATEGORY =:IdArea";
                            $statement = $connection->prepare($sql);
                            $statement->bindParam("IdArea", $idArea, PDO::PARAM_STR);
                            $statement->execute();
                            $result = $statement->fetchAll();                            

                          }
                            catch(PDOException $error) 
                          {
                            echo $sql . "<br>" . $error->getMessage();
                          }
                          
                          if ($result && $statement->rowCount() > 0){
                            foreach($result as $row){
                              $idTramite = $row['PRO_TITLE'];
                          ?>
                          <option value="<?php echo $idTramite?>"><?php echo $idTramite?></option>
                          <?php
                            }
                          }  
                          ?> 
                        </select>                      
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="idTarea1">ID Tarea 1</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-tasks"></i></div>
                      </div>
                      <select class="form-control" name="idTarea1" id="idTarea1">
                          <?php
  
                          try 
                          {
                            require "/includes/config.php";
  
                            $connection = new PDO($dsn, $username, $password, $options);
                            $sql = "SELECT TAS_TITLE FROM TASK";
                            $statement = $connection->prepare($sql);
                            // $statement->bindParam(PDO::PARAM_STR);
                            $statement->execute();
                            $result = $statement->fetchAll();
                          }
                            catch(PDOException $error) 
                          {
                            echo $sql . "<br>" . $error->getMessage();
                          }
                          
                          if ($result && $statement->rowCount() > 0){
                            foreach($result as $row){
                              $idTarea1 = $row['TAS_TITLE'];
                          ?>
                          <option value="<?php echo $idTarea1?>"><?php echo $idTarea1?></option>
                          <?php
                            }
                          }  
                          ?> 
                        </select>                      
                    </div>
                  </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card -->
            <div class="form-row">
              <div class="form-group col-lg-12 text-right">
                <button class="btn btn-outline-success" type="submit"><i class="fa fa-cog"></i> Siguiente</button>
                <button type="button" class="btn btn-outline-secondary" onclick="history.go(-1); return false;"><i class="fa fa-history"></i> Volver</button>
              </div>
            </div>
          </form>
        </section>
      </div>
      <!-- /.page-wrapper -->
          
    <?php include "templates/footer.php"; ?>
    <script>
      $(document).ready(function() {
        $('#fechaCaptura').datepicker();
      });
    </script>

    <script>
	document.getElementById("estadoElaboracion").addEventListener("change", function(){
			var x = document.getElementById("estadoElaboracion").value;
			if(x=="EE03"){
				document.getElementById("digitalizacion").style.display = "block";
				document.getElementById("docOriginal").style.display = "none";
				document.getElementById("identificadorDocumentoOrigen").required = false;
			}else{
				document.getElementById("digitalizacion").style.display = "none";
				if(x=="EE02" || x=="EE04"){
					document.getElementById("docOriginal").style.display = "block";
					document.getElementById("identificadorDocumentoOrigen").required = true;
			
				}else{
					document.getElementById("docOriginal").style.display = "none";
					document.getElementById("identificadorDocumentoOrigen").required = false;	
				}
			}
		});
    </script>
  </body>
</html>
