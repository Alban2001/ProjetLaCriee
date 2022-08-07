<div id="contenu">		
	<?php 

		date_default_timezone_set('Europe/Paris');

	?>
	<form action="<?php echo site_url('welcome/retour_enregistrementlots');?>" method="POST" autocomplete="off">
		
		<div class="BoxLots">
			<div>
			<br/><label for="NomEspece" class="lblCreationLots">Nom de l'espèce : </label><br/>
				<select class="selectCreationLotsEspece" name="NomEspece">
				<?php foreach($resultatEspece as $row){?>
					<option value="<?php echo $row['EspeceID'];?>"><?php echo '<strong>'.$row['NomEspece']." - ".$row['NomScientifiqueEspece']." - ".$row['NomCommunEspece'].'</strong>';?></option>
				<?php }?>
				</select>
				
			<br/><label for="LibelleQualite" class="lblCreationLots">Qualite : </label><br/>
				<select class="selectCreationLots" name="LibelleQualite">
				<?php foreach($resultatQualite as $row){?>
					<option value="<?php echo $row['QualiteID'];?>"><?php echo $row['LibelleQualite'];?></option>
				<?php }?>
				</select>
				
			<br/><label for="LibellePresentation" class="lblCreationLots">Présentation : </label><br/>
				<select class="selectCreationLots" name="LibellePresentation">
				<?php foreach($resultatPresentation as $row){?>
					<option value="<?php echo $row['PresentationID'];?>"><?php echo $row['LibellePresentation'];?></option>
				<?php }?>
				</select>
			</div>
			<div>
			<br/><label for="NomBateau" class="lblCreationLots">Nom du bateau : </label><br/>
				<select class="selectCreationLots" name="NomBateau">
				<?php foreach($resultatBateau as $row){?>
					<option value="<?php echo $row['BateauID'];?>"><?php echo $row['NomBateau']." - ".$row['ImmatriculationBateau'];?></option>
				<?php }?>
				</select>
				
			<br/><label for="TailleID" class="lblCreationLots" title="La taille (de 1 à 9 + un autre chiffre pour les tailles intermédiaires)">Taille : </label><br/><input class="inputCreationLotsTaille" type="number" value ="10" min="10" max="99" name="TailleID" required>
				
			<br/><label for="BacID" class="lblCreationLots">Poids du bac : </label><br/>
				<select class="selectCreationLots" name="BacID">
				<?php foreach($resultatBac as $row){?>
					<option value="<?php echo $row['BacID'];?>"><?php echo $row['TareBac'];?></option>
				<?php }?>
				</select>
			</div>
			<div>
			
			<br/><label for="PoidsBrutLot" class="lblCreationLots">Poids brut : </label><br/><input class="inputCreationLots" type="text" name="PoidsBrutLot" placeholder="12.50" pattern="[0-9]{0,15}[.]?[0-9]{0,2}" required>
			
			<br/><label for="PrixPlancherLot" class="lblCreationLots">Prix plancher : </label><br/><input class="inputCreationLots" type="text" name="PrixPlancherLot" placeholder="12.50" pattern="[0-9]{0,15}[.]?[0-9]{0,2}" required>
			
			<br/><label for="PrixDepartLot" class="lblCreationLots">Prix départ du lot : </label><br/><input class="inputCreationLots" type="text" name="PrixDepartLot" placeholder="12.50" pattern="[0-9]{0,15}[.]?[0-9]{0,2}" required><br/><br/><br/>
			
			</div>
			<div>
			
			<br/><label for="PrixEncheresMax" class="lblCreationLots">Prix maximal de l'enchère : </label><br/><input class="inputCreationLots" type="text" name="PrixEncheresMax" placeholder="12.50" pattern="[0-9]{0,15}[.]?[0-9]{0,2}" required>
			
			<br/><label for="DateEnchereLot" class="lblCreationLots">Date de l'enchère : </label><br/><input class="selectCreationLots" type="date" name="DateEnchereLot" value="<?php echo date("Y-m-d");?>" required>
			
			<br/><label for="HeureDebutEnchereLot" class="lblCreationLots">Heure de l'enchère : </label><br/><input class="selectCreationLots" type="time" name="HeureDebutEnchereLot" value="<?php echo date("H:i");?>" required>
			
			</div>
			<div>
			<br/><label for="CodeEtatLot" class="lblCreationLots">Code de l'état du lot : </label><br/><input class="inputCreationLots" type="text" name="CodeEtatLot" onkeyup='this.value=this.value.toUpperCase()' maxlength="50" required>
			
			<br/><label for="DatePeche" class="lblCreationLots">Date de la pêche : </label><br/><input class="selectCreationLots" type="date" name="DatePeche" value="<?php echo date("Y-m-d");?>" required>
			</div>
			
		</div>
		<div class="divBtnCreationLots">
			<input class="btnCreationLots" type="submit" name="btnCreationLots" value="Ajouter un lot" />
			<input class="btnCreationLots" type="reset" value="Effacer"/><br/><br/>
		</div>
		
		</form>
</div>