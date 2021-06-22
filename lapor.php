<?php
include ('function/config.php');
session_start();
if (!isset($_SESSION['status']))
{
  header("location: function/proseslogin.php");
  exit;
}
if(isset($_POST['btnlapor']))
{
	$jenis_report = $_POST['jenis_report'];
	$isi_report = $_POST['isi_report'];
	$cp_report = $_POST['cp_report'];

	$report = mysqli_query($link, "INSERT INTO reports (jenis_report, isi_report, cp_report) VALUES ('$jenis_report', '$isi_report', '$cp_report')");

	if($report)//jika simpan berhasil
	{
    $get_idreport =mysqli_query($link, "SELECT id_report FROM reports WHERE jenis_report='$jenis_report' AND isi_report ='$isi_report' AND cp_report = '$cp_report'");
		while($row = mysqli_fetch_array($get_idreport)){
      $id_report = $row['id_report'];
    };
    $_SESSION['id_report'] = $id_report;
    echo "<script>
			alert('Laporan Berhasil Terkirim! Kode Ajuan Laporan Perlindunganmu adalah $id_report. Untuk Keamanan, Identitasmu Akan Dirahasiakan');
			document.location= 'laporsuccess.php';
			</script>";
	}
	else
	{
		echo "<script>
			alert('Laporan Gagal');
			document.location= 'lapor.php';
			</script>";
	}
	// echo $id_pendaftar."<br>".$nomorun."<br>".$tahunlulus."<br>".$namalengkap."<br>".$usia."<br>".$tempatlahir."<br>".$tanggallahir."<br>".$jeniskelamin."<br>".$alamat."<br>".$asalsekolah."<br>".$nomorhp."<br>".$namaortuwali."<br>".$pekerjaan."<br>".$alamatortu."<br>".$nomorhportu."<br>".$jurusan;

}

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
                <a class="navbar-brand" href="index.php">
                    <img src="assets/logoSiskamling.svg" alt="">
                  </a>
                <div class="navbar-nav">
                  <a class="nav-link mx-4" href="index.php">Beranda</a>
                  <a class="nav-link mx-2" href="course.php">Kelas</a>
                  <a class="nav-link mx-3" href="transkrip.php">Transkrip</a>
                  <a href="lapor.html">
                  <button type="button" class="btn btn-outline-danger px-4">Lapor</button>
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
                      <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                      <li><a class="dropdown-item" href="#">Keluar</a></li>
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
        <div class="d-flex row mt-sm-5">
          <div class="container-fluid justify-content-around" style="font-family: 'Poppins', sans-serif">
            <div class="col-sm-7 mx-5">
                <h3 style="color: #36a5ae;">Halaman Laporan</h3>
                <p>Laporkan bentuk ketidakadilan yang kamu rasakan disini.</p>
                <div class="row">
                  <form method="post" action="" class="col-sm-7">
                    <div class="form-group mb-3">
                          <span style="color:#36a5ae;" >Jenis Laporan</span>
                          <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="jenis_report">
                            <option selected></option>
                            <option value="1">Kekerasan</option>
                            <option value="2">Pelecehan</option>
                            <option value="3">Selain yang disebutkan</option>
                          </select>
                    </div>
                    <div class="form group mb-3">
                          <label for="isi_report" class="form-label" style="color: #36a5ae">Deskripsi Kejadian</label>
                          <textarea class="form-control" name="isi_report" rows="8"></textarea>
                          <p style="font-size: x-small;">Deskripsikan kronologi dengan baik dan lengkap</p>
                    </div>
                    <div class="form group mb-3">
                          <label for="cp_report" class="form-label" style="color: #36a5ae">Kontak</label>
                          <input type="text" class="form-control" name="cp_report">
                          <p style="font-size: x-small;">Isikan dengan No. Handphone yang dapat dihubungi</p>
                    </div>
                    <div class="d-grid mx-auto">
                          <button class="btn btn-danger " type="submit" name="btnlapor">Laporkan</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>