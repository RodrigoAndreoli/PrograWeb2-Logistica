<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageL.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');


    $obj = new controlDB();
    $datos = $obj -> consultar("SELECT C.razon Razon, P.aceptado Aceptado, P.tiempo_estimado Tiempo, P.km_estimado Km, P.combustible_estimado Nafta, P.costo_real Costo
        FROM Presupuesto P
        JOIN Cliente C ON C.idCliente=P.fkClienteP
        ORDER BY Razon");
   

    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(80);
    $pdf -> Cell(120,5, 'Presupuestos',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(3);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(50,8,'Cliente',1,0,'C',1);
    $pdf->Cell(30,8,'Aceptado',1,0,'C',1);
    $pdf->Cell(50,8,'Costo Presupuestado',1,0,'C',1);
    $pdf->Cell(40,8,'Tiempo Estimado',1,0,'C',1);
    $pdf->Cell(50,8,'Kilometraje Estimado',1,0,'C',1);
    $pdf->Cell(50,8,'Combustible Estimado',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(3);
        $pdf->Cell(50,8,utf8_decode(ucwords($a['Razon'])),1,0,'C');
        $pdf->Cell(30,8,$a['Aceptado'],1,0,'C');
        $pdf->Cell(50,8,'$ '.$a['Costo'],1,0,'C');
        $pdf->Cell(40,8,$a['Tiempo'],1,0,'C');
        $pdf->Cell(50,8,$a['Km'],1,0,'C');
        $pdf->Cell(50,8,'$ '.$a['Nafta'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>