<?php 

require_once("conexion.php");
class Compra Conexion{

	public function alta($IDcompra,$fecha, $total, $tipo_pago, $id_cliente){
		$this->sentencia ="INSERT INTO compra VALUES (null,'$IDcompra','$fecha','$total','$tipo_pago''$id_cliente')";
		$thihs->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM compra WHERE IDcompra=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM compra";
		return $this->obetenerSentencia();
	}

}

 ?>