<?php 

require_once("conexion.php");
class Detalle_compra extends Conexion{

	public function alta($cantidad){
		$this-> sentencia ="INSERT INTO detalle_compra VALUES (null,'$cantidad')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this-> sentencia = "DELETE FROM detalle_compra WHERE IDdetallecompra=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this-> sentencia = "SELECT * FROM detalle_compra";
		return $this->obtenerSentencia();
	}

	public function modificar($cantidad){
		$this-> sentencia="UPDATE FROM detalle_compra SET cantidad='$cantidad' WHERE IDdetalle_compra='$id'";
		$this->ejecutarSentencia();

	}

	public function buscar($id){
            $this-> sentencia = "SELECT * FROM detalle_compra WHERE IDdetalle_compra=$id";
            return $this->obtenerSentencia();
        }

}

 ?>