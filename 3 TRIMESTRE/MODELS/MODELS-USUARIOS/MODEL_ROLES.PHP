<?php 

class ROLES
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


public function Insertar_ROLES($rol_id,$descrip_rol)
{

	$sql= "INSERT INTO ROLES(ROL_ID,DESCRIP_ROL) VALUES ('$rol_id','$descrip_rol')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_ROLES($rol_id,$descrip_rol,$rol_id2 )
{
 		$sql = "UPDATE ROLES SET 
 			 ROL_ID= '$rol_id',
 			 DESCRIP_ROL='$descrip_rol',
 			WHERE ROL_ID = 'rol_id2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='index2.html';</script>";
}



public function Delete_ROLES($rol_id)
{
 		$sql ="DELETE FROM ROLES WHERE ROL_ID = '$rol_id'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}

}
?>