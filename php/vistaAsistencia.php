<form action="" method="post">
	<br>
	<input type="text" name="fecha" placeholder="Fecha:">
	<br>
	<input type="text" name="hora" placeholder="Hora"> <br>
	<br>
		
	<input type="submit" name="alta" value="Guardar Asistencia">
</form>
<?php 
     require_once ("asistencia.php");
     	$obj = new Asistencia();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["Fecha"];
     	$hora = $_POST["Hora"];
     	$obj->alta($fecha,$hora);
     	echo "<h2>Asistencia registrada</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Fecha</th>
 		<th>Hora</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fecha"]."</td>";
 	   	   echo "<td>".$fila["hora"]."</td>";
 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>