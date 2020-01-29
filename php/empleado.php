<?php 

require_once("conexion.php");
class Empleado Conexion{

	public function alta($IDempleado,$nombre,$appaterno, $apmaterno, $correo, $rfc, $telefono, $sexo, $fechadeingreso, $cargo, $salario, $estadocivil, $nss){
		$this->sentencia ="INSERT INTO empleado VALUES (null,'$IDempleado','$nombre','$appaterno','$apmaterno','$correo', '$rfc', '$telefono', '$sexo', '$fechadeingreso', '$cargo', '$salario', $'estadocivil', '$nss')";
		$thihs->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM empleado WHERE IDempleado=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM empleado";
		return $this->obetenerSentencia();
	}

}

 ?>