<?php
require_once __DIR__ . '/vendor/autoload.php';
include 'function/config.php';
session_start();
$npm = $_SESSION['npm'];

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$html='
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SISKAMLING | Transkrip</title>
    </head>
    <body>
        <table border="1" cell-padding="18" cell-spacing="0">
            <h1>wow</h1>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Mata Kuliah</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Nilai</th>
                <th scope="col">Kredit</th>
                <th scope="col">N x K</th>
            </tr>';
            $results = mysqli_query($link, "SELECT students.nama, students.alamat, students.ipk, lecturers.nama_lecturer FROM students, lecturers WHERE students.id_lecturer = lecturers.id_lecturer AND students.npm = '$npm'");
            while($row = mysqli_fetch_array($results)){
                $html .= '<tr>
                <td>'. $no. '</td>
                <td>'. $row[id_class] . '</td>
                <td>'.$row[nama_class] . '</td>
                <td>'.$row[sks_class] . '</td>
                <td>'.$row[nilai_class] . '</td>
                <td>'.$row[kredit_class] . '</td>
                <td>'.$row[nilai_class]*$row[sks_class] . '</td>
                </tr>';  
                $no++;
             }
$html .= '</table>
    </body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
?>