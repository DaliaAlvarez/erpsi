<?php 

require_once("conexion.php");
class Devoluciones extends Conexion{

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
		return $this->obtenerSentencia();
	}

	public function modificar($IDdevoluciones,$fecha,$cantidad, $descripción, $IDproducto){
		$this->sentencia="UPDATE FROM devoluciones SET IDdevoluciones='$IDdevoluciones', fecha='$fecha', cantidad='$cantidad', descripcion='$descripcion', IDproducto='$IDproducto' WHERE IDdevoluciones='id'";
		$this->ejecutarSentencia();

	}

}

 ?>