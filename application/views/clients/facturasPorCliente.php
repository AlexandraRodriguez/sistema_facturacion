
<div style="height: 500px; width: 900px; margin: 0 auto; background-color: white; padding: 20px 20px">
	<h2>Reporte de facturas por cliente</h2>
        
        	<?php foreach ($clients as $row){ ?>
        		
        			<h3><td><?php echo $row['nombre']; ?></td>
        			<td> <?php echo $row['apellido']; ?></td>
        			<td>, Id cliente: <?php echo $row['id_cliente']; ?></td></h3>
        			
        		
        		<?php foreach ($facturas[$row['id_cliente']] as $row){ ?>
        		
        			<td>Factura con id: <?php echo $row['id_factura']; ?></td>
        			<td>, Fecha: <?php echo $row['fecha']; ?></td>
        			<td>, Total: <?php echo $row['total']; ?> Bs.</td>
        		<br />
        		<?php } ?>
        		
			<?php }?>	
	
</div>