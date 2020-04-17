<?php $title = 'MyBlog'; ?>

<?php
ob_start();
session_start();
require('view/adminAccess.php');
//Vue de tous les affectation
?>
<div class="container-fluid min-h-100 p-5 grey lighten-3">
	<h2 class="border-bottom col-12 animated fadeInLeft">Toutes les affectations</h2>
	<a class="btn mx-auto my-auto col-4" href="index.php?action=creeraffectationView"> Creer une affectation </a>
	<div class="d-flex justify-content-around flex-wrap">
		<?php foreach ($affectations as $key => $affectation) : ?>
			<div class="col-md-3 m-1 mt-5 animated fadeInDown">
				<div class="col-md-12 border border-green white p-2 text-center">
					<div class=" font-weight-bold">
                        groupe N°<?= $affectation->gid()->gid(); ?> relié au projet N° : <?= $affectation->gid()->pid()->pid(); ?>
                        <a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetFullView&amp;id=<?= $affectation->gid()->pid()->pid(); ?>">Voir le projet en détail</a>
                    </div>
					<div class="text-success text-left">
						Choix N°<?= $affectation->cid()->cid(); ?> <?= $affectation->cid()->nom(); ?> relié au projet N° :<?= $affectation->cid()->pid()->pid(); ?>
					</div>
				</div>
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
					<div class="col-md-5 text-center p-2 border border-green rounded aqua-gradient white ">
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=affectationSuppr&amp;id=<?= $affectation->gid()->gid(); ?>">Supprimer</a>
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=affectationModifierView&amp;id=<?= $affectation->gid()->gid(); ?>">Modifier</a>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach  ?>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>