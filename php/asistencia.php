<?php 

require_once("conexion.php");
class Asistencia Conexion{

	public function alta($IDasistencia,$fecha,$IDempleado, $hora){
		$this->sentencia ="INSERT INTO actividad VALUES (null,'$IDasistencia','$fecha','$IDempleado','$hora')";
		$thihs->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM asistencia WHERE IDasistencia=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM asistencia";
		return $this->obetenerSentencia();
	}

}

 ?>