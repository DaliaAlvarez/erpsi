<?php 

require_once("conexion.php");
class Balance extends Conexion{

	public function alta($IDbalance,$fechainicio,$fechafin, $total){
		$this->sentencia ="INSERT INTO balance VALUES (null,'$IDbalance','$fechainicio','$fechafin','$total')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM balance WHERE IDbalance=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM balance";
		return $this->obtenerSentencia();
	}

	public function modificar($IDbalance,$fechainicio,$fechafin, $total){
		$this->sentencia="UPDATE FROM balance SET IDbalance='IDbalance', fechainicio='$fechainicio', fechafin='$fechafin', total='$total' WHERE IDbalance='id'";
		$this->ejecutarSentencia();

	}

}

 ?>