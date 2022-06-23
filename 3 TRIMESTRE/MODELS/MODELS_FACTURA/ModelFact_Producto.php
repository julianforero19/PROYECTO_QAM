<?php 

class fact_producto
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


public function Insertar_fact_producto($id_factura_id, $id_producto_id, $cant_producto, $valor_producto)
{

	$sql= "INSERT INTO FACT_PRODUCTO (ID_FACTURA_ID,ID_PRODUCTO_ID,CANT_PRODUCTO,VALOR_PRODUCTO,) VALUES ('$id_factura_id','$id_producto_id', '$cant_producto', '$valor_producto')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_fact_producto($id_factura_id, $id_factura_id2, $id_producto_id2, $id_producto_id, $cant_producto, $valor_producto)
{
 		$sql = "UPDATE FACT_PRODUCTO SET 
 			ID_FACTURA_ID = '$id_factura_id',
 			ID_PRODUCTO_ID ='$id_producto_id',
 			CANT_PRODUCTO = '$cant_producto',
 			VALOR_PRODUCTO= '$valor_producto',
 			WHERE ID_FACTURA_ID = '$id_factura_id2' AND ID_PRODUCTO_ID = 'id_producto_id2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='index2.html';</script>";
}



public function Delete_factura($id_factura_id,$id_producto_id)
{
 		$sql ="DELETE FROM FACTURA WHERE ID_FACTURA_ID = '$id_factura_id' AND ID_PRODUCTO_ID = '$id_producto_id'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}

}
?>