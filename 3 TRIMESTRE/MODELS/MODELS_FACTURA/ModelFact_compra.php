<?php 

class fact_compra
{
	private $pdo;
	public function __CONSTRUCT()
	{
		try{
			$this->pdo =database::conectar();
		}
		catch(Exception $ex){
			die($e->getMessage());
		}
	}


public function Insertar_fact_compra($id_fact_compra, $tdoc_empleado, $id_empleado, $id_proveedor, $tdoc_proveedor)
{

	$sql= "INSERT INTO FACT_COMPRA (ID_FACT_COMPRA,TDOC_EMPLEADO,ID_EMPLEADO,ID_PROVEEDOR,TDOC_PROVEEDOR) VALUES ('$id_fact_compra',$'tdoc_empleado','$id_empleado', '$id_proveedor', '$tdoc_proveedor')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_fact_compra($id_fact_compra, $tdoc_empleado, $id_empleado, $id_proveedor, $tdoc_proveedor)
{
 		$sql = "UPDATE FACT_COMPRA SET 
 			ID_FACT_COMPRA = '$id_fact_compra',
 			TDOC_EMPLEADO ='$tdoc_empleado',
 			ID_EMPLEADO = '$id_empleado',
 			ID_PROVEEDOR = '$id_proveedor',
 			TDOC_PROVEEDOR = '$tdoc_proveedor',
 			WHERE ID_FACT_COMPRA = '$id_fact_compra2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='';</script>";
}



public function Delete_factura($id_fact_compra)
{
 		$sql ="DELETE FROM FACTURA WHERE Name = '$id_fact_compra'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}

}
?>