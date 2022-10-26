<?php
    $conexion = new mysqli("localhost", "root", "", "nutripulpproyecto");
    
    if ($conexion) {
        
    } else {
        echo "No conecto";
    }
?>