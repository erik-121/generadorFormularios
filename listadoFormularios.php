<?php
  session_start();
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);
  $dni = $_SESSION['dni'];
  if (!$_SESSION["loggedIn"]){
    $location = "Location: index.php";
    header($location);
    exit();  
  }
  include "templates/head.php";
  require "includes/config.php"; 
?>
<body class="fixed-nav sticky-footer bg-tdgov-dark" id="page-top">
  <?php include "templates/nav.php"; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item">
          <a href="index.php">Generador de formularios</a>
        </li>
        <li class="breadcrumb-item active">Listado de formularios</li>
      </ol>
      <div id="page-wrapper">
        <!-- form start -->
        <section>
          <h3 class="text-tdgov ml-3"><i class="fa fa-folder-open-o mr-3"></i>Listado de formularios</h3>
          <hr class="my-4">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-tdgov-dark text-white">
                <tr>
                  <th>Listado trámites</th>
                  <th>Estado</th>
                  <th>Fecha creación</th>
                  <th>Creador</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  
                  try 
                    {
                      require "includes/config.php";

                      $connection = new PDO($dsn, $username, $password, $options);
                      $sql = "SELECT * FROM PMT_PRUEBAFORMULARIO";
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
                        $id = $row['ID'];
                        $tramite = $row['TRAMITE'];
                        $html = $row['HTML'];
                        $estado = $row['ESTADO'];
                        $fechaCreacion = $row['FECHACREACION'];
                        $autor = $row['AUTOR'];
                      
                  ?>
                <tr>
                  <td><?php echo $tramite; ?></td>
                  <td><?php echo $estado; ?></td>
                  <td><?php echo $fechaCreacion; ?></td>
                  <td><?php echo $autor; ?></td>
                  <td>
                    <a href="pendiente.php?app=<?php echo $id;?>" class="btn btn-outline-info btn-sm"><i class="fa fa-file-pdf-o"></i> Ver</a>
                    <a href="pendiente.php?app=<?php echo $id;?>" class="btn btn-outline-info btn-sm"><i class="fa fa-pencil-square-o"></i> Editar</a>
                    <a href="pendiente.php?app=<?php echo $id;?>" class="btn btn-outline-info btn-sm"><i class="fa fa-trash-alt"></i> Borrar</a>
                    <a href="pendiente.php?app=<?php echo $id;?>" class="btn btn-outline-info btn-sm"><i class="fa fa-upload"></i> Publicar</a>
                  </td>
                </tr>
                <?php        
                    }       
                  }
                  else 
                    {
                      echo "<blockquote>No results found for</blockquote>";
                    }   
                ?>
              </tbody>
            </table>      
          </div>

            <div class="row" style="margin-top: 15px;">
              <div class="col-lg-12 mb-3 text-right">
                <button class="btn btn-outline-success" onclick="window.location.href='nuevoFormulario.php'"><i class="fa fa-plus-circle"></i> Nuevo formualario</button>
              </div>
            </div>
         
        </section>
      </div>
      <!-- /.page-wrapper -->
      <?php require "templates/footer.php"; ?>
  </body>
</html>        
