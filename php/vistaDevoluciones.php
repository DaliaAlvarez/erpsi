<?php 
require_once("devoluciones.php");
$obj=new Devoluciones();
if(!isset($_POST["modificar"])){ 
 ?>



 <div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="devoluciones" name="tabla"> 
    <input type="hidden" value="fecha" name="dato"> 
    <input type="hidden" value="cantidad" name="encabezado"> 
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>

<?php
/* Producto, *Compra, Devoluciones, Jornada, Mantenimiento, Materia Prima, Mobiliario, Reemplazo, Venta*/
if(isset($_POST["grafica"])){
  require_once("php/grafica.php");
}

?>
<form action="" method="post">	<br>
	<input type="date" name="fecha" placeholder="Fecha:">	<br>
	<input type="text" name="cantidad" placeholder="Cantidad"> <br>	<br>
    <input type="text" name="descripcion" placeholder="Descripcion"> <br>     <br>
		<input type="submit" name="alta" value="Guardar Devoluciones">
</form>
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
    ?>
<form action="" method="post">
<input type="text" name="fecha" placeholder="fecha: " value='<?php echo $fila["fecha"] ?>'><br>
<input type="text" name="cantidad" placeholder="cantidad: " value='<?php echo $fila["cantidad"] ?>'><br>
<input type="text" name="descripcion" placeholder="descripcion: " value='<?php echo $fila["descripcion"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Devoluciones">
</form>
<?php
}
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["fecha"];
     	$cantidad = $_POST["cantidad"];
          $descripcion = $_POST["descripcion"];
     	$obj->alta($fecha,$cantidad,$descripcion);
     	echo "<h2>Devolucion registrada</h2>";
     }

     if (isset($_POST["mod"]))
     {    # code...
      $fecha = $_POST["fecha"];
      $cantidad = $_POST["cantidad"];
          $descripcion = $_POST["descripcion"];
      $obj->modificar($fecha,$cantidad,$descripcion);
      echo "<h2>Devolucion modificada</h2>";
     }



if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar la Devolucion?');
    if(opcion===true){
        window.location.href = 'home.php?sec=devoluciones&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->eliminar($_GET["el"]);
    echo "<script>
        alert('
        Devolucion eliminado');
        window.location.href = 'home.php?sec=devoluciones';
    </script>";
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
 	    ?>
             <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDdevoluciones'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>

              <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDdevoluciones'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                    
               </form>
             </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>