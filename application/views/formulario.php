
<script type="text/javascript">
var global_data={
	user_id:1,
	warehouse_id:1
};
var global_line_id=0;
var lineas=new Object();

$(function(){

	$(document).on("click",".eliminar",function(){
		var parent = $(this).parents().get(0);
		$(parent).remove();
	});

});

/*
###################################################
#     FUNCION PRINCIPAL DE PETICION DE DATOS      #
###################################################
*/

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
/*
###############################################
#          FUNCIONES PARA EL LOOGIN           #
###############################################
*/
function loggin(usr,pwd){
    console.log(usr);
    console.log(pwd);
}


/*
###################################################
#     FUNCIONES PARA EL FORMULARIO DE VENTAS      #
###################################################
*/

function crear_linea_tabla(){
    
    temp_number =$('#tabla tbody tr').size();
    temp_id='id_linea_'+temp_number+'';

    html_linea_tabla = $('<tr id="'+temp_id+'">').load('application/views/html_linea_tabla.php', {id_linea_tabla: ''+temp_id+''});
    //ENCONTRAR EL CHILDREN BUTTON
    $("#tabla_tbody").append(html_linea_tabla);
}

function get_products(esta_linea) {
  global_line_id=esta_linea.id;
  //console.log(global_line_id);
  url='<?php echo site_url('index.php/get_products'); ?>';
  data = {};
  type='POST';

  get_ajax_data(url, type, data, add_data_to_modal);
}
function add_data_to_modal(data, message){
    
    //Borrando contenido de la tabla del modal
    $("#product_list tbody").html('');
    i=0;
    while(data[i]){
     $("#product_list tbody").append(
      '<tr>'+
        '<td>'+data[i].nombre+'</td>'+
        '<td>'+data[i].precio+'</td>'+
        '<td>'+data[i].stock+'</td>'+
        '<td>'+
          '<button id="button_append_'+i+
          '" class="glyphicon glyphicon-plus btn btn-success" onclick="append_to_list(\''+data[i].nombre+'\','+data[i].precio+')">'+
          '</button>'+
        '</td>'+
      '</tr>');

      i++;
    }
}

function append_to_list(NOMBRE, PRECIO){
  console.log(NOMBRE);
  console.log(PRECIO);
  $('#'+global_line_id+' td:nth-child(1) input').val(NOMBRE);
  $('#'+global_line_id+' td:nth-child(4) input').val(PRECIO);
  $('#myModal').modal('toggle');
}

function insert_invoice(){
  patt= /[A-Za-z]{4,20}/;
  if(!patt.test(''+$("#razon_social").val()+'')){
    alert('Cliente no valido');    
  }else{
    patt_nit=/[0-9]+/;
    if(!patt_nit.test(''+$("#nit_ci").val()+'')){
        alert('Nit_ci no valido');
    }else{
        url='<?php echo site_url('index.php/impresionFactura'); ?>';
        data = {
				invoice_date: $('#invoice_date').val(),
				razon_social: $('#razon_social').val(),
				nit_ci: $('#nit_ci').val(),
				total_amount: calculate_total_amount,// AUXILIAR FUNCTION
				lines: build_data_lines // AUXILIAR FUNCTION
			};
        type='POST';
        get_ajax_data(url, type, data, show_new_invoice);
    }
  }
}
function build_data_lines(){
  lineas={};
  i=1;
  
  while($('#tabla_tbody tr').size()>=i){
    temp_val_1=$('#tabla_tbody tr:nth-child('+i+') td:nth-child(1) input').val();
    temp_val_2=$('#tabla_tbody tr:nth-child('+i+') td:nth-child(3) input').val();
    temp_val_3=$('#tabla_tbody tr:nth-child('+i+') td:nth-child(4) input').val();
    
    //console.log(temp_val_1);
    //console.log(temp_val_2);
    //console.log(temp_val_3);
    lineas[i]={
        'nombre': temp_val_1,
        'cantidad': temp_val_2,
        'precio': temp_val_3
    };
    //console.log(lineas);
    i++;
  }
  console.log(JSON.stringify(lineas));
  return JSON.stringify(lineas);
}
function calculate_total_amount(){

}

function show_new_invoice(data, message){

  modal_factura=$('<div>').load('application/views/VistaImpresionFactura/impresion.php', data);
  $('#myInvoiceModal .modal-body').html(modal_factura);
  $('#myInvoiceModal').modal('toggle');

}
function imprimir(){
  $("#print_area").printArea();
}

function show_alert(){
	alert("Product Added");
}
</script>

<div id="myInvoiceModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Impresion Factura</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="imprimir()" >Print</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Seleccionar Productos</h4>
      </div>
      <div class="modal-body">
        <p>Seleccione los productos de la lista</p>
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
                          display: block
                          float: right;
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
                          display: block
                          float: right;
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
          <div style ="border-color: blue;
                //border-style: solid;
                display: block;
                height: 65%;
                width: 100%; overflow:scroll;">
                
                  <table class="table table-hover table-responsive" id="tabla">
                    <thead style="display:fixed">
                      <tr>
                        <th>Producto</th>
                        <th></th>
                        <th>Cantidad</th>
                        <th>P.U.</th>
                        <th>Iva(%)</th>
                        <th>Subtotal</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="tabla_tbody">

                    </tbody>
                  </table>

              <button class="btn btn-success"  style = "margin:0 40px;" type="button" id="agregarProducto" value="Agregar Producto" onclick="crear_linea_tabla()"><span class="glyphicon glyphicon-plus"> Agregar Producto</span></button>

          </div>
    </from>
</div>
