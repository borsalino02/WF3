<?php
include_once'vendor/setasign/fpdf/fpdf.php';

$pdf= new fpdf();// nouveau document PDF
$pdf->addPage();//ajout d'une page blanche
$pdf->setFont('arial','',36);
$pdf->Cell(190,10,'Bienvenue au Zoo Webforce 3',0,1,'c');
$pdf->setTextColor(255,0,0);//couleur rouge
$pdf->setFont('arial','',18);
$pdf->Cell(190,10,'Veuillez ne pas jeter de CMS aux developpeurs ca les rend dingues!!!',0,1,'c');
$pdf->output();//envoi au navigateur
?>