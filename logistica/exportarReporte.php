<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/control.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/templates/pdfPageL.php');
    include($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
   
    $idViaje = $_REQUEST['id'];
    $obj = new controlDB();
    $datos = $obj -> consultar("SELECT U.nombre Nombre, R.tiempo Tiempo, R.longitud Longitud, R.latitud Latitud, R.motivo Motivo, R.descripcion Descripcion, R.km Kilometros, R.combustible Combustible
            FROM Reporte R
            JOIN Usuario U ON R.fkChoferR = U.idUsuario
            WHERE fkViajeR LIKE '%".$idViaje."%'
            ORDER BY tiempo");
    $x = 0;
    $pdf=new PDF();
    //Alias de pagina para poder usar nb
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4');
    $pdf->setTitle('Logistica');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(232,232,232);
    $pdf -> Cell(80);
    $pdf -> Cell(120,5, 'Usuarios',0,0,'C');
    $pdf -> Ln(10);
    //Longitud, alto, titulo, border, salto, alineado
    $pdf->Cell(10);
    $pdf->Cell(15,8,'Nro.',1,0,'C',1);
    $pdf->Cell(30,8,'Chofer',1,0,'C',1);
    $pdf->Cell(40,8,'Fecha y Hora',1,0,'C',1);
    $pdf->Cell(30,8,'Coordenadas',1,0,'C',1);
	$pdf->Cell(30,8,'Motivo',1,0,'C',1);
	$pdf->Cell(50,8,'Descripcion',1,0,'C',1);
	$pdf->Cell(30,8,'Kilometros',1,0,'C',1);
	$pdf->Cell(30,8,'Combustible',1,1,'C',1);
    $pdf->SetFont('Arial','',10);

    foreach($datos as $a) {
        $x++;
        $pdf->Cell(10);
        $pdf->Cell(15,8,$x,1,0,'C');
        $pdf->Cell(30,8,utf8_decode($a['Nombre']),1,0,'C');
        $pdf->Cell(40,8,$a['Tiempo'],1,0,'C');
        $pdf->Cell(30,8,'('.substr($a['Longitud'],0,6).' ; '.substr($a['Latitud'],0,6).')',1,0,'C');
        $pdf->Cell(30,8,utf8_decode($a['Motivo']),1,0,'C');
        $pdf->Cell(50,8,utf8_decode($a['Descripcion']),1,0,'C');
        $pdf->Cell(30,8,$a['Kilometros'],1,0,'C');
		$pdf->Cell(30,8,'$ '.$a['Combustible'],1,1,'C');
    }
    $pdf->Output('I','Logistica.pdf');

?>