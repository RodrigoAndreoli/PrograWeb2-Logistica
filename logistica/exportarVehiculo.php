<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPage.php');
   
    $obj = new controlDB();
    $datos=$obj->consultar("SELECT * 
        FROM vehiculo");
    
    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('p','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(232,232,232);
    $pdf->Cell(7);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(45,8,'Marca',1,0,'C',1);
    $pdf->Cell(45,8,'Modelo',1,0,'C',1);
    $pdf->Cell(45,8,'Tipo de vehiculo',1,0,'C',1);
    $pdf->Cell(45,8,'Patente',1,1,'C',1);
    $pdf->Cell(45,8,'Numero de chasis',1,0,'C',1);
    $pdf->Cell(45,8,'Kilometros',1,0,'C',1);
    $pdf->Cell(45,8,'Anio',1,0,'C',1);
    $pdf->Cell(45,8,'Numero de motor',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(7);
        $pdf->Cell(45,6,utf8_decode($a['marca']),1,0,'C');
        $pdf->Cell(45,6,$a['modelo'],1,0,'C');
        $pdf->Cell(45,6,$a['tipo_vehiculo'],1,0,'C');
        $pdf->Cell(45,6,utf8_decode($a['patente']),1,1,'C');
        $pdf->Cell(45,6,utf8_decode($a['nro_chasis']),1,0,'C');
        $pdf->Cell(45,6,$a['km'],1,0,'C');
        $pdf->Cell(45,6,$a['anio'],1,0,'C');
        $pdf->Cell(45,6,utf8_decode($a['nro_motor']),1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>