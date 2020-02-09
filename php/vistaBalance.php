<form action="" method="post">
	<br>
	<input type="text" name="fechainicio" placeholder="Fechainicio:">
	<br>
	<input type="text" name="fechafin" placeholder="Fechafin:"> <br>
	<br>
	<input type="text" name="total" placeholder="Total:"> <br>
	
	<input type="submit" name="alta" value="Guardar Balance">
</form>
<?php 
     require_once ("balance.php");
     	$obj = new Balance();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fechainicio = $_POST["Fechainicio"];
     	$fechafin = $_POST["Fechafin"];
     	$total = $_POST["Total"];
     	$obj->alta($fechainicio,$fechafin,$total);
     	echo "<h2>Actividad registrada</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Fechainicio</th>
 		<th>Fechafin</th>
 		<th>Total</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fechainicio"]."</td>";
 	   	   echo "<td>".$fila["fechafin"]."</td>";
 	   	   echo "<td>".$fila["total"]."</td>";
 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>