<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageP.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrlib.php');

    $idViaje = $_REQUEST['id'];
    $obj = new controlDB();
    $datos = $obj -> consultar("SELECT V.fecha qfecha, V.destino qdestino, V.tipo_carga qcarga, U.nombre qprimer, U2.nombre qsegundo, C.patente qcamion, C.km qkm, A.patente qacoplado
    FROM Vehiculo_chofer_viaje T 
    JOIN Viaje V ON T.idViaje = V.idViaje 
    JOIN Usuario U ON T.idUsuario = U.idUsuario 
    JOIN Usuario U2 ON T.idUsuario2 = U2.idUsuario 
    JOIN Vehiculo C ON T.idVehiculo = C.idVehiculo 
    JOIN Vehiculo A ON T.idVehiculo2 = A.idVehiculo 
    WHERE T.idViaje = '$idViaje'");

    if($datos==null){
        
        $datos2 = $obj -> consultar("SELECT V.fecha qfecha, V.destino qdestino, V.tipo_carga qcarga, U.nombre qprimer, C.patente qcamion, C.km qkm
        FROM Vehiculo_chofer_viaje T 
        JOIN Viaje V ON T.idViaje = V.idViaje 
        JOIN Usuario U ON T.idUsuario = U.idUsuario 
        JOIN Vehiculo C ON T.idVehiculo = C.idVehiculo 
        WHERE T.idViaje = '$idViaje'");
                
        QRcode::png('localhost/logistica/login.php?id='.$idViaje, $_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrReporte.png');
        $pdf=new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('P','A4');
        $pdf->setTitle('Logistica');

        // Viaje
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(232,232,232);
        $pdf -> Cell(30);
        $pdf -> Cell(120,5, 'Viaje',0,0,'C');
        $pdf -> Ln(10);
        $pdf->Cell(20);  
        $pdf->Cell(40,8,'Fecha',1,0,'C',1);
        $pdf->Cell(40,8,'Destino',1,0,'C',1);
        $pdf->Cell(65,8,'Tipo de Carga',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos2 as $a) {
            $pdf->Cell(20);
            $pdf->Cell(40,8,$a['qfecha'],1,0,'C');
            $pdf->Cell(40,8,$a['qdestino'],1,0,'C');
            $pdf->Cell(65,8,$a['qcarga'],1,1,'C');
        }
        //Choferes
        $pdf -> Ln(20); 
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(232,232,232);
        $pdf -> Cell(30);
        $pdf -> Cell(120,5, 'Chofer',0,0,'C');
        $pdf -> Ln(10);
        $pdf->Cell(30);  
        $pdf->Cell(120,8,'1er Chofer',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos2 as $a) {
            $pdf->Cell(30);
            $pdf->Cell(120,8,$a['qprimer'],1,0,'C');
        }
        //Vehiculos
        $pdf -> Ln(20); 
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(232,232,232);
        $pdf -> Cell(30);
        $pdf -> Cell(120,5, 'Vehiculos',0,0,'C');
        $pdf -> Ln(10);
        $pdf->Cell(30);  
        $pdf->Cell(60,8,'Camion',1,0,'C',1);
        $pdf->Cell(60,8,'Kilometraje',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos2 as $a) {
            $pdf->Cell(30);
            $pdf->Cell(60,8,$a['qcamion'],1,0,'C');
            $pdf->Cell(60,8,$a['qkm'],1,1,'C');
        }
        //  $pdf->ezImage(pepe.png, 0, 420, ‘none’, ‘left’);
        //  QRcode::png($qr,false,QR_ECLEVEL_Q,8);
        $pdf -> Ln(20); 
        $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrReporte.png', 75, 200, 50,50);
        $pdf->Output('I','Logistica.pdf');

    
    }else{
        
        QRcode::png('localhost/logistica/login.php?id='.$idViaje, $_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrReporte.png');
        $pdf=new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('P','A4');
        $pdf->setTitle('Logistica');

        // Viaje
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(232,232,232);
        $pdf -> Cell(30);
        $pdf -> Cell(120,5, 'Viaje',0,0,'C');
        $pdf -> Ln(10);
        $pdf->Cell(30);  
        $pdf->Cell(40,8,'Fecha',1,0,'C',1);
        $pdf->Cell(40,8,'Destino',1,0,'C',1);
        $pdf->Cell(40,8,'Tipo de Carga',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos as $a) {
            $pdf->Cell(30);
            $pdf->Cell(40,8,$a['qfecha'],1,0,'C');
            $pdf->Cell(40,8,$a['qdestino'],1,0,'C');
            $pdf->Cell(40,8,$a['qcarga'],1,1,'C');
        }
        //Choferes
        $pdf -> Ln(20); 
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(232,232,232);
        $pdf -> Cell(30);
        $pdf -> Cell(120,5, 'Choferes',0,0,'C');
        $pdf -> Ln(10);
        $pdf->Cell(30);  
        $pdf->Cell(60,8,'1er Chofer',1,0,'C',1);
        $pdf->Cell(60,8,'2do Chofer',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos as $a) {
            $pdf->Cell(30);
            $pdf->Cell(60,8,$a['qprimer'],1,0,'C');
            $pdf->Cell(60,8,$a['qsegundo'],1,1,'C');
        }
        //Vehiculos
        $pdf -> Ln(20); 
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(232,232,232);
        $pdf -> Cell(30);
        $pdf -> Cell(120,5, 'Vehiculos',0,0,'C');
        $pdf -> Ln(10);
        $pdf->Cell(30);  
        $pdf->Cell(40,8,'Camion',1,0,'C',1);
        $pdf->Cell(40,8,'Kilometraje',1,0,'C',1);
        $pdf->Cell(40,8,'Acoplado',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos as $a) {
            $pdf->Cell(30);
            $pdf->Cell(40,8,$a['qcamion'],1,0,'C');
            $pdf->Cell(40,8,$a['qkm'],1,0,'C');
            $pdf->Cell(40,8,$a['qacoplado'],1,1,'C');
        }
        //  $pdf->ezImage(pepe.png, 0, 420, ‘none’, ‘left’);
        //  QRcode::png($qr,false,QR_ECLEVEL_Q,8);
        $pdf -> Ln(20); 
        $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrReporte.png', 75, 200, 50,50);
        $pdf->Output('I','Logistica.pdf');
    }
?>

