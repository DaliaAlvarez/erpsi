<form action="" method="post">
	<br>
	<input type="date" name="fecha" placeholder="Fecha:">
	<br>
	<input type="text" name="total" placeholder="Total"> <br>
	<br>
     <select name="tipo_pago">
          <option value="1">Efectivo</option>
          <option value="2">Tarjeta</option>
     </select> <br>
		
	<input type="submit" name="alta" value="Guardar Compra">
</form>
<?php 
     require_once ("compra.php");
     	$obj = new Compra();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["Fecha"];
     	$hora = $_POST["Hora"];
          $hora = $_POST["Tipo_pago"];
     	$obj->alta($fecha,$total,$tipo_pago);
     	echo "<h2>Compra registrada</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Fecha</th>
 		<th>Total</th>
          <th>Tipo_pago</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fecha"]."</td>";
 	   	   echo "<td>".$fila["total"]."</td>";
              echo "<td>".$fila["tipo_pago"]."</td>";
 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>