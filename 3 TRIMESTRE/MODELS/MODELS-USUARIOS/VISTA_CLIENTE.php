<?php 

require_once 'MODEL_CLIENTE.php';
require_once'./Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new CLIENTE();
		$update->Update_CLIENTE($_POST["CLIENTE_ID"], $_POST["CLIENTE_TDOC"], $_POST["CLIENTE_TDOC2"],$_POST["CLIENTE_ID2"]);
		break;
		

		case 'registrar':
		$insert =new CLIENTE();
		$insert->Insertar_CLIENTE($_POST["CLIENTE_ID"], $_POST["CLIENTE_TDOC"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new CLIENTE();
		$delete->Delete_CLIENTE($_GET["CLIENTE_ID"],$_GET["CLIENTE_TDOC"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= ($_GET["CLIENTE_ID"] AND $_GET["CLIENTE_TDOC"]);
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>CLIENTE</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->

<form action='#' method="post">
	<h2>NEW CLIENTE</h2>
	<label>CLIENTE_ID</label>
	<input type="text" name="CLIENTE_ID" placeholder="CLIENTE_ID" required>
	<label>CLIENTE_TDOC</label>
	<p><input type="text" name="CLIENTE_TDOC" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>