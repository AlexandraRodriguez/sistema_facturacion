<!doctype html>
                          
  <html>   
  <head>
    <meta charset="uft-8"/>
    <title>FACTURA</title>
	<style media ="print"type="text/css">
		#imprimir{
		visibility:hidden
	}
	</style>
  </head> 
  <body>                   
 
 	<div id="Impresion" style ="margin: 0 auto; display: block; border-style: solid; border-color: black;height: 630px; width: 400px; background-color: white; ">

	<button style = "margin:0 450px;" id="imprimir" name="imprimir" type="button" class="btn btn-default " onclick="window.print()">IMPRMIR FACTURA</button>

     <p align="center"><small>
		<font face="Bell MT">SPORT PLAY S.R.L<br>
   			SUCURSAL = 7<br>
   			C/SAN MARTIN #651<br>
   			Z/CENTRAL<br>4-4121711<br>
   			COCHABAMBA-BOLIVIA<br><br><strong><big>F A C T U R A </big></strong>
   			<hr width="100%">
   			<p align="center">NIT: 10243839<br>No FACTURA: 1077<br>No AUTORIZACIÓN: 1234567890<hr width="100%"></p></small>
   	</p><?php
			  $fecha = date("d-m-Y");
			  echo 'Fecha: '.$fecha;?><br>Nombre: <br>NIT/CI:<br>
  	<div class="table-responsive">
	  <table class="table table-hover">
   		 <thead>
        	<tr>
           		<th>Producto</th>
            	<th>Cantidad U/M</th>
            	<th>Precio</th>
            	<th>Importe</th>
            </tr>
    	</thead>
   	 <tbody>
        	<tr>
            	<td>MochilaTopper</td>
            	<td>1</td>
            	<td>100</td>
            	<td>100</td>
           </tr>
        	<tr>
            	<td>EstucheNike</td>
            	<td>1</td>
            	<td>50</td>
            	<td>50</td>
            </tr>
        <tr>
            <td>CamisetaW</td>
            <td>1</td>
            <td>150</td>
            <td>150</td>
                  
        </tr>
        <tr>
            <td>MediasLargasN</td>
            <td>2</td>
            <td>20</td>
            <td>40</td>
                  
        </tr>
    </tbody>
  </table>
</div> 
<p align="center">Total a pagar: Bs340</br>Son: TRESCIENTOS CUARENTA 00/100 Bs</br>Vend: Juan Perez   	
	<?php
			 $fecha= date('g:ia');
			 echo 'Fecha: '.$fecha;?><br>
			 Gracias por su preferencia!!!!!!!</p>
	</font>
</body>
</html>
</div>
	

