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
          <a href="index.php">Generador de formularios</a>
        </li>
        <li class="breadcrumb-item active">Nuevo formulario</li>
      </ol>
      <div id="page-wrapper">
        <!-- form start -->
        <section id="form">
          <h3 class="text-tdgov ml-3"><i class="fa fa-file-o mr-3"></i>Nuevo formulario</h3>
          <hr class="my-4">
          <div class="iframe mx-auto">
            <iframe width="100%" height="800" scrolling="auto" src="formulario.php" frameborder="0"></iframe>
          </div>
        </section>
      </div>
      <!-- /.page-wrapper -->
          
    <?php include "templates/footer.php"; ?>
  </body>
</html>
