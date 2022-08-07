<div id="contenu">
	<form action="<?php echo site_url('welcome/participation_encheres2') ?>" method="POST">
		
		<div class="divParticipationEncheres">
			<select name="LotID" class="selectLotEnchere">
					<option class="optionLotEnchere1">Date / Heure de l'enchère - Numéro du lot - Nom de l'espèce - Prix Départ Lot - Fin de la vente</option>
				<?php foreach($resultatTab as $row){ ?>
				
					<option  class="optionLotEnchere2" value="<?php echo $row['LotID'];?>"><?php echo $row['DateEnchereLot'].' '.$row['HeureDebutEnchereLot'].' - Lot n° '.$row['LotID'].' - '.$row['NomEspece'].' - '.$row['PrixDepartLot'].' € - '.date('Y-m-d H:i:s', strtotime(''.$row['DateEnchereLot'].$row['HeureDebutEnchereLot'].'+2 hours'))?></option>
				<?php }?>
			</select>
			
			<input class="btnParticipationEncheres" type="submit" name="btnEnchere" value="Envoyer">
	</div>
	</form>
</div>