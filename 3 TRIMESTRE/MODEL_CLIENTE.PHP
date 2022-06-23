<?php 

class CLIENTE
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

public function Insertar_CLIENTE($cliente_id,$cliente_tdoc,)
{

	$sql= "INSERT INTO CLIENTE(CLIENTE_ID,CLIENTE_TDOC) VALUES ('$cliente_id','$cliente_tdoc')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='view_ma.php';</script>";
}

public function Update_CLIENTE($cliente_id,$cliente_tdoc,$cliente_id2)
{
 		$sql = "UPDATE	CLIENTE SET 
 			 CLIENTE_ID= '$cliente_id',
 			 CLIENTE_TDOC='$cliente_tdoc',
 			WHERE CLIENTE_ID= '$cliente_id2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view_ma.php';</script>";
}



public function Delete_CLIENTE($cliente_id)
{
 		$sql ="DELETE FROM CLIENTE WHERE CLIENTE_ID = '$cliente_id'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='view_ma.php';</script>";

}


?>