<?php 

class factura
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
}

public function Insertar_factura($factura_id, $fecha_factura, $subtotal, $iva, $total_fac)
{

	$sql= "INSERT INTO FACTURA (FACTURA_ID,FECHA_FACTURA,SUBTOTAL,IVA,TOTAL_FAC) VALUES ('$factura_id',$'fecha_factura','$subtotal', '$iva', '$total_fac')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_factura($factura_id, $fecha_factura, $factura_id2, $subtotal, $iva, $total_fac)
{
 		$sql = "UPDATE FACTURA SET 
 			FACTURA_ID = '$factura_id',
 			FECHA_FACTURA ='$fecha_factura',
 			SUBTOTAL = '$subtotal',
 			IVA = '$iva',
 			TOTAL_FAC = '$total_fac',
 			WHERE FACTURA_ID = '$factura_id2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='index2.html';</script>";
}



public function Delete_factura($factura_id)
{
 		$sql ="DELETE FROM FACTURA WHERE Name = '$factura_id'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}


?>