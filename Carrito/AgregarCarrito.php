<?php  //Agregar productos al carrito
    if (isset($_REQUEST["btnAgregar"])){
        $producto = $_REQUEST["txtProducto"];
        $cantidad = $_REQUEST["txtCantidad"];
        $precio = $_REQUEST["txtPrecio"];

        $_SESSION["MiCarrito"][$producto]["cantidad"] = $cantidad;
        $_SESSION["MiCarrito"][$producto]["precio"] = $precio;

        echo "<script>alert('Producto $producto agregado con éxito al carrito de compras');</script>";
    }
    ?>