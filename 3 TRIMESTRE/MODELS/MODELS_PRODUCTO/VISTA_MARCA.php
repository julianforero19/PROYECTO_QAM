<?php 

require_once 'model_marca.php';
require_once'../Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new MARCA();
		$update->Update_MARCA($_POST["MARCA_ID2"], $_POST["MARCA_ID"], $_POST["DESCRIP_MARCA"],$_POST["ESTADO_MARCA"]);
		break;
		

		case 'registrar':
		$insert =new MARCA();
		$insert->Insertar_MARCA($_POST["MARCA_ID"], $_POST["DESCRIP_MARCA"],$_POST["ESTADO_MARCA"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new MARCA();
		$delete->Delete_MARCA($_GET["MARCA_ID"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["MARCA_ID"];
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>MARCA</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->
<!--multipart/from-data es necesario si sus usuarios deben subir un archivo a traves del formulario-->

<form action='#' method="post">
	<h2>NEW MARCA</h2>
	<label>MARCA_ID</label>
	<input type="text" name="MARCA_ID" placeholder="MARCA_ID" required>
	<label>DESCRIP_MARCA</label>
	<p><input type="text" name="DESCRIP_MARCA" required>
	<label>ESTADO</label>
	<p><input type="text" name="ESTADO_MARCA" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>