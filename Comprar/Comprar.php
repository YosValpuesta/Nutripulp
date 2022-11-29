<?php 
session_start(); 
if (!isset($_SESSION['MiCarrito'])) {
    header('Location: ../Productos/MenuPulpas.php');
}
$arreglo = $_SESSION['MiCarrito'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="../Productos/General.css">
    <link rel="stylesheet" href="Comprar.css">
    <title>Comprar</title>
</head>
<body>
    <?php include '../Nav/Header.php' ?>
    <h1 id="comprarh1">Revisa y confirma tu compra</h1>
    <table cellspacing="2" border="10" align="center">
        <tr>
            <td id="encabezado" colspan="2">Detalles de la entrega</td>
        </tr>
        <tr>
            <td>
                CP.09840, Entregamos tu paquete a las 14:15 hrs en Pino Suarez Nº exterior SN, 
                Iztapalapa, Pueblo los Reyes Culhuacán, Iztapalapa, Distrito Federal.
            </td>
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
            <td colspan="2">La fecha de entrega será en 5 días hábiles después de tu compra</td>
        </tr>
    </table>
    <br>
    <table cellspacing="2" border="10" align="center">
        <tr>
            <td id="encabezado" colspan="2">Detalle del producto(s)</td>
        </tr>
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
            <td ALIGN=LEFT><b><?php echo $arreglo[$i]['Nombre']; ?></b></td>
            <td>$<?php echo number_format($arreglo[$i]['Precio'], 2, '.', ''); ?></td>
        </tr>
        <tr>
            <td ALIGN=LEFT>Cantidad</td>
            <td><?php echo $arreglo[$i]['Cantidad']; ?></td>
        </tr>
        <tr>
            <td ALIGN=LEFT>SubTotal</td>
            <td><?php echo $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']; ?></td>
        </tr>
    <?php 
        } 
    ?>
        <tr>
            <td ALIGN=LEFT><b>Precio de Envío</b></td>
            <td>
                <?php 
                    if ($total >= 595 ) {
                        echo ("Envio gratis");
                    } else {
                        echo ("$150.00");
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td ALIGN=LEFT><b>Total a pagar</b></td>
            <td>$<?php echo number_format($totalEnvio, 2, '.', ''); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="compraFina" onclick="window.location='CompraFinalizada.php'" type="submit" value="Confirmar compra">
            </td>
        </tr>
    </table>
</body>
</html>

        