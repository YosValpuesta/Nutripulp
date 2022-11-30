<?php
include '../ConexionBD/Conexion.php';
$resultado = $conexion -> query("SELECT * FROM productos ORDER BY RAND() limit 4") or die ($conexion -> error);
?>

<!DOCTYPE html>
<head>
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="../Productos/General.css">
    <link rel="stylesheet" href="../SliderImg/Slider.css">
    <link rel="stylesheet" href="../Productos/MenuPulpas.css">
    <title>Home:Nutripulp</title>
</head>
<body>
    <?php include '../Nav/Header.php' ?>
    <div class = "slider">
        <ul>
            <li><img src="../SliderImg/Slider1.jpg"></li>
            <li><img src="../SliderImg/Slider2.jpg"></li>
            <li><img src="../SliderImg/Slider3.jpg"></li>
            <li><img src="../SliderImg/Slider4.jpg"></li>
        </ul>
    </div>
    <h1>Productos en venta</h1>
    <?php
        while ($mostrar = mysqli_fetch_array($resultado)) { 
    ?>
    <div class="productos">
        <div class = "galeria" >
            <div class = "foto">
                <img width="130px" height="90px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
            </div>
            <div class = "datos">
                <p id="nombre">1Lt <?php echo $mostrar["Nombre"]; ?></p>
                <p id="precio">$<?php echo number_format($mostrar["Precio"], 2, '.', ''); ?><p><br>
                <form class="boton1" action="VistaProducto.php?id=<?php echo $mostrar['id']; ?>" method="POST" enctype="multipart/form-data">
                    <input class="boton" type="submit" value="Ver producto" name="btnVer">
                </form>
            </div>
        </div>
    <?php
        } 
    ?>
    </div>
    <?php include '../Footer/Footer.php' ?>
</body>
</html>