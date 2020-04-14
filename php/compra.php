<?php 

require_once("conexion.php");
class Compra extends Conexion{

	public function alta($fecha, $total, $tipo_pago, $id_cliente){
		$this->sentencia ="INSERT INTO compra VALUES (null,'$IDcompra','$fecha','$total','$tipo_pago''$id_cliente')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM compra WHERE IDcompra=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM compra";
		return $this->obtenerSentencia();
	}

	public function modificar($fecha, $total, $tipo_pago, $id_cliente){
		$this->sentencia="UPDATE FROM compra SET IDcompra='IDcompra', fecha='$fecha', total='$total', tipo_pago='$tipo_pago', id_cliente='$id_cliente' WHERE IDcompra='id'";
		$this->ejecutarSentencia();

	}

}

 ?>