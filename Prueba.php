<?php
include 'ConexionBD/Conexion.php';
$resultado = $conexion -> query("SELECT * FROM productos WHERE id <= 4 ORDER BY id DESC") or die ($conexion -> error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutripulp</title>
    <link rel="icon" href="Img/Logo.png">
    <link rel="stylesheet" href="SliderImg/Slider.css">
    <link rel="stylesheet" href="General.css">
    <link rel="stylesheet" href="MenuPulpas.css">
</head>
<body>
    <header> 
        <a href="../Principal.php"><img src="../Img/Logo.png" id="Logo" width="172px" height="115px"></a>
        <nav>
            <ul>
                <div id="barra">
                    <li><a href="#"><img src="../Img/Carrito.png" id="Carrito"></a></li>
                    <li><a href="../MenuPulpas.php">Menú</a></li>
                    <li><a href="../empresa/empresa.php">Empresa</a></li>
                    <li><a href="###">Mis Compras</a></li>
                    <li><a href="###">Yos Valpuesta</a></li>
                    <li class="accion"><a href="#"><ion-icon name="person-circle-outline"></ion-icon></a>
                    <div class="mostrar">
                        <a href="###">Actualizar datos</a>
                        <a href="###">Eliminar cuenta</a>
                        <a href="###">Acerda de</a>
                        <a href="">Cerrar sesión</a>
                    </div>
                    </li>
                    <form action="Busqueda.php" method="GET">
                        <input type="search" placeholder="Buscar" name="busqueda">
                    </form>
                </div>
                </div>
            </ul>
        </nav>
    </header>
    <br><br><br><br><br><br>
    <div class = "slider">
        <ul>
            <li><img src="SliderImg/Slider1.jpg"></li>
            <li><img src="SliderImg/Slider2.jpg"></li>
            <li><img src="SliderImg/Slider3.jpg"></li>
            <li><img src="SliderImg/Slider4.jpg"></li>
        </ul>
    </div>
    <br>
    <h1 id="Titulo">Productos más vendidos</h1>
    <?php
        while ($mostrar = mysqli_fetch_array($resultado)) { 
    ?>
    <div class="container">
        <div class = "galeria" >
            <div class = "foto">
                <img width="130px" height="90px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
            </div>
            <div class = "datos">
                <p>1Lt <?php echo $mostrar["Nombre"]; ?></p>
                <p>$<?php echo $mostrar["Precio"]; ?></p> 
                <form class="boton1" action="VistaProducto.php?id=<?php echo $mostrar['id']; ?>" method="POST" enctype="multipart/form-data">
                    <input class="boton" type="submit" value="Ver producto" name="btnVer">
                </form>
            </div>
        </div>
    </div>
    <?php
        } 
    ?>
    <footer>
        <div class="grupo1">
            <div class="box">
                <center><h2>Contacto</h2></center>
                <p>Whatsapp: 5575625202</p>
                <p>Telefono: 55 5603 3859</p>
                <p>Email: ventas@nutripulp.com</p>
            </div>
            <div class="box">
                <center><h2>Siguenos en redes</h2></center>
                <div class="redes">
                    <center><a href="https://www.facebook.com/nutripulpmx" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/nutripulp/" target="_blank" class="fa fa-instagram"></a>
                    <a href="https://twitter.com/NutriPulp" target="_blank" class="fa fa-twitter"></a></center>
                </div>
                <p id="derechos"><small>&copy; 2022 <b>Nutripulp</b> -Todos los Derechos Reservados.</small></p>
            </div>
    </footer>

</body>
</html>