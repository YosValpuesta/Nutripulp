<?php session_start(); 
include '../ConexionBD/Conexion.php';

if (isset($_SESSION['carrito'])) {
    //Si existe buscamos si ya estaba agregado el producto
    if (isset($_GET['id'])) {
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION['carrito'] = $arreglo; 
        } else {
            //No estaba el registro
            $nombre = "";
            $precio = "";
            $imagen = "";
            $productos = "SELECT * FROM productos WHERE id = " .$_GET['id'];
            $resultado = $conexion->query($productos);
            $mostrar = mysqli_fetch_row($resultado);
            $nombre = $mostrar[1];
            $precio = $mostrar[2];
            $imagen = $mostrar[4];
            $arregloNuevo = array(
                            'Id'=> $_GET['id'], 
                            'Nombre'=> $nombre,
                            'Precio'=> $precio,
                            'Imagen'=> $imagen,
                            'Cantidad' => 1 );
            array_push($arreglo, $arregloNuevo);
            $_SESSION['carrito'] = $arreglo; 
        }
    } else {
        //Creamos la variable de sesion
        if (isset($_GET['id'])) {
            $nombre = "";
            $precio = "";
            $imagen = "";
            $productos = "SELECT * FROM productos WHERE id = " .$_GET['id'];
            $resultado = $conexion->query($productos);
            $mostrar = mysqli_fetch_row($resultado);
            $nombre = $mostrar[1];
            $precio = $mostrar[2];
            $imagen = $mostrar[4];
            $arreglo[] = array(
                        'Id'=> $_GET['id'], 
                        'Nombre'=> $nombre,
                        'Precio'=> $precio,
                        'Imagen'=> $imagen,
                        'Cantidad' => 1);
            $_SESSION['carrito'] = $arreglo;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="../General.css">
    <link rel="stylesheet" href="Carrito.css">
    <script src="https://kit.fontawesome.com/2c4007a4a1.js" crossorigin="anonymous"></script> <!--IconosRedes-->
    <title>Carrito de compras</title>
</head>
<body>
<header> 
    <img id="Logo" src="Logo.png" width="250px" height="165px"> 
    <input id="Barra" type="search" placeholder="Buscar">
        <nav>
            <a href="">Yos Valpuesta</a>
            <a href="">Mis compras</a>
            <a href="../MenuPulpas.php">Menú</a>
            <a href="Carrito.php"><img src="Carrito.png" alt="" width="40px" height="40px"></a>
        </nav>
</header>

    <h1>Mi Carrito</h1>
    <center><table cellspacing="2" border="10">
        <tr>
            <td id="encabezado" colspan="2">Producto</td>
            <td id="encabezado">Precio</td>
            <td id="encabezado">Cantidad</td>
            <td id="encabezado">SubTotal</td>
            <td id="encabezado"></td>
        </tr>
    <?php
        if (isset($_SESSION['carrito'])) {
            $arregloCarrito = $_SESSION['carrito'];
            for ($i = 0; $i < count($arregloCarrito); $i++) {     
    ?>
        <tr>
            <td><img width="180px" height="130px" src="data:image/png;base64,<?php echo base64_encode($arregloCarrito[$i]['Imagen']); ?>"></td>
            <td id="nombre"><h3><?php echo $arregloCarrito[$i]['Nombre']; ?></h3></td>
            <td><h3>$<?php echo $arregloCarrito[$i]['Precio']; ?></h3></td>
            <td id="cantidad"><input class="cantidad" type="number" name="cantidad" value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>"></td>
            <td><h3>$<?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']; ?></td></h3>
            <td><input class="boton" type="submit" value="Eliminar" name="btnEliminar"></td>
        </tr>
    <?php
            }
        }
    ?>
    </table></center>
</body>
</html>