<form action="" method="post">
	<br>
	<input type="text" name="registro" placeholder="Registro:">
	<br>
	<input type="text" name="movimiento_act" placeholder="Movimiento_act:"> <br>
	<br>
	<input type="text" name="movimiento_tabla" placeholder="Movimiento_tabla:"> <br>
	
	<input type="submit" name="alta" value="Guardar Actividad">
</form>
<?php 
     require_once ("actividad.php");
     	$obj = new Actividad();
     if (isset($_POST["alta"]))
     {  	# code...
     	$registro = $_POST["Registro"];
     	$movimiento_act = $_POST["Movimiento_act"];
     	$movimiento_tabla = $_POST["Movimiento_tabla"];
     	$obj->alta($registro,$movimiento_act,$movimiento_tabla);
     	echo "<h2>Actividad registrada</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Registro</th>
 		<th>Movimiento_act</th>
 		<th>Movimiento_tabla</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["registro"]."</td>";
 	   	   echo "<td>".$fila["movimiento_act"]."</td>";
 	   	   echo "<td>".$fila["movimiento_tabla"]."</td>";
 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>