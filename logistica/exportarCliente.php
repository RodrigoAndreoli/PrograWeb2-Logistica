<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageP.php');
   
    $obj = new controlDB();
    $datos = $obj -> consultar("SELECT * 
        FROM Cliente");
    
    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('p','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(30);
    $pdf -> Cell(120,5, 'Clientes',0,0,'C');
    $pdf -> Ln(10);
    $pdf->Cell(1);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(30,8,'Cuit',1,0,'C',1);
    $pdf->Cell(30,8,'Razon Social',1,0,'C',1);
    $pdf->Cell(30,8,'Telefono',1,1,'C',1);
    $pdf->Cell(30,8,'Codigo Postal',1,0,'C',1);
    $pdf->Cell(30,8,'Calle',1,0,'C',1);
    $pdf->Cell(20,8,'Numero',1,0,'C',1);
    $pdf->Cell(15,8,'Piso',1,0,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(1);
        $pdf->Cell(30,6,$a['cuit'],1,0,'C');
        $pdf->Cell(30,6,ucwords($a['razon']),1,0,'C');
        $pdf->Cell(30,6,$a['telefono'],1,1,'C');
        $pdf->Cell(30,6,$a['dom_cp'],1,0,'C');
        $pdf->Cell(30,6,ucwords($a['dom_calle']),1,0,'C');
        $pdf->Cell(20,6,$a['dom_numero'],1,0,'C');
        $pdf->Cell(15,6,ucfirst($a['dom_piso']),1,0,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>