<form action="" method="post">
	<br>
	<input type="text" name="tipo" placeholder="Tipo:">
	<br>
	<input type="text" name="pregunta1" placeholder="Pregunta1"> <br>
	<br>
  <input type="text" name="pregunta2" placeholder="Pregunta2"> <br>
  <br>
  <input type="text" name="pregunta3" placeholder="Pregunta3"> <br>
  <br>
  <input type="text" name="pregunta4" placeholder="Pregunta4"> <br>
  <br>
  <input type="text" name="pregunta5" placeholder="Pregunta5"> <br>
  <br>
  <input type="text" name="pregunta6" placeholder="Pregunta6"> <br>
  <br>
  <input type="text" name="pregunta7" placeholder="Pregunta7"> <br>
  <br>
  <input type="text" name="pregunta8" placeholder="Pregunta8"> <br>
  <br>
  <input type="text" name="pregunta9" placeholder="Pregunta9"> <br>
  <br>
  <input type="text" name="pregunta10" placeholder="Pregunta10"> <br>
  <br>
    
		
	<input type="submit" name="alta" value="Guardar Evaluacion">
</form>
<?php 
     require_once ("evaluacion.php");
     	$obj = new Evaluacion();
     if (isset($_POST["alta"]))
     {  	# code...
     	$tipo = $_POST["Tipo"];
     	$pregunta1 = $_POST["Pregunta1"];
      $pregunta2 = $_POST["Pregunta2"];
      $pregunta3 = $_POST["Pregunta3"];
      $pregunta4 = $_POST["Pregunta4"];
      $pregunta5 = $_POST["Pregunta5"];
      $pregunta6 = $_POST["Pregunta6"];
      $pregunta7 = $_POST["Pregunta7"];
      $pregunta8 = $_POST["Pregunta8"];
      $pregunta9 = $_POST["Pregunta9"];
      $pregunta10 = $_POST["Pregunta10"];
          
     	$obj->alta($pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,$pregunta7,$pregunta8,$pregunta9,$pregunta10);
     	echo "<h2>Evaluacion registrada</h2>";
     }


     $obj = new Evaluacion();
     if (isset($_POST["mod"]))
     {    # code...
      $tipo = $_POST["Tipo"];
      $pregunta1 = $_POST["Pregunta1"];
      $pregunta2 = $_POST["Pregunta2"];
      $pregunta3 = $_POST["Pregunta3"];
      $pregunta4 = $_POST["Pregunta4"];
      $pregunta5 = $_POST["Pregunta5"];
      $pregunta6 = $_POST["Pregunta6"];
      $pregunta7 = $_POST["Pregunta7"];
      $pregunta8 = $_POST["Pregunta8"];
      $pregunta9 = $_POST["Pregunta9"];
      $pregunta10 = $_POST["Pregunta10"];
          
      $obj->alta($pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,$pregunta7,$pregunta8,$pregunta9,$pregunta10);
      echo "<h2>Evaluacion modificada</h2>";
     }



      if(isset($_POST["eliminar"])){
          echo "<script>
          var opcion = confirm('¿Deseas eliminar la Evaluacion?');
          if(opcion===true){
               window.location.href = 'home.php?el=".$_POST["id"]."';}</script>";
          }
          if(isset($_GET["el"])){
          $obj->eliminar($_GET["el"]);
          //echo"<h2>Usuario eliminado</h2>";//
          echo"<script>alert('Evaluacion eliminada')</script>";
          header("Location: home.php");
     }
 ?>

 <table>
 	<tr>
 		<th>Tipo</th>
 		<th>Pregunta1</th>
    <th>Pregunta2</th>
    <th>Pregunta3</th>
    <th>Pregunta4</th>
    <th>Pregunta5</th>
    <th>Pregunta6</th>
    <th>Pregunta7</th>
    <th>Pregunta8</th>
    <th>Pregunta9</th>
    <th>Pregunta10</th>
          
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["tipo"]."</td>";
 	   	   echo "<td>".$fila["pregunta1"]."</td>";
         echo "<td>".$fila["pregunta2"]."</td>";
         echo "<td>".$fila["pregunta3"]."</td>";
         echo "<td>".$fila["pregunta4"]."</td>";
         echo "<td>".$fila["pregunta5"]."</td>";
         echo "<td>".$fila["pregunta6"]."</td>";
         echo "<td>".$fila["pregunta7"]."</td>";
         echo "<td>".$fila["pregunta8"]."</td>";
         echo "<td>".$fila["pregunta9"]."</td>";
         echo "<td>".$fila["pregunta10"]."</td>";
              
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