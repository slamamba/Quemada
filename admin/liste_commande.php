<!DOCTYPE html>
<html lang="en">
<?php
	include("./components/head.php")
?>
<body>
	<div id="adminContainer">
		<?php
			require_once("./components/sidebar.php")
		?>
		<section id="adminScreen" class="container-fluid">
			<div class="row spacer"></div>
			<form class="row">
				<h3 class="col-12">Liste des produits sur le liste</h3>
				<div class="col-3">Filtre :</div>
				<div class="col-3"><a href="./liste_commande.php?filter=attente" class="row"><label class="col-8 btn btn-primary">En attente</label></a></div>
				<div class="col-3"><a href="./liste_commande.php?filter=fini" class="row"><label class="col-8 btn btn-primary">Fini</label></a></div>
				<div class="col-3"><a href="./liste_commande.php?filter=rejeter" class="row"><label class="col-8 btn btn-primary">Rejeter</label></a></div>
				<div class="col-12">
					<div class="row">
						<table class="col-12">
							<tr class="row">
								<th class="col-1">ID</th>
								<th class="col">Nom Client</th>
								<th class="col">montant</th>
								<th class="col">status</th>
								<th class="col-1">Voir</th>
							</tr>
							<?php 
								$data = $commande->read_commande();
								if(isset($_GET['filter'])){
									$data = $commande->read_commande_status($_GET['filter']);
								}
								if(!is_iterable($data)){
									$data = array($data);
								}
								foreach ($data as $datum) {?>
							<!-- LOOP HERE -->
							<tr class="row">
								<td class="col-1"><?php echo $datum['id'] ?></td>
								<td class="col"><?php echo $datum['nom_client']; echo " "; echo $datum['prenom_client'];  ?></td>
								<td class="col"><?php echo $datum['total'] ?> FCFA</td>
								<td class="col"><?php echo $datum['status_commande'] ?></td>
								<td class="col-1">
									<a href="./commande.php?commande=<?php echo $datum['id'] ?>" class="row">
										<label class="col-8 btn btn-light">O</label>
									</a>
								</td>
								
								
							</tr>
							<?php } ?>
						</table>
					
					</div>
				</div>
			</form>
		</section>
	</div>
</body>
</html>