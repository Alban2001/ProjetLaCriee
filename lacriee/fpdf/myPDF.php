<?php
		
	require('fpdf.php');
	
	class myPDF extends FPDF{
		
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
			
		$LotImpression['LotImpression']=$this->requetes->getLot();
		function Header(){
			
			$this->Image('img/LogoLaCriee.jpg', 10, 5, 50, 40, 'JPG', '');
				
			$this->SetFont('Arial', 'B', 30);
				
			$this->Ln(5);
			
			$this->Cell(300,10,'LaCriée',0, 0,'C');
			
			$this->Ln(50);
			
		}
		
		function Table(){
			// Ligne 1
			
			foreach($LotImpression as $row){
				
			$this->SetFont('Arial', 'B', 14);
			$this->Cell(70,30,'F-29.197.500-CE Audierne',1, 0,'C');
			$this->Cell(70,20, '',1, 0,'C');
			$this->Cell(70,20,'',1, 0,'C');
			$this->Cell(70,30,'PECHE EN ATHLANTIQUE',0, 0,'C');
			$this->Ln();
			$this->Cell(70,10,$row['DateEnchereLot'],1, 0,'C');
			$this->Cell(70,20, '',1, 0,'C');
			$this->Cell(70,20,'',1, 0,'C');
			$this->Cell(70,10,'NORD EST',0, 0,'C');
			$this->Ln();
			$this->Cell(70,10,'',0, 0,'C');
			$this->Cell(70,20, '',1, 0,'C');
			$this->Cell(70,20,'',1, 0,'C');
			$this->Cell(70,10,'NORD EST',1, 0,'C');
			}
		}
		
		function footer(){
			
			$footer = array(
				'Nom' => "LaCriée",
				'Commune' => "Commune de Plouhinec",
				'SiteGeographique' => "F-29.197.500-CE Audierne"
			);
			
			$this->SetY(-15);
			$this->SetFont('Arial','B',12);
    
			$this->Cell(0,10,$footer['Nom']." - ".$footer['Commune']." - ".$footer['SiteGeographique'],0,0,'C');
		}
	}
		
	$pdf = new myPDF('P', 'mm', 'A4');
	$pdf->AliasNbPages();
	$pdf->AddPage('L', 'A4', 0);
	$pdf->Table();
	$pdf->Output();
		
?>