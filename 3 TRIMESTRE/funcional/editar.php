<?php 
    
     include './layout/header.html'; 


?>
<?php  
require_once 'model_marca.php';
require_once "./conexion/conexion.php";
if (isset($_REQUEST['action'])) 
{
  switch ($_REQUEST['action'])
  {
    case 'actualizar':
  
    $update = new MARCA();
    $update->Update_MARCA($_POST["MARCA_ID"], $_POST["MARCA_ID2"], $_POST["DESCRIP_MARCA"],$_POST["ESTADO_MARCA"]);
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

    break;
  }
  
}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Marca</title>
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
$sql="select * from MARCA where MARCA_ID ='$capt'";
$marcas=$pdo->query($sql);
while ($row=$marcas->fetch(PDO::FETCH_ASSOC)) 
{
?>
  <H2>Actualizar Marca</H2>
  <label>Marca</label>
  <input type="text" name="MARCA_ID" value="<?php echo $row["MARCA_ID"];?>" disabled>
  <input type="text" name="MARCA_ID2" value="<?php echo $row["MARCA_ID"];?> "placeholder="id_marca" disabled>
  <label>Nombre de la Marca</label>
  <input type="text" name="DESCRIP_MARCA" value="<?php echo $row["DESCRIP_MARCA"];?> "placeholder="Descrip_Marca" required>
  <p><label>Marca = Estado </label>
  <input type="number" class="form-control mb-3" name="ESTADO_MARCA" value="<?php echo $row["ESTADO_MARCA"];?> "placeholder="Estado_Marca">
<p><input class="submit-button" type="submit" name="Update" onclick= "this.form.action='?action=actualizar';"/>
  
</form>
</div>
<?php } ?>
</body>
</html>
<?php include './layout/footer.html'; ?>