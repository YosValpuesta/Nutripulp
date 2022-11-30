<?php 
session_start(); 
include '../ConexionBD/Conexion.php';
$nombre = "";
$precio = "";
$imagen = "";
$cantidad = "";
$stock = "";
if (isset($_SESSION['MiCarrito'])) {
    //Si existe buscamos si ya estaba agregado el producto
    if (isset($_GET['id'])) {
        $arreglo = $_SESSION['MiCarrito'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $cantidad = $_POST["cantidad"];
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + $cantidad;
            $_SESSION['MiCarrito'] = $arreglo;
        } else {
            $resultado = $conexion -> query ('SELECT * FROM productos WHERE id = ' .$_GET['id']) or die ($conexion -> error);
            $mostrar = mysqli_fetch_row($resultado);
            $nombre = $mostrar[1];
            $precio = $mostrar[2];
            $imagen = $mostrar[4];
            $stock = $mostrar[3];
            $cantidad = $_POST["cantidad"];
            if ($cantidad > 0) {
                if ($cantidad <= $stock) {
                   $arregloNuevo = array (
                                    'Id'=> $_GET['id'], 
                                    'Nombre'=> $nombre,
                                    'Precio'=> $precio,
                                    'Imagen'=> $imagen,
                                    'Cantidad' => $cantidad,
                                    'Stock' => $stock);      
                    array_push($arreglo, $arregloNuevo);
                    $_SESSION['MiCarrito'] = $arreglo; 
                } else
                    echo "<script>alert('La cantidad deseada exede el numero de productos disponibles');</script>";
            } else
                echo "<script>alert('La cantidad debe ser mayor a 0');</script>";
        }
    } 
} else {
    //Creamos la varible
    if (isset($_GET['id'])) {
        $resultado = $conexion -> query ('SELECT * FROM productos WHERE id = ' .$_GET['id']) or die ($conexion -> error);
        $mostrar = mysqli_fetch_row($resultado);
        $nombre = $mostrar[1];
        $precio = $mostrar[2];
        $imagen = $mostrar[4];
        $stock = $mostrar[3];
        $cantidad = $_POST["cantidad"]; 
        if ($cantidad > 0) {
            if ($cantidad <= $stock) {
                $arreglo[] = array (
                            'Id'=> $_GET['id'], 
                            'Nombre'=> $nombre,
                            'Precio'=> $precio,
                            'Imagen'=> $imagen,
                            'Cantidad' => $cantidad,
                            'Stock' => $stock);
                $_SESSION['MiCarrito'] = $arreglo;
            } else 
                echo "<script>alert('La cantidad deseada exede el numero de productos disponibles');</script>";
        } else
            echo "<script>alert('La cantidad debe ser mayor a 0');</script>";
    } 
}
?>

<!DOCTYPE html>
<html lang="en"><head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!--Libreria JQuery-->
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="../Productos/General.css">
    <link rel="stylesheet" href="Carrito.css">
    <title>Carrito de compras</title>
</head>
<body>
    <?php include '../Nav/Header.php' ?>
    <h1 id="carritoh1">Mi Carrito</h1>
    <table cellspacing="2" border="10" align="center">
        <tr>
            <td id="encabezado" colspan="2">Producto</td>
            <td id="encabezado">Precio</td>
            <td id="encabezado">Cantidad</td>
            <td id="encabezado">SubTotal</td>
            <td id="encabezado"></td>
        </tr>
    <?php
        $subTotal = 0; //Cada producto
        $total = 0; //Suma productos
        $totalEnvio = 0; 
        if (isset($_SESSION['MiCarrito'])) {
            $arregloCarrito = $_SESSION['MiCarrito'];
            for ($i = 0; $i < count($arregloCarrito); $i++) {  
                $subTotal = $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'];
                $total = $total + $subTotal;
                if ($total >= 595) {
                    $totalEnvio = $total;
                } else {
                    $totalEnvio = $total + 150;
                }
    ?>
        <tr>
            <td><img id="productoImg" src="data:image/png;base64,<?php echo base64_encode($arregloCarrito[$i]['Imagen']); ?>"></td>
            <td><h3><?php echo $arregloCarrito[$i]['Nombre']; ?></h3></td>
            <td><h3>$<?php echo $arregloCarrito[$i]['Precio']; ?></h3></td>
            <td><h3><?php echo $arregloCarrito[$i]['Cantidad']; ?> Lts</h3></td>
            <td class="cant<?php echo $arregloCarrito[$i]['Id']; ?>"><h3>$<?php echo number_format($subTotal,2,'.','');?></h3></td>
            <td>
                <a class="btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php
            }
        }
    ?>
    </table>
    <br>
    <table class="total" cellspacing="2" border="10" align="center">
        <tr>
            <td id="encabezado" colspan="2">Total</td>
        </tr>
        <tr>
            <td ALIGN=LEFT><b>SubTotal:</b></td>
            <td>$<?php echo number_format($total,2,'.',''); ?></td>
        </tr>
        <tr>
            <td ALIGN=LEFT><b>Envío:</b></td>
            <td><b>
                <?php if ($total >= 595 ) {
                        echo ("Envio gratis");
                      } else {
                        echo ("$150.00");
                      }?>
            </b></td>
        </tr>
        <tr>
            <td ALIGN=LEFT><b>Total:</b></td>
            <td>$<?php echo number_format($totalEnvio,2,'.',''); ?></td>
        </tr>
        <tr>
            <td class="boton1" colspan="2">
                <input class="boton" onclick="window.location='../Comprar/Comprar.php'" type="submit" value="Proceder al pago" name="btnPago">             
            </td>
        </tr>
    </table>
    <!--Eliminar producto en carrito-->
    <script> 
        $(document).ready(function() {
            $(".btnEliminar").click(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var boton = $(this);
                $.ajax ({
                    method: 'POST',
                    url: 'EliminarCarrito.php',
                    data: {id:id}
                }).done(function(respuesta) {
                    boton.parent('td').parent('tr').remove();
                });
            });
        });
    </script>
</body>
</html>