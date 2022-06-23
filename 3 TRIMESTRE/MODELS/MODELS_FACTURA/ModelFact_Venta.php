<?php 

class fact_venta
{
	private $pdo;
	public function _CONSTRUCT()
	{
		try{
			$this->pdo =database::conectar();
		}
		catch(Exception $ex){
			die($e->getMessage());
		}
	}


public function Insertar_fact_venta($id_fact_venta, $tdoc_empleado, $id_empleado, $id_cliente, $tdoc_cliente)
{

	$sql= "INSERT INTO FACT_VENTA (ID_FACT_VENTA,TDOC_EMPLEADO,ID_EMPLEADO,ID_CLIENTE,TDOC_CLIENTE) VALUES ('$id_fact_venta',$'tdoc_empleado','$id_empleado', '$id_cliente', '$tdoc_cliente')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_fact_venta($id_fact_venta, $id_fact_venta2, $tdoc_empleado, $id_empleado, $id_cliente, $tdoc_cliente,)
 		$sql = "UPDATE FACt_VENTA SET 
 			ID_FACT_VENTA = '$id_fact_venta',
 			TDOC_EMPLEADO ='$tdoc_empleado',
 			ID_EMPLEADO = '$id_empleado',
 			ID_CLIENTE = '$id_cliente',
 			TDOC_CLIENTE = '$tdoc_cliente',
 			WHERE ID_FACT_VENTA = '$id_fact_venta2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view_ma.php';</script>";
}



public function Delete_fact_venta($id_fact_venta)
{
 		$sql ="DELETE FROM FACT_VENTA WHERE Name = '$id_fact_venta'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}

}
?>