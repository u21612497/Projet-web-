<?php $title = 'Lyza'; ?>

<?php
ob_start();
session_start();
require('view/adminAccess.php');
//Vue de tous les demandes
?>
<div class="container-fluid min-h-100 p-5 grey lighten-3">
<a class="btn mx-auto my-auto col-4" href="index.php?action=creerDemandeView"> Faire une Demande </a>
	<h2 class="border-bottom col-12 animated fadeInLeft">Toutes les Demandes</h2>
	<div class="d-flex justify-content-around flex-wrap">
		<?php foreach ($demandes as $key => $demande) : ?>
			<div class="col-md-3 m-1 mt-5 animated fadeInDown">
				<div class="col-md-12 border border-green white p-2 text-center">
					<div class=" font-weight-bold">
                        Groupe N°<?= $demande->gid(); ?>
					</div>
					<div class="text-success text-left">
						User N°<?= $demande->uid()->uid(); ?> <?= $demande->uid()->nom(); ?> <?= $demande->uid()->prenom(); ?> <?= $demande->uid()->login(); ?>
					</div>
					<div class="">
						Source : <?= $demande->source() ?>
					</div>
				</div>
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
					<div class="col-md-5 text-center p-2 border border-green rounded aqua-gradient white ">
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=demandeSuppr&amp;id=<?= $demande->gid(); ?>">Supprimer</a>
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=demandeModifierView&amp;id=<?= $demande->gid(); ?>">Modifier</a>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach  ?>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>