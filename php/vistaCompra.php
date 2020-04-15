<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="compra" name="tabla"> 
    <input type="hidden" value="total" name="dato">
    <input type="hidden" value="fecha" name="encabezado"> 
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>

<div>
    <form method="get" action="http://localhost/RPSI/php/reporte2.php"><button type="submit">Reporte Compra</button></form>
  </div>

<?php
/* Producto, *Compra, Devoluciones, Jornada, Mantenimiento, Materia Prima, Mobiliario, Reemplazo, Venta*/
if(isset($_POST["grafica"])){
  require_once("php/grafica.php");
}
?>

<?php 
  require_once("compra.php");
  $obj = new Compra();
  if (!isset($_POST["modificar"])) { 
  ?>

<form action="" method="post">
	<br>
	<input type="date" name="fecha" placeholder="Fecha:">	<br>
	<input type="text" name="total" placeholder="Total"><br><br>
     <select name="tipo_pago">
          <option value="1">Efectivo</option>
          <option value="2">Tarjeta</option>
     </select> <br>
     <input type="text" name="id_cliente" placeholder="id_cliente"><br><br>
		
	<input type="submit" name="alta" value="Guardar Compra">
</form>

<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
    ?>
<form action="" method="post">
<input type="text" name="fecha" placeholder="fecha: " value='<?php echo $fila["fecha"] ?>'><br>
<input type="text" name="total" placeholder="Total: " value='<?php echo $fila["total"] ?>'><br>
<select name="tipo_pago">
          <option value="1">Efectivo</option>
          <option value="2">Tarjeta</option>
     </select> <br>
<input type="text" name="id_cliente" placeholder="id_cliente: " value='<?php echo $fila["id_cliente"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Compra">
</form>
<?php
}

     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["fecha"];
     	$total = $_POST["total"];
      $tipo_pago = $_POST["tipo_pago"];
       $id_cliente = $_POST["id_cliente"];
  
     	$obj->alta($fecha,$total,$tipo_pago, $id_cliente);
     	echo "<h2>Compra registrada</h2>";
     }

    //modificar//

      if (isset($_POST["mod"]))
     {    # code...
      $fecha = $_POST["fecha"];
      $total = $_POST["total"];
          $tipo_pago = $_POST["tipo_pago"];
          $id_cliente = $_POST["id_cliente"];
      $obj->modificar($fecha,$total,$tipo_pago, $id_cliente);
      echo "<h2>Compra modificada</h2>";
     }

     //eliminar//

   if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar la Compra?');
    if(opcion===true){
        window.location.href = 'home.php?sec=compra&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->eliminar($_GET["el"]);
    echo "<script>
        alert('Compra eliminado');
        window.location.href = 'home.php?sec=compra';
    </script>";
}
?>

 <table>
 	<tr>
 		<th>Fecha</th>
 		<th>Total</th>
          <th>Tipo_pago</th>
          <th>id_cliente</th>
          <th>Eliminar</th>
          <th>Modificar</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fecha"]."</td>";
 	   	   echo "<td>".$fila["total"]."</td>";
              echo "<td>".$fila["tipo_pago"]."</td>";
              echo "<td>".$fila["id_cliente"]."</td>";
 	   	   echo "<tr>";
 	    ?>
             <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDcompra'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>

              <td>
               <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDcompra'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                    
               </form>
             </td>


             <?php
             echo "<tr>";
        }
      ?>
 </table>