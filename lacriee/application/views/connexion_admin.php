<div id="contenu">
	<div id="connexion">
		<form action="<?php echo site_url('welcome/retour_connexionadmin');?>" method="POST" autocomplete="off">
		
			<label for="IdentifiantAcheteur" class="lblConnexion">Identifiant : </label><input class="inputConnexion" type="text" name="IdentifiantAcheteur" required><br/><br/><br/>
			
			<label for="PasswordAcheteur" class="lblConnexion">Mot de Passe : </label><input class="inputConnexion" type="password" name="PasswordAcheteur" required><br/><br/><br/>
			
				<input class="btnConnexion" type="submit" name="btnConnexion" value="Se connecter" />
				<input class="btnConnexion" type="reset" value="Effacer"/><br/><br/>
		</form>
	</div>
</div>