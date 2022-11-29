<?php
include '../ConexionBD/Conexion.php';
if (isset($_GET['id'])) {
    $resultado = $conexion -> query("SELECT * FROM productos WHERE id = " .$_GET['id']) or die ($conexion -> error);
    if (mysqli_num_rows($resultado) > 0) {
        $mostrar = mysqli_fetch_row($resultado);
    } else {
        header("Location: ../Productos/MenuPulpas.php");
    }
} else {
    header("Location: ../Productos/MenuPulpas.php");
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
    <link rel="stylesheet" href="../Productos/VistaProducto.css">
    <title>Nutripulp: <?php echo $mostrar[1]; ?></title>
</head>
<body>
    <?php include '../Nav/Header.php' ?>
    <br>
    <div class="producto">
        <div class="imagen">
            <h6 align="right" >Vendidos:</h6>
            <br><br><img id="pulpa" src="data:image/png;base64,<?php echo base64_encode($mostrar[4]); ?>">
        </div>
        <div class="info">
            <h1><?php echo $mostrar[1]; ?></h1>
            <h2>Lt:$<?php echo number_format($mostrar[2], 2, '.', ''); ?></h2>
        </div>
        <div class="info">
            <h4>Disponibles: <?php echo $mostrar[3]; ?></h4>
            <center>
                <div class="formulario">
                <h2 align="left">Cantidad:</h2>    
                <form action="../Carrito/Carrito.php?id=<?php echo $mostrar[0]; ?>" method="POST">
                        <input class="cantidad" type="number" name="cantidad" REQUIRED value="0">
                        <br><br>
                        <input class="btncarrito" type="submit" name="btnAñadir" value="Agregar al carrito">
                    </form>
                </div>
            </center>
        </div>
    </div>
    <h1 id="proSimilares">Productos similares</h1>
    <?php
        $resultado = $conexion -> query ("SELECT * FROM productos WHERE id != $mostrar[0] ORDER BY RAND() limit 4 ") or die ($conexion -> error);
        while ($mostrar = mysqli_fetch_array($resultado)) { 
    ?>
        <div class = "galeria" >
            <div class = "foto">
                <img width="130px" height="90px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
            </div>
            <div class = "datos">
                <p id="nombre">1Lt <?php echo $mostrar["Nombre"]; ?></p>
                <p id="precioMenu">$<?php echo number_format($mostrar["Precio"], 2, '.', ''); ?></p>
                <form class="boton1" action="VistaProducto.php?id=<?php echo $mostrar['id']; ?>" method="POST" enctype="multipart/form-data">
                    <input class="boton" type="submit" value="Ver producto" name="btnVer">
                </form>
            </div>
        </div>
    <?php
        } 
    ?>
    <?php include '../Footer/Footer.php' ?>
</body>
</html>