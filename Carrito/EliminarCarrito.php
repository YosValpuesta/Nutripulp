<?php 
session_start();
$arreglo = $_SESSION['MiCarrito'];
for ($i = 0; $i < count($arreglo); $i++) {
    if($arreglo[$i]['Id'] != $_POST['id']) {
        $arregloNuevo[] = array(
                        'Id'=> $arreglo[$i]['Id'],
                        'Nombre'=> $arreglo[$i]['Nombre'],
                        'Precio'=> $arreglo[$i]['Precio'],
                        'Imagen'=> $arreglo[$i]['Imagen'],
                        'Cantidad' => $arreglo[$i]['Cantidad']   
        );
    }
}
if (isset($arregloNuevo)) {
    $_SESSION['MiCarrito'] = $arregloNuevo;
} else {
    //El registro a eliminar es el unico por ello elimina la sesion
    unset($_SESSION['MiCarrito']);
}
echo "Listo";
?>