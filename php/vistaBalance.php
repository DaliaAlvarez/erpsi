<form action="" method="post">
	<br>
	<input type="text" name="fechainicio" placeholder="Fechainicio:">
	<br>
	<input type="text" name="fechafin" placeholder="Fechafin:"> <br>
	<br>
	<input type="text" name="total" placeholder="Total:"> <br>
	
	<input type="submit" name="alta" value="Guardar Balance">
</form>
<?php 
     require_once ("balance.php");
     	$obj = new Balance();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fechainicio = $_POST["Fechainicio"];
     	$fechafin = $_POST["Fechafin"];
     	$total = $_POST["Total"];
     	$obj->alta($fechainicio,$fechafin,$total);
     	echo "<h2>Actividad registrada</h2>";
     }

     $obj = new Balance();
     if (isset($_POST["mod"]))
     {    # code...
      $fechainicio = $_POST["Fechainicio"];
      $fechafin = $_POST["Fechafin"];
      $total = $_POST["Total"];
      $obj->alta($fechainicio,$fechafin,$total);
      echo "<h2>Actividad modificada</h2>";
     }


     if(isset($_POST["eliminar"])){
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Balance?');
          if(opcion===true){
               window.location.href = 'home.php?el=".$_POST["id"]."';}</script>";
          }
          if(isset($_GET["el"])){
          $obj->eliminar($_GET["el"]);
          //echo"<h2>Usuario eliminado</h2>";//
          echo"<script>alert('Balance eliminada')</script>";
          header("Location: home.php");
     }
 ?>

 <table>
 	<tr>
 		<th>Fechainicio</th>
 		<th>Fechafin</th>
 		<th>Total</th>
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
                    <input type="hidden" value="<?php echo $fila['IDusuario'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                    
               </form>
             </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>