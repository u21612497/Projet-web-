<?php $title = 'Mon Site'; ?>

<?php
ob_start();
session_start();
require('view/adminAccess.php');
//Vue de tous les choix
?>
<div class="container-fluid min-h-100 p-5 grey lighten-3">
	<h2 class="border-bottom col-12 animated fadeInLeft">Tous les choix</h2>
	<a class="btn mx-auto my-auto col-4" href="index.php?action=ajouterchoix"> Ajouter un Choix </a>
	<div class="d-flex justify-content-around flex-wrap">
		<?php foreach ($achoix as $key => $choix) : ?>
			<div class="col-md-3 m-1 mt-5 animated fadeInDown">
				<div class="col-md-12 border border-green white p-2 text-center">
					<div class=" font-weight-bold">
						choix N°<?= $choix->cid(); ?>
                    </div>
                    <div class=" font-weight-bold">
						Nom : <?= $choix->nom(); ?>
					</div>
					<div class="text-success text-left">
						Projet N°<?= $choix->pid()->pid(); ?> <?= $choix->pid()->titre(); ?> <?= $choix->pid()->description(); ?>
					</div>
				</div>
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
					<div class="col-md-5 text-center p-2 border border-green rounded aqua-gradient white ">
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=choixSuppr&amp;id=<?= $choix->cid(); ?>">Supprimer</a>
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=choixModifierView&amp;id=<?= $choix->cid(); ?>">Modifier</a>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach  ?>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>