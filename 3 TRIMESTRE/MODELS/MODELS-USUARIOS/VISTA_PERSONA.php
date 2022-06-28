<?php 

require_once 'MODEL_PERSONA.PHP';
require_once'Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new PERSONA();
		$update->Update_PERSONA($_POST["PERSONA_ID"], $_POST["TIPDOC_ID"], $_POST["TIPDOC_ID2"],$_POST["PRI_NOMBRE_PERSONA"],$_POST["SEG_NOMBRE_PERSONA"],$_POST["PRI_APELLIDO_PERSONA"], $_POST["SEG_APELLIDO_PERSONA"], $_POST["DIREC_PERSONA"], $_POST["CEL_PERSONA"], $_POST["CORREO_PERSONA"], $_POST["PERSONA_ID2"],$_POST["PASSWORD"],);
		break;
		

		case 'registrar':
		$insert =new PERSONA();
		$insert->Insertar_PERSONA($_POST["PERSONA_ID"], $_POST["TIPDOC_ID"], $_POST["PRI_NOMBRE_PERSONA"], $_POST["SEG_NOMBRE_PERSONA"], $_POST["PRI_APELLIDO_PERSONA"], $_POST["SEG_APELLIDO_PERSONA"], $_POST["DIREC_PERSONA"], $_POST["CEL_PERSONA"], $_POST["CORREO_PERSONA"], $_POST["PASSWORD"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new PERSONA();
		$delete->Delete_PERSONA($_GET["PERSONA_ID"],$_GET["TIPDOC_ID"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= ($_GET["PERSONA_ID"] AND $_GET["TIPDOC_ID"]);
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>PERSONA</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->

<form action='#' method="post">
	<h2>NEW PERSONA</h2>
	<label>PERSONA_ID</label>
	<input type="text" name="PERSONA_ID" placeholder="PERSONA_ID" required>
	<label>TIPDOC_ID</label>
	<p><input type="text" name="TIPDOC_ID" required>
	<label>PRI_NOMBRE_PERSONA</label>
	<p><input type="text" name="PRI_NOMBRE_PERSONA" required>
	<label>SEG_NOMBRE_PERSONA</label>
	<p><input type="text" name="SEG_NOMBRE_PERSONA" required>
	<label>PRI_APELLIDO_PERSONA</label>
	<p><input type="text" name="PRI_APELLIDO_PERSONA" required>
	<label>SEG_APELLIDO_PERSONA</label>
	<p><input type="text" name="SEG_APELLIDO_PERSONA" required>
	<label>DIREC_PERSONA</label>
	<p><input type="text" name="DIREC_PERSONA" required>
	<label>CEL_PERSONA</label>
	<p><input type="text" name="CEL_PERSONA" required>
	<label>CORREO_PERSONA</label>
	<p><input type="text" name="CORREO_PERSONA" required>
	<label>PASSWORD</label>
	<p><input type="text" name="PASSWORD" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>