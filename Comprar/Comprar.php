<?php 
session_start(); 
if (!isset($_SESSION['MiCarrito'])) {
    header('Location: MenuPulpas.php');
}
$arreglo = $_SESSION['MiCarrito'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="../General.css">
    <link rel="stylesheet" href="Comprar.css">
</head>
<body>
<header> 
    <img id="Logo" src="../Img/Logo.png" width="250px" height="165px"> 
        <nav>
            <a href="">Yos Valpuesta</a>
            <a href="">Mis compras</a>
            <a href="../MenuPulpas.php">Menú</a>
            <a href="../Carrito/Carrito.php"><img src="../Img/Carrito.png" alt="" width="40px" height="40px"></a>
        </nav>
</header>
    <h1>Revisa y confirma tu compra</h1>
    <center><table cellspacing="2" border="10">
        <tr>
            <td id="encabezado" colspan="2">Detalles de la entrega</td>
        </tr>
        <tr>
            <td>
                CP.09840, Entregamos tu paquete a las 14:15 hrs en Pino Suarez Nº exterior SN, 
                Iztapalapa, Pueblo los Reyes Culhuacán, Iztapalapa, Distrito Federal.
            </td>
            <td><input class="direc" type="submit" value="Cambiar dirección"></td>
        </tr>
        <tr>
            <td id="encabezado" colspan="2">¿Requiere nota o factura?</td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="notaFac" type="submit" value="Nota">
                <input class="notaFac" type="submit" value="Factura">
            </td>
        </tr>
        <tr>
            <td id="encabezado" colspan="2">Fecha de entrega</td>
        </tr>
        <tr>
            <td colspan="2">15/11/22</td>
        </tr>
        <tr>
            <td id="encabezado" colspan="2">Detalle del producto(s)</td>
        </tr>
    </table></center>
    <br>
    <center><table cellspacing="2" border="10">
                <tr>
                    <td id="encabezado">Producto</td>
                    <td id="encabezado">Total</td>
                </tr>
                <?php 
                $subTotal = 0; //Cada producto
                $total = 0; //Suma productos
                $totalEnvio = 0;
                for ($i = 0; $i < count($arreglo); $i++) {
                    $subTotal = $arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'];
                    $total = $total + $subTotal;
                        if ($total >= 595) {
                            $totalEnvio = $total;
                        } else {
                            $totalEnvio = $total + 150;
                        }
                ?>       
                <tr>
                    <td><h3><?php echo $arreglo[$i]['Nombre']; ?></h3></td>
                    <td><h3>$<?php echo number_format($arreglo[$i]['Precio'], 2, '.', ''); ?></h3></td>
                </tr>
                <?php 
                } 
                ?>
                <tr>
                    <td>Precio de Envío</td>
                    <td>
                        <?php if ($totalEnvio >= 595 ) {
                                echo ("Envio gratis");
                            } else {
                                echo ("$150.00");
                            }?>
                    </td>
                </tr>
                <tr>
                    <td>Total a pagar</td>
                    <td><h3>$<?php echo number_format($totalEnvio, 2, '.', ''); ?></h3></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="compraFina" onclick="window.location='CompraFinalizada.php'" type="submit" value="Confirmar compra">
                    </td>
                </tr>
            </table></center>
</body>
</html>

        