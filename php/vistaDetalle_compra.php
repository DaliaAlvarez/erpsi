<form action="" method="post">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad:">
	<br>
	
		
	<input type="submit" name="alta" value="Guardar Detalle_compra">
</form>
<?php 
     require_once ("detalle_compra.php");
     	$obj = new Detalle_compra();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["Cantidad"];
     	
     	$obj->alta($cantidad);
     	echo "<h2>Detalle_compra registrada</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Cantidad</th>
 		
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["cantidad"]."</td>";
 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>