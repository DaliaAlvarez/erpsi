<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="producto" name="tabla"> 
    <input type="hidden" value="cantidad" name="dato"> 
    <input type="hidden" value="nombre" name="encabezado"> 
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>

<?php
/* Producto, Compra, Devoluciones, Jornada, Mantenimiento, Materia Prima, Mobiliario, Reemplazo, Venta*/
if(isset($_POST["grafica"])){
  require_once("php/grafica.php");
}
?>
<?php 
  require_once("actividad.php");
  $obj = new Actividad();
  if (!isset($_POST["modificar"])) { 
  ?>
<form action="" method="post">
	<br>
	<input type="text" name="registro" placeholder="Registro:"><br>
  <input type="text" name="IDusuario" placeholder="Usuario"><br>
	<input type="text" name="movimiento_act" placeholder="Movimiento_act:"><br><br>
	<input type="text" name="movimiento_tabla" placeholder="Movimiento_tabla:"><br>
	<input type="submit" name="alta" value="Guardar Actividad">

</form>

<?php }else{ 
  $res = $obj->buscar($_POST["id"]);
  $fila = $res->fetch_assoc();
  ?>
  <form action="" method="post">
   <input type="text" name="registro" placeholder="registro:" value="<?php echo $fila['registro']; ?>"><br>
  <input type="text" name="movimiento_act" placeholder="movimiento_act" value="<?php echo $fila['movimiento_act']; ?>"><br><br>
  <input type="text" name="movimiento_tabla" placeholder="movimiento_tabla" value="<?php echo $fila['movimiento_tabla']; ?>"> <br><br>
  </select> <br>  
     <br>
  <input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
  <input type="submit" name="mod" value="Modificar Actividad">
</form>

<?php
} 
     require_once ("actividad.php");
     	$obj = new Actividad();
     if (isset($_POST["alta"]))
     {  	# code...
     	$registro = $_POST["registro"];
     	$movimiento_act = $_POST["movimiento_act"];
     	$movimiento_tabla = $_POST["movimiento_tabla"];
      $IDusuario = $_POST["IDusuario"];
     	$obj->alta($registro,$IDusuario,$movimiento_act,$movimiento_tabla);
     	echo "<h2>Actividad registrada</h2>";
     }

     $obj = new Actividad();
     if (isset($_POST["mod"]))
     {    # code...
      $registro = $_POST["Registro"];
      $movimiento_act = $_POST["Movimiento_act"];
      $movimiento_tabla = $_POST["Movimiento_tabla"];
      $obj->modificar($registro,$movimiento_act,$movimiento_tabla);
      $id = $_POST["id"];

      /* tenemos id*/
      echo "<h2>Usuario modificado</h2>";
     }
 
  if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar la Actividad?');
    if(opcion===true){
        window.location.href = 'home.php?sec=actividad&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->eliminar($_GET["el"]);
    echo "<script>
        alert('Actividad eliminado');
        window.location.href = 'home.php?sec=actividad';
    </script>";
}
?>

 <table>
 	<tr>
 		<th>Registro</th>
 		<th>Movimiento_act</th>
 		<th>Movimiento_tabla</th>
    <th>Eliminar</th>
    <th>Modificar</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["registro"]."</td>";
 	   	   echo "<td>".$fila["movimiento_act"]."</td>";
 	   	   echo "<td>".$fila["movimiento_tabla"]."</td>";
 	   	    ?>
             <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDusuario'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>

             <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDusuario'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                    
               </form>
             </td>

             <?php
             echo "<tr>";
        }
      ?>
 </table>