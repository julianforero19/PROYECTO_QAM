<?php 

class EMPLEADO
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

public function Insertar_EMPLEADO($empleado_id,$empleado_tdoc,$sueldo_empleado)
{

	$sql= "INSERT INTO EMPLEADO(EMPLEADO_ID,EMPLEADO_TDOC,SUELDO_EMPLEADO) VALUES ('$empleado_id','$empleado_tdoc','$sueldo_empleado')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='view_ma.php';</script>";
}

public function Update_EMPLEADO($empleado_id,$empleado_id2,$empleado_tdoc,$sueldo_empleado)
{
 		$sql = "UPDATE	EMPLEADO SET 
 			 EMPLEADO_ID= '$empleado_id',
 			 EMPLEADO_TDOC='$empleado_tdoc',
 			 SUELDO_EMPLEADO='$sueldo_empleado',
 			WHERE EMPLEADO_ID= '$empleado_id2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view_ma.php';</script>";
}



public function Delete_EMPLEADO($empleado_id)
{
 		$sql ="DELETE FROM EMPLEADO WHERE EMPLEADO_ID = '$empleado_id'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='view_ma.php';</script>";

}


?>