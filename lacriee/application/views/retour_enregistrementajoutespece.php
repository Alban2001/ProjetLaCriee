<div id="contenu">	
	<div id="valeurs">

		<b><u>Valeurs saisies</u></b> :<br/><br/>
		
		<?php echo "<strong>Nom de l'espèce</strong> : <i>".$_POST['NomEspece']."</i>"; ?><br/>
		<?php echo "<strong>Nom scientifique de l'espèce</strong> : <i>".$_POST['NomScientifiqueEspece']."</i>"; ?><br/>
		<?php echo "<strong>Nom commun de l'espèce</strong> : <i>".$_POST['NomCommunEspece']."</i>"; ?><br/>
		
	</div>
	<br/><br/>
	<div id="succes">
		Enregistrement effectué avec succès !!!
	</div>
	<br/><br/>
	<div class="divBtnEnregistrementElements">
		<form method="POST" action="<?php echo site_url('welcome/ajout_elements')?>">
			<input class="btnEnregistrementElements" type="submit" name="btnRetour" value="Retour" />
		</form>
	</div>
</div>