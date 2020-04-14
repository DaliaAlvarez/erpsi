<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="asistenciaa" name="tabla"> 
    <input type="hidden" value="fecha" name="dato"> 
    <input type="hidden" value="hora" name="encabezado"> 
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>

<?php
/* Producto, Compra, Devoluciones, Jornada, Mantenimiento, Materia Prima, Mobiliario, Reemplazo, Venta*/
if(isset($_POST["grafica"])){
  require_once("php/grafica.php");
}

?>

<form action="" method="post">
	<br>
	<input type="date" name="fecha" placeholder="Fecha:">
	<br>
  <input type="int" name="IDempleado" placeholder="IDempleado:">
  <br>
	<input type="time" name="hora" placeholder="Hora"> <br>
	<br>
		
	<input type="submit" name="alta" value="Guardar Asistencia">
</form>
<?php 
     require_once ("asistencia.php");
     	$obj = new Asistencia();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["fecha"];
      $IDempleado = $_POST["IDempleado"];
     	$hora = $_POST["hora"];
     	$obj->alta($fecha,$IDempleado,$hora);
     	echo "<h2>Asistencia registrada</h2>";
     }

      $obj = new Asistencia();
     if (isset($_POST["mod"]))
     {    # code...
      $fecha = $_POST["fecha"];
       $IDempleado = $_POST["IDempleado"];
      $hora = $_POST["hora"];
      $obj->modificar($fecha,$IDempleado,$hora);
      echo "<h2>Asistencia modificada</h2>";
     }


     if(isset($_POST["eliminar"])){
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Asistencia?');
          if(opcion===true){
               window.location.href = 'home.php?el=".$_POST["id"]."';}</script>";
          }
          if(isset($_GET["el"])){
          $obj->eliminar($_GET["el"]);
          //echo"<h2>Usuario eliminado</h2>";//
          echo"<script>alert('Asistencia eliminada')</script>";
          header("Location: home.php");
     }
 ?>

 <table>
 	<tr>
 		<th>Fecha</th>
    <th>IDempleado</th>
 		<th>Hora</th>
    <th>Eliminar</th>
    <th>Modificar</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fecha"]."</td>";
 	   	   echo "<td>".$fila["hora"]."</td>";
 	   	   echo "<tr>";
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