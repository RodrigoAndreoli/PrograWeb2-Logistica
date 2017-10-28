<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageL.php');
   
    $obj = new controlDB();
    $datos=$obj->consultar("SELECT m.tipo_vehiculo,m.km_unidad,m.fecha_entrada,m.repuestos,m.externo,m.costo,u.nombre,v.patente
        FROM mantenimiento m 
        JOIN vehiculo v ON v.idVehiculo=m.idVehiculo
        JOIN usuario u ON u.idUsuario=m.idMecanico
        ORDER BY m.costo");
    
    $pdf=new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(30);
    $pdf -> Cell(220,5, 'Mantenimiento',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(1);
   
    $pdf->Cell(38,8,'Mecanico',1,0,'C',1);
    $pdf->Cell(38,8,'Patente',1,0,'C',1);
    $pdf->Cell(35,8,'Tipo vehiculo',1,0,'C',1);
    $pdf->Cell(38,8,'Fehca entrada',1,0,'C',1);
    $pdf->Cell(20,8,'Km',1,0,'C',1);
    $pdf->Cell(68,8,'Repuestos',1,0,'C',1);
    $pdf->Cell(15,8,'Externo',1,0,'C',1);
    $pdf->Cell(32,8,'Costo',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(1);
        $pdf->Cell(38,6,utf8_decode($a['nombre']),1,0,'C');
        $pdf->Cell(38,6,$a['patente'],1,0,'C');
        $pdf->Cell(35,6,$a['tipo_vehiculo'],1,0,'C');
        $pdf->Cell(38,6,$a['fecha_entrada'],1,0,'C');
        $pdf->Cell(20,6,$a['km_unidad'],1,0,'C');
        $pdf->Cell(68,6,$a['repuestos'],1,0,'C');
        $pdf->Cell(15,6,$a['externo'],1,0,'C');
        $pdf->Cell(32,6,$a['costo'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>