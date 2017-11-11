<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageP.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
   
    $obj = new controlDB();
    $datos=$obj -> consultar("SELECT * 
        FROM Usuario
        ORDER BY rol");
    
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
    $pdf->Cell(5);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(30,8,'DNI',1,0,'C',1);
    $pdf->Cell(30,8,'Rol',1,0,'C',1);
    $pdf->Cell(40,8,'Nombre',1,0,'C',1);
	$pdf->Cell(50,8,'Fecha de Nacimiento',1,0,'C',1);
	$pdf->Cell(30,8,'Tipo Licencia',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    foreach($datos as $a) {
        $pdf->Cell(5);
        $pdf->Cell(30,8,$a['num_doc'],1,0,'C');
        $pdf->Cell(30,8,utf8_decode(ucfirst($a['rol'])),1,0,'C');
        $pdf->Cell(40,8,utf8_decode(ucwords($a['nombre'])),1,0,'C');
        $pdf->Cell(50,8,$a['fecha_nacimiento'],1,0,'C');
		$pdf->Cell(30,8,utf8_decode(ucfirst($a['tipo_licencia'])),1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>