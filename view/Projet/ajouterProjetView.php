<?php $title = 'web Projet'; ?>

<?php ob_start();
session_start();
require('view/adminAccess.php'); ?>

<div class="col-10 m-auto h-100 p-5 d-flex flex-column  animated fadeIn">
	<h2>Ajouter un Projet</h1>
		<form action="index.php?action=ajouterProjet" id="formRegistration" method="POST">
			<div class="row col-12 p-0 m-0">
				<div class="row p-0 m-0 col-12">
					<label class="col-lg-12 mt-4 animated fadeInRight">Titre</label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="titre" required="required" />
				</div>
				<div class="row p-0 m-0 col-12">
					<label class="col-lg-12 mt-4 animated fadeInRight">Description : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="description" required="required" />
				</div>
				<div class="row p-0 m-0 col-12">
					<label class="col-lg-12 mt-4 animated fadeInRight">tailleGroupe : </label> <input class="col-lg-2 p-2 animated fadeInLeft border" type="number" name="tailleGroupe" required="required" />
				</div>
				<div class="row p-0 m-0 col-12">
					<label class="col-lg-12 mt-4 animated fadeInRight">dateDebut : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="datetime-local" name="dateDebut" required="required" />
				</div>
				<div class="text-danger" style="display: none;" id="errorDate">
					* La date de début doit être antérieure à la date de fin
				</div>
				<div class="row p-0 m-0 col-12">
					<label class="col-lg-12 mt-4 animated fadeInRight">dateFin : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="datetime-local" name="dateFin" required="required" />
				</div>
				<input id="submitFormRegistration" type="submit" name="valide" value="Valider" class="btn border-secondary col-6 offset-3 mt-4 animated fadeInRight rounded text-white" />
			</div>
		</form>
</div>

<?php if (isset($_GET['error']) && $_GET['error'] == 1) : ?>
	<script type="text/javascript">
		var errorDate = document.getElementById('errorDate');
		errorDate.style.display = "block";
	</script>
<?php endif ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>