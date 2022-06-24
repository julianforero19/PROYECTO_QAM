<?php 

class ADMINISTRADOR
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


public function Insertar_ADMINISTRADOR($administrador_id,$administrador_tdoc)
{

	$sql= "INSERT INTO ADMINISTRADOR (ADMINISTRADOR_ID,ADMINISTRADOR_TDOC ) VALUES ('$administrador_id','$administrador_tdoc')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_ADMINISTRADOR($administrador_id,$administrador_id2,$administrador_tdoc,$administrador_tdoc2)
{
 		$sql = "UPDATE ADMINISTRADOR SET 

 			ADMINISTRADOR_ID = '$administrador_id',
 			ADMINISTRADOR_TDOC = '$administrador_tdoc',
 			WHERE ADMINISTRADOR_ID,='$administrador_id2' and ADMINISTRADOR_TDOC='$administrador_tdoc2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='index2.html';</script>";
}



public function Delete_ADMINISTRADOR($administrador_id,$administrador_tdoc)
{
 		$sql ="DELETE FROM ADMINISTRADOR WHERE ADMINISTRADOR_ID='$administrador_id' and ADMINISTRADOR_TDOC='$administrador_tdoc'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}

}


?>