<!-- Navigation-->
  <!--<nav class="navbar navbar-expand-lg navbar-dark bg-tdgov-dark fixed-top" id="mainNav">-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php"><img src="../img/Logotipo-Color.png" class="img-fluid" alt="Logo" width="50%" height="50%"> Generador de formularios</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if (!empty($dni)) { ?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2 text-tdgov" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-files-o"></i>
            <span class="d-lg-inline">Generador de formularios</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="usersDropdown">
            <a class="dropdown-item" href="../nuevoFormulario.php">
              <i class="fa fa-plus-square-o"></i> Nuevo formulario
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../listadoFormularios.php">
              <i class="fa fa-files-o"></i> Listado de formularios
            </a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2 text-tdgov" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
            <span class="d-lg-inline"><?php echo " ".$dni; ?></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="usersDropdown">
            <a class="dropdown-item" href="../auth/logout.php">
              <i class="fa fa-sign-out"></i> Salir
            </a>
          </div>
        </li>
      </ul>
    </div>
    <?php } ?>
  </nav>
