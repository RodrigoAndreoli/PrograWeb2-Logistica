<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageL.php');
   
    $obj = new controlDB();
    $datos=$obj->consultar("SELECT U.nombre Mecanico, V.patente Patente, V.km Km, M.fecha_entrada Ingreso, M.fecha_salida Salida, M.repuestos Repuestos, M.externo Externo, M.costo Costo
        FROM Mantenimiento M 
        JOIN Vehiculo V ON M.fkVehiculoM = V.idVehiculo
        JOIN Usuario U ON M.fkMecanicoM = U.idUsuario
        ORDER BY Ingreso");
    
    $pdf=new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(30);
    $pdf -> Cell(220,5, 'Mantenimiento',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(-2);
   
    $pdf->Cell(35,8,'Mecanico',1,0,'C',1);
    $pdf->Cell(15,8,'Externo',1,0,'C',1);
    $pdf->Cell(38,8,'Patente',1,0,'C',1);
    $pdf->Cell(20,8,'Km',1,0,'C',1);
    $pdf->Cell(38,8,'Fecha de entrada',1,0,'C',1);
    $pdf->Cell(38,8,'Fecha de salida',1,0,'C',1);
    $pdf->Cell(68,8,'Repuestos',1,0,'C',1);
    $pdf->Cell(32,8,'Costo',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(-2);
        $pdf->Cell(35,6,utf8_decode($a['Mecanico']),1,0,'C');
        $pdf->Cell(15,6,$a['Externo'],1,0,'C');
        $pdf->Cell(38,6,$a['Patente'],1,0,'C');
        $pdf->Cell(20,6,$a['Km'],1,0,'C');
        $pdf->Cell(38,6,$a['Ingreso'],1,0,'C');
        $pdf->Cell(38,6,$a['Salida'],1,0,'C');
        $pdf->Cell(68,6,$a['Repuestos'],1,0,'C');
        $pdf->Cell(32,6,'$'.$a['Costo'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>