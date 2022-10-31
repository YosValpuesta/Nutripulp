<?php session_start();
include 'ConexionBD/Conexion.php';

$id = $_REQUEST['id'];

$productos = "SELECT * FROM productos WHERE id = '$id' ";
$resultado = $conexion->query($productos);
$mostrar = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutripulp: Fresa</title>
    <script src="https://kit.fontawesome.com/2c4007a4a1.js" crossorigin="anonymous"></script> <!--IconosRedes-->
    <link rel="stylesheet" href="General.css">
    <link rel="stylesheet" href="VistaProducto.css">
    
</head>
<body>

<header> 
    <img id="Logo" src="Logo.png" width="250px" height="165px"> 
    <input id="Barra" type="search" placeholder="Buscar"></i>
        <nav>
            <a href="">Yos Valpuesta</a>
            <a href="">Mis compras</a>
            <a href="MenuPulpas.php">Menú</a>
            <a href="MiCarrito.php"><img src="Carrito.png" alt="" width="40px" height="40px"></a>
        </nav>
</header>

    <br>
    <div class="producto">
        <br><br><img width="350px" height="280px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
        <div class="info">
            <h1><?php echo $mostrar["Nombre"]; ?></h1>
            <h2>Lt:$<?php echo $mostrar["Precio"]; ?></h2>
            <h4>Vendidos:</h4>
        </div>
        <div class="info">
            <h3>Disponibles: <?php echo $mostrar["Existencia_L"]; ?></h3>
            <h2>Cantidad:</h2>
            <center><form class="formulario" action="VistaProducto.php" method="POST">
                <input type="hidden" name="txtProducto" value="<?php echo $mostrar["Nombre"]; ?>">
                <input class="cantidad" type="number" name="txtCantidad" value="1"><br><br><br> 
                <input class="botones" type="submit" value="Agregar al carrito" name="btnAgregar"><br><br>
                <input class="botones" type="submit" value="Comprar ahora" name="btnComprar">
            </form></center>
        </div>
    </div>
    
    <h1>Productos similares</h1>

    <footer>
        <div class="grupo1">
            <div class="box">
                <center><h2>Contacto</h2></center>
                <p>Whatsapp: 5575625202
                   Telefono: 55 5603 3859</p>
                <p>Email: ventas@nutripulp.com</p>
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