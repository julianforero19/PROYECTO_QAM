<?php 

require_once 'MODEL_EMPLEADO.php';
require_once './Conexion.php' ;

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new EMPLEADO();
		$update->Update_EMPLEADO($_POST["EMPLEADO_ID"], $_POST["EMPLEADO_ID2"], $_POST["EMPLEADO_TDOC"],$_POST["EMPLEADO_TDOC2"],$_POST["SUELDO_EMPLEADO"]);
		break;
		

		case 'registrar':
		$insert =new EMPLEADO();
		$insert->Insertar_EMPLEADO($_POST["EMPLEADO_ID"], $_POST["EMPLEADO_TDOC"],$_POST["SUELDO_EMPLEADO"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new EMPLEADO();
		$delete->Delete_EMPLEADO($_GET["EMPLEADO_ID"],$_GET["EMPLEADO_TDOC"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["EMPLEADO_ID"] AND $_GET["EMPLEADO_TDOC"];
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>EMPLEADO</title>
</head>
<body>

<div>
<!--Formulario nuevo registro-->

<form action='#' method="post">
	<h2>NUEVO EMPLEADO</h2>
	<label>EMPLEADO_ID</label>
	<input type="text" name="EMPLEADO_ID" placeholder="EMPLEADO_ID" required>
	<label>EMPLEADO_TDOC</label>
	<p><input type="text" name="EMPLEADO_TDOC" required>
	<label>SUELDO_EMPLEADO</label>
	<p><input type="number" name="SUELDO_EMPLEADO" required>
		<p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>

</form>
</div>
</body>
</html>