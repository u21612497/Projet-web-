<?php $title = 'Mons site'; ?>

<?php
ob_start();
session_start();
require('view/adminAccess.php');
//Vue de tous les association
?>
<div class="container-fluid min-h-100 p-5 grey lighten-3">
	<h2 class="border-bottom col-12 animated fadeInLeft">Toutes les associations</h2>
	<a class="btn mx-auto my-auto col-4" href="index.php?action=creerAssociationView"> Creer une association </a>
	<div class="d-flex justify-content-around flex-wrap">
		<?php foreach ($associations as $key => $association) : ?>
			<div class="col-md-3 m-1 mt-5 animated fadeInDown">
				<div class="col-md-12 border border-green white p-2 text-center">
					<div class=" font-weight-bold">
                        groupe N°<?= $association->gid()->gid(); ?> relié au projet N° : <?= $association->gid()->pid()->pid(); ?>
                        <a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetFullView&amp;id=<?= $association->gid()->pid()->pid(); ?>">Voir le projet en détail</a>
                    </div>
					<div class="text-success text-left">
						User N°<?= $association->uid()->uid(); ?> <?= $association->uid()->nom(); ?> <?= $association->uid()->prenom(); ?> <?= $association->uid()->login(); ?>
					</div>
				</div>
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
					<div class="col-md-5 text-center p-2 border border-green rounded aqua-gradient white ">
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=associationSuppr&amp;id=<?= $association->gid()->gid(); ?>">Supprimer</a>
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=associationModifierView&amp;id=<?= $association->gid()->gid(); ?>">Modifier</a>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach  ?>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>