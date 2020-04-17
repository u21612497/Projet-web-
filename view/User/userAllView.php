<?php $title = 'web projet'; ?>

<?php
ob_start();
session_start();
require('view/adminAccess.php');
//Vue de tous les users
?>
<div class="container-fluid min-h-100 p-5 grey lighten-3">
	<h2 class="border-bottom col-12 animated fadeInLeft">Tous les Utilisateurs</h2>
	<div class="d-flex justify-content-around flex-wrap">
		<?php foreach ($users as $key => $user) : ?>
			<div class="col-md-3 m-1 mt-5 animated fadeInDown">
				<div class="col-md-12 border border-green white p-2 text-center">
					<div class=" font-weight-bold">
						user N° <?= $user->uid(); ?>
					</div>
					<div class="text-success text-left">
                        Nom : <?= $user->nom(); ?> 
                        Prenom : <?= $user->prenom(); ?> 
                        Login : <?= $user->login(); ?>
                        Role : <?= $user->role(); ?>
					</div>
				</div>
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
					<div class="col-md-5 text-center p-2 border border-green rounded aqua-gradient white ">
                        <a class="btn my-2 my-sm-0 text-success" href="index.php?action=userSuppr&amp;id=<?= $user->uid(); ?>">Supprimer</a>
                        <?php if($_SESSION['uid'] == $user->uid()) : ?>
                        <a class="btn my-2 my-sm-0 text-success" href="index.php?action=modifierUserView&amp;id=<?= $user->uid(); ?>">Modifier</a>
                        <?php endif ?>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach  ?>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>