<?php
include ('function/config.php');
if(isset($_POST['btnlapor']))
{
	$id_pendaftar = $_SESSION['id_pendaftar'];
	$nomorun = $_POST['tnoun'];
	$tahunlulus = $_POST['tlulus'];
	$namalengkap = $_POST['tnama'];
	$usia = $_POST['tusia'];
	$tempatlahir = $_POST['ttmptlahir'];
	$tanggallahir = date('Y-m-d',strtotime($_POST['ttgllahir']));
	$jeniskelamin = $_POST['jeniskelamin'];
	$alamat = $_POST['talamat'];
	$asalsekolah = $_POST['tasalsekolah'];
	$nomorhp = $_POST['tnohp'];
	$namaortuwali = $_POST['tnamaortuwali'];
	$pekerjaan = $_POST['tpekerjaan'];
	$alamatortu = $_POST['talamatortu'];
	$nomorhportu = $_POST['tnohportu'];
	$jurusan = $_POST['tjurusan'];

	$simpan = mysqli_query($koneksi, "INSERT INTO formulir (id_pendaftar, no_peserta_ujian_nasional, tahun_kelulusan, nama_lengkap, usia, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_rumah, asal_sekolah, no_hp, nama_orang_tua_wali, pekerjaan, alamat_rumah_ortu, no_hp_ortu, jurusan)VALUES ('$id_pendaftar','$nomorun', '$tahunlulus', '$namalengkap', '$usia', '$tempatlahir', '$tanggallahir', '$jeniskelamin', '$alamat', '$asalsekolah', '$nomorhp', '$namaortuwali', '$pekerjaan', '$alamatortu', '$nomorhportu', '$jurusan')");

	if($simpan)//jika simpan berhasil
	{

		session_start();
		$_SESSION['id_pendaftar'] = $id_pendaftar;
		$_SESSION['nomorun'] = $nomorun;
		$_SESSION['tahunlulus'] = $tahunlulus;
		$_SESSION['namalengkap'] = $namalengkap;
		$_SESSION['usia'] = $usia;
		$_SESSION['tempatlahir'] = $tempatlahir;
		$_SESSION['tanggallahir'] = $tanggallahir;
		$_SESSION['jeniskelamin'] = $jeniskelamin;
		$_SESSION['alamat'] = $alamat;
		$_SESSION['asalsekolah'] = $asalsekolah;
		$_SESSION['nomorhp'] = $nomorhp;
		$_SESSION['namaortuwali'] = $namaortuwali;
		$_SESSION['pekerjaan'] = $pekerjaan;
		$_SESSION['alamatortu'] = $alamatortu;
		$_SESSION['nomorhportu'] = $nomorhportu;
		$_SESSION['jurusan'] = $jurusan;


		echo "<script>
			alert('Data Berhasil Disimpan!');
			document.location= 'formulirtersimpan.php';
			</script>";
	}
	else
	{
		echo "<script>
			alert('Data Gagal Disimpan!');
			document.location= 'formulir.php';
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
                <a class="navbar-brand" href="#">
                    <img src="assets/logoSiskamling.svg" alt="">
                  </a>
                <div class="navbar-nav">
                  <a class="nav-link mx-4" href="homePage.html">Beranda</a>
                  <a class="nav-link mx-2" href="kelas.html">Kelas</a>
                  <a class="nav-link mx-3" href="transkrip.html">Transkrip</a>
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
                      <li><a class="dropdown-item" href="#">Profil</a></li>
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
                     <div class="col-sm-7">
                         <div class="mb-3">
                         <span style="color:#36a5ae;" >Jenis Laporan</span>
                         <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected></option>
                            <option value="1">Kekerasan</option>
                            <option value="2">Pelecehan</option>
                            <option value="3">Selain yang disebutkan</option>
                         </select>
                         </div>
                         <div class="mb-3">
                            <label for="kronologi" class="form-label" style="color: #36a5ae">Deskripsi Kejadian</label>
                            <textarea class="form-control" id="kronologi" rows="8"></textarea>
                            <p style="font-size: x-small;">Deskripsikan kronologi dengan baik dan lengkap</p>
                         </div>
                             <div class="mb-3">
                             <label for="Kontak" class="form-label" style="color: #36a5ae">Kontak</label>
                             <input type="text" class="form-control" id="Kontak">
                             <p style="font-size: x-small;">Isikan dengan No. Handphone yang dapat dihubungi</p>
                             </div>
                             <div class="d-grid mx-auto">
                             <button class="btn btn-danger " type="submit" name="btnlapor">Laporkan</button>
                             </div>
                         </div>
                            
                     </div>
                     <div class="col-sm-5"></div>
                    </div>
            </div>
            <div class="col-sm-5 mx-5">
              <!-- <img class="img-fluid" src="/assets/lapor.svg"> --> 
            </div>
        </div>
       </div>
</body>
</html>