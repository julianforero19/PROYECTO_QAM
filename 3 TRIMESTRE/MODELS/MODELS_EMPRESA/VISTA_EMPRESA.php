<?php  

require_once 'model_empresa.php';
require_once 'Conexion.php';

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':

		$update = new EMPRESA();
		$update->Update_EMPRESA($_POST["EMPRESA_ID2"], $_POST["EMPRESA_ID"], $_POST["NOMBRE_EMPRESA"], $_POST["TEL_CONTACTO"]);
		break;
		

		case 'registrar':

		$insert = new EMPRESA();
		$inser->Insertar_EMPRESA($_POST["EMPRESA_ID"],$_POST["NOMBRE_EMPRESA"],$_POST["TEL_CONTACTO"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new EMPRESA();
		$delete->Delete_EMPRESA($_GET["EMPRESA_ID"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["EMPRESA_ID"];
	}
	
}
?>