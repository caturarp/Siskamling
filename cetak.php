<?php
require_once __DIR__ . '/vendor/autoload.php';
include 'function/config.php';
session_start();
$npm = $_SESSION['npm'];

$mpdf = new \Mpdf\Mpdf();

$sql ="SELECT classes.waktu_class, classes.nama_class, classes.kredit_class, classes.presensi, classes.sks_class, classes.id_class, classes.nilai_class 
FROM classes,courses,students
WHERE courses.id_class=classes.id_class 
AND students.npm=courses.npm AND courses.npm = $npm";

              

$results = mysqli_query($link, $sql);
$row = mysqli_fetch_array($results);
$no = 1;
$data_arr = [];
while($row = mysqli_fetch_array($results)){
    $data = "
    <tbody>
        <tr>
            <td>$row[nama_class]</td>
            <td>$row[id_class]</td>
            <td>$row[nama_class]</td>
            <td>$row[sks_class]</td>
            <td>$row[nilai_class]</td>
            <td>$row[kredit_class]</td>
            <td>$row[nilai_class]*$row[sks_class]</td>
        </tr>
    </tbody>
    ";
    array_push($data_arr,$data);
    $no++;
 }

$table = "
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  
  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>
<table>
<thead>
    <tr>
       <th>No</th>
       <th>Kode Mata Kuliah</th>
       <th>Mata Kuliah</th>
       <th>SKS</th>
       <th>Nilai</th>
       <th>Kredit</th>
       <th>N x K</th>
    </tr>
</thead>" . implode("",$data_arr) . "</table>";

$mpdf->WriteHTML($table);
$mpdf->Output();
?>