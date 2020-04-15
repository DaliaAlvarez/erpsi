<?php 
  require_once("producto.php");
  $obj = new Producto();
  if (!isset($_POST["modificar"])) { 
  ?>

  <div>
    <form method="get" action="http://localhost/RPSI/php/reporte.php"><button type="submit">Reporte Producto</button></form>
  </div>

  <div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="producto" name="tabla">
    <input type="hidden" value="cantidad" name="dato">
    <input type="hidden" value="nombre" name="encabezado">
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>
<?php 
  if(isset($_POST["grafica"])){
    require_once("php/grafica.php");
  }
 ?>


<form action="" method="post">
  
  <input type="text" name="nombre" placeholder="nombre:"><br>
  <input type="text" name="descripcion" placeholder="descripcion"><br>    
  <input type="text" name="preciov" placeholder="preciov"><br>
  <input type="text" name="precioc" placeholder="precioc"><br>  
  <input type="text" name="cantidad" placeholder="cantidad"><br>
  <input type="text" name="cantmin" placeholder="cantidad minima"><br>
  <input type="text" name="cantmax" placeholder="cantidad maxima"><br>
  Categoria: <br>
     <select name="categoria">
        <option value="1">...</option>
        <option value="2">...</option>
     </select> <br>  
     <br>
  <input type="submit" name="alta" value="Guardar Producto">

</form>

<?php }else{ 
  $res = $obj->buscar($_POST["id"]);
  $fila = $res->fetch_assoc();
  ?>
  <form action="" method="post">
    
  <input type="text" name="nombre" placeholder="nombre:" value="<?php echo $fila['nombre']; ?>"><br>
  <input type="text" name="descripcion" placeholder="descripcion" value="<?php echo $fila['descripcion']; ?>"><br><br>
  <input type="text" name="preciov" placeholder="preciov" value="<?php echo $fila['preciov']; ?>"> <br><br>
  <input type="text" name="preciov" placeholder="preciov" value="<?php echo $fila['precioc']; ?>"> <br><br>
  <input type="text" name="cantidad" placeholder="cantidad" value="<?php echo $fila['cantidad']; ?>"><br><br>
  <input type="text" name="cantmin" placeholder="cantmin" value="<?php echo $fila['cantmin']; ?>"> <br><br>
  <input type="text" name="cantmax" placeholder="cantmax" value="<?php echo $fila['cantmax']; ?>"> <br><br>
    Categoria: <br>
     <select name="categoria">
        <option value="1">...</option>
        <option value="2">...</option>
     </select> <br>  
     <br>
  <input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
  <input type="submit" name="mod" value="Modificar Producto">
</form> 
<?php
    }
   
  if(isset($_POST["alta"])){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $preciov = $_POST["preciov"];
    $precioc = $_POST["precioc"];
    $cantidad = $_POST["cantidad"];
    $cantmin = $_POST["cantmin"];
    $cantmax = $_POST["cantmax"];
    $categoria = $_POST["categoria"]; 
    $obj-> alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria);
    echo"<h2>Producto Registrado<h2>";
  }
  if(isset($_POST["mod"])){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $preciov = $_POST["preciov"];
    $precioc = $_POST["precioc"];
    $cantidad = $_POST["cantidad"];
    $cantmin = $_POST["cantmin"];
    $cantmax = $_POST["cantmax"];
    $categoria = $_POST["categoria"]; 
    $id = $_POST["id"];
    $obj-> modificar($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria,$id);
    echo"<h2>Producto Modificado<h2>";
  }

 if(isset($_POST["eliminar"])){
    echo "<script>
    var opcion = confirm('¿Deseas eliminar el Producto?');
    if(opcion===true){
        window.location.href = 'home.php?sec=producto&el=".$_POST["id"]."';
    }
    </script>";
}
if(isset($_GET["el"])){
    $obj->eliminar($_GET["el"]);
    echo "<script>
        alert('Producto eliminado');
        window.location.href = 'home.php?sec=producto';
    </script>";
}
?>
<table>
  <tr>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Preciov</th>
    <th>Precioc</th>
    <th>Cantidad</th>
    <th>Cantmin</th>
    <th>Cantmax</th>
    <th>Categoria</th>
    <th>Modificar</th>
    <th>Eliminar</th>
  </tr>
  <?php 
    $res = $obj-> consulta();
    while ($fila = $res-> fetch_assoc()) {
      echo "<td>".$fila["nombre"]."</td>";
      echo "<td>".$fila["descripcion"]."</td>";
      echo "<td>".$fila["preciov"]."</td>";
      echo "<td>".$fila["precioc"]."</td>";
      echo "<td>".$fila["cantidad"]."</td>";
      echo "<td>".$fila["cantmin"]."</td>";
      echo "<td>".$fila["cantmax"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      ?>
        <td>
          <form action="" method="post">
            <input type="hidden" value="<?php echo $fila['IDproducto']?>" name="id">
            <input type="submit" name="eliminar" value="Eliminar">
          </form>
        </td>
        <td>
          <form action="" method="post">
            <input type="hidden" value="<?php echo $fila['IDproducto']?>" name="id">
            <input type="submit" name="modificar" value="Modificar">
          </form>
        </td>
      <?php
      echo "</tr>";
    }
   ?>
</table>
