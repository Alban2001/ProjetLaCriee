<?php
		
	require('fpdf/fpdf.php');
	$db= new PDO('mysql:host=localhost;dbname=bdd_lacriee_a1', 'root', 'root');
	
	class myPDF extends FPDF{
		
		
		function Header(){
			
			$this->Image('img/logo_lacriee.jpg', 10, 5, 50, 40, 'JPG', '');
				
			$this->SetFont('Arial', 'B', 30);
				
			$this->Ln(5);
			
			$this->Cell(300,10,'LaCriée',0, 0,'C');
			
			$this->Ln(50);
			
		}
		
		function Table($db){
			// Ligne 1
			
			$stmt = $db->query("SELECT LotID, DateEnchereLot, HeureDebutEnchereLot, NomBateau, QualiteID, PresentationID, PoidsBrutLot, lot.BacID, TareBac, TailleID, NomEspece, NomScientifiqueEspece, NomCommunEspece, (PoidsBrutLot - TareBac) AS PoidsNet 
			FROM lot, bateau, espece, bac
			WHERE lot.BacID = bac.BacID AND lot.EspeceID = espece.EspeceID AND lot.BateauID = bateau.BateauID AND LotID = (SELECT max(LotID) FROM lot)");
			while($data = $stmt->fetch(PDO::FETCH_OBJ)){
				
			$this->SetFont('Arial', '', 15);
			$this->Cell(50,20,'F-29.197.500-CE','TLR', 0,'C');
			$this->Cell(40,30,$data->DateEnchereLot,'TLR', 0,'C');
			$this->SetFont('Arial', 'B', 40);
			$this->Cell(120,30,$data->NomBateau,'TLR', 0,'L');
			$this->SetFont('Arial', 'B', 14);
			$this->Cell(68,20,'PECHE EN ATHLANTIQUE','TLR', 0,'C');
			$this->Ln();
			$this->SetFont('Arial', '', 15);
			$this->Cell(50,10,'Audierne','BLR', 0, 'C');
			$this->Cell(40,10,$data->HeureDebutEnchereLot,'BLR', 0,'C');
			$this->Cell(120,10,'','LRB', 0, 'C');
			$this->SetFont('Arial', 'B', 15);
			$this->Cell(68,10,'NORD EST','LRB', 0, 'C');
			$this->Ln();
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(20,10,'   OP: O.P.O.B','LT', 0, 'L');
			$this->Cell(70,10,'','RT', 0, 'C');
			$this->SetFont('Arial','B', 40);
			$this->Cell(70,10,'','LT', 0, 'C');
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(118,10,'','RT', 0, 'C');
			$this->Ln();
			$this->Cell(50,10,'   Qu: '.$data->QualiteID,'L', 0,'L');
			$this->Cell(40,10,'Pr: '.$data->PresentationID,'R', 0,'C');
			$this->Cell(30,10,'  Lot:   ','L', 0, 'L');
			$this->SetFont('Arial', 'B', 80);
			$this->Cell(158,10,$data->LotID,'R', 0, 'L');
			$this->Ln();
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(20,10,'   Bacs: '.$data->BacID,'L', 0, 'L');
			$this->Cell(70,10,'','R', 0, 'C');
			$this->SetFont('Arial', '', 14);
			$this->Cell(70,40,'    '.$data->NomScientifiqueEspece,'L', 0,'L');
			$this->SetFont('Arial', 'B', 40);
			$this->Cell(118,10,$data->TailleID,'R', 0,'C');
			$this->Ln();
			$this->Cell(70,10,' Nbre:  1','L', 0, 'L');
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(20,10,'',0, 0,'L');
			$this->Cell(50,10,'   '.$data->NomEspece,'L', 0,'L');
			$this->Cell(138,10,'','R', 0,'L');
			$this->Ln();
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(118,10,'   Pal.:','LR', 0, 'L');
			$this->SetFont('Arial', '', 20);
			$this->Cell(10,10,'      '.$data->NomCommunEspece,0, 0,'C');
			$this->SetFont('Arial', '', 14);
			$this->Cell(150,10,'','R', 0,'L');
			$this->Cell(100,10,'','R', 0,'C');
			$this->Ln();
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(90,10,'   Brut: '.$data->PoidsBrutLot.' Kg','LR', 0, 'L');
			$this->Cell(80,10,'',0, 0,'C');
			$this->SetFont('Arial', 'B', 40);
			$this->Cell(108,10,$data->PoidsNet.' Kg','R', 0,'L');
			$this->Cell(100,10,'','R', 0,'C');
			$this->Ln();
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(90,10,'   Tare: '.$data->TareBac.' Kg','LBR', 0, 'L');
			$this->Cell(70,10,'','B', 0,'C');
			$this->Cell(70,10,'','B', 0,'C');
			$this->Cell(48,10,'','BR', 0,'C');
			$this->Ln();
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
	$pdf->Table($db);
	$pdf->Output();
		
?>