<?php include './layout/header.html'; ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">Table</div>
    <div class="card-body">
     <div class="table-responsive">
         <table id="producto" class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#PRODUCTO</th>
            <th>DESCRIPCION</th>
            <th>COMPRA UNITARIO</th>
            <th>VENTA UNITARIO</th>
            <th>CANTIDAD EXISTENTE</th>
            <th>CANTIDAD MINIMA</th>
            <th>CANTIDAD MAXIMA</th>
            <th>FECHA CADUCIDAD</th>
            <th>MARCA PRODUCTO</th>
            <th>CATEGORIA PRODUCTO</th>
        </tr>
    </thead>
<tbody>
<?php 
require_once "./conexion/conexion.php";
$pdo=database::conectar();
$sql="select * from PRODUCTO";
$productos=$pdo->query($sql);
while ($producto = $productos->fetch(PDO::FETCH_ASSOC)) {

?>
<tr>
   <td><?php echo $producto["PRODUCTO_ID"]?></td>
    <td><?php echo $producto["DESCRIP_PRODUCTO"]?></td>
    <td><?php echo $producto["VALOR_COMPRAUNI"]?></td>
    <td><?php echo $producto["VALOR_VENTAUNI"]?></td>
    <td><?php echo $producto["CANTIDAD_EXIST"]?></td>
    <td><?php echo $producto["CANTIDAD_MIN"]?></td>
    <td><?php echo $producto["CANTIDAD_MAX"]?></td>
    <td><?php echo $producto["FECHA_CADUCIDAD"]?></td>
    <td><?php echo $producto["MARCA_PRODUCTO"]?></td>
    <td><?php echo $producto["CATEGORIA_PRODUCTO"]?></td>
</tr>
<?php 
} ?>
</tbody>
</table>
     </div>   
    </div>
</div>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript">
        var table = $('#producto').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando START a END de TOTAL Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de MAX total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar MENU Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });
        $(document).ready(function() {
          $('#producto').DataTable();
        });
    </script>
<?php include './layout/footer.html'; ?>
