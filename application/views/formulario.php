
<script type="text/javascript">
var global_data={
	user_id:1,
	warehouse_id:1
};
var global_line_id=0;
$(function(){

	$(document).on("click",".eliminar",function(){
		var parent = $(this).parents().get(0);
		$(parent).remove();
	});

});

function crear_linea_tabla(){

    temp_number =$('#tabla tbody tr').size();
    temp_id='id_linea_'+temp_number+'';

    html_linea_tabla = $('<tr id="'+temp_id+'">').load('application/views/html_linea_tabla.html');
    //ENCONTRAR EL CHILDREN BUTTON
    //MANEJARLO COMO OBJETO JQUERY
    //ANADIRLE EL ONCLICK
    //ANIADIR LA FUNCION PASANDO EL PARAMETRO DE ID temp_id
    //html_linea_tabla.children('button');
    $("#tabla_tbody").append(html_linea_tabla);
}

function get_products(esta_linea) {
  global_line_id=esta_linea;

  url='<?php echo site_url('index.php/get_products'); ?>';
  data = {};
  type='POST';

  get_ajax_data(url, type, data, add_data_to_modal);
}

function get_ajax_data(purl, ptype, pdata, pfunction){
  $.ajax({
    url: purl,
    datatype: 'json',
    type: ptype,
    data: pdata,
  }).done(function (response){

        //Parseando cadena de texto obtenidos de php a JSON
        respuesta = JSON.parse(response);
        //console.log(temp);
        if (respuesta.success) {
            if (respuesta.data == 'not') {
                alert(respuesta.message);
                //window.close();
            } else {
                if (pfunction != null) {
                    pfunction(respuesta.data, respuesta.message);
                    // return response;
                }
                return respuesta.data;
            }
        }
      }).fail(function (jqXHR, textStatus, errorThrown) {
          respuesta = {
              "success": false,
              "message": "fail"
          };
          // $("#status").html("Algo ha fallado: " + textStatus);
          return respuesta;
      });
}
function insert_invoice(){

  url='<?php echo site_url('index.php/insert_invoice'); ?>';
  data = {
				invoice_date: $('#invoice_date').val(),
				client_id: $('#client_id').val(),
				razon_social: $('#razon_social').val(),
				nit_ci: $('#nit_ci').val(),
				user_id:global_data.user_id,
				total_amount:55,
				warehouse_id: global_data.warehouse_id,
				lines:{
					1:'hola',
					2:'como',
					3:'estas'
				}
			};
  type='POST';

  get_ajax_data(url, type, data, show_new_invoice);
	//var lines = extract_lines();

}

function show_new_invoice(data){
  console.log(data);
  console.log('Funco el foo');
}
function add_data_to_modal(data, message){
    //console.log(data);
    //Borrando contenido de la tabla del modal
    $("#product_list tbody").html('');
    i=0;
    while(data[i]){
      //console.log(data[i]);

      $("#product_list tbody").append(
      '<tr>'+
        '<td>'+data[i].NOMBRE+'</td>'+
        '<td>'+data[i].PRECIO+'</td>'+
        '<td>'+data[i].STOCK+'</td>'+
        '<td>'+
          '<button id="button_append_'+i+
          '" class="glyphicon glyphicon-plus btn btn-success" onclick="append_to_list(\''+data[i].NOMBRE+'\','+data[i].PRECIO+')">'+
          '</button>'+
        '</td>'+
      '</tr>');

      i++;
    }

    //console.log(message);
}

function append_to_list(NOMBRE, PRECIO){


}
function show_alert(){
	alert("Product Added");
}
</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Product</h4>
      </div>
      <div class="modal-body">
        <p>In this place show the produts</p>
        <table class="table table-hover table-responsive" id="product_list">
          <thead>
          <tr>
            <th>
              Producto
            </th>
            <th>
              Precio
            </th>
            <th>
              Stock
            </th>
            </tr>
          </thead>
          <tbody>
          </tbody>

        </table>
				<button onclick="show_alert()">Add this</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div style ="margin: 0 auto; display: block; height: 520px; width: 900px; background-color: black">
    <div style ="margin: 0 auto; border-color: blue; display: block; height: 20px; width: 900px; background-color:silver">CREAR FACTURA</div>
    <from style ="margin: 0 auto;display: block;height: 500px; width: 900px; background-color:white"  method="post" action="<?php echo base_url();?>save_invoice">
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
                            <input style="width:70%" type="date" class="form-control" id="invoice_date"  placeholder="Fecha Factura" min="2016-01-01" max="2016-12-31" value="<?php echo date("Y-m-d");?>">
                          </div>
                    </div>
                    <div style ="border-color: white;
                          //border-style: solid;
/*                          display: block
                          float: right;*/
                          height: 100%;
                          width: 45%;
                          float: left;">
                          <div class="form-group" style="margin:20px 20px;">
                            <label for="Nfactura">Cliente</label>
														<input hidden="true" id="client_id" name="client_id" value="1">
                            <input style="width:90%" id="razon_social" type="text" class="form-control"  name="client" placeholder="">
                          </div>
                          <div class="form-group" style="margin:20px 20px;">
                            <label for="fecha de factura">NIT</label>
                            <input style="width:60%" type="int" class="form-control" id="nit_ci" placeholder="NIT" >
                          </div>
                    </div>
                    <div style ="border-color: black;
                          //border-style: solid;
/*                          display: block
                          float: right;*/
                          height: 100%;
                          width: 25%;
                          float: left;" >
                          <!--a href="<?=base_url();?>menuController/impresionfactura" -->
													<button style = "margin:40px 40px;"
																	id="crearFactura" type="button"
																	class="btn btn-success" onclick="insert_invoice()">crear factura</button><!--/a-->
                          <button style = "margin:0 40px;" id="cancelar" type="button" class="btn btn-danger">Cancelar</button>
                    </div>
          </div>
          <table class="table table-hover table-responsive" id="tabla_head">
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
          </table>
          <div style ="border-color: blue;
                //border-style: solid;
                display: block;
                height: 50%;
                width: 100%; overflow:scroll;">

                  <table class="table table-hover table-responsive" id="tabla">

                    <tbody id="tabla_tbody">

                    </tbody>
                  </table>

              <button class="btn btn-success"  style = "margin:0 40px;" type="button" id="agregarProducto" value="Agregar Producto" onclick="crear_linea_tabla()"><span class="glyphicon glyphicon-plus"> Agregar Producto</span></button>

          </div>
    </from>
</div>
