<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageP.php');
   
    $obj = new controlDB();
    $datos=$obj->consultar("SELECT * 
        FROM usuario");
    
    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('P','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(30);
    $pdf -> Cell(120,5, 'Usuarios',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(7);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(45,8,'Nombre',1,0,'C',1);
    $pdf->Cell(45,8,'Documento',1,0,'C',1);
    $pdf->Cell(45,8,'Numero',1,0,'C',1);
    $pdf->Cell(45,8,'Rol',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(7);
        $pdf->Cell(45,6,utf8_decode($a['nombre']),1,0,'C');
        $pdf->Cell(45,6,strtoupper($a['tipo_doc']),1,0,'C');
        $pdf->Cell(45,6,$a['num_doc'],1,0,'C');
        $pdf->Cell(45,6,utf8_decode(ucfirst($a['rol'])),1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>