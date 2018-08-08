<!-- Select Basic -->
<div class="form-group col-lg-3">
  <label for="{{ id }}">{{ label }}</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-map-marker"></i></div>
    </div>
    <select class="form-control" name="{{ id }}" id="{{ id }}">{{ #options }}
      {{ increIndex }}
      <option value="{{ #values }}{{ #getNthValue }}{{.}}{{/getNthValue}}{{ /values }}">{{ . }}</option>
      {{ /options }}
      {{ resetIndex }}
    </select>
  </div>
</div>
<!-- /.col -->
