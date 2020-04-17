<?php 
ob_start();
session_start(); 
require('userAccess.php')?>

<?php if (isset($_SESSION['prenom'])) {?>
	<h3><?= $_SESSION['role']?> <?=$_SESSION['nom']?> <?=$_SESSION['prenom']?></h3>;
<?php } ?>
<!-- POur administrateur uniquement -->
<?php if ($_SESSION['role'] == 'admin') : ?>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetAll">ّGérer les Projets</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=groupeAll">Gérer les Groupes</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=demandeVue">Gérer les Demandes</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=userAll">Gérer les Utilisateurs</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=choixAll">Gérer les Choix</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=associationAll">Gérer les Associations</a>
<a class="btn my-2 my-sm-0 text-success" href="index.php?action=affectationAll">Gérer les Affectations</a>
<?php else : ?>
	<a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetUser">ّSon Projet</a>
	<a class="btn my-2 my-sm-0 text-success" href="index.php?action=projetAll">ّTous les Projets</a>
	<a class="btn my-2 my-sm-0 text-success" href="index.php?action=demandesUser">Les Demandes</a>
	<a class="btn my-2 my-sm-0 text-success" href="index.php?action=userProfil">Profil</a>
<?php endif ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>