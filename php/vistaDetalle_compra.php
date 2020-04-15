<?php 
require_once("detalle_compra.php");
$obj=new Detalle_compra();
if(!isset($_POST["modificar"])){ 
 ?>
 
 <form action="" method="post">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad:">
	<br>
		
	<input type="submit" name="alta" value="Guardar Detalle_compra">
</form>
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
    ?>
<form action="" method="post">
<input type="text" name="cantidad" placeholder="cantidad: " value='<?php echo $fila["cantidad"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Detalle_compra">
</form>
<?php
}
     if (isset($_POST["alta"]))
     {  	# code...
     	$cantidad = $_POST["cantidad"];
     	$obj->alta($cantidad);
     	echo "<h2>Detalle_compra registrada</h2>";
     }

   
     if (isset($_POST["mod"]))
     {    # code...
      $cantidad = $_POST["cantidad"];
      $obj->modificar($cantidad);
      echo "<h2>Detalle_compra modificada</h2>";
     }

 if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar el Detalle_compra?');
    if(opcion===true){
        window.location.href = 'home.php?sec=detalle_compra&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->eliminar($_GET["el"]);
    echo "<script>
        alert('Detalle_compra eliminado');
        window.location.href = 'home.php?sec=detalle_compra';
    </script>";
}
?>

 <table>
 	<tr>
 		<th>Cantidad</th>
    <th>Eliminar</th>
    <th>Modificar</th>
 		
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["cantidad"]."</td>";
 	   	   echo "<tr>";
 	    ?>
             <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDdetalle_compra'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>

              <td>
                <form action="" method="post">
 <input type="hidden" value="<?php echo $fila['IDdetalle_compra'] ?>" name="id">
 <input type="submit" name="modificar" value="Modificar">
                </form>
            </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>