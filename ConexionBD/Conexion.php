<?php
    $conexion = new mysqli("localhost", "root", "", "nutripulp");
    
    if ($conexion) {
        
    } else {
        echo "No conecto";
    }
?>