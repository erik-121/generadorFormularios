<!-- Prepended text-->
<div class="form-group col-lg-6">
  <label for="{{ id }}">{{ label }}</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-map-marker"></i></div>
    </div>
    <input type="text" id="{{ id }}" name="{{ id }}" class="form-control" placeholder="{{ placeholder }}" value="<?php echo $hola?>" {{#required}} required="true" {{/required}} {{^required}} {{/required}}>
  </div>
</div>
<!-- /.col -->