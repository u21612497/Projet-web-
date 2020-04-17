<?php ob_start();
session_start(); ?>
<?php if (isset($_SESSION['prenom'])) {?>
	<h3><?= $_SESSION['role']?> <?=$_SESSION['nom']?> <?=$_SESSION['prenom']?></h3>;
<?php } ?>

<p>Projet ajouté</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>