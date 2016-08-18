
<div style="height: 500px; width: 900px; margin: 0 auto; background-color: white; padding: 20px 20px">
	<h2>Reporte de facturas por productos</h2>
        
        	<?php foreach ($products as $row){ ?>
        		
        		<h3><?php echo $row['nombre']; ?></h3>
        		
        		<?php foreach ($facturas[$row['id_producto']] as $row){ ?>
        		
        			<td>Factura con id: <?php echo $row['id_factura']; ?></td>
        			<td>, Cantidad: <?php echo $row['cantidad']; ?></td>
        			<td>, Total: <?php echo $row['subtotal']; ?> Bs.</td>
        		<br />
        		<?php } ?>
        		
			<?php }?>	
	
</div>