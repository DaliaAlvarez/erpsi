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

	public function modificar($IDjornada,$hrs_trabajadas,$dias_trabajados, $pago_hora, $horas_extra, $bonos, $IDempleado){
		this->sentencia="UPDATE FROM jornada SET IDjornada='$IDjornada', hrs_trabajadas='$hrs_trabajadas', dias_trabajados='$dias_trabajados', pago_hora='$pago_hora', horas_extra='$horas_extra', bonos='$bonos' IDempleado='$IDempleado' WHERE IDjornada='id'";
		this->ejecutarSentencia();

	}

}

 ?>