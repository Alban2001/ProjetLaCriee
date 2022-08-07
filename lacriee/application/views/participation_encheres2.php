<div id="contenu">	
	<form action="<?php echo site_url("welcome/retour_enregistrementencheres")?>" method="POST">

	<?php foreach($AffichageLotEncheres as $row){ 

	$dateEnchere = strtotime($row['DateEnchereLot']." ".$row['HeureDebutEnchereLot']);
	$date_heureEnchere = mktime(date("H", $dateEnchere), date("i",$dateEnchere), date("s",$dateEnchere), date("m",$dateEnchere), date("d",$dateEnchere), date("Y",$dateEnchere));
	$tps_restant = $date_heureEnchere - time(); 

	$i_restantes = $tps_restant / 60;
	$H_restantes = $i_restantes / 60;

	$i_restantes = floor($i_restantes % 60); // Minutes restantes
	$H_restantes = floor($H_restantes % 24); // Heures restantes

	?>

	<?php if((date('Y-m-d H:i:s', time()) < date('Y-m-d H:i:s', strtotime(''.$row['DateEnchereLot'].$row['HeureDebutEnchereLot'].'+1 hours'))) && ($H_restantes > 0 or $i_restantes > 0)){?>

	<?php 
	
		$LotID3=$_POST['LotID'];
	$sql4="SELECT COUNT(*) AS 'NbrSaisie' 
		FROM poster 
		WHERE LotID = '".$LotID3."'";
		$result4 = $this->db->conn_id->prepare($sql4);
		$result4->execute();     
		$NbrSaisit = $result4->fetchAll(PDO::FETCH_ASSOC);
		$NbrSaisie = $NbrSaisit[0]['NbrSaisie'];
	
	if((date('Y-m-d H:i:s', time()) == date('Y-m-d H:i:s', strtotime(''.$row['DateEnchereLot'].$row['HeureDebutEnchereLot'].'+1 hours'))) && ($NbrSaisie == 0)){
		
		$sql3="SELECT PrixDepartLot
		FROM lot
		WHERE LotID = '".$LotID3."'";
		$result3 = $this->db->conn_id->prepare($sql3);
		$result3->execute();     
		$Lot = $result3->fetchAll(PDO::FETCH_ASSOC);
		$PrixDepartLot = $Lot[0]['PrixDepartLot'];	// Diminution du prix de départ du lot de 25%
		
		$PrixLotUpdate = array('PrixDepartLot' => $PrixDepartLot*0.75);

		$where2 = "LotID = '".$LotID3."'";

		$str2 = $this->db->update('lot', $PrixLotUpdate, $where2);
	
	}?>
	<div class="AfficherEncheres">
		<div>
			<label class="lblName">Lot n° </label><br/><label class="lblResultat"><?php echo $_POST['LotID'];?></label><br/><br/>
			
			<!-- Le prix saisit par le dernier acheteur doit s'afficher ci-dessous --> 
			<?php foreach($NbrLot as $row2){ 
			
				if($row2['NbrLot'] == 0) {?>
			<label class="lblName">Dernier Prix :</label><br/><label class="lblResultat"><?php echo $row['PrixDepartLot']?></label>
				<?php }
				
				else{
					foreach($AfficherEncheres as $row3){?>
			<label class="lblName">Dernier Prix :</label><br/><label class="lblResultat"><?php echo $row3['PrixEnchere']?></label>
				<?php }}
			
			}?>
			
		</div>
		<div>
			<label class="lblName">Bateau :</label><br/><label class="lblResultat"><?php echo $row['NomBateau'];?></label><br/><br/>
			
			<!-- Le dernier acheteur qui saisit un prix pour le lot n°X, doit s'afficher ci-dessous --> 
			<?php foreach($NbrLot as $row2){ 
			
				if($row2['NbrLot'] == 0) {?>
			<label class="lblName">Dernier Acheteur :</label><br/><label class="lblResultat"><?php echo "";?></label>
				<?php }
				
				else{
					foreach($AfficherEncheres as $row3){?>
				<label class="lblName">Dernier Acheteur :</label><br/><label class="lblResultat"><?php echo $row3['LoginAcheteur'];?></label>
				<?php }}
			
			}?>
			
		</div>
		<div>
			<label class="lblName">Espece :</label><br/><label class="lblResultat"><?php echo $row['NomEspece'];?></label><br/><br/>
			<label class="lblName">Taille :</label><br/><label class="lblResultat"><?php echo $row['TailleID'];?></label>
		</div>
		<div>
			<label class="lblName">Poids Brut :</label><br/><label class="lblResultat"><?php echo $row['PoidsBrutLot'].' Kg';?></label><br/><br/>
			<label class="lblName">Pres. :</label><br/><label class="lblResultat"><?php echo $row['PresentationID'];?></label>
		</div>
		<div>
			<label class="lblName">PrixDepartLot :</label><br/><label class="lblResultat"><?php echo $row['PrixDepartLot'].' €';?></label><br/><br/>
			<label class="lblName">Qualité :</label><br/><label class="lblResultat"><?php echo $row['QualiteID'];?></label>
		</div>
	</div>

	<br/>

	<div class="AfficherEncheres">
		<?php if($H_restantes == 0){?>
		
			<label class="lblName">Temps Restants : </label><br/><label class="lblResultat"><?php echo $i_restantes." minutes";?></label>
			
		<?php } 
			else{
		?>
		<label class="lblName">Temps Restants : </label><br/><label class="lblResultat"><?php echo $H_restantes."h et ".$i_restantes." minutes";?></label>
		<?php } ?>

	</div>

	<br/><br/><br/>

	<div class="divBtnCreationEncheres">

		<!-- Le dernier prix saisie par l'utilisateur doit être ensuite intégré dans la propriété "min" pour ne pas que les autres acheteurs saisissent un nombre inférieur -->
		
			<?php foreach($NbrLot as $row2){ 
			
				if($row2['NbrLot'] == 0) {?>
		<input class="btnCreationEncheres" type="number" name="DernierPrix" placeholder="12" min="<?php echo ceil($row['PrixDepartLot']+1)?>" title="Vous ne pouvez que saisir des nombres entiers" required>
				<?php }
				
				else{
					foreach($AfficherEncheres as $row3){ ?>
		<input class="btnCreationEncheres" type="number" name="DernierPrix" placeholder="12" min="<?php echo ceil($row3['PrixEnchere']+1)?>" title="Vous ne pouvez que saisir des nombres entiers" required>
		
				<?php }}
			
	}?>
			
		<input type="hidden" name="LotID2" value="<?php if(isset($_POST['LotID'])){echo $_POST['LotID'];}else{echo '0';}?>"/>
		
		<!-- Pour chaque saisie, on va remplir la table "POSTER" avec le dernier acheteur, dernier prix, date et heure de l'enchère (quand le bouton "Enregistrer" a été cliqué) et le lot choisi -->
		<input class="btnCreationEncheres" type="submit" name="btnEnvoyerNewPrix" value="Enregistrer"/>
		
	</div>
	<?php }
	else{
		
		foreach($NbrSaisieAcheteur as $row6){
		if($row6['NbrSaisieAcheteur']==0){
			
		$this->db->where('LotID',$_POST['LotID']);

		$this->db->delete('lot');
		}
		else{
			
		echo "<h2 align='center'>"."Fin de l'enchère du Lot n°".$_POST['LotID']."</h2>";
		// Dans cette condition, quand le compte à rebours touche à sa fin. Il va falloir remplir la table "FACTURE" avec la date de la facture et le montant (dernier prix)
		
		date_default_timezone_set('Europe/Paris');    
		$DateHeure = date('Y-m-d h:i', time());  
		
		$LotID=$_POST['LotID'];
	 	$DateHeureFacture=$DateHeure;
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
	}
	}

	 }?>

	</form>
</div>