<div class="form-group col-lg-6">
  <label for="{{ id }}">{{ label }}</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fa fa-file-pdf-o"></i></div>
      </div>
      <input class="form-control" type="file" name="{{ id }}" id="{{ id }}"><a href="javascript:svoid(0);" class="add_button" title="Agregar documento"><span class="btn btn-outline-success"><i class="fa fa-plus-circle"></i></span></a>
    </div>
    <small id="archivoHelpBlock" class="form-text text-muted">
      Formatos admitidos: pdf<br>
    </small>
</div>
<!-- /.col -->