
<div style="height: 500px; width: 900px; margin: 0 auto; background-color: white; padding: 20px 20px">
	<form role="form" style="background-color: white" method="post" action="<?php echo base_url();?>clients/create">
  <div class="form-group">
    <label for="email">Nit:</label>
    <input type="number" class="form-control" id="nit_cliente" name="nit_cliente">
  </div>
  <div class="form-group">
    <label for="pwd">Nombre:</label>
    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente">
  </div>
  <div class="form-group">
    <label for="pwd">Direccion:</label>
    <input type="text" class="form-control" id="direccion" name="direccion">
  </div>
  <div class="form-group">
    <label for="pwd">Telefono:</label>
    <input type="number" class="form-control" id="telefono" name="telefono">
  </div>
  
  <button type="submit" class="btn btn-default">Crear</button>
</form>
</div>
