<?php 

require_once '../MODELS_PRODUCTO/model_categoria.php';
require_once'../Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new CATEGORIA();
		$update->Update_CATEGORIA($_POST["CATEGORIA_ID2"], $_POST["CATEGORIA_ID"], $_POST["DESC_CATEGORIA"],$_POST["ESTADO_CATEGORIA"]);
		break;
		

		case 'registrar':
		$insert =new CATEGORIA();
		$insert->Insertar_CATEGORIA($_POST["CATEGORIA_ID"], $_POST["DESC_CATEGORIA"],$_POST["ESTADO_CATEGORIA"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new CATEGORIA();
		$delete->Delete_CATEGORIA($_GET["CATEGORIA_ID"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["CATEGORIA_ID"];
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>CATEGORIA</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->

<form action='#' method="post">
	<h2>NEW CATEGORIA</h2>
	<label>CATEGORIA_ID</label>
	<input type="text" name="CATEGORIA_ID" placeholder="CATEGORIA_ID" required>
	<label>DESC_CATEGORIA</label>
	<p><input type="text" name="DESC_CATEGORIA" required>
	<label>ESTADO_CATEGORIA</label>
	<p><input type="number" name="ESTADO_CATEGORIA" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>