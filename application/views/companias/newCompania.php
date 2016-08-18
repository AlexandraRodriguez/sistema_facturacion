<div style="height: 500px; width: 900px; margin: 0 auto; background-color: white; padding: 20px 20px">
	<form role="form" style="background-color: white" method="post" action="<?php echo base_url();?>companias/create">
  <div class="form-group">
    <label for="email">Nombre negocio:</label>
    <input type="text" class="form-control" id="nombre_compania" name="nombre_compania">
  </div>
  <div class="form-group">
    <label for="pwd">Direccion:</label>
    <input type="text" class="form-control" id="direccion" name="direccion">
  </div>
  <div class="form-group">
    <label for="pwd">Telefono:</label>
    <input type="text" class="form-control" id="telefono" name="telefono">
  </div>
  <div class="form-group">
    <label for="pwd">Nit:</label>
    <input type="number" class="form-control" id="nit" name="nit">
  </div>
  
  <button type="submit" class="btn btn-default">Registrar compañia</button>
</form>
</div>
