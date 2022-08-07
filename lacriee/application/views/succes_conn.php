<br>
<?php	

	if(isset($_SESSION["ID"]))
		{ ?>
			<div class="reussite">
				<p> Connexion réussie ! </p>
			</div>
			<br/><br/>

			<div class="acceuil">
				 <p> Bienvenue <?php echo $_SESSION["LoginAcheteur"]; ?> sur le site de la Criée !</p>
				<br/>
			</div>
<?php	} ?>		