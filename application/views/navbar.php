<style type="text/css" >
	.marginBottom-0 {margin-bottom:0;}

	.dropdown-submenu{position:relative;}
	.dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
	.dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
	.dropdown-submenu:hover>a:after{border-left-color:#555;}
	.dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}
</style>

<script>
(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault();
			event.stopPropagation();
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);

</script>

<div  class="row">
    <div class="span12">
        <ul class="nav nav-tabs">
 			<li >
 				<a href="<?=base_url();?>menuController/index" ><span class="glyphicon glyphicon-home"></span> Inicio </b></a>
 			</li>
            <li class="dropdown" >
                <a href="<?=base_url();?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-usd"></span> Ventas <b class="caret"></b></a>
                <ul class="dropdown-menu">
  				<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Proforma</a></li>

					<li><a href="<?=base_url();?>formulario"><span class="glyphicon glyphicon-shopping-cart"></span> Venta</a></li>
                   <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Reportes </b></a>

                    <ul class="dropdown-menu">
							<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=almacen&tipoTransaccion=ingreso"><span class="glyphicon glyphicon-list-alt"></span> Ventas por días</a></li>
							<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=bodega&tipoTransaccion=ingreso"><span class="glyphicon glyphicon-list-alt"></span> Ventas por cajero</a></li>
							<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=almacen&tipoTransaccion=salida"><span class="glyphicon glyphicon-list-alt"></span> Ventas por productos</a></li>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Gráfica de ventas </b></a>

								<ul class="dropdown-menu">
									<li><a href="<?=base_url();?>materiales/fechaReporteMensualSalida?nombreDeposito=almacen&tipoTransaccion=salida"><span class="glyphicon glyphicon-list-alt"></span> Gráfica por días</a></li>
									<li><a href="<?=base_url();?>materiales/fechasReporteMaterialUsadoResponsable?nombreDeposito=almacen&tipoTransaccion=salida"><span class="glyphicon glyphicon-list-alt"></span> Gráfica por producto</a></li>
								</ul>
							</li>
					</ul>
					</li>

                </ul>
            </li>
            <li class="dropdown" >
                <a href="<?=base_url();?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Producto <b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li class="divider"></li>
                    <li><a href="<?=base_url();?>products/new_product"> CRUD Productos </a></li>
                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Reportes </b></a>
						<ul class="dropdown-menu">
							<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=almacen&tipoTransaccion=ingreso"><span class="glyphicon glyphicon-list-alt"></span> Kardex de producto </a></li>
							<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=bodega&tipoTransaccion=ingreso"><span class="glyphicon glyphicon-list-alt"></span> Lista de precios</a></li>
							<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=bodega&tipoTransaccion=salida"><span class="glyphicon glyphicon-list-alt"></span> Lista de productos por fecha de vencimiento</a></li>
						</ul>
					</li>
                </ul>
            </li>

            <li class="dropdown" >
                <a href="<?=base_url();?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Clientes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">CRUD Clientes </a></li>
                    <li><a href="#">Listado de cliente</a></li>
               </ul>
            </li>



            <li class="dropdown" >
                <a href="<?=base_url();?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks"></span> Administraci&oacute;n <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Usuarios </a>
                    	<ul class="dropdown-menu">
                    		<li><a href="<?=base_url();?>materiales/crudMaterial"><span class="glyphicon glyphicon-file"></span> CRUD Categoría Usuario </a></li>
                    		<li><a href="<?=base_url();?>materiales/buscarSalidaAlmacen"><span class="glyphicon glyphicon-pencil"></span> CRUD Usuario </a></li>
							<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=almacen&tipoTransaccion=salidas_modificadas"><span class="glyphicon glyphicon-list-alt"></span> Reporte de usuarios</a></li>
							<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=almacen&tipoTransaccion=salidas_modificadas"><span class="glyphicon glyphicon-list-alt"></span> Ver usuarios activos</a></li>

						</ul>
					</li>
					<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=almacen&tipoTransaccion=salidas_modificadas"><span class="glyphicon glyphicon-list-alt"></span> Datos de la empresa</a></li>
					<li><a href="<?=base_url();?>materiales/fechasReporteIngresoSalida?nombreDeposito=almacen&tipoTransaccion=salidas_modificadas"><span class="glyphicon glyphicon-list-alt"></span> Personalización de colores</a></li>

                     <li><a href="#"><span class="glyphicon glyphicon-floppy-save"></span> Respaldo Base  Datos</a></li>
                </ul>
            </li>

            <li >
 				<a href="<?=base_url();?>login/salir"  ><span class="glyphicon glyphicon-eject"></span> Salir </b></a>
 			</li>

            </ul>
    </div>
</div>
