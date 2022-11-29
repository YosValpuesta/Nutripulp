<?php
include '../ConexionBD/Conexion.php';
$id = $_REQUEST['id'];
$productos = "SELECT * FROM productos WHERE id = '$id' ";
$resultado = $conexion->query($productos);
$mostrar = $resultado->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="Productos.css">
    <title>Modificar Registro</title>
</head>
<body>
<header> 
    <a href="Productos.php"><img src="../Img/Logo.png" id="Logo"></a>
</header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <form action="Modificar.php?id=<?php echo $mostrar['id']; ?>" method="POST" enctype="multipart/form-data">
                    <input type="text" REQUIRED class="form-control mb-3" name="Nombre" placeholder="Nombre" value="<?php echo $mostrar['Nombre']; ?>">
                    <input type="text" REQUIRED class="form-control mb-3" name="Precio" placeholder="Precio" value="<?php echo $mostrar['Precio']; ?>">
                    <input type="text" REQUIRED class="form-control mb-3" name="Existencia_L" placeholder="Existencia" value="<?php echo $mostrar['Existencia_L']; ?>">
                    <center><img width="170px" height="130px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>"></center><br><br>
                    <input type="file" REQUIRED class="form-control mb-3" name="Imagen" accept="image/*">
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
</html>