<?php
include ('function/config.php');
// include ('function/proseslogin.php');
session_start();
if (!isset($_SESSION['status']))
 {
	header("location: function/proseslogin.php");
	exit;
}
// getting var value and redefine first name
$nama =$_SESSION['nama'];

// getting var npm from session
$npm =$_SESSION['npm'];

$presensi  = mysqli_query($link, "SELECT classes.presensi, classes.nama_class,  FROM sales order by ID asc");
?

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Batang</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="barchart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($merk)) { echo '"' . $p['merk'] . '",';}?>],
            datasets: [
            {
              label: "Penjualan Barang",
              data: [<?php while ($p = mysqli_fetch_array($penjualan)) { echo '"' . $p['penjualan'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            }
            ]
            };

  var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>