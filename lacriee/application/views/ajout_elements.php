<div id="contenu">
	<div id="ajoutElements">

		<form action="<?php echo site_url('welcome/retour_enregistrementajoutespece');?>" method="POST" autocomplete="off">
			<div class="BoxElements">

				<div>
					<label for="NomEspece" class="lblAjoutElements">Nom de l'espèce : </label>

					<br/>

					<input class="inputAjoutElements" type="text" name="NomEspece" onkeyup='this.value=this.value.toUpperCase()' maxlength="50" required>
				</div>

				<div>
					<label for="NomScientifiqueEspece" class="lblAjoutElements">Nom scientifique de l'espèce : </label>

					<br/>

					<input class="inputAjoutElements" type="text" name="NomScientifiqueEspece" onkeyup='this.value=this.value.toUpperCase()' maxlength="50" required>
				</div>

				<div>
					<label for="NomCommunEspece" class="lblAjoutElements">Nom commun de l'espèce : </label>

					<br/>

					<input class="inputAjoutElements" type="text" name="NomCommunEspece" onkeyup='this.value=this.value.toUpperCase()' maxlength="50" required>
				</div>

					<div> 
						<br/>
						<input class="btnAjoutEspece" type="submit" name="btnAjoutEspece" value="Ajouter une espèce" />
					</div>
			</div>
		</form>

			<br/>

		<form action="<?php echo site_url('welcome/retour_enregistrementajoutbateau');?>" method="POST" autocomplete="off">
			<div class="BoxElements">


				<div>
					<label for="NomBateau" class="lblAjoutElements">Nom du bateau : </label>

					<br/>

					<input class="inputAjoutElements" type="text" name="NomBateau" onkeyup='this.value=this.value.toUpperCase()' maxlength="50" required>
				</div>

				<div>
					<label for="ImmatriculationBateau" class="lblAjoutElements">Immatriculation du bateau : </label>

					<br/>

					<input class="inputAjoutElements" type="text" name="ImmatriculationBateau" onkeyup='this.value=this.value.toUpperCase()' maxlength="50" required>
				</div>

				<div>
					<br/>
					<input class="btnAjoutEspece" type="submit" name="btnAjoutBateau" value="Ajouter un bateau" />
				</div>

			</div>
		</form>

			<br/>

		<form action="<?php echo site_url('welcome/retour_enregistrementajoutbac');?>" method="POST" autocomplete="off">
			<div class="BoxElements">
				
				<div>
					<label for="BacID" class="lblAjoutElements">Identification du bac : </label>

					<br/>

					<input class="inputAjoutElements" type="text" name="BacID" onkeyup='this.value=this.value.toUpperCase()' maxlength="5" required>
				</div>
				
				<div>
					<label for="TareBac" class="lblAjoutElements">Tare du bac : </label>

					<br/>

					<input class="inputAjoutElements" type="text" name="TareBac" placeholder="2.50" pattern="[0-9]{0,15}[.]?[0-9]{0,2}" required>
				</div>

				<div>
					<br/>
					<input class="btnAjoutEspece" type="submit" name="btnAjoutBac" value="Ajouter un bac" />
				</div>

			</div>
		</form>

	</div>
</div>