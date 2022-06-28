<?php 

require_once 'MODEL_PERSONA_ROL.PHP';
require_once 'Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new PERSONA_ROL();
		$update->Update_PERSONA_ROL($_POST["ID_PERSONA"], $_POST["TIPDOC"],$_POST["TIPDOC2"],$_POST["ROL"],$_POST["ROL2"],$_POST["ESTADO_ROL"],$_POST["ID_PERSONA_2"]);
		break;
		

		case 'registrar':
		$insert =new PERSONA_ROL();
		$insert->Insertar_PERSONA_ROL($_POST["ID_PERSONA"], $_POST["TIPDOC"],$_POST["ROL"],$_POST["ESTADO_ROL"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new PERSONA_ROL();
		$delete->Delete_PERSONA_ROL($_GET["ID_PERSONA"],$_GET["TIPDOC"],$_GET["ROL"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["ID_PERSONA"] and $_GET["TIPDOC"] and $_GET["ROL"];
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>PERSONA_ROL</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->
<!--multipart/from-data es necesario si sus usuarios deben subir un archivo a traves del formulario-->

<form action='#' method="post">
	<h2>NEW PERSONA_ROL</h2>
	<label>ID_PERSONA</label>
	<input type="text" name="ID_PERSONA" placeholder="ID_PERSONA" required>
	<label>TIPDOC</label>
	<p><input type="text" name="TIPDOC" required>
	<label>ROL</label>
	<p><input type="text" name="ROL" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>