<?php 

require_once("conexion.php");
class Devoluciones Conexion{

	public function alta($IDdevoluciones,$fecha,$cantidad, $descripción, $IDproducto){
		$this->sentencia ="INSERT INTO detalle_compra VALUES (null,'$IDdevoluciones','$fecha','$cantidad','$descripción','$IDproducto')";
		$thihs->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM devoluciones WHERE IDdevoluciones=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM devoluciones";
		return $this->obetenerSentencia();
	}

}

 ?>