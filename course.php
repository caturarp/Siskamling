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
                  <a class="nav-link mx-4" href="homePage.html">Beranda</a>
                  <a class="nav-link active mx-2" aria-current="page" href="#">Kelas</a>
                  <a class="nav-link mx-3" href="transkrip.html">Transkrip</a>
                  <a href="lapor.html">
                  <button type="button" class="btn btn-danger px-4">Lapor</button>
                  </a>
                </div>
                
              </div>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="assets/iconProfile.svg" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Profil</a></li>
                      <li><a class="dropdown-item" href="#">keluar</a></li>
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
          <div class="row mt-sm-5">
            <div class="col-sm-7">
              <p style="font-size: x-large; font-weight: bold;">Informasi Kelas</p> 

            <div class="col-sm-5">
             
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
                    <th scope="col">Kode Kelas</th>
                    <th scope="col">Waktu Kelas</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Dosen pengampu</th>
                 </tr>
             </thead>
             
             <?php
             include 'function/config.php';
             $no = 1;
             $classes = mysqli_query($link, "select * from classes 
             INNER JOIN lecturers ON classes.id_lecturer = lecturers.id_lecturer");
             while($row = mysqli_fetch_array($classes))
             {
              echo "
              <tbody>
              <tr>
              <td scop>$no.</td>
              <td>$row[id_class]</td>
              <td>$row[waktu_class]</td>
              <td>$row[nama_class]</td>
              <td>$row[nama_lecturer]</td>
              </tr>
              </tbody>
              ";  
              $no++;
             }
             ?>
          </table>
        </div>
      </div>

  </body>
  </html>
          
          