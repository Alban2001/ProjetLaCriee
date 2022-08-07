<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model
{
	public function __construct() {
        parent::__construct();
    }
    
	public function getQualite(){
		
		$sql = "SELECT QualiteID, LibelleQualite FROM qualite";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getPresentation(){
		
		$sql = "SELECT * FROM presentation";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getBac(){
		
		$sql = "SELECT * FROM bac";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getTareBac($dataLot){
		
		$TareBac = $dataLot['BacIDLot'];
		
		$sql = "SELECT TareBac FROM bac WHERE BacID = '".$TareBac."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getEspece(){
		
		$sql = "SELECT * FROM espece";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getEspece2($dataLot){
		
		$EspeceID = $dataLot['NomEspeceLot'];
		
		$sql = "SELECT NomEspece, NomScientifiqueEspece, NomCommunEspece FROM espece WHERE EspeceID = '".$EspeceID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getLotID(){
		
		$sql = "SELECT max(LotID) FROM lot ";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getBateau(){
		
		$sql = "SELECT * FROM bateau";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getNomBateau($dataLot){
		
		$NomBateau = $dataLot['NomBateauLot'];
		
		$sql = "SELECT NomBateau FROM bateau WHERE BateauID = '".$NomBateau."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return  $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function EnrengistrementCreationComptes($data)
	{
	 	$Login = $data['LoginCompte'];
		$Mdp = $data['MdpCompte'];
		$RaisonSociale = $data['RaisonSocialeCompte'];
		$NumHabil = $data['NumHabilitationCompte'];
		$NumRue = $data['NumRueCompte'];
		$NomRue = $data['NomRueCompte'];
		$CodePostal = $data['CodePostalCompte'];
		$Ville = $data['VilleCompte'];
	 	
	 	$Acheteur = array(
					'AcheteurID'=>NULL,
	 				'LoginAcheteur'=>$Login,
	 				'PasswordAcheteur'=>$Mdp,
	 				'RaisonSocialeEntrepriseAcheteur'=>$RaisonSociale,
	 				'CodeRueAcheteur'=>$NumRue,
	 				'NomRueAcheteur'=>$NomRue,
	 				'CodePostalAcheteur'=>$CodePostal,
	 				'VilleAcheteur'=>$Ville,
	 				'NumHabilitation'=>$NumHabil);

	 	$requete=$this->db->insert('acheteur', $Acheteur);
	}
	
	public function EnrengistrementAjoutEspece($dataEspece)
	{
	 	$NomEspece = $dataEspece['NomEspece'];
		$NomScientifiqueEspece = $dataEspece['NomScienEspece'];
		$NomCommunEspece = $dataEspece['NomComEspece'];
	 	
	 	$Espece = array(
					'EspeceID'=>NULL,
	 				'NomEspece'=>$NomEspece,
	 				'NomScientifiqueEspece'=>$NomScientifiqueEspece,
	 				'NomCommunEspece'=>$NomCommunEspece);

	 	$requete=$this->db->insert('espece', $Espece);
	}
	
	public function EnrengistrementAjoutBateau($dataBateau)
	{
	 	$NomBateau = $dataBateau['NomBateau'];
		$ImmatriculationBateau = $dataBateau['ImmatBateau'];
	 	
	 	$Bateau = array(
					'BateauID'=>NULL,
	 				'NomBateau'=>$NomBateau,
	 				'ImmatriculationBateau'=>$ImmatriculationBateau);

	 	$requete=$this->db->insert('bateau', $Bateau);
	}
	
	public function EnrengistrementAjoutBac($dataBac)
	{
	 	$BacID = $dataBac['BacID'];
		$TareBac = $dataBac['TareBac'];
	 	
	 	$Bac = array(
					'BacID'=>$BacID,
	 				'TareBac'=>$TareBac);

	 	$requete=$this->db->insert('bac', $Bac);
	}
	
	public function EnrengistrementLots($dataLot)
	{
	 	$EspeceID = $dataLot['NomEspeceLot'];
		$QualiteID = $dataLot['LibelleQualiteLot'];
		$PresentationID = $dataLot['LibellePresentationLot'];
		$BacID = $dataLot['BacIDLot'];
		$PoidsBrutLot = $dataLot['PoidsBrutLot'];
		$PrixPlancherLot = $dataLot['PrixPlancherLot'];
		$PrixDepartLot = $dataLot['PrixDepartLot'];
		$PrixEncheresMax = $dataLot['PrixEncheresMaxLot'];
		$DateEnchereLot = $dataLot['DateEnchereLot'];
		$HeureDebutEnchereLot = $dataLot['HeureDebutEnchereLot'];
		$CodeEtatLot = $dataLot['CodeEtatLot'];
	 	
		
	 	$TailleID = $dataLot['TailleIDLot'];
		
		$sql = "SELECT TailleID FROM taille WHERE TailleID = '".$TailleID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		$Taille2 = $result->fetchAll(PDO::FETCH_ASSOC);
		
		if($Taille2 == false){
	 	$Taille = array(
					    'TailleID'=>$TailleID);
					
	 	$requeteTaille=$this->db->insert('taille', $Taille);
		$TailleID_Lot = $Taille['TailleID'];
		
		}
		else{
		$sql = "SELECT TailleID FROM taille WHERE TailleID = '".$TailleID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		$Taille = $result->fetchAll(PDO::FETCH_ASSOC);
		$TailleID_Lot = $Taille[0]['TailleID'];
		}
		
		
		$BateauID = $dataLot['NomBateauLot'];
		$DatePeche = $dataLot['DatePeche'];
		
		$sql = "SELECT DatePeche FROM peche, bateau WHERE DatePeche = '".$DatePeche."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		$Peche2 = $result->fetchAll(PDO::FETCH_ASSOC);
		
		if($Peche2 == false){
	 	$Peche = array(
					  'BateauID'=>$BateauID,
					  'DatePeche'=>$DatePeche);
					
	 	$requetePeche=$this->db->insert('peche', $Peche);
		$DatePeche_Lot = $Peche['DatePeche'];
		
		}
		else{
		$sql = "SELECT DatePeche FROM peche WHERE DatePeche = '".$DatePeche."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		$Peche = $result->fetchAll(PDO::FETCH_ASSOC);
		$DatePeche_Lot = $Peche[0]['DatePeche'];
		}
		
	 	$Lot = array(
					'LotID'=>NULL,
					'BateauID'=>$BateauID,
					'DatePeche'=>$DatePeche_Lot,
					'PoidsBrutLot'=>$PoidsBrutLot,
					'PrixPlancherLot'=>$PrixPlancherLot,
					'PrixDepartLot'=>$PrixDepartLot,
					'PrixEncheresMax'=>$PrixEncheresMax,
					'DateEnchereLot'=>$DateEnchereLot,
					'HeureDebutEnchereLot'=>$HeureDebutEnchereLot,
					'CodeEtatLot'=>$CodeEtatLot,
					'EspeceID'=>$EspeceID,
					'TailleID'=>$TailleID_Lot,
					'PresentationID'=>$PresentationID,
					'QualiteID'=>$QualiteID,
					'BacID'=>$BacID,
					'AcheteurID'=>NULL,
					'FactureID'=>NULL);
					
	 	$requeteLot=$this->db->insert('lot', $Lot);
	}
	
	public function AffichageLotTab()
	{
		$sql = "SELECT LotID, DateEnchereLot, HeureDebutEnchereLot, PrixDepartLot, NomEspece
		FROM lot, espece
		WHERE lot.EspeceID = espece.EspeceID
		AND FactureID IS NULL";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
		
	}	
	
	public function AffichageLotEncheres($data)
	{
		$LotID = $data['LotID'];
		
		$sql = "SELECT LotID, NomBateau, NomEspece, PoidsBrutLot, PrixDepartLot, TailleID, QualiteID, PresentationID, DateEnchereLot, HeureDebutEnchereLot
		FROM lot, bateau, espece
		WHERE bateau.BateauID = lot.BateauID
		AND espece.EspeceID = lot.EspeceID
		AND LotID = '".$LotID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
		
	}	
	
	public function NbrLot($data){
		
		$LotID = $data['LotID'];
		
		$sql="SELECT COUNT(poster.LotID) AS 'NbrLot'
		FROM poster
		WHERE poster.LotID = '".$LotID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function AfficherEncheres($data){
		
		$LotID = $data['LotID'];
		
		$sql = "SELECT LoginAcheteur, PrixEnchere
		FROM poster, acheteur
		WHERE acheteur.AcheteurID = poster.AcheteurID
		AND poster.LotID = '".$LotID."'
		AND PrixEnchere = (SELECT MAX(PrixEnchere) FROM poster WHERE poster.LotID = '".$LotID."')
		AND poster.AcheteurID = (SELECT AcheteurID FROM poster WHERE poster.LotID = '".$LotID."' AND PrixEnchere = (SELECT MAX(PrixEnchere) FROM poster WHERE poster.LotID = '".$LotID."'))";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public function ConnVerification($dataConnexion)
	{
		$LoginAcheteur=$dataConnexion['IdentifiantAcheteur'];
		$PasswordAcheteur=$dataConnexion['PasswordAcheteur'];

		$sql ="SELECT AcheteurID, LoginAcheteur 
		FROM acheteur 
		WHERE LoginAcheteur = '".$LoginAcheteur."' 
		AND PasswordAcheteur = '".$PasswordAcheteur."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();
		$query_result = $result->fetchAll(PDO::FETCH_ASSOC);


		if(empty($query_result))
		{
			$conn = false;
			return $conn;
		}

		else
		{
			$AcheteurID=$query_result[0]['AcheteurID'];
			$LoginAcheteur=$query_result[0]['LoginAcheteur'];

			$conn = array('valid' => true,
							'AcheteurID' => $AcheteurID,
							'LoginAcheteur'=> $LoginAcheteur);		
							
			return $conn;		
		}
	}
	
	public function EnrengistrementEncheres($dataEncheres)
	{
	 	$LotID=$dataEncheres['LotID'];
		$AcheteurID=$dataEncheres['AcheteurID'];
	 	$Date_enchere=$dataEncheres['DateHeureEnchere'];
		$PrixEnchere=$dataEncheres['DernierPrix'];
		
	 	$date_enchere = array('DateHeureEnchere'=>$Date_enchere);

	 	$requete=$this->db->insert('date_enchere', $date_enchere);
		
		$DateHeureEnchere=$date_enchere["DateHeureEnchere"];
		
	 	$Poster = array(
					'LotID'=>$LotID,
					'DateHeureEnchere'=>$DateHeureEnchere,
	 				'AcheteurID'=>$AcheteurID,
					'PrixEnchere'=>$PrixEnchere);

	 	$requete=$this->db->insert('poster', $Poster);
	}
	
	 public function EnrengistrementFactureLot($data)
	 {
	 	 $LotID=$data['LotID'];
	 	 $DateHeureFacture=$data['DateHeureFacture'];
		 $FacturePayee="Non";	// Valeur par défaut
		
		 $sql2="SELECT PrixEnchere, AcheteurID
		 FROM poster
	     WHERE PrixEnchere = (SELECT MAX(PrixEnchere) AS 'DernierPrixEnchere' FROM poster WHERE LotID = '".$LotID."')
		 AND AcheteurID = (SELECT AcheteurID FROM poster WHERE poster.LotID = '".$LotID."' AND PrixEnchere = (SELECT MAX(PrixEnchere) FROM poster WHERE poster.LotID = '".$LotID."'))";
		 $result2 = $this->db->conn_id->prepare($sql2);
		 $result2->execute();     
		 $requete = $result2->fetchAll(PDO::FETCH_ASSOC);
		 $MontantFacture = $requete[0]['PrixEnchere'];
		 $AcheteurID=$requete[0]['AcheteurID'];
		
	 	 $Facture = array(
					 'FactureID'=>NULL,
					 'DateHeureFacture'=>$DateHeureFacture,
					 'MontantFacture'=>$MontantFacture,
					 'FacturePayee'=>$FacturePayee);

	 	 $requete=$this->db->insert('facture', $Facture);
		
		 $sql = "SELECT MAX(FactureID) AS 'DerniereFacture' FROM facture";
		 $result = $this->db->conn_id->prepare($sql);
		 $result->execute();     
		 $Facture = $result->fetchAll(PDO::FETCH_ASSOC);
		 $FactureID = $Facture[0]['DerniereFacture'];
		
		 $LotUpdate = array('AcheteurID' => $AcheteurID, 'FactureID' => $FactureID);

		 $where = "LotID = '".$LotID."'";

		 $str = $this->db->update('lot', $LotUpdate, $where);
		
	 }
	
	public function AfficherFacturesAcheteur($data)
	{
		$AcheteurID=$data['AcheteurID'];
		
		$sql = "SELECT lot.LotID, lot.FactureID, espece.NomEspece, facture.DateHeureFacture
		FROM lot, espece, facture
		WHERE lot.EspeceID = espece.EspeceID
		AND lot.FactureID = facture.FactureID
		AND lot.AcheteurID = '".$AcheteurID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public function AfficherElementsFactures($dataFacture){
		
		$FactureID = $dataFacture['FactureID'];
		
		$sql="SELECT facture.FactureID, DateHeureFacture, MontantFacture, FacturePayee, 
		             LotID, PrixDepartLot, NomEspece, NomScientifiqueEspece, NomCommunEspece, LibelleQualite, LibellePresentation, TailleID, (PoidsBrutLot-bac.TareBac) AS 'PoidsNet', 
					 LoginAcheteur, RaisonSocialeEntrepriseAcheteur, CodeRueAcheteur, NomRueAcheteur, CodePostalAcheteur, VilleAcheteur
		FROM facture, espece, qualite, presentation, lot, bac, acheteur
		WHERE lot.FactureID = facture.FactureID
		AND lot.QualiteID = qualite.QualiteID
		AND lot.PresentationID = presentation.PresentationID
		AND lot.EspeceID = espece.EspeceID
		AND lot.BacID = bac.BacID
		AND lot.AcheteurID = acheteur.AcheteurID
		AND facture.FactureID = '".$FactureID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function VerificationPaiement($dataFacture){
		
		$FactureID = $dataFacture['FactureID'];
		
		$sql="SELECT FacturePayee
		FROM facture
		WHERE facture.FactureID = '".$FactureID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function UpdateFacture($dataFacture){
		
		$FactureID = $dataFacture['FactureID'];
		
		$FactureUpdate = array('FacturePayee' => "Oui");

		$where = "FactureID = '".$FactureID."'";

		$str = $this->db->update('facture', $FactureUpdate, $where);
	}
	
	public function NbrSaisieAcheteur($data){
	 	$LotID=$data['LotID'];
		
		$sql="SELECT COUNT(*) AS 'NbrSaisieAcheteur' 
		FROM poster 
		WHERE LotID = '".$LotID."'";
		$result = $this->db->conn_id->prepare($sql);
		$result->execute();     
		return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
}
