<?php
//include 'Busqueda.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2c4007a4a1.js" crossorigin="anonymous"></script> <!--IconosRedes-->
    <link rel="stylesheet" href="Principal.css">
    <link rel="stylesheet" href="General.css">
    <link rel="stylesheet" href="MenuPulpas.css">
    <title>Nutripulp</title>
</head>
<body>
<header> 
    <img id="Logo" src="Logo.png" width="250px" height="165px"> 
    <form action="" method="GET">
        <input id="busqueda" type="search" placeholder="Buscar" name="busqueda"><input id="btnbuscar" type="submit" name="buscar" value="Buscar">
    </form>
        <nav>
            <a href="">Yos Valpuesta</a>
            <a href="">Mis compras</a>
            <a href="MenuPulpas.html">Menú</a>
            <a href="MiCarrito.php"><img src="Carrito.png" alt="" width="40px" height="40px"></a>
        </nav>
</header>
    <div class = "slider">
        <ul>
            <li><img src="Slider1.jpg" alt=""></li>
            <li><img src="Slider2.jpg" alt=""></li>
            <li><img src="Slider3.jpg" alt=""></li>
            <li><img src="Slider4.jpg" alt=""></li>
        </ul>
    </div>
    <h1>Productos más vendidos</h1>
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
    <div class = "galeria" >
        <div class = "foto">
            <a href="Vista1.php"><img src="Fresa.png" alt=""></a>
        </div>
        <div class = "datos">
            <p>1Lt Pulpa de Fresa</p>
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