 	<br>
	<div class="acceuil">	
		<p> Création d'un compte client :</p>
		<p class="notice">Les champs avec un * sont obligatoires</p>
	</div>

		<form action="<?php echo site_url('welcome/retourEnrengistrement'); ?>" method="post">

			<div class="FormulaireInscription">

					<br/><br/>

					<div id="Login">
						<label for="Login">* Login :</label>
						<br/><br/>
						<input type="input" name="Login" required>
				 	</div>

				 	<br/><br/>


				 	<div id="MotdePasse">
						<label for="Login">* Mot de passe :</label>
						<br/><br/>
						<input type="input" name="Mdp" required>
				 	</div>

				 	<br/><br/>

				 	<div id="ConfMdp">
				 		<label for="ConfDmp">* Confirmation du mot de passe :</label>
				 		<br/><br/>
				 		<input type="input" name="confmotdepasse" required>
				 	</div> 

				 	<br/><br/>

				 	<div id="RSE_Acheteur">
				 		<label for="RSE_Acheteur">* Raison Sociale de l'Entreprise :</label>
				 		<br/><br/>
				 		<input type="input" name="RSE" required>
				 	</div>

				 	<br/>

				 	<div id="CodeRue">
				 		<label for="CodeRue">* Numéro de rue :</label>
						<br/><br/>
				 		<input type="input" name="CodeRue" required>
				 	</div>

				 	<br/>

				 	<div id="CP">
				 		<label for="CP">* Code Postal :</label>
						<br/><br/>
				 		<input type="input" name="CP" required>
				 	</div>

				 	<br/>

				 	<div id="Ville">
				 		<label for="Ville">* Ville :</label>
						<br/><br/>
				 		<input type="input" name="Ville" required>
				 	</div>

				 	<br/>


				 	<input type="submit" value="Validation" name="Validation"></input>
				 	<input type="reset" value="Reinitialiser"></input>
				 	<br/><br/>

				 	<p> Déjà membre ? <a class="lien" href="<?php echo base_url()?>welcome/Connexion">Se connecter</a></p>

				 	<br/>

			</div type="submit">
		</form>

	<?php 

	

	if(isset($valid))
	{
		if($valid == true)
		{ ?>
		<div class="reussite">
				<br/>
					<p>L'enrengistrement s'est effectué avec succés.</p>
					<?php $valid = true; ?>
				<br/>
			</div>
<?php	}
		
		else
		{ ?>
			<div class="erreur"> <!-- Erreur enrengistrement -->
				<br/>		
					<p>Les mots de passes ne sont pas identiques ou l'adresse mail est déjà utilisée.</p>
					<?php $valid = false; ?>
				<br/>
			</div>
<?php	} 		
	} ?>
	









