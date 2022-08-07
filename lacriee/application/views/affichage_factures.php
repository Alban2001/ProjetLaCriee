<br/><br/><br/><br/><br/><br/><br/><br/><br/>

<div class="contenuFactures">
	<?php foreach($AfficherElementsFactures as $row){?>
	<h1 class="titreNumFacture">Facture n° <?php echo $_POST['FactureID'];?></h1><br/>
	
	<p><b>Date de la facture</b> : <?php echo $row['DateHeureFacture'];?></p>
	<p><b>Facture payée</b> : <?php echo $row['FacturePayee'];?></p>
	<p><b>Acheteur</b> : <?php echo $row['LoginAcheteur'];?></p>
	
	<table class="tabFactures" border="1" >
		<tr>
			<th>Désignation</th>
			<th>Prix de départ</th>
			<th>Prix final</th>
		</tr>
		<tr>
			<td>
				<?php echo "<b>Lot n°</b> : ".$row['LotID'];?><br/>
				<?php echo "<b>Espece</b> : ".$row['NomEspece'].' - '.$row['NomScientifiqueEspece'].' - '.$row['NomCommunEspece'];?><br/>
				<?php echo "<b>Qualité</b> : ".$row['LibelleQualite'];?><br/>
				<?php echo "<b>Présentation</b> : ".$row['LibellePresentation'];?><br/>
				<?php echo "<b>Taille</b> : ".$row['TailleID'];?><br/>
				<?php echo "<b>Poids net</b> : ".$row['PoidsNet']." Kg";?><br/>
			</td>
			<td><?php echo $row['PrixDepartLot'];?> €</td>
			<td><?php echo $row['MontantFacture'];?> €</td>
		</tr>
	</table>
		

	<br/><br/>
	<?php }?>
</div>
<div class="divBtnEnregistrementLots">
	<form method="POST" action="<?php echo site_url('welcome/impression_factures')?>">
		<input class="btnEnregistrementLot" type="submit" name="btnImprimerFacture" value="Imprimer la facture" />
		<input type="hidden" name="FactureID3" value="<?php if(isset($_POST['FactureID'])){echo $_POST['FactureID'];}else{ echo '0';}?>"/>
	</form>
	
	<?php foreach($VerificationPaiement as $row){
		if($row['FacturePayee']=="Non"){?>
	<form method="POST" action="<?php echo site_url('welcome/retour_paiementfactures')?>">
		<input class="btnEnregistrementLot" type="submit" name="btnPayer" value="Payer" />
		<input type="hidden" name="FactureID2" value="<?php if(isset($_POST['FactureID'])){echo $_POST['FactureID'];}else{ echo '0';}?>"/>
	</form>
	<?php }
		else{ ?>
			<input class="btnEnregistrementLot" type="submit" name="btnRetour" value="Payée" />
		<?php }}?>
</div>