<?php 
    
     include './layout/header.html'; 


?>
<?php 

require_once './model_categoria.php';
require_once './conexion/conexion.php' ;

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
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Categoria</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

</head>
<body>
<div>
<form action="#" method="post">
<?php 
$pdo=database::conectar();
$sql="select * from CATEGORIA where CATEGORIA_ID ='$capt'";
$categorias=$pdo->query($sql);
while ($row=$categorias->fetch(PDO::FETCH_ASSOC)) 
{
?>
  <H2>Actualizar Categoria</H2>
  <label>Categoria</label>
  <input type="text" name="CATEGORIA_ID" value="<?php echo $row["CATEGORIA_ID"];?>" disabled >
  <input type="text" name="CATEGORIA_ID2" value="<?php echo $row["CATEGORIA_ID"];?> "placeholder="id_categoria" disabled>
  <label>Nombre de la Categoria</label>
  <input type="text" name="DESC_CATEGORIA" value="<?php echo $row["DESC_CATEGORIA"];?> "placeholder="nombre" required>
  <p><label>Categoria = Estado </label>
  <input type="number" class="form-control mb-3" name="ESTADO_CATEGORIA" value="<?php echo $row["ESTADO_CATEGORIA"];?> "placeholder="Estado_Categoria">
<p><input class="btn btn-primary" type="submit" name="Update" onclick= "this.form.action='?action=actualizar';"/>
  
</form>
</div>
<?php } ?>
</body>
</html>
<?php include './layout/footer.html'; ?>