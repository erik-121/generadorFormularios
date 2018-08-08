<!-- Text input-->
<div class="form-group col-lg-6">
<div class="input-group">
      <label for="{{ id }}">{{ label }}</label>
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fa fa-user"></i></div>
      </div>  
    <input type="text" id="{{ id }}" name="{{ id }}" class="form-control" placeholder="{{ placeholder }}" value="<?php echo $nombreRep?>" {{#required}} required="true" {{/required}} {{^required}} {{/required}} />
  </div>
</div>
<!-- /.col -->
