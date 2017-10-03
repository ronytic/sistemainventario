<?php
$ruta="../";
include_once($ruta."login/verificar.php");
include_once("../basedatos/bd.php");
$registros=seleccionar("usuario","*","");


include_once("../reporte/fpdf/fpdf.php");

class PDF extends FPDF{
	function Footer(){
		$this->SetY(-15);
		$this->SetFont("Arial","B",12);
		$this->Cell(259,10,"Desarrollador por: Ronald","T",0,"C");
	}
}
$pdf=new PDF("P","mm","letter");
$pdf->SetTitle("Sistema de SEDES");
$pdf->AddPage();
$pdf->Image("../imagenes/banner.jpg",0,0,216.5,40);

$pdf->SetY(40);
$pdf->SetFont("Arial","BIU",16);
//B=Bold=negrita
//I=ITalic =cursiva
//U=underline=subrayado
$pdf->Cell(195,20,"REPORTE DE GENERAL DE USUARIOS",0,0,"C");
$pdf->ln(20);//unidades de salto
$pdf->SetFont("Arial","B",13);
$pdf->Cell(10,6,"N",1,0,"C");
$pdf->Cell(30,6,"Nombre",1,0,"C");
$pdf->Cell(30,6,"Ap.Paterno",1,0,"C");
$pdf->Cell(30,6,"Ap.Materno",1,0,"C");
$pdf->Cell(30,6,"Usuario",1,0,"C");
$pdf->Cell(40,6,"Nivel Usuario",1,0,"C");
$pdf->Cell(25,6,"Celular",1,0,"C");
$pdf->Ln();
$i=0;
$pdf->SetFont("Arial","",12);
foreach($registros as $r){
	$i++;
	$pdf->Cell(10,5,$i,1,0,"C");
	$pdf->Cell(30,5,ucwords($r['nombres']),1,0,"L");
	$pdf->Cell(30,5,ucwords($r['ap_paterno']),1,0,"L");
	$pdf->Cell(30,5,ucwords($r['ap_materno']),1,0,"L");
	$pdf->Cell(30,5,$r['usuario'],1,0,"C");
	$pdf->Cell(40,5,$r['nivelusuario'],1,0,"C");
	$pdf->Cell(25,5,$r['celular'],1,0,"C");
	
	$pdf->ln();
}

$pdf->Output("Reporte General.pdf","I");
?>