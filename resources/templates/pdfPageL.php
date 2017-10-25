<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/resources/library/fpdf/fpdf.php');
	
	class PDF extends FPDF {
		function Header() {
			$this -> Image(''.$_SERVER['DOCUMENT_ROOT'].'/resources/images/title-logo.png', 260, 5, 20 );
			$this -> SetFont('Arial','B',15);
			$this -> Cell(30);
			$this -> Cell(220,5, 'Logistica',0,0,'C');
            $this -> Line(0,20,300,20);
			$this -> Ln(20);
		}
		
		function Footer() {
			$this -> SetY(-15);
			$this -> SetFont('Arial','I', 8);
			$this -> Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>