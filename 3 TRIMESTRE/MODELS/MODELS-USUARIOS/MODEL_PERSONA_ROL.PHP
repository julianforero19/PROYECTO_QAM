<?php 

class PERSONA_ROL
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


public function Insertar_PERSONA_ROL($id_persona,$tipdoc,$rol,$estado_rol)
{

 $sql= "INSERT INTO PERSONA_ROL(ID_PERSONA,TIPDOC,ROL,ESTADO_ROL) VALUES ('$id_persona','$tipdoc','$rol','$estado_rol')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_PERSONA_ROL($id_persona,$tipdoc,$tipdoc2,$rol,$rol2,$estado_rol,$id_persona_2)
{
 		$sql = "UPDATE	PERSONA_ROL SET 
 			 ID_PERSONA='$persona',
 			 TIPDOC='$tipdoc',
 			 ROL='$rol',
 			 ESTADO_ROL='$estado_rol',
 			WHERE 	PERSONA ='$id_persona_2' and TIPDOC='$tipdoc2' and ROL='$rol2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='index2.html';</script>";
}



public function Delete_PERSONA_ROL($id_persona,$tipdoc,$rol)
{
 		$sql ="DELETE FROM PERSONA_ROL WHERE PERSONA ='$persona'  and TIPDOC='$tipdoc' and ROL='$rol'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}
}

?>