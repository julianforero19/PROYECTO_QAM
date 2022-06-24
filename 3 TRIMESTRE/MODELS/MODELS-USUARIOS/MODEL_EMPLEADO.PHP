<?php 

class EMPLEADO
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


public function Insertar_EMPLEADO($empleado_id,$empleado_tdoc,$sueldo_empleado)
{

	$sql= "INSERT INTO EMPLEADO(EMPLEADO_ID,EMPLEADO_TDOC,SUELDO_EMPLEADO) VALUES ('$empleado_id','$empleado_tdoc','$sueldo_empleado')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_EMPLEADO($empleado_id,$empleado_id2,$empleado_tdoc,$empleado_tdoc2,$sueldo_empleado)
{
 		$sql = "UPDATE	EMPLEADO SET 
 			 EMPLEADO_ID= '$empleado_id',
 			 EMPLEADO_TDOC='$empleado_tdoc',
 			 SUELDO_EMPLEADO='$sueldo_empleado',
 			WHERE EMPLEADO_ID='$empleado_id2' and EMPLEADO_TDOC='empleado_tdoc2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='index2.html';</script>";
}



public function Delete_EMPLEADO($empleado_id,$empleado_tdoc)
{
 		$sql ="DELETE FROM EMPLEADO WHERE EMPLEADO_ID='$empleado_id' and EMPLEADO_TDOC='$empleado_tdoc'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}

}
?>