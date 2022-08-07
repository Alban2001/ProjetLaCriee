<div id="contenu">	
	<div id="valeurs">

		<b><u>Valeurs saisies</u></b> :<br/><br/>
		
		<?php echo "<strong>Identification du bac</strong> : <i>".$_POST['BacID']."</i>"; ?><br/>
		<?php echo "<strong>Tare du bac</strong> : <i>".$_POST['TareBac']."</i>"; ?><br/>
		
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