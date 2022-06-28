<?php 

class TIPODOC
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


public function Insertar_TIPODOC($tipo_doc, $descrip_tdoc, $estodo_tipo_doc)
{

	$sql= "INSERT INTO TIPODOC (TIPO_DOC,DESCRIP_TDOC,ESTODO_TIPO_DOC) VALUES ('$tipo_doc','$descrip_tdoc','$estodo_tipo_doc')";

	$this->pdo->query($sql);

	print"<script>alert(\"Registro Agregado exitosamente.\");window.location='index2.html';</script>";
}

public function Update_TIPODOC($tipo_doc, $descrip_tdoc, $estodo_tipo_doc,$tipo_doc2)
{
 		$sql = "UPDATE TIPODOC SET 
 			 TIPO_DOC = '$tipo_doc',
 			 DESCRIP_TDOC ='$descrip_tdoc',
 			 ESTODO_TIPO_DOC = '$estodo_tipo_doc',
 			WHERE TIPO_DOC = '$tipo_doc2'";

 		$this->pdo->query($sql);

 		print "<script>alert(\"Registro Actualizado Exitosamente.\");window.location='index2.html';</script>";
}



public function Delete_TIPODOC($tipo_doc)
{
 		$sql ="DELETE FROM TIPODOC WHERE TIPO_DOC = '$tipo_doc'";

	$this->pdo->query($sql);

		print"<script>alert(\"Registro Eliminado Exitosamente. \");window.location='index2.html';
		</script>";

}
}

?>