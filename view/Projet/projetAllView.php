<?php $title = 'Mon site'; ?>

<?php
ob_start();
session_start();
require('view/userAccess.php');
//Vue de tous les projets
?>
<div class="container-fluid min-h-100 p-5 grey lighten-3">
	<h2 class="border-bottom col-12 animated fadeInLeft">Tous les Projets</h2>
	<?php if ($_SESSION['role'] == 'admin') : ?>
		<a class="btn mx-auto my-auto col-4" href="index.php?action=ajouterProjetView"> Ajouter un Projet </a>
	<?php endif ?>
	<div class="d-flex justify-content-around flex-wrap">
		<?php foreach ($projets as $key => $projet) : ?>
			<div class="col-md-3 m-1 mt-5 animated fadeInDown">
				<div class="col-md-12 border border-green white p-2">
					<img src="public/upload/<?= $projet->pid(); ?>" height="300" width="100%">
				</div>
				<div class="col-md-12 border border-green white p-2 text-center">
					<div class=" font-weight-bold">
						<?= $projet->titre(); ?>
					</div>
					<div class="text-success text-left">
						Du <?= $projet->dateDebut(); ?> au <?= $projet->dateFin(); ?>
					</div>
				</div>
				<div class="col-md-12 border border-green white p-2 text-justify">
					<?= $projet->description(); ?>
				</div>
				<a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetFullView&amp;id=<?= $projet->pid(); ?>">Voir le Projet en détail</a>
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
					<div class="col-md-5 text-center p-2 border border-green rounded aqua-gradient white ">
						<a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetModifierView&amp;id=<?= $projet->pid(); ?>">Modifier</a>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach  ?>
	</div>
</div>
<?php if (isset($_GET['alert']) && $_GET['alert'] == 1) : ?>
	<script type="text/javascript">
		alert("Le Commentaire est en attente de Validation !");
	</script>
<?php endif ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>