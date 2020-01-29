<?php 

require_once("conexion.php");
class Evaluacion Conexion{

	public function alta($IDevaluacion,$tipo,$pregunta1, $pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10){
		$this->sentencia ="INSERT INTO detalle_compra VALUES (null,'$IDevaluacion','$tipo','$pregunta1','$pregunta2','$pregunta3', '$pregunta4', '$pregunta5', '$pregunta6', '$pregunta7', '$pregunta8', '$pregunta9', '$pregunta10')";
		$thihs->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM evaluacion WHERE IDevaluacion=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM evaluacion";
		return $this->obetenerSentencia();
	}

}

 ?>