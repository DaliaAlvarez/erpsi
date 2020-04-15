<?php 
require_once("proveedor.php");
$obj=new Proveedor();
if(!isset($_POST["modificar"])){ 
 ?>
 <form action="" method="post"> <br>
	<input type="text" name="nombre" placeholder="Nombre:">	<br>
	<input type="text" name="appaterno" placeholder="Appaterno"> <br>	<br>
	<input type="text" name="apmaterno" placeholder="Apmaterno:"> <br>	<br>
	<input type="text" name="correo" placeholder="Correo:">	<br>
	<input type="text" name="rfc" placeholder="RFC"> <br>	<br>
	<input type="text" name="telefono" placeholder="Telefono:"> <br>	<br>
	<input type="text" name="sexo" placeholder="Sexo:">	<br>
	<input type="text" name="fechaingreso" placeholder="Fechaingreso"> <br>	<br>
	<input type="text" name="cargo" placeholder="Cargo"> <br>	<br>
	<input type="text" name="salario" placeholder="Salario:"><br>	<br>
	<input type="text" name="estadocivil" placeholder="Estadocivil:">	<br>
	<input type="text" name="nss" placeholder="NSS"> <br>	<br>		
	<input type="submit" name="alta" value="Guardar Empleado">
</form>

<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
    ?>
<form action="" method="post">
<input type="text" name="nombre" placeholder="Nombre: " value='<?php echo $fila["nombre"] ?>'><br>
<input type="text" name="appaterno" placeholder="appaterno: " value='<?php echo $fila["appaterno"] ?>'><br>
<input type="text" name="apmaterno" placeholder="apmaterno: " value='<?php echo $fila["apmaterno"] ?>'><br>
<input type="text" name="correo" placeholder="Correo: " value='<?php echo $fila["correo"] ?>'><br>
<input type="text" name="rfc" placeholder="RFC: " value='<?php echo $fila["rfc"] ?>'><br>
<input type="text" name="telefono" placeholder="Telefono: " value='<?php echo $fila["telefono"] ?>'><br>
<input type="text" name="sexo" placeholder="sexo: " value='<?php echo $fila["sexo"] ?>'><br>
<input type="text" name="fechaingreso" placeholder="fechaingreso: " value='<?php echo $fila["fechaingreso"] ?>'><br>
<input type="text" name="cargo" placeholder="cargo: " value='<?php echo $fila["cargo"] ?>'><br>
<input type="text" name="salario" placeholder="salario: " value='<?php echo $fila["salario"] ?>'><br>
<input type="text" name="estadocivil" placeholder="estadocivil: " value='<?php echo $fila["estadocivil"] ?>'><br>
<input type="text" name="nss" placeholder="nss: " value='<?php echo $fila["nss"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Empleado">
</form>
<?php
}
     if (isset($_POST["alta"]))
     {  	# code...
     	$nombre = $_POST["nombre"];
     	$appaterno = $_POST["appaterno"];
     	$apematerno = $_POST["apmaterno"];
     	$correo = $_POST["correo"];
     	$rfc = $_POST["rfc"];
     	$telefono = $_POST["telefono"];
     	$sexo = $_POST["sexo"];
     	$fechaingreso = $_POST["fechaingreso"];
     	$cargo = $_POST["cargo"];
     	$salario = $_POST["salario"];
     	$estadocivil = $_POST["estadocivil"];
     	$nss = $_POST["nss"];
     	$obj->alta($nombre,$appaterno,$apematerno,$correo,$rfc,$telefono,$sexo,$fechaingreso,$cargo,$salario,$estadocivil,$nss);
     	echo "<h2>Empleado registrado</h2>";
     }

     
     if (isset($_POST["mod"]))
     {    # code...
      $nombre = $_POST["nombre"];
      $appaterno = $_POST["appaterno"];
      $apematerno = $_POST["apmaterno"];
      $correo = $_POST["correo"];
      $rfc = $_POST["rfc"];
      $telefono = $_POST["telefono"];
      $sexo = $_POST["sexo"];
      $fechaingreso = $_POST["fechaingreso"];
      $cargo = $_POST["cargo"];
      $salario = $_POST["salario"];
      $estadocivil = $_POST["estadocivil"];
      $nss = $_POST["nss"];
      $obj->modificar($nombre,$appaterno,$apematerno,$correo,$rfc,$telefono,$sexo,$fechaingreso,$cargo,$salario,$estadocivil,$nss);
      echo "<h2>Empleado modificado</h2>";
     }


   if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar el Empleado?');
    if(opcion===true){
        window.location.href = 'home.php?sec=empleado&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->eliminar($_GET["el"]);
    echo "<script>
        alert('Empleado eliminado');
        window.location.href = 'home.php?sec=empleado';
    </script>";
}
?>

 <table>
 	<tr>
    <th>Nombre</th>
 		<th>Appaterno</th>
 	  <th>Apematerno</th>
 		<th>Correo</th>
 		<th>RFC</th>
    <th>Telefono</th>
 		<th>Sexo</th>
 		<th>Fechaingreso</th>
    <th>Cargo</th>
    <th>Salario</th>
    <th>Estadocivil</th>
    <th>NSS</th>
    <th>Eliminar</th>
<th>Modificar</th>
 		</tr>
 <?php
    $res = $obj->consulta();
    while($fila = $res->fetch_assoc()){
        echo"<tr>";
       
        echo"<td>".$fila["nombre"]."</td>";
        echo"<td>".$fila["appaterno"]."</td>";
        echo"<td>".$fila["apematerno"]."</td>";
        echo"<td>".$fila["correo"]."</td>";
        echo"<td>".$fila["rfc"]."</td>";
        echo"<td>".$fila["telefono"]."</td>";
        echo"<td>".$fila["sexo"]."</td>";
        echo"<td>".$fila["fechaingreso"]."</td>";
        echo"<td>".$fila["cargo"]."</td>";
        echo"<td>".$fila["salario"]."</td>";
        echo"<td>".$fila["estadocivil"]."</td>";
        echo"<td>".$fila["nss"]."</td>";
        ?>
             <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDempleado'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>

              <td>
                <form action="" method="post">
 <input type="hidden" value="<?php echo $fila['IDempleado'] ?>" name="id">
 <input type="submit" name="modificar" value="Modificar">
                </form>
            </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>