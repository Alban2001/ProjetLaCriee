<div id="contenu">
	<table id="etiquetteLot" border="1" >
		<tr>
			<td class="tdDateHeure">
				<p>F-29.197.500-CE<br>Audierne</p>
				<td><?php echo $_POST['DateEnchereLot'];?><br><center><?php echo $_POST['HeureDebutEnchereLot'];?></center></td>
			</td>
			<td>
			
				<p><h3><strong><?php foreach($NomBateau as $row){echo $row['NomBateau'];}?></strong></h3></p>
				<td><h5><center>PECHE EN ATHLANTIQUE<br>NORD EST</center></h5></td>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h2>OP: O.P.O.B</h2>
				
				<h2>Qu: <?php echo $_POST['LibelleQualite'];?>
				<span class="etiquette">Pr: <?php echo $_POST['LibellePresentation'];?></span></h2>
				<h2>Bacs: <?php echo $_POST['BacID'];?></h2>
				<h2>Nbre: <strong>1</strong></h2>
				<h2>Pal.: </h2>
				<h2>Brut: <span class="etiquette"><?php echo $_POST['PoidsBrutLot']." Kg";?></span></h2>
				<h2>Tare: <span class="etiquette"><?php foreach($TareBac as $row){echo $row['TareBac']." Kg"; $TareBac2 = $row['TareBac'];}?></span></h2>
			</td>
			<td colspan="2">
				 <h1>Lot: <strong><span class="etiquette"><?php foreach($LotID as $row){echo $row['max(LotID)'];}?></span></strong></h1>
				<h2><?php foreach($EspeceLot as $row){echo $row['NomEspece'];?><span class="etiquette2"><?php echo $_POST['TailleID'];?></span></h2><?php echo $row['NomScientifiqueEspece'];?><br/><?php echo $row['NomCommunEspece'];}?></p>
				<br/><br/><h2><span class="etiquette3"><?php echo $_POST['PoidsBrutLot'] - $TareBac2;?> Kg</span></h2>
			</td>
		</tr>
	</table>
		

	<br/><br/>
	<div id="succes">
		Enregistrement effectué avec succès !!!
	</div>
	<br/><br/>
	<div class="divBtnEnregistrementLots">
		<form method="POST" action="<?php echo site_url('welcome/impression_lots')?>">
			<input class="btnEnregistrementLot" type="submit" name="btnImprimer" value="Imprimer le lot" />
		</form>
		<form method="POST" action="<?php echo site_url('welcome/creation_lots')?>">
			<input class="btnEnregistrementLot" type="submit" name="btnRetour" value="Retour" />
		</form>

	</div>
</div>