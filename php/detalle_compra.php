<?php 

require_once("conexion.php");
class Detalle_compra extends Conexion{

	public function alta($IDdetallecompra,$IDmateriaprima,$IDcompra, $cantidad){
		$this->sentencia ="INSERT INTO detalle_compra VALUES (null,'$IDdetallecompra','$IDmateriaprima','$IDcompra','$cantidad')";
		$thihs->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM detalle_compra WHERE IDdetallecompra=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM detalle_compra";
		return $this->obtenerSentencia();
	}

	public function modificar($IDdetalle_compra,$IDmateriaprima,$IDcompra, $cantidad){
		$this->sentencia="UPDATE FROM detalle_compra SET IDdetalle_compra='IDdetalle_compra', IDmateriaprima='$IDmateriaprima', IDcompra='$IDcompra', cantidad='$cantidad' WHERE IDdetalle_compra='id'";
		$this->ejecutarSentencia();

	}

}

 ?>