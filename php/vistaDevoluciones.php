<form action="" method="post">
	<br>
	<input type="date" name="fecha" placeholder="Fecha:">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad"> <br>
	<br>
    <input type="text" name="descripcion" placeholder="Descripcion"> <br>
     <br>
		
	<input type="submit" name="alta" value="Guardar Devoluciones">
</form>
<?php 
     require_once ("devoluciones.php");
     	$obj = new Devoluciones();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["Fecha"];
     	$hora = $_POST["Cantidad"];
          $hora = $_POST["Descripcion"];
     	$obj->alta($fecha,$cantidad,$descripcion);
     	echo "<h2>Devoluciones registrada</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Fecha</th>
 		<th>Cantidad</th>
          <th>Descripcion</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fecha"]."</td>";
 	   	   echo "<td>".$fila["cantidad"]."</td>";
              echo "<td>".$fila["descripcion"]."</td>";
 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>