<?php 

require_once("conexion.php");
class Jornada Conexion{

	public function alta($IDjornada,$hrs_trabajadas,$dias_trabajados, $pago_hora, $horas_extra, $bonos, $IDempleado){
		$this->sentencia ="INSERT INTO detalle_compra VALUES (null,'$IDjornada','$hrs_trabajadas','$dias_trabajados','$pago_hora','$horas_extra', '$bonos', '$IDempleado')";
		$thihs->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM jornada WHERE IDjornada=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM jornada";
		return $this->obetenerSentencia();
	}

}

 ?>