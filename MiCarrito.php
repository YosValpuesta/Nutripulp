<?php   
session_start();
?>

<title>Carrito de compras</title>
<link rel="stylesheet" href="General.css">
<link rel="stylesheet" href="MiCarrito.css">
<header> 
    <img id="Logo" src="Logo.png" width="250px" height="165px"> 
    <input id="Barra" type="search" placeholder="Buscar">
        <nav>
            <a href="">Yos Valpuesta</a>
            <a href="">Mis compras</a>
            <a href="MenuPulpas.html">Menú</a>
            <a href="MiCarrito.php"><img src="Carrito.png" alt="" width="40px" height="40px"></a>
        </nav>
</header>
<h1>Carrito de compras</h1>

<?php
$precioProducto = 0;
$subTotal = 0;
$precioTotal = 0;
if (isset($_SESSION["MiCarrito"])) { 
    //Indice=producto y Arreglo=cantidad y precio
    foreach ($_SESSION["MiCarrito"] as $indice => $arreglo) {  
    //$subTotal += $arSreglo["cantidad"] * $arreglo["precio"];
?>
    <div class="Micarrito">
        <!-- img -->
        <div class="info">
            <h2> <?php echo "<strong>". $indice . "</strong>"; ?> </h2> 
        </div>
        <div class="info">
        <!-- Cantidad tanto, precio tanto -->
            <h3><?php foreach ($arreglo as $key => $value) { 
                echo $key .": " . $value . "<br>";
                } ?>
            </h3>
        </div>
        <div class="info">
            <h3><br> <?php echo "<hr>$: <strong>". $precioProducto . "</strong><br>"; ?> </h3>
        </div>
    </div>

    <div class="botones">
        <div class="boton">
            <?php echo "<a href='MiCarrito.php?eliminarProducto=$indice'>Eliminar producto</a>";?>
        </div>
        <div class="boton">
            <?php echo "<a href=''>Comprar ahora</a>";?>
        </div>
    </div>

<?php
    } //fin foreach
?>
    <div class="precio">
        <h2> <?php echo "Subtotal: $$subTotal";?> </h2>
    </div>
    <div class="precio">
        <h2> <?php echo "Total con envío: $$precioTotal";?> </h2>
    </div>
    <div class="botones1">
        <div class="boton1">
            <?php echo '<a href="MenuPulpas.html">Regresar</a>'; ?> 
        </div>
        <div class="boton1">
            <?php echo '<a href="MiCarrito.php?vaciarCarrito=true">Vaciar carrito</a>'; ?>
        </div>
        <div class="boton1">
            <?php echo '<a href="ComprarAhora.html?comprarahora=true">Continuar compra</a>'; ?>
        </div>
    </div>

<?php   
} else {
    echo "<script>alert('El carrito esta vacío');</script>";
}

//Vacia carrito
if (isset($_REQUEST["vaciarCarrito"])){
    session_destroy();
    header("Location:MiCarrito.php");
}
//Elimina uno x uno producto
if (isset($_REQUEST["eliminarProducto"])){
    $producto = $_REQUEST["eliminarProducto"];
    unset($_SESSION["MiCarrito"][$producto]);
    echo "<script>alert('Se elimino el producto: $producto');</script>";
    header("Location:MiCarrito.php");
}
?>