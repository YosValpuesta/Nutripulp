<?php
include 'Php/Principal.php'
?>

<body>
<input id="busqueda" type="search" placeholder="Buscar" name="busqueda">
<input id="btnbuscar" type="submit" name="buscar" value="Buscar">

    <?php
        if (isset($_GET['buscar'])) {
            $busqueda = $_GET['busqueda'];
            $consulta = $conexion->query("SELECT * FROM productos WHERE Nombre LIKE '%$busqueda%'");
            while ($row = $consulta->fetch_array()) {
                echo $row['Nombre'] .'<br>';
            }
        }
    ?>
</body>
</html>