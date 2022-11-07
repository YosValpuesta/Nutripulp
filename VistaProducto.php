<?php
include 'ConexionBD/Conexion.php';
if (isset($_GET['id'])) {
    $resultado = $conexion -> query("SELECT * FROM productos WHERE id = " .$_GET['id']) or die ($conexion -> error);
    if (mysqli_num_rows($resultado) > 0) {
        $mostrar = mysqli_fetch_row($resultado);
    } else {
        header("Location: MenuPulpas.php");
    }
} else {
    header("Location: MenuPulpas.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Img/Logo.png">
    <title>Nutripulp: Fresa</title>
    <script src="https://kit.fontawesome.com/2c4007a4a1.js" crossorigin="anonymous"></script> <!--IconosRedes-->
    <link rel="stylesheet" href="General.css">
    <link rel="stylesheet" href="VistaProducto.css">
    
</head>
<body>

<header> 
    <img id="Logo" src="Img/Logo.png" width="250px" height="165px"> 
    <form action="Busqueda.php" method="GET">
        <input id="busqueda" type="search" placeholder="Buscar" name="busqueda">
    </form>
        <nav>
            <a href="">Yos Valpuesta</a>
            <a href="">Mis compras</a>
            <a href="MenuPulpas.php">Menú</a>
            <a href="Carrito/Carrito.php"><img src="Img/Carrito.png" alt="" width="40px" height="40px"></a>
        </nav>
</header>

    <br>
    <div class="producto">
        <br><br><img width="350px" height="280px" src="data:image/png;base64,<?php echo base64_encode($mostrar[4]); ?>">
        <div class="info">
            <h1><?php echo $mostrar[1]; ?></h1>
            <h2>Lt:$<?php echo number_format($mostrar[2], 2, '.', ''); ?></h2>
            <h4>Vendidos:</h4>
        </div>
        <div class="info">
            <h3>Disponibles: <?php echo $mostrar[3]; ?></h3>
            <h2>Cantidad:</h2>
            <center><div class="formulario">
                <!--<div class="divCantidad">
                    <div class="boton menos">-</div>
                        <input class="cantidad" type="text" name="cantidad" id="1" value="1" >
                    <div class="boton mas">+</div>
                </div>-->
                <a href="Carrito/Carrito.php?id=<?php echo $mostrar[0]; ?>"><input class="botones" type="submit" value="Agregar al carrito" name="btnAgregar"></a><br><br>
                <!--<input class="botones" onclick="window.location='Comprar.php'" type="submit" value="Comprar ahora" name="btnComprar"></a>-->
            </div></center>
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

    <!--Cantidad-->
    <script>
        var incrementBoton = document.getElementsByClassName('mas');
        var decrementBoton = document.getElementsByClassName('menos');
        //Increment
        for (var i = 0; i < incrementBoton.length; i++) {
            var boton = incrementBoton[i];
            boton.addEventListener('click', function(event) {
                var botonClicked = event.target;
                var input = botonClicked.parentElement.children[1];
                var inputValue = input.value;
                var newValue = parseInt(inputValue) + 1;
                input.value = newValue;
            })
        }
        //Decrement
        for (var i = 0; i < decrementBoton.length; i++) {
            var boton = decrementBoton[i];
            boton.addEventListener('click', function(event) {
                var botonClicked = event.target;
                var input = botonClicked.parentElement.children[1];
                var inputValue = input.value;
                var newValue = parseInt(inputValue) - 1;
                if (newValue >= 1) {
                    input.value = newValue;
                } else {
                    input.value = 1;
                }
            })
        }
    </script>

</body>
</html>