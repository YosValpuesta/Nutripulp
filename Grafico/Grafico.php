<?php
include '../ConexionBD/Conexion.php';
$sql = "SELECT id_producto, SUM(Cantidad),Nombre FROM productos_venta INNER JOIN Productos ON productos_venta.id_producto = productos.id GROUP BY id_producto ORDER BY SUM(Cantidad) DESC LIMIT 5";
$res = $conexion -> query($sql);
?>

<html>
  <head>
    <link rel="stylesheet" href="../Productos/General.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Producto', 'Productos Vendidos'],
            <?php
            while($fila = $res -> fetch_assoc()) {
                echo "['".$fila["Nombre"]."', ".$fila["SUM(Cantidad)"]."],";
            }
            ?>
        ]);

        var options = {
          title: 'Productos más vendidos', 
          is3D: true,
          pieSliceTextStyle: {
            color: 'black',
          },
          slices: {
            0: { color: '#ff6961' },
            1: { color: '#77dd77' },
            2: { color: '#fdfd96' },
            3: { color: '#84b6f4' },
            4: { color: '#fdcae1' }
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <center>
    <div id="piechart" style="max-width: 900px; height: 300px;"></div>
    </center>
  </body>
</html>