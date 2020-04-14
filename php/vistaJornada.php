<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="jornada" name="tabla"> 
    <input type="hidden" value="hrs_trabajadas" name="dato"> 
    <input type="hidden" value="dias_trabajados" name="encabezado"> 
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>

<?php
/* Producto, *Compra, Devoluciones, Jornada, Mantenimiento, Materia Prima, Mobiliario, Reemplazo, Venta*/
if(isset($_POST["grafica"])){
  require_once("php/grafica.php");
}

?>
<form action="" method="post">
	<br>
	<input type="text" name="hrs_trabajadas" placeholder="hrs_trabajadas:">
	<br>
	<input type="text" name="dias_trabajados" placeholder="dias_trabajados"> <br>
	<br>
  <input type="text" name="pago_hora" placeholder="pago_hora"> <br>
  <br>
  <input type="text" name="horas_extra" placeholder="horas_extra"> <br>
  <br>
  <input type="text" name="bonos" placeholder="bonos"> <br>
  <br>
		
	<input type="submit" name="alta" value="Guardar Jornada">
</form>
<?php 
     require_once ("jornada.php");
     	$obj = new Jornada();
     if (isset($_POST["alta"]))
     {  	# code...
     	$hrs_trabajadas = $_POST["hrs_trabajadas"];
     	$dias_trabajados = $_POST["dias_trabajados"];
      $pago_hora = $_POST["pago_hora"];
      $horas_extra = $_POST["horas_extra"];
      $bonos = $_POST["bonos"];
     
     	$obj->alta($hrs_trabajadas,$dias_trabajados,$pago_hora,$horas_extra,$bonos);
     	echo "<h2>Jornada registrada</h2>";
     }


     //modificar//
      $obj = new Jornada();
     if (isset($_POST["mod"]))
     {    # code...
      $hrs_trabajadas = $_POST["hrs_trabajadas"];
      $dias_trabajados = $_POST["dias_trabajados"];
      $pago_hora = $_POST["pago_hora"];
      $horas_extra = $_POST["horas_extra"];
      $bonos = $_POST["bonos"];
     
      $obj->alta($hrs_trabajadas,$dias_trabajados,$pago_hora,$horas_extra,$bonos);
      echo "<h2>Jornada modificada</h2>";
     }


      if(isset($_POST["eliminar"])){
          echo "<script>
          var opcion = confirm('¿Deseas eliminar la Jornada?');
          if(opcion===true){
               window.location.href = 'home.php?el=".$_POST["id"]."';}</script>";
          }
          if(isset($_GET["el"])){
          $obj->eliminar($_GET["el"]);
          //echo"<h2>Usuario eliminado</h2>";//
          echo"<script>alert('Jornada eliminada')</script>";
          header("Location: home.php");
     }
 ?>

 <table>
 	<tr>
 		<th>hrs_trabajadas</th>
 		<th>dias_trabajados</th>
    <th>pago_hora</th>
     <th>horas_extra</th>
      <th>bonos</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";

 	   	   echo "<td>".$fila["hrs_trabajadas"]."</td>";
 	   	   echo "<td>".$fila["dias_trabajados"]."</td>";
         echo "<td>".$fila["pago_hora"]."</td>";
         echo "<td>".$fila["horas_extra"]."</td>";
         echo "<td>".$fila["bonos"]."</td>";
         
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