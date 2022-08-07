	<div id="contenu">
		<div id="creationComptes">
			<form action="<?php echo site_url('welcome/retour_enregistrementcomptes');?>" method="POST" autocomplete="off">
				<div class="BoxLots">

					<div class="colonne">
						<label for="LoginAcheteur" class="lblCreationComptes">Login de l'acheteur : </label>

						<br/>

						<input class="inputCreationComptes" type="text" name="LoginAcheteur" pattern="[A-Za-z0-9]{7}" maxlength="7" required>

						<br/><br/><br/>
						
						<label for="CodeRue" class="lblCreationComptes">Numéro de la rue : </label>

						<br/>

						<input class="inputCreationComptes" type="text" name="CodeRue" onkeyup='this.value=this.value.toUpperCase()' maxlength="5" required>

						<br/><br/><br/>

						</div>

					<div class="colonne">
						<label for="PasswordAcheteur" class="lblCreationComptes">Mot de Passe : </label>

						<br/>

						<input class="inputCreationComptes" type="password" name="PasswordAcheteur" required>

						<br/><br/><br/>
					
						<label for="NomRue" class="lblCreationComptes">Nom de la rue : </label>

						<br/>

						<input class="inputCreationComptes" type="text" name="NomRue" onkeyup='this.value=this.value.toUpperCase()' maxlength="50" required>

						<br/><br/><br/>

					</div>

					<div class="colonne">
						<label for="RaisonSocialeEntreprise" class="lblCreationComptes">Raison sociale de l'entreprise : </label>

						<br/>

						<input class="inputCreationComptes" type="text" name="RaisonSocialeEntreprise" maxlength="50" onkeyup='this.value=this.value.toUpperCase()' required>

						<br/><br/><br/>
						
						<label for="CodePostal" class="lblCreationComptes">Code postal : </label>

						<br/>

						<input class="inputCreationComptes" type="text" name="CodePostal"  maxlength="5" pattern="[0-9]{5}" placeholder="67000" required>

						<br/><br/><br/>

					</div>

					<div class="colonne">
						<label for="NumHabilitation" class="lblCreationComptes">Numéro d'Habilitation : </label>

						<br/>

						<input class="inputCreationComptes" type="text" name="NumHabilitation" onkeyup='this.value=this.value.toUpperCase()' value="CP" pattern="CP[0-9]{8}" maxlength="10" placeholder="CP00000000" required>

						<br/><br/><br/>
					
						<label for="Ville" class="lblCreationComptes">Ville : </label>

						<br/>

						<input class="inputCreationComptes" type="text" name="Ville" onkeyup='this.value=this.value.toUpperCase()' maxlength="50" placeholder="PARIS" required>

						<br/><br/><br/>

					</div>

				</div>
				
				<div class="buttonCreationComptes">
					<div class="button">
						<input class="btnCreationComptes" type="submit" name="btnCreationComptes" value="Ajouter un compte" />
					</div>

					<div class="button">
						<input class="btnCreationComptes" type="reset" value="Effacer"/>
					</div>
				</div>

			</form>
		</div>
	</div>
</body>