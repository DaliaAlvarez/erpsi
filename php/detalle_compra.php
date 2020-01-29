<?php 

require_once("conexion.php");
class Detalle_compra Conexion{

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
		return $this->obetenerSentencia();
	}

}

 ?>