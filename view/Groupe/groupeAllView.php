<?php $title = 'Mon site'; ?>

<?php
ob_start();
session_start();
//Vue de tous les groupes
?>
<div class="container-fluid min-h-100 p-5 grey lighten-3">
	<h2 class="border-bottom col-12 animated fadeInLeft">Tous les groupes</h2>
	<a class="btn mx-auto my-auto col-4" href="index.php?action=ajouterGroupe"> Ajouter un Groupe </a>
	<div class="d-flex justify-content-around flex-wrap">
		<?php foreach ($groupes as $key => $groupe) : ?>
			<div class="col-md-3 m-1 mt-5 animated fadeInDown">
				<div class="col-md-12 border border-green white p-2 text-center">
					<div class=" font-weight-bold">
						Groupe N°<?= $groupe->gid(); ?>
					</div>
					<div class="text-success text-left">
						Projet N°<?= $groupe->pid()->pid(); ?> <?= $groupe->pid()->titre(); ?> <?= $groupe->pid()->description(); ?>
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetFullView&amp;id=<?= $groupe->gid(); ?>">Voir le projet en détail</a>
					</div>
				</div>
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
					<div class="col-md-5 text-center p-2 border border-green rounded aqua-gradient white ">
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=groupeSuppr&amp;id=<?= $groupe->gid(); ?>">Supprimer</a>
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=groupeModifierView&amp;id=<?= $groupe->gid(); ?>">Modifier</a>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach  ?>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>