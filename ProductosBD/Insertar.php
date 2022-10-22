<?php
include '../ConexionBD/Conexion.php';
$conexion = conectar();

$id_producto = $_POST['Id_producto'];
$nombre = $_POST['Nombre'];
$precio = $_POST['Precio'];
$existencia = $_POST['Existencia_L'];
$imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 

$productos = "INSERT INTO productos VALUES('$id_producto','$nombre','$precio','$existencia','$imagen')";
$resultado = mysqli_query($conexion, $productos);

//$id_insert = $mysqli->insert_id; // Trae e id del registro

/*if ($_FILES["Archivo"]["error"] > 0) { //Recibe el archivo
    echo "Error al cargar el archivo";
} else { 
    $permitidos = array("image/png","image/jpg"); //Archivos permitidos
    $limite_kb = 280; //Tamaño permitido

    if (in_array($_FILES["Archivo"]["type"], $permitidos) && $_FILES["Archivo"]["size"] <= $limite_kb * 1024) {
        $ruta = 'files/'.$id_insert.'/'; //Crea carpeta por cada id
        $archivo = $ruta.$_FILES["Archivo"]["name"];
        if (!file_exists($ruta)) { //Existe?
            mkdir($ruta);
        }
        if (!file_exists($archivo)) {
            $resultadoFile = @move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo);
            if ($resultadoFile) {
                echo "Archivo guardado";
            } else {
                echo "Error al guardar archivo";
            }
        } else {
            echo "Archivo ya existe";
        }
    } else {
        echo "Archivo no permitido o excede el tamaño";
    }
}*/

if ($resultado){
    Header("Location: Productos2.php");
} else {
    echo "error";
}
?>