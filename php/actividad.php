<?php 

require_once("conexion.php");
class Actividad Conexion{

	public function alta($IDactividad,$registro,$IDusuario, $movimiento_act, $movimiento_tabla){
		$this->sentencia ="INSERT INTO actividad VALUES (null,'$IDactividad','$registro','$IDusuario','$movimiento_act', '$movimiento_tabla')";
		$thihs->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM actividad WHERE IDactividad=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM actividad";
		return $this->obetenerSentencia();
	}

	public function modificar($IDactividad,$registro,$IDusuario, $movimiento_act, $movimiento_tabla){
		this->sentencia="UPDATE FROM usuario SET $IDactividad='$IDactividad, 'registo='$registro', IDusuario='$IDusuario', movimiento_act='$movimiento_act', movimiento_tabla='$movimiento_tabla' WHERE IDactividad='id'";
		this->ejecutarSentencia();

	}

}

 ?>