<?php 

require_once 'MODEL_TIPODOC.php';
require_once 'Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new TIPODOC();
		$update->Update_TIPODOC($_POST["TIPO_DOC"], $_POST["DESCRIP_TDOC"], $_POST["ESTODO_TIPO_DOC"],$_POST["TIPO_DOC2"]);
		break;
		

		case 'registrar':
		$insert =new TIPODOC();
		$insert->Insertar_TIPODOC($_POST["TIPO_DOC"], $_POST["DESCRIP_TDOC"],$_POST["ESTODO_TIPO_DOC"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new MARCA();
		$delete->Delete_TIPODOC($_GET["TIPO_DOC"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["TIPO_DOC"];
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>TIPODOC</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->
<!--multipart/from-data es necesario si sus usuarios deben subir un archivo a traves del formulario-->

<form action='#' method="post">
	<h2>NEW TIPODOC</h2>
	<label>TIPO_DOC</label>
	<input type="text" name="TIPO_DOC" placeholder="TIPO_DOC" required>
	<label>DESCRIP_TDOC</label>
	<p><input type="text" name="DESCRIP_TDOC" required>
	<label>ESTODO_TIPO_DOC</label>
	<p><input type="number" name="ESTODO_TIPO_DOC" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>