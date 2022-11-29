<?php
include '../ConexionBD/Conexion.php';
$resultado = $conexion -> query("SELECT * FROM productos WHERE Nombre LIKE '%".$_GET['busqueda']."%' 
                                OR Precio LIKE '%".$_GET['busqueda']."%' ") or die ($conexion -> error);
if (!isset($_GET['busqueda'])) {
    header("Location: Index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="../Productos/General.css">
    <link rel="stylesheet" href="../Productos/MenuPulpas.css">
    <title>Nutripulp</title>
</head>
<body>
    <?php include '../Nav/Header.php' ?>
    <h1 id="busquedah1">Buscando resultados para:  "<?php echo $_GET['busqueda']; ?>"</h1>
    <?php
        if (mysqli_num_rows($resultado) > 0) {
        while ($mostrar = mysqli_fetch_array($resultado)) { 
    ?>
        <div class = "galeria" >
            <div class = "foto">
                <img width="130px" height="90px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
            </div>
            <div class = "datos">
                <p id="nombre">1Lt <?php echo $mostrar["Nombre"]; ?></p>
                <p id="precioBusqueda">$<?php echo $mostrar["Precio"]; ?><p> 
                <form class="boton1" action="../Productos/VistaProducto.php?id=<?php echo $mostrar['id']; ?>" method="POST" enctype="multipart/form-data">
                    <input class="boton" type="submit" value="Ver producto" name="btnVer">
                </form>
            </div>
        </div>
    <?php
        } //Fin While 
    } else {
        echo '<h1>Sin resultados</h1>';
    }
    ?>
    <br><br><br><br><br><br><br><br><br><br>
    <?php include '../Footer/Footer.php' ?>
</body>
</html>