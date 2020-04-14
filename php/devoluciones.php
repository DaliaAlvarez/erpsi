<?php 

require_once("conexion.php");
class Devoluciones extends Conexion{

	public function alta($IDdevoluciones,$fecha,$cantidad, $descripcion){
		$this->sentencia ="INSERT INTO devoluciones VALUES (null,'$IDdevoluciones','$fecha','$cantidad','$descripcion')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM devoluciones WHERE IDdevoluciones=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM devoluciones";
		return $this->obtenerSentencia();
	}

	public function modificar($IDdevoluciones,$fecha,$cantidad, $descripcion){
		$this->sentencia="UPDATE FROM devoluciones SET IDdevoluciones='$IDdevoluciones', fecha='$fecha', cantidad='$cantidad', descripcion='$descripcion', IDempleado='$IDempleado' WHERE IDdevoluciones='id'";
		$this->ejecutarSentencia();

	}

}

 ?>