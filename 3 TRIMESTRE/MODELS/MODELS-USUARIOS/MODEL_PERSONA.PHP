<?php 

class PERSONA
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


public function Insertar_PERSONA($persona_id, $tipdoc_id, $pri_nombre_persona, $seg_nombre_persona, $pri_apellido_persona,$seg_apellido_persona,$direc_persona,$cel_persona,$correo_persona,'$password')
{

	$sql= "INSERT INTO PERSONA (PERSONA_ID,TIPDOC_ID,PRI_NOMBRE_PERSONA,SEG_NOMBRE_PERSONA,PRI_APELLIDO_PERSONA,SEG_APELLIDO_PERSONA,DIREC_PERSONA,CEL_PERSONA,CORREO_PERSONA,PASSWORD) VALUES ('$persona_id', '$tipdoc_id', '$pri_nombre_persona','$seg_nombre_persona', '$pri_apellido_persona','$seg_apellido_persona','$direc_persona','$cel_persona','$correo_persona','$password')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_PERSONA($persona_id, $tipdoc_id,$tipdoc_id2,$pri_nombre_persona, $seg_nombre_persona, $pri_apellido_persona,$seg_apellido_persona,$direc_persona,$cel_persona,$correo_persona,$persona_id2)
{
 		$sql = "UPDATE PERSONA SET 
 			 PERSONA_ID= '$persona_id',
 			 TIPDOC_ID='$tipdoc_id',
 			 PRI_NOMBRE_PERSONA= '$pri_nombre_persona',
 			 SEG_NOMBRE_PERSONA= '$seg_nombre_persona',
 			 PRI_APELLIDO_PERSONA= '$pri_apellido_persona',
 			 SEG_APELLIDO_PERSONA= '$seg_apellido_persona',
 			 DIREC_PERSONA='$direc_persona',
 			 CEL_PERSONA='$cel_persona',
 			 CORREO_PERSONA = '$correo_persona',
 			 PASSWORD='password',
 			WHERE PERSONA_ID='$persona_id2 and' and TIPDOC_ID='tipdoc_id2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='index2.html';</script>";
}

public function Delete_PERSONA($persona_id,$tipdoc_id)
{
 		$sql ="DELETE FROM PERSONA WHERE PERSONA_ID='$persona_id' and TIPDOC_ID='$tipdoc_id'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';</script>";

}
}

?>