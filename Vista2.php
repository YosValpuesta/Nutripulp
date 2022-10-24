<?php
session_start();
include("AgregarCarrito.php");

include 'ConexionBD/Conexion.php';
$conexion = conectar();

$productos = "SELECT * FROM productos WHERE Id_producto = 2";
$resultado = $conexion->query($productos);
$mostrar = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutripulp: BlueBerry</title>
    <script src="https://kit.fontawesome.com/2c4007a4a1.js" crossorigin="anonymous"></script> <!--IconosRedes-->
    <link rel="stylesheet" href="General.css">
    <link rel="stylesheet" href="VistaGeneral.css">
    <link rel="stylesheet" href="MenuPulpas.css">
</head>
<body>
    <header> 
        <img id="Logo" src="Logo.png" width="250px" height="165px"> 
        <input id="Barra" type="search" placeholder="Buscar"><i class="fa-solid fa-magnifying-glass"></i>
            <nav>
                <a href="">Yos Valpuesta</a>
                <a href="">Mis compras</a>
                <a href="MenuPulpas.html">Menú</a>
                <a href="MiCarrito.php"><img src="Carrito.png" alt="" width="40px" height="40px"></a>
            </nav>
    </header>
    <br>
    <div class="producto">
    <br><br><img width="350px" height="280px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
        <div class="info">
            <h4>Vendidos:</h4>
            <h1><?php echo $mostrar["Nombre"]; ?></h1>
            <h2>Lt: $ <?php echo $mostrar["Precio"]; ?></h2>
        </div>
        <div class="info">
            <h4>Disponibles: <?php echo $mostrar["Existencia_L"]; ?></h4>
            <h2>Cantidad:</h2>
            <center><form class="formulario" action="Vista2.php" method="POST">
                <input type="hidden" name="txtProducto" value="Pulpa de Blueberry">
                <input class="cantidad" type="number" name="txtCantidad" value="1"><br><br><br>
                <input type="hidden" name="txtPrecio" value="110">
                <input class="botones" type="submit" value="Agregar al carrito" name="btnAgregar"><br><br>
                <input class="botones" type="submit" value="Comprar ahora" name="btnComprar">
            </form></center>
        </div>
    </div>
    <h1>Productos similares</h1>
    <div class = "galeria" >
        <div class = "foto">
            <a href="Vista7.php"><img src="Jamaica.png" alt=""></a>
        </div>
        <div class = "datos">
            <p>1Lt Pulpa de Jamaica</p>
            <p>$55</p>
        </div>
    </div>
    <div class = "galeria" >
        <div class = "foto">
            <a href="Vista4.php"><img src="Zarzamora.png" alt=""></a>
        </div>
        <div class = "datos">
            <p>1Lt Pulpa de Zarzamora</p>
            <p>$110</p>
        </div>
    </div>
    <div class = "galeria" >
        <div class = "foto">
            <a href="Vista12.php"><img src="Guayaba.png" alt=""></a>
        </div>
        <div class = "datos">
            <p>1Lt Pulpa de Guayaba</p>
            <p>$49</p>
        </div>
    </div>
    <div class = "galeria" >
        <div class = "foto">
            <a href="Vista8.php"><img src="Tamarindo.png" alt=""></a>
        </div>
        <div class = "datos">
            <p>1Lt Pulpa de Tamarindo</p>
            <p>$49</p>
        </div>
    </div>
    <footer>
        <div class="grupo1">
            <div class="box">
                <center><h2>SOBRE NOSOTROS</h2></center>
                <p>Nutripulp es una empresa mexicana dedicada a la
                venta de pulpas de fruta natural.</p>
                <p>Entrega gratis desde $595</p>
            </div>
            <div class="box">
                <h2>SIGUENOS EN REDES</h2>
                <div class="redes">
                    <a href="https://www.facebook.com/nutripulpmx" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/nutripulp/" target="_blank" class="fa fa-instagram"></a>
                    <a href="https://twitter.com/NutriPulp" target="_blank" class="fa fa-twitter"></a>
                </div>
            </div>
        </div>
        <div class="grupo2">
            <small>&copy; 2022 <b>Nutripulp</b> -Todos los Derechos Reservados.</small>
        </div>
    </footer>

</body>
</html>