<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageL.php');
   
    $obj = new controlDB();
    $datos = $obj -> consultar("SELECT U.nombre, C.razon, V.origen, V.destino, P.estado, P.aceptado, P.costo_real 
    FROM Presupuesto P 
    JOIN Usuario U ON U.idUsuario=P.idUsuario 
    JOIN Cliente C ON C.idCliente=P.idCliente 
    JOIN Viaje V ON V.idViaje=P.idViaje");
    
    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(30);
    $pdf -> Cell(120,5, 'Presupuestos',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(1);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(38,8,'Supervisor',1,0,'C',1);
    $pdf->Cell(38,8,'Cliente',1,0,'C',1);
    $pdf->Cell(55,8,'Origen',1,0,'C',1);
    $pdf->Cell(55,8,'Destino',1,0,'C',1);
    $pdf->Cell(34,8,'Estado',1,0,'C',1);
    $pdf->Cell(25,8,'Aceptado',1,0,'C',1);
    $pdf->Cell(35,8,'Costo',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(1);
        $pdf->Cell(38,6,$a['nombre'],1,0,'C');
        $pdf->Cell(38,6,ucwords($a['razon']),1,0,'C');
        $pdf->Cell(55,6,ucwords($a['origen']),1,0,'C');
        $pdf->Cell(55,6,utf8_decode($a['destino']),1,0,'C');
        $pdf->Cell(34,6,$a['estado'],1,0,'C');
        $pdf->Cell(25,6,$a['aceptado'],1,0,'C');
        $pdf->Cell(35,6,$a['costo_real'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>