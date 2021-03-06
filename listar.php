<?php include_once "encabezado.php" ?>

<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
	header("location: index.php");
}else{

?>

	<div class="container py-5">
	
		<div class="col-xs-12">
			<h1>Productos</h1>
			<div>
				<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
			
				<a class="btn btn-danger" href="./reportes/reporteProductos.php">Reporte productos <i class="fa fa-list"></i></a>
			</div>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Código</th>
						<th>Descripción</th>
						<th>Precio de compra</th>
						<th>Precio de venta</th>
						<th>Existencia</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($productos as $producto){ ?>
					<tr>
						<td><?php echo $producto->id ?></td>
						<td><?php echo $producto->codigo ?></td>
						<td><?php echo $producto->descripcion ?></td>
						<td><?php echo "$". $producto->precioCompra ?></td>
						<td><?php echo "$". $producto->precioVenta ?></td>
						<td><?php echo $producto->existencia ?></td>
						<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>"><i class="fa fa-edit"></i></a></td>
						<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>"><i class="fa fa-trash"></i></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

<?php include_once "pie.php" ?>

<?php } ?>