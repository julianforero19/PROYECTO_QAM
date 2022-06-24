<?php  

require_once 'model_proveedor.php';
require_once 'Conexion.php';

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':

		$update = new PROVEEDOR();
		$update->Update_PROVEEDOR($_POST["PROVEEDOR_ID"],
	$_POST["PROVEEDOR_TDOC"],$_POST["PRI_NOMBRE_PROVEEDOR"],$_POST["SEG_NOMBRE_PROVEEDOR"],$_POST["PRI_APELLIDO_PROVEEDOR"],$_POST["SEG_APELLIDO_PROVEEDOR"],$_POST["EMPRESA_MARCA"],$_POST["PROVEEDOR_ID2"]);
		break;
		

		case 'registrar':

		$insert = new PROVEEDOR();
		$inser->Insertar_PROVEEDOR($_POST["PROVEEDOR_ID"],$_POST["PROVEEDOR_TDOC"],$_POST["PRI_NOMBRE_PROVEEDOR"],$_POST["SEG_NOMBRE_PROVEEDOR"],$_POST["PRI_APELLIDO_PROVEEDOR"],$_POST["SEG_APELLIDO_PROVEEDOR"],$_POST["EMPRESA_MARCA"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new PROVEEDOR();
		$delete->Delete_PROVEEDOR($_GET["PROVEEDOR_ID"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["PROVEEDOR_ID"];
	}
	
}
?>