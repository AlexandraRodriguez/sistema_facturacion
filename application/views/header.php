<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.css')?>">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="<?= base_url("js/jquery-1.11.3.min.js")?>"></script>

        <script type="text/javascript" src="<?= base_url("bootstrap/js/bootstrap.js")?>"></script>

        <style>
        	.cabecera{font-size:24px;text-align:center; }
        </style>
    </head>

    <body background="<?= base_url("img/body-bg.jpg")?>">
   		<div style='height:5px;'></div>
        <div class="container">
                <div class="span12">
                    <div class="well well-sm" style="font-size:12px;">

                    	<table width="99%" class="table-condensed">
                		<thead>
                    		<tr class="cabecera">
                    			<td>
                    				<center>
                    				<?php
//										$usuarioConectado=$this->session->userdata('usuarioLogueado');
//										$usuarioNombre=$this->session->userdata('userName');
										echo img('/assets/img/logoUmss.png');
									?>
									</center>
								</td>

								<td>
		        					<div style="width: 80px;"></div>
								</td>

								<td>
									<center>
										SISTEMA DE FACTURACION
									</center>
								</td>

								<td>
									<center>
									<?php
									    $fecha = date("d-m-Y");
										echo 'Fecha: '.$fecha;
									?>
									</center>
								</td>

								<td>
									<center>
										<strong style="color: #FF0000;">
										<?php
/*										if(isset($usuarioConectado)){
										  ?>
											<?= 'usuario: '.$usuarioNombre;  ?> </strong> &nbsp;|&nbsp; <?= anchor("login/logout", "CERRAR SESION"); ?>
										  <?php
										}
*/										?>
										</center>
								</td>
                    		</tr>
                 		</thead>
                    	</table>

                    </div>
                </div>

            <div>
