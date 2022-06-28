<?php 

require_once 'MODEL_ROLES.PHP';
require_once'Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new ROLES();
		$update->Update_ROLES($_POST["ROL_ID"], $_POST["DESCRIP_ROL"], $_POST["ROL_ID2"]);
		break;
		

		case 'registrar':
		$insert =new ROLES();
		$insert->Insertar_ROLES($_POST["ROL_ID"], $_POST["DESCRIP_ROL"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new ROLES();
		$delete->Delete_ROLES($_GET["ROL_ID"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["ROL_ID"];
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>ROLES</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->

<form action='#' method="post">
	<h2>NEW ROLES</h2>
	<label>ROL_ID</label>
	<input type="text" name="ROL_ID" placeholder="ROL_ID" required>
	<label>DESCRIP_ROL</label>
	<p><input type="text" name="DESCRIP_ROL" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>