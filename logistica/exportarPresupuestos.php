<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageP.php');
   
    $obj = new controlDB();
    $datos = $obj -> consultar("SELECT u.nombre,c.razon,v.origen,v.destino,p.estado,p.aceptado,p.costo_real FROM presupuesto p join usuario u on u.idUsuario=p.idUsuario join cliente c on c.idCliente=p.idCliente join viaje v on v.idViaje=p.idViaje");
    
    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('p','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(30);
    $pdf -> Cell(120,5, 'Presupuestos',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(1);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(30,8,'Supervisor',1,0,'C',1);
    $pdf->Cell(30,8,'Cliente',1,0,'C',1);
    $pdf->Cell(30,8,'Origen',1,0,'C',1);
    $pdf->Cell(30,8,'Destino',1,0,'C',1);
    $pdf->Cell(30,8,'Estado',1,0,'C',1);
    $pdf->Cell(20,8,'Aceptado',1,0,'C',1);
    $pdf->Cell(25,8,'Costo',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(1);
        $pdf->Cell(30,6,$a['nombre'],1,0,'C');
        $pdf->Cell(30,6,ucwords($a['razon']),1,0,'C');
        $pdf->Cell(30,6,ucwords($a['origen']),1,0,'C');
        $pdf->Cell(30,6,$a['destino'],1,0,'C');
        $pdf->Cell(30,6,$a['estado'],1,0,'C');
        $pdf->Cell(20,6,$a['aceptado'],1,0,'C');
        $pdf->Cell(25,6,$a['costo_real'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>