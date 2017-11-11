<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageL.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');

    $obj = new controlDB();
    $datos=$obj->consultar("SELECT * 
        FROM Vehiculo");
    
    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(30);
    $pdf -> Cell(220,5, 'Vehiculos',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(-1);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(35,8,'Tipo de vehiculo',1,0,'C',1);
    $pdf->Cell(35,8,'Patente',1,0,'C',1);
    $pdf->Cell(35,8,'Marca',1,0,'C',1);
    $pdf->Cell(30,8,'Modelo',1,0,'C',1);
    $pdf->Cell(35,8,'Fabricacion',1,0,'C',1);
    $pdf->Cell(40,8,'Numero de chasis',1,0,'C',1);
    $pdf->Cell(35,8,'Numero de motor',1,0,'C',1);
    $pdf->Cell(35,8,'Kilometros',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(-1);
        $pdf->Cell(35,6,ucfirst($a['tipo_vehiculo']),1,0,'C');
        $pdf->Cell(35,6,utf8_decode(strtoupper($a['patente'])),1,0,'C');
        $pdf->Cell(35,6,utf8_decode(ucwords(strtolower($a['marca']))),1,0,'C');
        $pdf->Cell(30,6,$a['modelo'],1,0,'C');
        $pdf->Cell(35,6,$a['anio'],1,0,'C');
        $pdf->Cell(40,6,utf8_decode(strtoupper($a['nro_chasis'])),1,0,'C');
        $pdf->Cell(35,6,utf8_decode($a['nro_motor']),1,0,'C');
        $pdf->Cell(35,6,$a['km'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>