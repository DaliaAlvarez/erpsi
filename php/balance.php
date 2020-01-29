<?php 

require_once("conexion.php");
class Asistencia Conexion{

	public function alta($IDasistencia,$Fecha,$IDempleado, $Hora){
		$this->sentencia ="INSERT INTO actividad VALUES (null,'$IDasistencia','$Fecha','$IDempleado','$Hora')";
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