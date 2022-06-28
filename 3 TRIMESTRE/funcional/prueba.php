<?php include './layout/header.html'; ?>
<?php 

require_once 'model_marca.php';
require_once "./conexion/conexion.php";

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':
	
		$update = new MARCA();
		$update->Update_MARCA($_POST["MARCA_ID2"], $_POST["MARCA_ID"], $_POST["DESCRIP_MARCA"],$_POST["ESTADO_MARCA"]);
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
	}
	
}
?>

<!DOCTYPE html>
<html lanag="es">
<head>
	<title>MARCA</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

   <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h3>Nueva Marca</h3>
                <form action="insertar.php" method="POST">
                    <input type="number" class="form-control mb-3" name="MARCA_ID" placeholder="Marca_Id">
                    <input type="text" class="form-control mb-3" name="DESCRIP_MARCA" placeholder="Descrip_Marca">
                    <input type="number" class="form-control mb-3" name="ESTADO_MARCA" placeholder="Estado_Marca">

                   <p><input type="submit" value="Save" onclick= "this.form.action='?action=registrar';"/>
               </form>

            </div>
             <div class ="col-md-8">
             <h2>MARCA</h2>
             <table class="table">
                <thead class="table-sucess table-striped">
                    <tr>
                        <th>CODIGO_ID</th>
                        <th>DESCRIP_MARCA</th>
                        <th>ESTADO_MARCA</th>
                        <th></th>
                        <th></th>

                    </tr>
               </thead>
               <tbody>
               <?php
               		   $pdo=database::conectar();
                       $sql="select * from MARCA";
					   $marcas=$pdo->query($sql);
                       while ($marca = $marcas->fetch(PDO::FETCH_ASSOC)) {

                        ?>
                        <tr>
                        <td><?php echo $marca["MARCA_ID"]?><br></td>
                        <td><?php echo $marca["DESCRIP_MARCA"]?><br></td>
                        <td><?php echo $marca["ESTADO_MARCA"]?><br></td>
                        <th><a href="./editar.php?action=editar&MARCA_ID=<?php echo $marca['MARCA_ID'] ?>" class="btn btn-info">Editar</a></th>
                        <th><a href="?action=eliminar&MARCA_ID=<?php echo $marca['MARCA_ID'] ?>" onclick="return confirm('¿Esta seguro de eliminar este registro?')" class="btn btn-danger">Eliminar</a></th>



        
                </tr>
                <?php
                }
                ?>         

                </tbody>
</table>
            </div>
		
</body>
</html>
<?php include './layout/footer.html'; ?>