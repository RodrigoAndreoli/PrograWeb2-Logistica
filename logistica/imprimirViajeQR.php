<?php
    
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        echo $_SESSION['rol'];
		
		if($_SESSION['rol']=='Mecanico'){
                $miSession -> permisos();
            } 
	
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageP.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrlib.php');

    $idViaje = $_REQUEST['id'];
    $obj = new controlDB();
    $datos = $obj -> consultar("SELECT V.fecha qfecha, V.destino qdestino, V.tipo_carga qcarga, U.nombre qprimer, U2.nombre qsegundo, C.patente qcamion, C.km qkm, A.patente qacoplado
        FROM Vehiculo_Chofer_viaje T 
        JOIN Viaje V ON T.fkViajeT = V.idViaje 
        JOIN Usuario U ON T.fkChoferT = U.idUsuario 
        JOIN Usuario U2 ON T.fkAcompanianteT = U2.idUsuario 
        JOIN Vehiculo C ON T.fkCamionT = C.idVehiculo 
        JOIN Vehiculo A ON T.fkAcopladoT = A.idVehiculo 
        WHERE T.fkViajeT = '$idViaje'");

    if(!$datos) {
        $datos2 = $obj -> consultar("SELECT V.fecha qfecha, V.destino qdestino, V.tipo_carga qcarga, U.nombre qprimer, C.patente qcamion, C.km qkm, A.patente qacoplado
            FROM Vehiculo_Chofer_viaje T
            JOIN Viaje V ON T.fkVIajeT = V.idViaje
            JOIN Usuario U ON T.fkChoferT = U.idUsuario
            JOIN Vehiculo C ON T.fkCamionT = C.idVehiculo
            JOIN Vehiculo A ON T.fkAcopladoT = A.idVehiculo
            WHERE T.fkViajeT = '$idViaje'");
        
        if(!$datos2) {
            $datos3 = $obj -> consultar("SELECT V.fecha qfecha, V.destino qdestino, V.tipo_carga qcarga, U.nombre qprimer, U2.nombre qsegundo, C.patente qcamion, C.km qkm
                FROM Vehiculo_Chofer_viaje T
                JOIN Viaje V ON T.fkVIajeT = V.idViaje
                JOIN Usuario U ON T.fkChoferT = U.idUsuario 
                JOIN Usuario U2 ON T.fkAcompanianteT = U2.idUsuario 
                JOIN Vehiculo C ON T.fkCamionT = C.idVehiculo
                WHERE T.fkViajeT = '$idViaje'");
            
            if(!$datos3) {
            $datos4 = $obj -> consultar("SELECT V.fecha qfecha, V.destino qdestino, V.tipo_carga qcarga, U.nombre qprimer, C.patente qcamion, C.km qkm
                FROM Vehiculo_Chofer_viaje T
                JOIN Viaje V ON T.fkVIajeT = V.idViaje
                JOIN Usuario U ON T.fkChoferT = U.idUsuario
                JOIN Vehiculo C ON T.fkCamionT = C.idVehiculo
                WHERE T.fkViajeT = '$idViaje'");
         
            //$DATOS4
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
            $pdf->Cell(70,8,'Tipo de Carga',1,1,'C',1);
            $pdf->SetFont('Arial','',10);
            foreach($datos4 as $a) {
                $pdf->Cell(20);
                $pdf->Cell(40,8,$a['qfecha'],1,0,'C');
                $pdf->Cell(40,8,utf8_decode(ucwords($a['qdestino'])),1,0,'C');
                $pdf->Cell(70,8,utf8_decode(ucwords($a['qcarga'])),1,1,'C');
            }
            //Choferes
            $pdf -> Ln(20); 
            $pdf->SetFont('Arial','B',10);
            $pdf->SetFillColor(232,232,232);
            $pdf -> Cell(30);
            $pdf -> Cell(120,5, 'Choferes',0,0,'C');
            $pdf -> Ln(10);
            $pdf->Cell(20);  
            $pdf->Cell(150,8,'1er Chofer',1,1,'C',1);
            $pdf->SetFont('Arial','',10);
            foreach($datos4 as $a) {
                $pdf->Cell(20);
                $pdf->Cell(150,8,utf8_decode(ucwords($a['qprimer'])),1,1,'C');
            }
            //Vehiculos
            $pdf -> Ln(20); 
            $pdf->SetFont('Arial','B',10);
            $pdf->SetFillColor(232,232,232);
            $pdf -> Cell(30);
            $pdf -> Cell(120,5, 'Vehiculos',0,0,'C');
            $pdf -> Ln(10);
            $pdf->Cell(20);  
            $pdf->Cell(75,8,'Camion',1,0,'C',1);
            $pdf->Cell(75,8,'Kilometraje',1,1,'C',1);
            $pdf->SetFont('Arial','',10);
            foreach($datos4 as $a) {
                $pdf->Cell(20);
                $pdf->Cell(75,8,$a['qcamion'],1,0,'C');
                $pdf->Cell(75,8,$a['qkm'],1,1,'C');
            }
            //  $pdf->ezImage(pepe.png, 0, 420, ‘none’, ‘left’);
            //  QRcode::png($qr,false,QR_ECLEVEL_Q,8);
            $pdf -> Ln(20); 
            $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrReporte.png', 75, 200, 50,50);
            $pdf->Output('I','Logistica.pdf');
            } else {
        
                //$DATOS3
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
                $pdf->Cell(70,8,'Tipo de Carga',1,1,'C',1);
                $pdf->SetFont('Arial','',10);
                foreach($datos3 as $a) {
                    $pdf->Cell(20);
                    $pdf->Cell(40,8,$a['qfecha'],1,0,'C');
                    $pdf->Cell(40,8,utf8_decode(ucwords($a['qdestino'])),1,0,'C');
                    $pdf->Cell(70,8,utf8_decode(ucwords($a['qcarga'])),1,1,'C');
                }
                //Choferes
                $pdf -> Ln(20); 
                $pdf->SetFont('Arial','B',10);
                $pdf->SetFillColor(232,232,232);
                $pdf -> Cell(30);
                $pdf -> Cell(120,5, 'Choferes',0,0,'C');
                $pdf -> Ln(10);
                $pdf->Cell(20);  
                $pdf->Cell(75,8,'1er Chofer',1,0,'C',1);
                $pdf->Cell(75,8,'2do Chofer',1,1,'C',1);
                $pdf->SetFont('Arial','',10);
                foreach($datos3 as $a) {
                    $pdf->Cell(20);
                    $pdf->Cell(75,8,utf8_decode(ucwords($a['qprimer'])),1,0,'C');
                    $pdf->Cell(75,8,utf8_decode(ucwords($a['qsegundo'])),1,1,'C');
                }
                //Vehiculos
                $pdf -> Ln(20); 
                $pdf->SetFont('Arial','B',10);
                $pdf->SetFillColor(232,232,232);
                $pdf -> Cell(30);
                $pdf -> Cell(120,5, 'Vehiculos',0,0,'C');
                $pdf -> Ln(10);
                $pdf->Cell(20);  
                $pdf->Cell(75,8,'Camion',1,0,'C',1);
                $pdf->Cell(75,8,'Kilometraje',1,1,'C',1);
                $pdf->SetFont('Arial','',10);
                foreach($datos3 as $a) {
                    $pdf->Cell(20);
                    $pdf->Cell(75,8,$a['qcamion'],1,0,'C');
                    $pdf->Cell(75,8,$a['qkm'],1,1,'C');
                }
                //  $pdf->ezImage(pepe.png, 0, 420, ‘none’, ‘left’);
                //  QRcode::png($qr,false,QR_ECLEVEL_Q,8);
                $pdf -> Ln(20); 
                $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrReporte.png', 75, 200, 50,50);
                $pdf->Output('I','Logistica.pdf');                
            }
        } else {
            
            //$DATOS2
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
            $pdf->Cell(70,8,'Tipo de Carga',1,1,'C',1);
            $pdf->SetFont('Arial','',10);
            foreach($datos2 as $a) {
                $pdf->Cell(20);
                $pdf->Cell(40,8,$a['qfecha'],1,0,'C');
                $pdf->Cell(40,8,utf8_decode(ucwords($a['qdestino'])),1,0,'C');
                $pdf->Cell(70,8,utf8_decode(ucwords($a['qcarga'])),1,1,'C');
            }
            //Choferes
            $pdf -> Ln(20); 
            $pdf->SetFont('Arial','B',10);
            $pdf->SetFillColor(232,232,232);
            $pdf -> Cell(30);
            $pdf -> Cell(120,5, 'Choferes',0,0,'C');
            $pdf -> Ln(10);
            $pdf->Cell(20);  
            $pdf->Cell(150,8,'1er Chofer',1,1,'C',1);
            $pdf->SetFont('Arial','',10);
            foreach($datos2 as $a) {
                $pdf->Cell(20);
                $pdf->Cell(150,8,utf8_decode(ucwords($a['qprimer'])),1,1,'C');
            }
            //Vehiculos
            $pdf -> Ln(20); 
            $pdf->SetFont('Arial','B',10);
            $pdf->SetFillColor(232,232,232);
            $pdf -> Cell(30);
            $pdf -> Cell(120,5, 'Vehiculos',0,0,'C');
            $pdf -> Ln(10);
            $pdf->Cell(20);  
            $pdf->Cell(50,8,'Camion',1,0,'C',1);
            $pdf->Cell(50,8,'Kilometraje',1,0,'C',1);
            $pdf->Cell(50,8,'Acoplado',1,1,'C',1);
            $pdf->SetFont('Arial','',10);
            foreach($datos2 as $a) {
                $pdf->Cell(20);
                $pdf->Cell(50,8,$a['qcamion'],1,0,'C');
                $pdf->Cell(50,8,$a['qkm'],1,0,'C');
                $pdf->Cell(50,8,$a['qacoplado'],1,1,'C');
            }
            //  $pdf->ezImage(pepe.png, 0, 420, ‘none’, ‘left’);
            //  QRcode::png($qr,false,QR_ECLEVEL_Q,8);
            $pdf -> Ln(20); 
            $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrReporte.png', 75, 200, 50,50);
            $pdf->Output('I','Logistica.pdf');
        }
    } else {
        
        //$DATOS
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
        $pdf->Cell(70,8,'Tipo de Carga',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos as $a) {
            $pdf->Cell(20);
            $pdf->Cell(40,8,$a['qfecha'],1,0,'C');
            $pdf->Cell(40,8,utf8_decode(ucwords($a['qdestino'])),1,0,'C');
            $pdf->Cell(70,8,utf8_decode(ucwords($a['qcarga'])),1,1,'C');
        }
        //Choferes
        $pdf -> Ln(20); 
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(232,232,232);
        $pdf -> Cell(30);
        $pdf -> Cell(120,5, 'Choferes',0,0,'C');
        $pdf -> Ln(10);
        $pdf->Cell(20);  
        $pdf->Cell(75,8,'1er Chofer',1,0,'C',1);
        $pdf->Cell(75,8,'2do Chofer',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos as $a) {
            $pdf->Cell(20);
            $pdf->Cell(75,8,utf8_decode(ucwords($a['qprimer'])),1,0,'C');
            $pdf->Cell(75,8,utf8_decode(ucwords($a['qsegundo'])),1,1,'C');
        }
        //Vehiculos
        $pdf -> Ln(20); 
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(232,232,232);
        $pdf -> Cell(30);
        $pdf -> Cell(120,5, 'Vehiculos',0,0,'C');
        $pdf -> Ln(10);
        $pdf->Cell(20);  
        $pdf->Cell(50,8,'Camion',1,0,'C',1);
        $pdf->Cell(50,8,'Kilometraje',1,0,'C',1);
        $pdf->Cell(50,8,'Acoplado',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        foreach($datos as $a) {
            $pdf->Cell(20);
            $pdf->Cell(50,8,$a['qcamion'],1,0,'C');
            $pdf->Cell(50,8,$a['qkm'],1,0,'C');
            $pdf->Cell(50,8,$a['qacoplado'],1,1,'C');
        }
        //  $pdf->ezImage(pepe.png, 0, 420, ‘none’, ‘left’);
        //  QRcode::png($qr,false,QR_ECLEVEL_Q,8);
        $pdf -> Ln(20); 
        $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/resources/library/qr/qrReporte.png', 75, 200, 50,50);
        $pdf->Output('I','Logistica.pdf');
    }
?>