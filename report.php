<?php
require 'vendor/autoload.php';
//reference the Dompdf Namespace
use Dompdf\Dompdf;

//instantiate and use
$dompdf = new Dompdf();
$dompdf->loadHtml('Menggunakan Library DOMpdf Untuk Membuat Report PDF Dengan DOMpdf');

//Setup Paper Size And Orientation
$dompdf->setPaper('A4' , 'Landscape');

//Render the HTML as PDF
$dompdf->render();

//Ouput
$dompdf->stream('Hasil_report.pdf');
 ?>
