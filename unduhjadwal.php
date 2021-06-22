<?php
include ('function/config.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\xlsx;
$spreadsheet=new Spreadsheet();
$sheet=$spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Kode Kelas');
$sheet->setCellValue('C1', 'Waktu');
$sheet->setCellValue('D1', 'Mata Kuliah');
$query=mysqli_query($link, "SELECT classes.id_class, classes.waktu_class, classes.nama_class FROM classes, courses, students WHERE students.npm=courses.npm AND courses.id_class=classes.id_class");
$i=2;
$no=1;
while ($row=mysqli_fetch_array($query)) {
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['id_class']);
    $sheet->setCellValue('C'.$i, $row['waktu_class']);
    $sheet->setCellValue('D'.$i, $row['nama_class']);
    $i++;
}
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' =>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$i=$i-1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);
$writer = new xlsx($spreadsheet);
$writer->save('Jadwal Mata Kuliah.xlsx');
?>