<form action="" method="post">
	<br>
	<input type="text" name="nombre" placeholder="Nombre:">
	<br>
	<input type="text" name="appaterno" placeholder="Appaterno"> <br>
	<br>
	<input type="text" name="apmaterno" placeholder="Apmaterno:"> <br>
	<br>
	<input type="text" name="correo" placeholder="Correo:">
	<br>
	<input type="text" name="rfc" placeholder="RFC"> <br>
	<br>
	<input type="text" name="telefono" placeholder="Telefono:"> <br>
	<br>
	<input type="text" name="sexo" placeholder="Sexo:">
	<br>
	<input type="text" name="fechaingreso" placeholder="Fechaingreso"> <br>
	<br>
	<input type="text" name="cargo" placeholder="Cargo"> <br>
	<br>
	<input type="text" name="salario" placeholder="Salario:"> <br>
	<br>
	<input type="text" name="estadocivil" placeholder="Estadocivil:">
	<br>
	<input type="text" name="nss" placeholder="NSS"> <br>
	<br>
		
	<input type="submit" name="alta" value="Guardar Empleado">
</form>
<?php 
     require_once ("empleado.php");
     	$obj = new Empleado();
     if (isset($_POST["alta"]))
     {  	# code...
     	$nombre = $_POST["Nombre"];
     	$appaterno = $_POST["Appaterno"];
     	$apematerno = $_POST["Apmaterno"];
     	$correo = $_POST["Correo"];
     	$rfc = $_POST["RFC"];
     	$telefono = $_POST["Telefono"];
     	$sexo = $_POST["Sexo"];
     	$fechaingreso = $_POST["Fechaingreso"];
     	$cargo = $_POST["Cargo"];
     	$salario = $_POST["Salario"];
     	$estadocivil = $_POST["Estadocivil"];
     	$nss = $_POST["NSS"];
     	$obj->alta($nombre,$appaterno,$apematerno,$correo,$rfc,$telefono,$sexo,$fechaingreso,$cargo,$salario,$estadocivil,$nss);
     	echo "<h2>Cliente registrada</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Nombre</th>
 		<th>Direccion</th>
 		<th>Movimiento_tabla</th>
 		<th>Telefono</th>
 		<th>Correo</th>
 		<th>Apematerno</th>
 		<th>Apematerno</th>
 		<th>Sexo</th>
 		<th>Fenacimiento</th>
 		</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["nombre"]."</td>";
 	   	   echo "<td>".$fila["direccion"]."</td>";
 	   	   echo "<td>".$fila["telefono"]."</td>";
 	   	   echo "<td>".$fila["correo"]."</td>";
 	   	   echo "<td>".$fila["apematerno"]."</td>";
 	   	   echo "<td>".$fila["apepaterno"]."</td>";
 	   	   echo "<td>".$fila["sexo"]."</td>";
 	   	   echo "<td>".$fila["fenacimiento"]."</td>";
 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>