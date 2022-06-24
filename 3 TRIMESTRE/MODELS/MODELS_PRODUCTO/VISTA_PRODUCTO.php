<?php  

require_once 'model_categoria.php';
require_once 'Conexion.php';

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':

		//Espacio que genera el almacenamiento de las imagenes

		$file = $_FILES['IMAGEN_PRODUCTO']['name'];
		$ruta_file = $FILES['IMAGEN_PRODUCTO']['tmp_name'];
		$file_foto = "imagenes/".$file; //ubicacion

		//Se copia archivo a la carpeta
		copy($ruta_file, $file_foto);

		$update = new PRODUCTO();
		$update->Update_PRODUCTO($_POST["PRODUCTO_ID2"], $_POST["PRODUCTO_ID"], $_POST["DESCRIP_PRODUCTO"], $_POST["VALOR_COMPRAUNI"], $_POST["VALOR_VENTAUNI"],$_POST["CANTIDAD_EXIST"],$_POST["CANTIDA_MIN"],$_POST["CANTIDAD_MAX"],$_POST["FECHA_CADUCIDAD"],$_POST["MARCA_PRODUCTO"],$_POST["CATEGORIA_PRODUCTO"],$_POST["IMAGEN_PRODUCTO"]);
		break;
		

		case 'registrar':

		//Espacio que genera el almacenamiento de las imagenes

		$file = $_FILES['IMAGEN_PRODUCTO']['name'];
		$ruta_file = $FILES['IMAGEN_PRODUCTO']['tmp_name'];
		$file_foto = "imagenes/".$file; //ubicacion

		//Se copia archivo a la carpeta
		copy($ruta_file, $file_foto);

		$insert = new PRODUCTO();
		$inser->Insertar_PRODUCTO($_POST["PRODUCTO_ID"], $_POST["DESCRIP_PRODUCTO"], $_POST["VALOR_COMPRAUNI"], $_POST["VALOR_VENTAUNI"],$_POST["CANTIDAD_EXIST"],$_POST["CANTIDA_MIN"],$_POST["CANTIDAD_MAX"],$_POST["FECHA_CADUCIDAD"],$_POST["MARCA_PRODUCTO"],$_POST["CATEGORIA_PRODUCTO"],$_POST["IMAGEN_PRODUCTO"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new PRODUCTO();
		$delete->Delete_PRODUCTO($_GET["PRODUCTO_ID"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["PRODUCTO_ID"];
	}
	
}
?>