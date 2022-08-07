<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
		$this->load->helper(array('form','url'));
		$this->load->database();
    }
	 
	public function index()
	{ 
		$this->load->helper('url_helper');
		
		$this->load->view('header');
		$this->load->view('menu_pageprinc');
		$this->load->view('acceuil');
		$this->load->view('footer');
	}
	
	public function connexion(){
		$this->load->helper('url_helper');
		
		$this->load->model('model','requetes');
		
		$this->load->view('header');
		$this->load->view('menu_pageprinc');
		$this->load->view('connexion');
		$this->load->view('footer');

	}
	
	public function connexion_admin(){
		$this->load->helper('url_helper');
		
		$this->load->model('model','requetes');
		
		$this->load->view('header');
		$this->load->view('menu_pageprinc');
		$this->load->view('connexion_admin');
		$this->load->view('footer');

	}
	
	public function retour_connexionadmin()
	{
		$this->load->model('model', 'requetes');
		$this->load->helper('url_helper');
		$this->load->view('header');
		$this->load->view('menu_admin');

		if (isset($_POST['btnConnexion']))
		{
			if($_POST['IdentifiantAcheteur']=="Admin" && $_POST['PasswordAcheteur']=="Admin"){
				echo "Bienvenue Admin sur le site de LaCriée";
			}
			else{
				header('Location: connexion_admin');
			}
		}
		$this->load->view('acceuil');
		$this->load->view('footer');
	}
	
	public function retour_connexion()
	{
		$this->load->model('model', 'requetes');
		$this->load->helper('url_helper');
		$this->load->view('header');
		$this->load->view('menu_acheteur');
		$this->load->view('acceuil');

		if (isset($_POST['btnConnexion']))
		{
			$dataConnexion['IdentifiantAcheteur']=$this->input->post('IdentifiantAcheteur');
			$dataConnexion['PasswordAcheteur']=$this->input->post('PasswordAcheteur');

			$conn=$this->requetes->ConnVerification($dataConnexion);
			$this->session($conn);

		}

		$this->load->view('footer');
	}
	
	public function session($conn)
	{
		session_start();
		
		if(isset($conn))
		{
			$_SESSION['ID']=$conn['AcheteurID'];
			$_SESSION['LoginAcheteur']=$conn['LoginAcheteur'];
			
		}

		
		if(isset($_SESSION["ID"]))
		{ 
			$this->load->view('succes_conn');
		}   

		else
		{ 
			$this->load->view('echec_conn');
			echo "Informations invalide. Veuillez reessayer.";
		} 


	}
	
	public function deconnexion()
	{
		session_start();
		
		$kill=session_destroy();

		$this->load->helper('url_helper');
		$this->load->view('header');
		$this->load->view('menu_pageprinc');
		$this->load->view('deconnexion');
		$this->load->view('acceuil');
		$this->load->view('footer');


		if($kill = true)
		{ 
			return $kill;
		}

		else
		{
			echo "Erreur, la déconnexion ne s'est pas déclenché, veuillez réessayer";
			$kill=false;
			return $kill;
		}
	}
	
	public function creation_comptes(){
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$this->load->view('header');
		$this->load->view('menu_admin');
		$this->load->view('creation_comptes');
		$this->load->view('footer');

	}
	
	public function retour_enregistrementcomptes(){
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$this->load->view('header');
		$this->load->view('menu_admin');
		
		$data['LoginCompte']=$this->input->post('LoginAcheteur');
		$data['MdpCompte']=$this->input->post('PasswordAcheteur');
		$data['RaisonSocialeCompte']=$this->input->post('RaisonSocialeEntreprise');
		$data['NumHabilitationCompte']=$this->input->post('NumHabilitation');
		$data['NumRueCompte']=$this->input->post('CodeRue');
		$data['NomRueCompte']=$this->input->post('NomRue');
		$data['CodePostalCompte']=$this->input->post('CodePostal');
		$data['VilleCompte']=$this->input->post('Ville');
		
		if (isset($_POST['btnCreationComptes'])){
			$this->requetes->EnrengistrementCreationComptes($data);
		}
		
		$this->load->view('retour_enregistrementcomptes');
		$this->load->view('footer');

	}
	
	
	public function ajout_elements(){
		$this->load->helper('url_helper');
		
		$this->load->view('header');
		$this->load->view('menu_admin');
		$this->load->view('ajout_elements');
		$this->load->view('footer');

	}
	
	public function retour_enregistrementajoutespece(){
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$this->load->view('header');
		$this->load->view('menu_admin');
		
		$dataEspece['NomEspece']=$this->input->post('NomEspece');
		$dataEspece['NomScienEspece']=$this->input->post('NomScientifiqueEspece');
		$dataEspece['NomComEspece']=$this->input->post('NomCommunEspece');
		
		if (isset($_POST['btnAjoutEspece'])){
			$this->requetes->EnrengistrementAjoutEspece($dataEspece);
		}
		
		$this->load->view('retour_enregistrementajoutespece');
		$this->load->view('footer');

	}
	
	public function retour_enregistrementajoutbateau(){
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$this->load->view('header');
		$this->load->view('menu_admin');
		
		$dataBateau['NomBateau']=$this->input->post('NomBateau');
		$dataBateau['ImmatBateau']=$this->input->post('ImmatriculationBateau');
		
		if (isset($_POST['btnAjoutBateau'])){
			$this->requetes->EnrengistrementAjoutBateau($dataBateau);
		}
		
		$this->load->view('retour_enregistrementajoutbateau');
		$this->load->view('footer');

	}
	
	public function retour_enregistrementajoutbac(){
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$this->load->view('header');
		$this->load->view('menu_admin');
		
		$dataBac['BacID']=$this->input->post('BacID');
		$dataBac['TareBac']=$this->input->post('TareBac');
		
		if (isset($_POST['btnAjoutBac'])){
			$this->requetes->EnrengistrementAjoutBac($dataBac);
		}
		
		$this->load->view('retour_enregistrementajoutbac');
		$this->load->view('footer');

	}
	
	public function creation_lots(){
		$this->load->helper('url_helper');
		$this->load->model('model','requetes');
		
		$this->load->view('header');
		$this->load->view('menu_admin');
		
		$data['resultatBac']= $this->requetes->getBac();
		$data['resultatEspece']= $this->requetes->getEspece();
		$data['resultatQualite']= $this->requetes->getQualite();
		$data['resultatPresentation']= $this->requetes->getPresentation();
		$data['resultatBateau']= $this->requetes->getBateau();

		$this->load->view('creation_lots',$data);
		$this->load->view('footer');

	}
	
	public function retour_enregistrementlots(){
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$this->load->view('header');
		$this->load->view('menu_admin');
		
		$dataLot['NomEspeceLot']=$this->input->post('NomEspece');
		$dataLot['LibelleQualiteLot']=$this->input->post('LibelleQualite');
		$dataLot['LibellePresentationLot']=$this->input->post('LibellePresentation');
		$dataLot['NomBateauLot']=$this->input->post('NomBateau');
		$dataLot['TailleIDLot']=$this->input->post('TailleID');
		$dataLot['BacIDLot']=$this->input->post('BacID');
		$dataLot['PoidsBrutLot']=$this->input->post('PoidsBrutLot');
		$dataLot['PrixPlancherLot']=$this->input->post('PrixPlancherLot');
		$dataLot['PrixDepartLot']=$this->input->post('PrixDepartLot');
		$dataLot['PrixEncheresMaxLot']=$this->input->post('PrixEncheresMax');
		$dataLot['DateEnchereLot']=$this->input->post('DateEnchereLot');
		$dataLot['HeureDebutEnchereLot']=$this->input->post('HeureDebutEnchereLot');
		$dataLot['CodeEtatLot']=$this->input->post('CodeEtatLot');
		$dataLot['DatePeche']=$this->input->post('DatePeche');
		
		if (isset($_POST['btnCreationLots'])){
			$this->requetes->EnrengistrementLots($dataLot);
		}
		$dataLot['NomBateau']=$this->requetes->getNomBateau($dataLot);
		$dataLot['TareBac']=$this->requetes->getTareBac($dataLot);
		$dataLot['LotID']=$this->requetes->getLotID($dataLot);
		$dataLot['EspeceLot']=$this->requetes->getEspece2($dataLot);
		
		
		$this->load->view('retour_enregistrementlots', $dataLot);
		$this->load->view('footer');

	}
	
	public function impression_lots(){
		
		$this->load->helper('url_helper');
		
		$this->load->view('impression_lots');
		
	}
	
	public function participation_encheres(){
		
		// affichage d'un menu déroulant avec l'ensemble des lots
		
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$data['resultatTab']=$this->requetes->AffichageLotTab(); 
		
		$this->load->view('header');
		$this->load->view('menu_acheteur');
		$this->load->view('participation_encheres', $data);
		$this->load->view('footer');
		
	}
	
	public function participation_encheres2(){
		
		// affichage du lot sélectionné avec ses informations
		// affichage du dernier acheteur et de son dernier prix
		// affichage du compte à rebours et à la fin de celui-ci, la vente de l'enchère sera terminée
		
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$data['LotID']=$this->input->post('LotID');
		$data['AfficherEncheres']=$this->requetes->AfficherEncheres($data);
		$data['NbrLot']=$this->requetes->NbrLot($data);
		$data['NbrSaisieAcheteur']=$this->requetes->NbrSaisieAcheteur($data);
		
		$data['AffichageLotEncheres']=$this->requetes->AffichageLotEncheres($data);
		
		$this->load->view('header');
		$this->load->view('menu_acheteur');
		$this->load->view('participation_encheres2', $data);
		$this->load->view('footer');
		
	}
	
	public function retour_enregistrementencheres(){
		
		session_start();
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		date_default_timezone_set('Europe/Paris');    
		$DateHeureEnchere = date('Y-m-d h:i:s', time());  
		
		$dataEncheres['LotID']=$this->input->post('LotID2');
		$dataEncheres['AcheteurID']=$_SESSION["ID"];
		$dataEncheres['DateHeureEnchere']=$DateHeureEnchere;
		$dataEncheres['DernierPrix']=$this->input->post('DernierPrix');
		
		$dateEncheres=$this->requetes->EnrengistrementEncheres($dataEncheres);
		
		$this->load->view('header');
		$this->load->view('menu_acheteur');
		$this->load->view('retour_enregistrementencheres', $dataEncheres);
		$this->load->view('footer');
	}
	
	public function factures(){
		
		session_start();
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$data['AcheteurID']=$_SESSION["ID"];
		$data['AfficherFacturesAcheteur']=$this->requetes->AfficherFacturesAcheteur($data); 
		
		$this->load->view('header');
		$this->load->view('menu_acheteur');
		$this->load->view('factures', $data);
		$this->load->view('footer');
		
	}
	
	public function affichage_factures(){
		session_start();
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$dataFacture['FactureID']=$this->input->post('FactureID');
		$dataFacture['AfficherElementsFactures']=$this->requetes->AfficherElementsFactures($dataFacture); 
		$dataFacture['VerificationPaiement']=$this->requetes->VerificationPaiement($dataFacture); 
		
		$this->load->view('header');
		$this->load->view('menu_acheteur');
		$this->load->view('affichage_factures', $dataFacture);
		$this->load->view('footer');
	}
	
	public function retour_paiementfactures(){
		session_start();
		$this->load->helper('url_helper');
		$this->load->model('model', 'requetes');
		
		$dataFacture['FactureID']=$this->input->post('FactureID2');
		
		
		$this->load->view('header');
		$this->load->view('menu_acheteur');
		
		if(isset($_POST['btnPayer'])){
			$this->requetes->UpdateFacture($dataFacture);
		}
		
		$this->load->view('retour_paiementfactures', $dataFacture);
		$this->load->view('footer');
		
	}
	
	public function impression_factures(){
		
		$this->load->helper('url_helper');
		
		$this->load->view('impression_factures');
		
	}

	
	
	
}
?>