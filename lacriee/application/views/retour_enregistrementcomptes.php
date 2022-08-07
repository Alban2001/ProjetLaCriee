<div id="contenu">
	<div id="valeurs">

		<b><u>Valeurs saisies</u></b> :<br/><br/>
		
		<?php echo "<strong>Login</strong> : <i>".$_POST['LoginAcheteur']."</i>"; ?><br/>
		<?php echo "<strong>Mot de passe</strong> : <i>".$_POST['PasswordAcheteur']."</i>"; ?><br/>
		<?php echo "<strong>Raison sociale de l'entreprise</strong> : <i>".$_POST['RaisonSocialeEntreprise']."</i>"; ?><br/>
		<?php echo "<strong>Numéro d'Habilitation</strong> : <i>".$_POST['NumHabilitation']."</i>"; ?><br/>
		<?php echo "<strong>Numéro de la rue</strong> : <i>".$_POST['CodeRue']."</i>"; ?><br/>
		<?php echo "<strong>Nom de la rue</strong> : <i>".$_POST['NomRue']."</i>"; ?><br/>
		<?php echo "<strong>Code Postal</strong> : <i>".$_POST['CodePostal']."</i>"; ?><br/>
		<?php echo "<strong>Ville</strong> : <i>".$_POST['Ville']."</i>"; ?><br/>
	</div>
	<br/><br/>
	<div id="succes">
		Enregistrement effectué avec succès !!!
	</div>
	<br/><br/>
	<div class="divBtnEnregistrementComptes">
		<form method="POST" action="<?php echo site_url('welcome/creation_comptes')?>">
			<input class="btnEnregistrementComptes" type="submit" name="btnRetour" value="Retour" />
		</form>
	</div>
</div>