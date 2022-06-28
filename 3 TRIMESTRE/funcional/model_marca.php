<?php 

class MARCA
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

public function Insertar_MARCA($marca_id, $descrip_marca, $estado_marca)
{

	$sql= "INSERT INTO MARCA (MARCA_ID,DESCRIP_MARCA,ESTADO_MARCA) VALUES ('$marca_id', '$descrip_marca', '$estado_marca')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='prueba.php';</script>";
}

public function Update_MARCA($marca_id, $marca_id2,$descrip_marca,$estado_marca)
{
 		$sql = "UPDATE MARCA SET 
 			MARCA_ID = '$marca_id',
 			DESCRIP_MARCA ='$descrip_marca',
 			ESTADO_MARCA = '$estado_marca'
 			WHERE MARCA_ID = '$marca_id2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='prueba.php';</script>";
}



public function Delete_MARCA($marca_id)
{
 		$sql ="DELETE FROM MARCA WHERE MARCA_ID = '$marca_id'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='prueba.php';</script>";

}

}

?>