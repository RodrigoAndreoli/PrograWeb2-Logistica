<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageL.php');
   
    $obj = new controlDB();
    $datos=$obj->consultar("SELECT fecha,origen,destino,tipo_carga,tiempo,combustible,km_totales FROM viaje
        ORDER BY fecha");
    
    $pdf=new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(30);
    $pdf -> Cell(220,5, 'Viajes',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(1);
   
    $pdf->Cell(38,8,'Fehca',1,0,'C',1);
    $pdf->Cell(36,8,'Origen',1,0,'C',1);
    $pdf->Cell(50,8,'Destino',1,0,'C',1);
    $pdf->Cell(58,8,'Carga',1,0,'C',1);
    $pdf->Cell(20,8,'tiempo',1,0,'C',1);
    $pdf->Cell(28,8,'Combustible',1,0,'C',1);
    $pdf->Cell(28,8,'Km',1,1,'C',1);
    $pdf->SetFont('Arial','',9);
    foreach($datos as $a) {
        $pdf->Cell(1);
        $pdf->Cell(38,6,utf8_decode($a['fecha']),1,0,'C');
        $pdf->Cell(36,6,utf8_decode($a['origen']),1,0,'C');
        $pdf->Cell(50,6,utf8_decode($a['destino']),1,0,'C');
        $pdf->Cell(58,6,utf8_decode($a['tipo_carga']),1,0,'C');
        $pdf->Cell(20,6,$a['tiempo'],1,0,'C');
        $pdf->Cell(28,6,$a['combustible'],1,0,'C');
        $pdf->Cell(28,6,$a['km_totales'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>