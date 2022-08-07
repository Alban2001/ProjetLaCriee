<?php
		
	require('fpdf/fpdf.php');
	
	$db= new PDO('mysql:host=localhost;dbname=bdd_lacriee_a1', 'root', 'root');
	
	if(isset($_POST['FactureID3'])){
		$FactureID=$_POST['FactureID3'];
	}
	else{
		$FactureID=0;
	}
	
	class myPDFFactures extends FPDF{
		
		
		function Header(){
			$this->SetFont('Arial', 'B', 30);
				
			$this->Ln(5);
			
			$this->Cell(200,10,'LaCriée',0, 0,'C');
			
			$this->Ln(25);
			
			$this->Image('img/logo_lacriee.jpg', 10, 5, 50, 40, 'JPG', '');
			$this->SetFont('Arial', '', 15);
				
			$this->Ln(10);
			$this->Cell(30,10,'LaCriée',0, 0,'L');
			
			$this->Ln(5);
			$this->Cell(30,10,'Commune de Plouhinec',0, 0,'L');
			
			$this->Ln(5);
			$this->Cell(30,10,'F-29.197.500-CE Audierne',0, 0,'L');
			
			$this->Ln(5);
			$this->Cell(30,10,'Tel : 03.88.33.23.42',0, 0,'L');
			
			$this->Ln(5);
			$this->Cell(30,10,'@ : contact@lacriee.fr',0, 0,'L');
			$this->Ln(10);
			$this->Cell(30,10,'N° SIRET : 203193289329',0, 0,'L');
		}
		
		function Table($db, $FactureID){
			// Ligne 1
			$this->Ln(20);
			$this->SetFont('Arial', 'B', 20);
			$this->SetFillColor(135,173,190);
			$this->Cell(190,10,'FACTURE',1, 0,'C',true); 
			$this->Ln(20);
			
			$stmt = $db->query("SELECT facture.FactureID, DateHeureFacture, MontantFacture, FacturePayee, 
								LotID, PrixDepartLot, NomEspece, NomScientifiqueEspece, NomCommunEspece, LibelleQualite, LibellePresentation, TailleID, (PoidsBrutLot-bac.TareBac) AS 'PoidsNet', 
								LoginAcheteur, RaisonSocialeEntrepriseAcheteur, CodeRueAcheteur, NomRueAcheteur, CodePostalAcheteur, VilleAcheteur
								FROM facture, espece, qualite, presentation, lot, bac, acheteur
								WHERE lot.FactureID = facture.FactureID
								AND lot.QualiteID = qualite.QualiteID
								AND lot.PresentationID = presentation.PresentationID
								AND lot.EspeceID = espece.EspeceID
								AND lot.BacID = bac.BacID
								AND lot.AcheteurID = acheteur.AcheteurID
								AND facture.FactureID = '".$FactureID."'");
		
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
				
			$this->SetFont('Arial', '', 15);
			$this->Cell(30,30,'Facture n° : '.$data['FactureID'],0, 0,'L');
			$this->Ln(1);
			$this->Cell(30,10,'Date de la facture : '.$data['DateHeureFacture'],0, 0, 'L');
			$this->Ln(10);
			$this->Cell(190,30,'Acheteur : '.$data['LoginAcheteur'],0, 0,'R');
			$this->Ln(5);
			$txt = utf8_encode($data['RaisonSocialeEntrepriseAcheteur']);
			$this->Cell(190,30,$txt,0, 0,'R');
			$this->Ln(5);
			$this->Cell(190,30,$data['CodeRueAcheteur'].' '.$data['NomRueAcheteur'],0, 0,'R');
			$this->Ln(5);
			$this->Cell(190,30,$data['CodePostalAcheteur'].' '.$data['VilleAcheteur'],0, 0,'R');
			$this->Ln(25);
			$this->SetFillColor(188,221,237);
			$this->Cell(125,10,'Désignation',1, 0,'L',true);
			$this->Cell(35,10,'Prix de départ',1, 0,'L',true);
			$this->Cell(30,10,'Prix final',1, 0,'C',true);
			$this->Ln();
			$this->SetFont('Arial', '', 12);
			$this->Cell(125,10,'Lot n° : '.$data['LotID'],1, 0,'L');
			$this->Cell(35,10,$data['PrixDepartLot'],'LTR', 0,'C');
			$this->Cell(30,10,$data['MontantFacture'],'LTR', 0,'C');
			$this->Ln();
			$this->Cell(125,10,'Espèce : '.$data['NomEspece'],'LTR', 0,'L');
			$this->Cell(35,10,'',0, 0,'L');
			$this->Cell(30,10,'','LR', 0,'L');
			$this->Ln();
			$this->Cell(125,10,'               '.$data['NomScientifiqueEspece'],'LR', 0,'L');
			$this->Cell(35,10,'',0, 0,'L');
			$this->Cell(30,10,'','LR', 0,'L');
			$this->Ln();
			$this->Cell(125,10,'               '.$data['NomCommunEspece'],'LR', 0,'L');
			$this->Cell(35,10,'',0, 0,'L');
			$this->Cell(30,10,'','LR', 0,'L');
			$this->Ln();
			$this->Cell(125,10,'Qualité : '.utf8_encode($data['LibelleQualite']),1, 0,'L');
			$this->Cell(35,10,'',0, 0,'L');
			$this->Cell(30,10,'','LR', 0,'L');
			$this->Ln();
			$this->Cell(125,10,'Présentation : '.utf8_encode($data['LibellePresentation']),1, 0,'L');
			$this->Cell(35,10,'',0, 0,'L');
			$this->Cell(30,10,'','LR', 0,'L');
			$this->Ln();
			$this->Cell(125,10,'Taille : '.$data['TailleID'],1, 0,'L');
			$this->Cell(35,10,'',0, 0,'L');
			$this->Cell(30,10,'','LR', 0,'L');
			$this->Ln();
			$this->Cell(125,10,'Poids net : '.$data['PoidsNet'].' Kg',1, 0,'L');
			$this->Cell(35,10,'','BL', 0,'L');
			$this->Cell(30,10,'','BRL', 0,'L');
			$this->Ln(15);
			$this->SetX(135);
			$this->SetFont('Arial','B',12);
			$this->Cell(35,10,'Net à payer',1,'L');
			$this->SetFont('Arial','',12);
			$this->Cell(30,10,$data['MontantFacture'].' €',1, 0,'C');
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
	
	$pdf = new myPDFFactures('P', 'mm', 'A4');
	$pdf->AliasNbPages();
	$pdf->AddPage('P', 'A4', 0);
	$pdf->Table($db, $FactureID);
	$pdf->Output();
		
?>