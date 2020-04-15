<?php 
require_once("balance.php");
$obj=new Balance();
if(!isset($_POST["modificar"])){ 
 ?>
 <form action="" method="post">
	<br>
	<input type="text" name="fechainicio" placeholder="Fechainicio"><br>
	<input type="text" name="fechafin" placeholder="Fechafin"> <br><br>
	<input type="text" name="total" placeholder="Total"> <br>	
	<input type="submit" name="alta" value="Guardar Balance">
</form>

<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
    ?>
<form action="" method="post">
<input type="text" name="fechainicio" placeholder="fechainicio: " value='<?php echo $fila["fechainicio"] ?>'><br>
<input type="text" name="fechafin" placeholder="fechafin: " value='<?php echo $fila["fechafin"] ?>'><br>
<input type="text" name="total" placeholder="total: " value='<?php echo $fila["total"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Balance">
</form>
<?php
}

     if (isset($_POST["alta"]))
     {  	# code...
     	$fechainicio = $_POST["fechainicio"];
     	$fechafin = $_POST["fechafin"];
     	$total = $_POST["total"];
     	$obj->alta($fechainicio,$fechafin,$total);
     	echo "<h2>Balance registrado</h2>";
     }

     if (isset($_POST["mod"]))
     {    # code...
      $fechainicio = $_POST["fechainicio"];
      $fechafin = $_POST["fechafin"];
      $total = $_POST["total"];
      $obj->modificar($fechainicio,$fechafin,$total);
      echo "<h2>Balance modificado</h2>";
     }

if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar el Balance?');
    if(opcion===true){
        window.location.href = 'home.php?sec=balance&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->eliminar($_GET["el"]);
    echo "<script>
        alert('Balance eliminado');
        window.location.href = 'home.php?sec=balance';
    </script>";
}
?>

 <table>
 	<tr>
 		<th>Fechainicio</th>
 		<th>Fechafin</th>
 		<th>Total</th>
    <th>Eliminar</th>
    <th>Modificar</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fechainicio"]."</td>";
 	   	   echo "<td>".$fila["fechafin"]."</td>";
 	   	   echo "<td>".$fila["total"]."</td>";
 	   	   echo "<tr>";
 	    ?>
             <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDbalance'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>
              <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDbalance'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                    
               </form>
             </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>