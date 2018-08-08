<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="utf-8">
  <title>FormBuilderTest</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Latest compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">  -->
  <link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row clearfix">
      <!-- Building Form. -->
      <div class="col-md-6">
        <div class="clearfix">
          <h2>Tu formulario</h2>
          <div class="input-group">
            <div class="input-group-btn">
              <button type="button" class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown">
                Seleccionar columnas formulario
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" id="form-layout" role="menu">
                <li value=1>
                  <a href="#">1 Columna</a>
                </li>
                <li value=2>
                  <a href="#">2 Columnas</a>
                </li>
              </ul>
            </div>
            <input id="form-layout-text" class="form-control input-md" placeholder="Columnas formulario: 1 columna" type="text" readonly>
          </div>

          <hr/>
          <div id="build">
            <form id="target" class="form-horizontal">
            </form>
          </div>

          <div class="btn-group pull-right" style="margin-top: 5px">
            <button type="button" class="btn btn-default" id="saveForm">Save Current Form Layout</button>
            <label class="btn btn-primary">Load Form Layout From File
              <input type="file" id="loadForm" style="display: none;"> </button>
          </div>
        </div>
      </div>
      <!-- / Building Form. -->

      <!-- Components -->
      <div class="col-md-6">
        <h2>Componentes arrastrar y soltar</h2>
        <hr>
        <div class="tabbable">
          <ul class="nav nav-tabs" id="formtabs">
            <!-- Tab nav -->
          </ul>
          <form class="form-horizontal" id="components" action="/form/generadorFormulario2.php" method="POST" enctype=multipart/form-data>
            <fieldset>
              <div class="tab-content">
                <!-- Tabs of snippets go here -->
              </div>
            </fieldset>
            <input id="generado" name="generado" type="hidden" />
            <button type="submit" class="btn btn-default" id="saveForm">Siguiente</button>
          </form>
        </div>
      </div>
      <!-- / Components -->

    </div>

  </div>
  <!-- /container -->

  <script data-main="assets/js/main.js" src="https://rawgithub.com/jrburke/requirejs/master/require.js"></script>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

</body>

</html>