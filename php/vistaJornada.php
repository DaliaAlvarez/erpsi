<form action="" method="post">
	<br>
	<input type="text" name="hrs_trabajadas" placeholder="Hrs_trabajadas:">
	<br>
	<input type="text" name="dias_trabajados" placeholder="dias_trabajados"> <br>
	<br>
  <input type="text" name="pago_hora" placeholder="pago_hora"> <br>
  <br>
  <input type="text" name="horas_extra" placeholder="Horas_extra"> <br>
  <br>
  <input type="text" name="bonos" placeholder="Bonos"> <br>
  <br>
		
	<input type="submit" name="alta" value="Guardar Jornada">
</form>
<?php 
     require_once ("jornada.php");
     	$obj = new Jornada();
     if (isset($_POST["alta"]))
     {  	# code...
     	$hrs_trabajadas = $_POST["Hrs_trabajadas"];
     	$dias_trabajados = $_POST["Dias_trabajados"];
      $pago_hora = $_POST["Pago_hora"];
      $horas_extra = $_POST["Horas_extra"];
      $bonos = $_POST["Bono"];
     	$obj->alta($hrs_trabajadas,$dias_trabajados,$pago_hora,$horas_extra,$bonos);
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