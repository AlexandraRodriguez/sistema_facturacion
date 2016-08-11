
<div style="height: 500px; width: 900px; margin: 0 auto; background-color: white; padding: 20px 20px">
	<form role="form" style="background-color: white" method="post" action="<?php echo base_url();?>products/create">
  <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
  <div class="form-group">
    <label for="precio">Precio:</label>
    <input type="number" class="form-control" id="precio" name="precio">
  </div>
  <div class="form-group">
    <label for="stock">Stock:</label>
    <input type="number" class="form-control" id="stock" name="stock">
  </div>

  <button type="submit" class="btn btn-default">Crear</button>
</form>
</div>
