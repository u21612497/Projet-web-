<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="public/js/style.js"></script>
	<link rel="stylesheet" href="public/css/bootstrap.css" />
	<link rel="stylesheet" href="public/css/mdb.css" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>
	<nav>
		<a class="btn mx-auto my-auto col-2" href="index.php?action=dashboard"> Dashboard </a>
		<?php if (isset($_SESSION['prenom'])) : ?>
			Utilisateur : <?= $_SESSION['name'] ?> <?= $_SESSION['prenom'] ?> <?= $_SESSION['role'] ?>
		<?php endif ?>
		<?php if (!isset($_SESSION['prenom'])) : ?>
			<a class="btn my-2 my-sm-0 text-white" href="index.php?action=connexionView">connexion</a> 
			<a class="btn my-2 my-sm-0 text-white" href="index.php?action=inscriptionView">ّInscription</a>
		<?php else : ?>
		<a class="btn my-2 my-sm-0 text-white" href="index.php?action=destroy">deconnexion</a>
		<?php endif ?>

	</nav>
	<?= $content ?>
</body>

</html>