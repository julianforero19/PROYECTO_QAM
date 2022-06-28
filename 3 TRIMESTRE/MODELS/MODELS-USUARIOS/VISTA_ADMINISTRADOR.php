<?php 

require_once 'MODEL_ADMINISTRADOR.PHP';
require_once'Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new ADMINISTRADOR();
		$update->Update_ADMINISTRADOR($_POST["ADMINISTRADOR_ID"], $_POST["ADMINISTRADOR_ID2"], $_POST["ADMINISTRADOR_TDOC"],$_POST["ADMINISTRADOR_TDOC2"]);
		break;
		

		case 'registrar':
		$insert =new ADMINISTRADOR();
		$insert->insertar_ADMINISTRADOR($_POST["ADMINISTRADOR_ID"], $_POST["ADMINISTRADOR_TDOC"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new ADMINISTRADOR();
		$delete->Delete_ADMINISTRADOR($_GET["ADMINISTRADOR_ID"],$_GET["ADMINISTRADOR_TDOC"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["ADMINISTRADOR_ID"] AND $_GET["ADMINISTRADOR_TDOC"];
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>ADMINISTRADOR</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->
<!--multipart/from-data es necesario si sus usuarios deben subir un archivo a traves del formulario-->

<form action='#' method="post">
	<h2>NEW ADMINISTRADOR</h2>
	<label>ADMINISTRADOR_ID</label>
	<input type="text" name="ADMINISTRADOR_ID" placeholder="ADMINISTRADOR_ID" required>
	<label>ADMINISTRADOR_TDOC</label>
	<p><input type="text" name="ADMINISTRADOR_TDOC" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>