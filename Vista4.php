<?php
session_start();
include("AgregarCarrito.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutripulp: Zarzamora</title>
    <script src="https://kit.fontawesome.com/2c4007a4a1.js" crossorigin="anonymous"></script> <!--IconosRedes-->
    <link rel="stylesheet" href="General.css">
    <link rel="stylesheet" href="VistaGeneral.css">
    <link rel="stylesheet" href="MenuPulpas.css".css>
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
        <br><br><img src="Zarzamora.png" width="350px" height="280px">
        <div class="info">
            <h4>Vendidos:</h4>
            <h1>Pulpa de Zarzamora</h1>
            <h2>Lt: $110.00</h2>
            <p>Producto más vendido</p>
        </div>
        <div class="info">
            <h4>Disponibles:</h4>
            <h2>Cantidad:</h2>
            <center><form class="formulario" action="Vista4.php" method="POST">
                <input type="hidden" name="txtProducto" value="Pulpa de Zarzamora">
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
            <a href="Vista12.php"><img src="Guayaba.png" alt=""></a>
        </div>
        <div class = "datos">
            <p>1Lt Pulpa de Guayaba</p>
            <p>$49</p>
        </div>
    </div>
    <div class = "galeria" >
        <div class = "foto">
            <a href="Vista6.php"><img src="Papaya.png" alt=""></a>
        </div>
        <div class = "datos">
            <p>1Lt Pulpa de Papaya</p>
            <p>$49</p>
        </div>
    </div>
    <div class = "galeria" >
        <div class = "foto">
            <a href="Vista2.php"><img src="BlueBerry.png" alt=""></a>
        </div>
        <div class = "datos">
            <p>1Lt Pulpa de Blueberry</p>
            <p>$110</p>
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