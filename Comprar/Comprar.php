<?php 
include '../ConexionBD/Conexion.php';
session_start(); 
if (!isset($_SESSION['MiCarrito'])) {
    header('Location: ../Productos/MenuPulpas.php');
}
$resultado = $conexion -> query("SELECT * FROM domicilio WHERE cliente_id = 62") or die ($conexion -> error);
$fechaEntrega = $conexion -> query("SELECT DATE_ADD(Fecha, INTERVAL 5 DAY) FROM ventas WHERE id_cliente = 62") or die ($conexion -> error);
$mostrar = mysqli_fetch_row($resultado);
$fecha = $fechaEntrega -> fetch_assoc();
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
            <td ALIGN=LEFT>
                <b>La entrega de tu pedido seria el: <?php echo $fecha["DATE_ADD(Fecha, INTERVAL 5 DAY)"]; ?></b>
                <br>
                <?php echo $mostrar[3]; ?>, Calle: <?php echo $mostrar[4]; ?> Nº interior: <?php echo $mostrar[7]; ?> Nº exterior: <?php echo $mostrar[8]; ?>,
                <?php echo $mostrar[1]; ?>, <?php echo $mostrar[2]; ?>, <?php echo $mostrar[6]; ?> 
            </td>
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

        