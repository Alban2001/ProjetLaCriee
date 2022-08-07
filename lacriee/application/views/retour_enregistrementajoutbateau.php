<div id="contenu">
	<div id="valeurs">

		<b><u>Valeurs saisies</u></b> :<br/><br/>
		
		<?php echo "<strong>Nom du bateau</strong> : <i>".$_POST['NomBateau']."</i>"; ?><br/>
		<?php echo "<strong>Immatriculation du bateau</strong> : <i>".$_POST['ImmatriculationBateau']."</i>"; ?><br/>
		
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