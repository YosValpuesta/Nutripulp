<?php 
    include '../ConexionBD/Conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="../Productos/General.css">
    <link rel="stylesheet" href="../Productos/MenuPulpas.css">
    <title>Menú:Nutripulp</title>
</head>
<body>
    <?php include '../Nav/Header.php' ?>
    <h1 id="menuh1">Pulpas de Fruta</h1>
    <?php
        //Paginador
        $registros = mysqli_query($conexion, "SELECT COUNT(*) as Existencia_L FROM productos WHERE Existencia_L > 0 ");
        $resultadoRegistros = mysqli_fetch_array($registros);
        $totalRegistrados = $resultadoRegistros['Existencia_L'];
        $porPagina = 4;
        if (empty($_GET['pagina'])) {
            $pagina = 1;
        } else {
            $pagina = $_GET['pagina'];
        }
        $desde = ($pagina - 1) * $porPagina;
        $totalPaginas = ceil($totalRegistrados / $porPagina);
        //Productos
        $resultado = $conexion -> query ("SELECT * FROM productos WHERE Existencia_L > 0 LIMIT $desde,$porPagina") or die ($conexion -> error);
        while ($mostrar = mysqli_fetch_array($resultado)) { 
    ?>
        <div class = "galeria" >
            <div class = "foto">
                <img width="130px" height="90px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
            </div>
            <div class = "datos">
                <p id="nombre">1Lt <?php echo $mostrar["Nombre"]; ?></p>
                <p id="precioMenu">$<?php echo number_format($mostrar["Precio"], 2, '.', ''); ?></p>
                <form class="boton1" action="VistaProducto.php?id=<?php echo $mostrar['id']; ?>" method="POST" enctype="multipart/form-data">
                    <input class="boton" type="submit" value="Ver producto" name="btnVer">
                </form>
            </div>
        </div>
    <?php
        } 
    ?>
    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <div class="paginador">
        <ul>
            <?php
                if ($pagina != 1) {
            ?>
            <li><a href="?pagina=<?php echo $pagina - 1;?>"><<</a></li>
            <?php 
                }
                for ($i = 1; $i <= $totalPaginas; $i++ ) {
                    if ($i == $pagina) {
                        echo '<li class="pagActual">'.$i.'</li>';
                    } else {
                        echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                    }
                }
                if ($pagina != $totalPaginas) {
            ?>
            <li><a href="?pagina=<?php echo $pagina + 1;?>">>></a></li>
            <?php
                }
            ?>
        </ul>
    </div>
    <?php 
        include '../Grafico/Grafico.php';
        include '../Footer/Footer.php' 
    ?>
</body>
</html>