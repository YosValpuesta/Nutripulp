<?php session_start(); 

if (isset($_SESSION['carrito']) || isset($_POST['Nombre'])) {
    if (isset($_SESSION['carrito'])) {
        $Micarrito = $_SESSION['carrito'];
        if (isset($_POST['Nombre'])) {
            $nombre = $_POST['Nombre'];
            $precio = $_POST['Precio'];
            $cantidad = $_POST['cantidad'];
            $imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 
            $donde = -1;
            if ($donde != -1) {
                $cuanto = $Micarrito[$donde]['cantidad'] + $cantidad;
                $Micarrito[$donde] = array("Nombre"=>$nombre, "Precio"=>$precio, "cantidad"=>$cuanto, "Imagen"=>$imagen);
            } else {
                $Micarrito[] = array("Nombre"=>$nombre, "Precio"=>$precio, "cantidad"=>$cantidad, "Imagen"=>$imagen);
            }
        }
    } else {
        $nombre = $_POST['Nombre'];
        $precio = $_POST['Precio'];
        $cantidad = $_POST['cantidad'];
        $imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 
        $Micarrito[] = array("Nombre"=>$nombre, "Precio"=>$precio, "cantidad"=>$cantidad, "Imagen"=>$imagen);
    }

    $_SESSION['carrito'] = $Micarrito;
}

Header("Location: VistaProducto.php");

?>