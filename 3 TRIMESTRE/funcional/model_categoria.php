<?php 

class CATEGORIA
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


public function Insertar_CATEGORIA($categoria_id, $desc_categoria, $estado_categoria)
{

	$sql= "INSERT INTO CATEGORIA (CATEGORIA_ID,DESC_CATEGORIA,ESTADO_CATEGORIA) VALUES ('$categoria_id', '$desc_categoria', '$estado_categoria')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='CrdCtg.php';</script>";
}

public function Update_CATEGORIA($categoria_id,$categoria_id2, $desc_categoria, $estado_categoria)
{
 		$sql = "UPDATE CATEGORIA SET 
 			CATEGORIA_ID = '$categoria_id',
 			DESC_CATEGORIA ='$desc_categoria',
 			ESTADO_CATEGORIA = '$estado_categoria'
 			WHERE CATEGORIA_ID = '$categoria_id2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='CrdCtg.php';</script>";
}



public function Delete_CATEGORIA($categoria_id)
{
 		$sql ="DELETE FROM CATEGORIA WHERE CATEGORIA_ID = '$categoria_id'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='CrdCtg.php';</script>";

}
}



?>