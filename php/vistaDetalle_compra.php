<form action="" method="post">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad:">
	<br>
	
		
	<input type="submit" name="alta" value="Guardar Detalle_compra">
</form>
<?php 
     require_once ("detalle_compra.php");
     	$obj = new Detalle_compra();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["Cantidad"];
     	
     	$obj->alta($cantidad);
     	echo "<h2>Detalle_compra registrada</h2>";
     }

     $obj = new Detalle_compra();
     if (isset($_POST["mod"]))
     {    # code...
      $fecha = $_POST["Cantidad"];
      
      $obj->alta($cantidad);
      echo "<h2>Detalle_compra modificada</h2>";
     }

     if(isset($_POST["eliminar"])){
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Detalle de compra?');
          if(opcion===true){
               window.location.href = 'home.php?el=".$_POST["id"]."';}</script>";
          }
          if(isset($_GET["el"])){
          $obj->eliminar($_GET["el"]);
          //echo"<h2>Usuario eliminado</h2>";//
          echo"<script>alert('Detalle de compra eliminada')</script>";
          header("Location: home.php");
     }
 ?>

 <table>
 	<tr>
 		<th>Cantidad</th>
 		
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
                    <input type="hidden" value="<?php echo $fila['IDusuario'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>