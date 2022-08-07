<br>
<?php	

	if(!isset($_SESSION["ID"]))
		{ ?>
			<br/>
			<div class="erreur">
				<p>Informations invalide. Veuillez reessayer.</p>

				<p><a class="lien" href="<?php echo base_url()?>welcome/Connexion">Reesayer</a>

			</div>
<?php	} ?>		