
<div style="height: 500px; width: 900px; margin: 0 auto; background-color: white; padding: 20px 20px">
	<form role="form" style="background-color: white" method="post" action="<?php echo base_url();?>clients/create">
  <div class="form-group">
    <label for="email">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
  <div class="form-group">
    <label for="pwd">Apellido:</label>
    <input type="text" class="form-control" id="apellido" name="apellido">
  </div>
  <div class="form-group">
    <label for="pwd">Razon social:</label>
    <input type="text" class="form-control" id="razon_social" name="razon_social">
  </div>
  <div class="form-group">
    <label for="pwd">Nit:</label>
    <input type="number" class="form-control" id="nit_ci" name="nit_ci">
  </div>
  
  <button type="submit" class="btn btn-default">Crear</button>
</form>
</div>
