
<script type="text/javascript">
$(function(){
	$("#agregarProducto").on('click', function(){
		$("#tabla tbody tr:eq(0)").clone().removeClass("fila-base").appendTo("#tabla tbody");
	});
	$(document).on("click",".eliminar",function(){
		var parent = $(this).parents().get(0);
		$(parent).remove();
	});
});
</script>
<div style ="margin: 0 auto; display: block; height: 520px; width: 900px; background-color: black">
    <div style ="margin: 0 auto; border-color: blue; display: block; height: 20px; width: 900px; background-color:silver">CREAR FACTURA</div>
    <from style ="margin: 0 auto;display: block;height: 500px; width: 900px; background-color:white">
          <div style ="border-color: red;
                //border-style: solid;
                display: block;
                height: 35%;
                width: 100%;">
                    <div style ="border-color: green;
                          //border-style: solid;
                          display: block;
                          height: 100%;
                          width: 30%;
                          float: left;">
                          <div class="form-group " style="margin:20px 20px;">
                            <label for="Nfactura">Numero de Factura</label>
                            <input style="width:70%" type="text" class="form-control" id="NumeroDeFactura" placeholder="#Factura" required="campo necesario">
                          </div>
                          <div class="form-group" style="margin:20px 20px;">
                            <label for="fecha de factura">Fecha de Factura</label>
                            <input style="width:70%" type="date" class="form-control" id="FechaDeFactura"  placeholder="Fecha Factura" min="2016-01-01" max="2016-12-31" value="<?php echo date("Y-m-d");?>">
                          </div>
                    </div>
                    <div style ="border-color: white;
                          //border-style: solid;
                          display: block
                          float: right;
                          height: 100%;
                          width: 45%;
                          float: left;">
                          <div class="form-group" style="margin:20px 20px;">
                            <label for="Nfactura">Cliente</label>
                            <input style="width:90%" type="text" class="form-control" id="cliente" placeholder="">
                          </div>
                          <div class="form-group" style="margin:20px 20px;">
                            <label for="fecha de factura">NIT</label>
                            <input style="width:60%" type="int" class="form-control" id="NIT" placeholder="NIT" >
                          </div>
                    </div>
                    <div style ="border-color: black;
                          //border-style: solid;
                          display: block
                          float: right;
                          height: 100%;
                          width: 25%;
                          float: left;" >
                          <a href="<?=base_url();?>menuController/impresionfactura" >  <button  style = "margin:40px 40px;" id="crearFactura" type="button" class="btn btn-success">crear factura</button></a>
                          <button style = "margin:0 40px;" id="cancelar" type="button" class="btn btn-danger">Cancelar</button>
                    </div>
          </div>
          <div style ="border-color: blue;
                //border-style: solid;
                display: block;
                height: 65%;
                width: 100%;">
                <div class="table-responsive">
                  <table class="table table-hover table-responsive" id="tabla">
                    <thead>
                      <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>P.U.</th>
                        <th>Dto (%)</th>
                        <th>Iva(%)</th>
                        <th>imp 2</th>
                        <th>Subtotal</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="fila-base">
												<td><input type="text" class="form-control" /></td>
                        <td><input type="text" class="form-control" /></td>
                        <td><input type="number" class="form-control" /></td>
                        <td>10</td>
                        <td>0</td>
                        <td>
                          <select >
                            <option >iva</option>
                            <option >13%</option>
                            <option >14%</option>
                          </select>
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td class="eliminar"><button  id="eliminarfila" type="button" class="btn btn-danger">x</button></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <button class="btn btn-success"  style = "margin:0 40px;" type="button" id="agregarProducto" value="Agregar Producto" ><span class="glyphicon glyphicon-plus"> Agregar Producto</span></button>

          </div>
    </from>
</div>
