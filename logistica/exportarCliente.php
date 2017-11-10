<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageL.php');
   
    $obj = new controlDB();
    $datos = $obj -> consultar("SELECT * 
        FROM Cliente");
    
    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('l','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(80);
    $pdf -> Cell(120,5, 'Clientes',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(20);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(30,8,'Cuit',1,0,'C',1);
    $pdf->Cell(50,8,'Razon Social',1,0,'C',1);
    $pdf->Cell(30,8,'Telefono',1,0,'C',1);
    $pdf->Cell(40,8,'Codigo Postal',1,0,'C',1);
    $pdf->Cell(50,8,'Calle',1,0,'C',1);
    $pdf->Cell(20,8,'Numero',1,0,'C',1);
    $pdf->Cell(15,8,'Piso',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(20);
        $pdf->Cell(30,6,$a['cuit'],1,0,'C');
        $pdf->Cell(50,6,utf8_decode($a['razon']),1,0,'C');
        $pdf->Cell(30,6,$a['telefono'],1,0,'C');
        $pdf->Cell(40,6,$a['dom_cp'],1,0,'C');
        $pdf->Cell(50,6,utf8_decode($a['dom_calle']),1,0,'C');
        $pdf->Cell(20,6,$a['dom_numero'],1,0,'C');
        $pdf->Cell(15,6,$a['dom_piso'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>