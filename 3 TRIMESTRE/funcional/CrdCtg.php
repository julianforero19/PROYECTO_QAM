<?php include './layout/header.html'; ?>
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
<html lanag="es">
<head>
	<title>CATEGORIA</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

   <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h3>Nueva Categoria</h3>
                <form action="insertar.php" method="POST">
                    <input type="number" class="form-control mb-3" name="CATEGORIA_ID" placeholder="Categoria_Id">
                    <input type="text" class="form-control mb-3" name="DESC_CATEGORIA" placeholder="Nombre">
                    <input type="number" class="form-control mb-3" name="ESTADO_CATEGORIA" placeholder="Estado_Categoria">

                   <p><input type="submit" class="btn btn-primary" value="Save" onclick= "this.form.action='?action=registrar';"/>
               </form>

            </div>
             <div class ="col-md-8">
             <h2>CATEGORIA</h2>
             <table class="table">
                <thead class="table-sucess table-striped">
                    <tr>
                        <th>CATEGORIA_ID</th>
                        <th>NOMBRE</th>
                        <th>ESTADO_CATEGORIA</th>
                        <th></th>
                        <th></th>

                    </tr>
               </thead>
               <tbody>
               <?php
               		   $pdo=database::conectar();
                       $sql="select * from CATEGORIA";
					   $categorias=$pdo->query($sql);
                       while ($categoria = $categorias->fetch(PDO::FETCH_ASSOC)) {

                        ?>
                        <tr>
                        <td><?php echo $categoria["CATEGORIA_ID"]?><br></td>
                        <td><?php echo $categoria["DESC_CATEGORIA"]?><br></td>
                        <td><?php echo $categoria["ESTADO_CATEGORIA"]?><br></td>
                        <th><a href="./editar_categoria.php?action=editar&CATEGORIA_ID=<?php echo $categoria['CATEGORIA_ID'] ?>" class="btn btn-info">Editar</a></th>
                        <th><a href="?action=eliminar&CATEGORIA_ID=<?php echo $categoria['CATEGORIA_ID'] ?>" onclick="return confirm('¿Esta seguro de eliminar este registro?')" class="btn btn-danger">Eliminar</a></th>



        
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