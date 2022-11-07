<?php 
session_start(); 
include '../ConexionBD/Conexion.php';
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
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION['MiCarrito'] = $arreglo;
        } else {
            //No estaba el registro
            $nombre = "";
            $precio = "";
            $imagen = "";
            $resultado = $conexion -> query ('SELECT * FROM productos WHERE id = ' .$_GET['id']) or die ($conexion -> error);
            $mostrar = mysqli_fetch_row($resultado);
            $nombre = $mostrar[1];
            $precio = $mostrar[2];
            $imagen = $mostrar[4];
            $arregloNuevo = array (
                            'Id'=> $_GET['id'], 
                            'Nombre'=> $nombre,
                            'Precio'=> $precio,
                            'Imagen'=> $imagen,
                            'Cantidad' => 1);
            array_push($arreglo, $arregloNuevo);
            $_SESSION['MiCarrito'] = $arreglo;
        }
    }
} else {
    //Creamos la varible
    if (isset($_GET['id'])) {
        $nombre = "";
        $precio = "";
        $imagen = "";
        $resultado = $conexion -> query ('SELECT * FROM productos WHERE id = ' .$_GET['id']) or die ($conexion -> error);
        $mostrar = mysqli_fetch_row($resultado);
        $nombre = $mostrar[1];
        $precio = $mostrar[2];
        $imagen = $mostrar[4];
        $arreglo[] = array (
                    'Id'=> $_GET['id'], 
                    'Nombre'=> $nombre,
                    'Precio'=> $precio,
                    'Imagen'=> $imagen,
                    'Cantidad' => 1);
        $_SESSION['MiCarrito'] = $arreglo;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!--Libreria JQuery-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="../General.css">
    <link rel="stylesheet" href="Carrito.css">
    <script src="https://kit.fontawesome.com/2c4007a4a1.js" crossorigin="anonymous"></script> <!--IconosRedes-->
    <title>Carrito de compras</title>
</head>
<body>
<header> 
    <img id="Logo" src="../Img/Logo.png" width="250px" height="165px"> 
    <form action="../Busqueda.php" method="GET">
        <input id="busqueda" type="search" placeholder="Buscar" name="busqueda">
    </form>
        <nav>
            <a href="">Yos Valpuesta</a>
            <a href="">Mis compras</a>
            <a href="../MenuPulpas.php">Menú</a>
            <a href="Carrito.php"><img src="../Img/Carrito.png" alt="" width="40px" height="40px"></a>
        </nav>
</header>

    <h1>Mi Carrito</h1>
    <center><table cellspacing="2" border="10" class="carrito">
        <tr>
            <td id="encabezado" colspan="2">Producto</td>
            <td id="encabezado">Precio</td>
            <td id="encabezado">Cantidad</td>
            <td id="encabezado">SubTotal</td>
            <td id="encabezado" colspan="2">-----------------------</td>
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
            <td><img width="180px" height="130px" src="data:image/png;base64,<?php echo base64_encode($arregloCarrito[$i]['Imagen']); ?>"></td>
            <td><h3><?php echo $arregloCarrito[$i]['Nombre']; ?></h3></td>
            <td><h3>$<?php echo $arregloCarrito[$i]['Precio']; ?></h3></td>
            <td>
                <div>
                    <!--<button class="boton menos Incrementar">-</button>-->
                    <input class="cantidad" type="text" name="cantidad" value="1" 
                    data-precio="<?php echo $arregloCarrito[$i]['Precio']; ?>" 
                    data-id="<?php echo $arregloCarrito[$i]['Id']; ?>" 
                    value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>" >
                    <!--<button class="boton mas Incrementar">+</button>-->
                </div>
            </td>
            <td class="cant<?php echo $arregloCarrito[$i]['Id']; ?>">
            <h3>$<?php echo number_format($subTotal,2,'.','');?></h3>
            </td>
            <td><a class="btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id']; ?>">Eliminar</a></td>
            <td><a class="btnPago">Comprar ahora</a></td>
        </tr>
    <?php
            }
        }
    ?>
    </table></center>
    <br><br>
    <center><table class="total" cellspacing="2" border="10">
        <tr>
            <td id="encabezado" colspan="2">Total</td>
        </tr>
        <tr>
            <td>SubTotal</td>
            <td><h3>$<?php echo number_format($total,2,'.',''); ?></h3></td>
        </tr>
        <tr>
            <td>Envío</td>
            <td>
                <?php if ($totalEnvio >= 595 ) {
                        echo ("Envio gratis");
                      } else {
                        echo ("$150.00");
                      }?>
            </td>
        </tr>
        <tr>
            <td>Total</td>
            <td><h3>$<?php echo number_format($totalEnvio,2,'.',''); ?></h3></td>
        </tr>
        <tr>
            <td class="boton1" colspan="2">
                <input class="boton" onclick="window.location='../Comprar/Comprar.php'" type="submit" value="Proceder al pago" name="btnPago">             
            </td>
        </tr>
    </table></center>

    <!--Cantidad-->
    <!--<script>
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
    </script>-->

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
            //Cantidad
            $(".cantidad").keyup(function() {
                var cantidad = $(this).val();
                var precio = $(this).data('precio');
                var id = $(this).data('id');
                incrementar(cantidad, precio, id);
            });
            //$("Incrementar").click(function() {
                //var cantidad = $(this).find('input').val();
                //var precio = $(this).find('input').data('precio');
                //var id = $(this).find('input').data('id');
                //incrementar(cantidad, precio, id);
            //})
            function incrementar(cantidad, precio, id) {
                var mult = parseFloat(cantidad) * parseFloat(precio);
                $(".cant" + id).text("$" + mult);
                $.ajax ({
                    method: 'POST',
                    url: 'ActualizarCarrito.php',
                    data: {id:id, cantidad:cantidad}
                }).done(function(respuesta) {
                    
                });
            }
        });
    </script>

</body>
</html>