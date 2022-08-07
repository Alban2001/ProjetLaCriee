<div id="contenu">
	<form action="<?php echo site_url('welcome/affichage_factures') ?>" method="POST">
		
		<div class="divParticipationEncheres">
			<select name="FactureID" class="selectLotEnchere">
					<option class="optionLotEnchere1">Numéro du lot - Numéro de la facture - Nom de l'espèce - Date Facture</option>
				<?php foreach($AfficherFacturesAcheteur as $row){ ?>
				
					<option  class="optionLotEnchere2" value="<?php echo $row['FactureID'];?>"><?php echo 'Lot n° '.$row['LotID'].' - Facture n° '.$row['FactureID'].' - '.$row['NomEspece'].' - '.$row['DateHeureFacture'].''?></option>
				<?php }?>
			</select>
			
			<input class="btnParticipationEncheres" type="submit" name="btnEnchere" value="Envoyer">
	</div>
	</form>
</div>