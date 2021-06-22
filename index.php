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
$fnama = strtok($nama, " ");
$_SESSION['$fnama'] =$fnama;

// getting var npm from session
$npm =$_SESSION['npm'];

// translating EN's day to ID's day
$day = date("l");
if ($day = "Monday"){
    $hari = "SENIN";
}
elseif ($day = "Tuesday") {
    $hari = "SELASA";
}
elseif ($day = "Wednesday") {
    $hari = "RABU";
}
elseif ($day = "Thursday") {
    $hari = "KAMIS";
}
elseif ($day = "Friday") {
    $hari = "JUMAT";
}
elseif ($day = "Saturday") {
    $hari = "Sabtu";
}
else {
    $hari = "Minggu";
};
// var_dump($day);
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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid justify-content-around" style="font-family: 'Poppins', sans-serif">
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/logoSiskamling.svg" alt="">
                  </a>
                <div class="navbar-nav">
                  <a class="nav-link active mx-4"  aria-current="page" href="index.php">Beranda</a>
                  <a class="nav-link mx-2" href="course.php">Kelas</a>
                  <a class="nav-link mx-3" href="transkrip.php">Transkrip</a>
                  <a href="lapor.php">
                  <button type="button" class="btn btn-danger px-4">Lapor</button>
                  </a>
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
                      <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                      <li><a class="dropdown-item" href="function/logout.php">keluar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <div class="container">
        <div class="container-fluid justify-content-around" style="font-family: 'Poppins', sans-serif">
          <div class="row mt-sm-5">
            <div class="col-sm-7">
              <p style="font-size: x-large; font-weight: bold;">Jadwal Hari Ini</p> 

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
              <thead class="table" style="background-color:#36A5AE; color:#F3F3F3">
                 <tr>
                    <th scope="col">Kode Kelas</th>
                    <th scope="col">Waktu Kelas</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Dosen pengampu</th>
                    <th scope="col"></th>
                 </tr>
             </thead>
             <?php
                    // Include config file
                    require_once "function/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT classes.id_class, classes.waktu_class, classes.nama_class, classes.presensi, lecturers.nama_lecturer 
                    FROM classes,courses,students,lecturers 
                    WHERE courses.id_class=classes.id_class 
                    AND classes.id_lecturer=lecturers.id_lecturer AND students.npm=courses.npm AND courses.npm = '$npm' AND classes.waktu_class='$hari'";
                    // echo var_dump($npm);
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id_class'] . "</td>";
                                        echo "<td>" . $row['waktu_class'] . "</td>";
                                        echo "<td>" . $row['nama_class'] . "</td>";
                                        echo "<td>" . $row['nama_lecturer'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="function/update.php?id_class='. $row['id_class'] .'" class="btn btn-primary mr-3" title="Hadiri Kelas" style ="background-color:#36A5AE" data-toggle="tooltip" on-click="disabled">Hadiri Kelas<span class="fa fa-pencil"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } 
                        else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } 
                    else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>
                    <p class="mt-5" style="font-size: x-large; font-weight: bold;">Periksa Kehadiran Kelas</p> 
                    <a href="presensi.php">
                    <div class="btn btn-primary px-4 py-2" style ="background-color:#36A5AE">Periksa</div></a>
</body>
</html>