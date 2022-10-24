<?php
include '../ConexionBD/Conexion.php';
$conexion = conectar();

$id = $_REQUEST['id'];

$productos = "SELECT * FROM productos WHERE Id_producto = '$id'";
$resultado = $conexion->query($productos);
$mostrar = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Actualizar</title>
</head>
<body>
<div class="container mt-5"> 
    <form action="Update.php" method="POST">
        <input type="hidden" name="Id_producto" value="<?php echo $mostrar['Id_producto'] ?>">
        <input type="text" class="form-control mb-3" name="Nombre" placeholder="Nombre" value="<?php echo $mostrar['Nombre']?>">
        <input type="text" class="form-control mb-3" name="Precio" placeholder="Precio" value="<?php echo $mostrar['Precio']?>">
        <input type="text" class="form-control mb-3" name="Existencia_L" placeholder="Existencia" value="<?php echo $mostrar['Existencia_L']?>">
        <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
    </form>
</div>
</body>
</html>