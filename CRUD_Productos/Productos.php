<?php
include '../ConexionBD/Conexion.php';
$productos = "SELECT * FROM productos";
$resultado = $conexion->query($productos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="Productos.css">
    <link rel="stylesheet" href="../General.css">
    <title>Productos Nutripulp</title>
</head>
<body>
<header> 
    <img id="Logo" src="Logo.png" width="230px" height="145px">
</header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h1>Agregar</h1>
                <form action="Insertar.php" method="POST" enctype="multipart/form-data">
                    <input type="text" REQUIRED class="form-control mb-3" name="Nombre" placeholder="Nombre">
                    <input type="text" REQUIRED class="form-control mb-3" name="Precio" placeholder="Precio">
                    <input type="text" REQUIRED class="form-control mb-3" name="Existencia_L" placeholder="Existencia">
                    <input type="file" REQUIRED class="form-control mb-3" name="Imagen" accept="image/*">
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <h1>Productos registrados</h1>
                <center><table  cellspacing="6" cellpadding="6" border="12">
                    <tr> 
                        <td class="encabezado">ID</td>
                        <td class="encabezado">Nombre</td>
                        <td class="encabezado">Precio</td>
                        <td class="encabezado">Existencia</td>
                        <td class="encabezado">Imagen</td>
                        <td class="encabezado"></td>
                        <td class="encabezado"></td>
                    </tr>
            <?php
                while ($mostrar = $resultado->fetch_assoc()) { 
            ?>
                    <tr>
                        <td><?php echo $mostrar["id"]; ?></td>
                        <td><?php echo $mostrar["Nombre"]; ?></td>
                        <td>$<?php echo $mostrar["Precio"]; ?></td>
                        <td><?php echo $mostrar["Existencia_L"]; ?> Lts</td>
                        <td><img width="130px" height="90px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>"></td>
                        <td><a href="VistaModificar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Modificar</a></td>
                        <td><a href="Eliminar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-danger">Eliminar</a></td>
                    </tr>
            <?php
                } 
            ?>
                </table></center>
            </div>
        </div>
    </div>
</body>
</html>