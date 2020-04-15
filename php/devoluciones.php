<?php 

require_once("conexion.php");
class Devoluciones extends Conexion{

	public function alta($fecha,$cantidad, $descripcion){
		$this-> sentencia ="INSERT INTO devoluciones VALUES (null,$fecha','$cantidad','$descripcion')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this-> sentencia = "DELETE FROM devoluciones WHERE IDdevoluciones=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this-> sentencia = "SELECT * FROM devoluciones";
		return $this->obtenerSentencia();
	}

	public function modificar($fecha,$cantidad, $descripcion){
		$this-> sentencia="UPDATE FROM devoluciones SET fecha='$fecha', cantidad='$cantidad', descripcion='$descripcion' WHERE IDdevoluciones='id'";
		$this->ejecutarSentencia();

	}
	public function buscar($id){
            $this-> sentencia = "SELECT * FROM devoluciones WHERE IDdevoluciones=$id";
            return $this->obtenerSentencia();
        }

}

 ?>