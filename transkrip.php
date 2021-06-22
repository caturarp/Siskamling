<?php
include ('function/config.php');
// include ('function/proseslogin.php');
session_start();
if (!isset($_SESSION['status']))
 {
	header("location: function/proseslogin.php");
	exit;
}
$npm =$_SESSION['npm'];
$fnama = $_SESSION['$fnama'];
$nama = $_SESSION['nama'];
$alamat = $_SESSION['alamat'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKAMLING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap") rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link href="assets/styles.css" rel="stylesheet">
      <script src="//code.jquery.com/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid justify-content-around" style="font-family: 'Poppins', sans-serif">
              
              <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button> -->
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <a class="navbar-brand" href="#">
                    <img src="assets/logoSiskamling.svg" alt="">
                  </a>
                <div class="navbar-nav">
                  <a class="nav-link mx-4" href="index.php">Beranda</a>
                  <a class="nav-link mx-2" href="course.php">Kelas</a>
                  <a class="nav-link active mx-3" aria-current="page" href="#">Transkrip</a>
                  <button type="button" class="btn btn-danger px-4">Lapor</button>
                  
                </div>
                
              </div>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                <p class="mt-3">Halo, <?php echo $fnama ?></p>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="assets/iconProfile.svg" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- <div class="nav-item d-flex">
                <img src="/assets/iconProfile.svg" alt="">
            </div> -->
            </div>
          </nav>
    </div>

    <div class="container">
        <div class="container-fluid justify-content-around" style="font-family: 'Poppins', sans-serif">
          <div class="row mt-sm-4">
            <div class="col-sm-7">
              <div class="row">
              <div class="col-sm-2">
               <div class="profil">
                  <img src="assets/catur.jpg" class="img-fluid" alt="">
               </div>
               </div>

              <div class="col-sm-5">
               <p style="font-size: x-large; font-weight: bold;">Transkrip Sementara</p>
                
              <!-- <p> Npm : echo$npm </p>
              <p> Nama : Asri Kinanti Febriany</p>
              <p> Alamat : Gayungan</p>  -->
              <?php

              $npm =$_SESSION['npm'];
              $fnama = $_SESSION['$fnama'];
              $nama = $_SESSION['nama'];
              $alamat = $_SESSION['alamat'];

              echo "NPM : $npm <br>";
              echo "Nama : $nama <br>"; 
              echo "Alamat : $alamat";
              // echo "Nama : ;
              // echo "Alamat : "+$alamat;

              // $html =
              //   '<html><body>'.
              //   '<br>NPM: '.$npm.
              //   '<br>NAMA: '.$nama.
              //   '<br>ALAMAT: '.$alamat.
              //   '</body></html>';
              ?>
               
              </div>
              </div>
            </div>
              
            <div class="col-sm-5 align-self-end pb-3">
              <div class="d-flex justify-content-end">  
              <button type="button" class="btn btn-success">Unduh Transkrip</button> 
              </div> 
           </div>
        </div>
      </div>
    </div>
           <!--tabel-->
    <div class="container mt-sm-3">
      <div class="container-fluid justify-content-around" style="font-family: 'Poppins', sans-serif">
            <table class="table table-bordered">
              <thead class="table-dark">
                 <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Kredit</th>
                    <th scope="col">N x K</th>
                 </tr>
             </thead>
             <?php
              $no = 1;

              // query attempt
              $sql ="SELECT students.npm, classes.waktu_class, classes.nama_class, classes.presensi, classes.sks_class, lecturers.nama_lecturer, classes.id_class 
              FROM classes,courses,students,lecturers 
              WHERE courses.id_class=classes.id_class 
              AND classes.id_lecturer=lecturers.id_lecturer AND students.npm=courses.npm AND courses.npm = '$npm'";
              $results = mysqli_query($link, $sql);
              while($row = mysqli_fetch_array($results))
              {
                echo "
                <tbody>
                <tr>
                <td scop>$no.</td>
                <td>$row[id_class]</td>
                <td>$row[nama_class]</td>
                <td>$row[sks_class]</td>
                <td>$row[waktu_class]</td>
                <td>$row[nama_lecturer]</td>
                <td>$row[nama_lecturer]</td>
                </tr>
                </tbody>
                ";  
                $no++;
             }
             ?>
             <!-- <tbody>
                 <tr>
                 <td scope="row">1.</td>
                  <td>SI9110</td>
                 <td>Pemrograman Web</td>
                 <td>3</td>
                 <td>A</td>
                 <td>4</td>
                 <td>12</td>
                 </tr>
    
                 <tr>
                 <td scope="row">2.</td>
                 <td>SI9110</td>
                 <td>Analisis Basis Data</td>
                 <td>3</td>
                 <td>A</td>
                 <td>4</td>
                 <td>12</td>
                 </tr>
    
                 <tr>
                 <td scope="row">3.</td>
                 <td>SI9110</td>
                 <td>Analisis Desain Terstruktur</td>
                 <td>3</td>
                 <td>A</td>
                 <td>4</td>
                 <td>12</td>
                 </tr>
             </tbody> -->
          </table>
        </div>
      </div>

  </body>
  </html>
          
          