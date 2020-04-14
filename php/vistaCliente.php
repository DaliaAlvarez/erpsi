<form action="" method="post">
	<br>
	<input type="text" name="nombre" placeholder="Nombre:">
	<br>
	<input type="text" name="direccion" placeholder="Direccion"> <br>
	<br>
	<input type="text" name="telefono" placeholder="Telefono:"> <br>
	<br>
	<input type="text" name="correo" placeholder="Correo:">
	<br>
	<input type="text" name="apematerno" placeholder="Apematerno"> <br>
	<br>
	<input type="text" name="apepaterno" placeholder="Apepaterno:"> <br>
	<br>
	<input type="text" name="sexo" placeholder="Sexo:">
	<br>
	<input type="date" name="fenacimiento" placeholder="Fenacimiento"> <br>
	<br>
		
	<input type="submit" name="alta" value="Guardar Cliente">
</form>
<?php 
     require_once ("cliente.php");
     	$obj = new Cliente();
     if (isset($_POST["alta"]))
     {  	# code...
     	$nombre = $_POST["Nombre"];
     	$direccion = $_POST["Direccion"];
     	$telefono = $_POST["Telefono"];
     	$correo = $_POST["Correo"];
     	$apematerno = $_POST["Apematerno"];
     	$apepaterno = $_POST["Apepaterno"];
     	$sexo = $_POST["Sexo"];
     	$fenacimiento = $_POST["Fenacimiento"];
     	$obj->alta($registro,$nombre,$direccion,$telefono,$correo,$apematerno,$apepaterno,$sexo,$fenacimiento);
     	echo "<h2>Cliente registrado</h2>";
     }

      $obj = new Cliente();
     if (isset($_POST["mod"]))
     {    # code...
      $nombre = $_POST["Nombre"];
      $direccion = $_POST["Direccion"];
      $telefono = $_POST["Telefono"];
      $correo = $_POST["Correo"];
      $apematerno = $_POST["Apematerno"];
      $apepaterno = $_POST["Apepaterno"];
      $sexo = $_POST["Sexo"];
      $fenacimiento = $_POST["Fenacimiento"];
      $obj->alta($registro,$nombre,$direccion,$telefono,$correo,$apematerno,$apepaterno,$sexo,$fenacimiento);
      echo "<h2>Cliente modificado</h2>";
     }

    if(isset($_POST["eliminar"])){
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Cliente?');
          if(opcion===true){
               window.location.href = 'home.php?el=".$_POST["id"]."';}</script>";
          }
          if(isset($_GET["el"])){
          $obj->eliminar($_GET["el"]);
          //echo"<h2>Usuario eliminado</h2>";//
          echo"<script>alert('Cliente eliminada')</script>";
          header("Location: home.php");
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
 	   ?>
             <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDusuario'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>