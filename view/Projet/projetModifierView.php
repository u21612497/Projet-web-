<?php 
ob_start(); 
session_start();
require('view/userAccess.php');
?>
<div class="h-100 m-auto h-100 p-5 d-flex flex-column animated fadeIn">
	<h2>Modifier son profil</h1>
	<form action="index.php?action=projetModifier&amp;id=<?= $updatePid ?>" id="formModifierProjet" method="POST">
  		<div class="row col-12 p-0 m-0">
			<div class="row p-0 m-0 col-12">
		   		<label class="col-lg-12 mt-4 animated fadeInRight">Titre : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="titre" value="<?= $updateTitre ?>"/>
		    </div>
		    <div  style="display: none;" class="text-danger" id="errorLogin">
				* Le login existe déja !
			</div>
		    <div class="row p-0 m-0 col-12">
		    	<label class="col-lg-12 mt-4 animated fadeInRight">Description : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="description" value="<?= $updateDescription ?>"/>
		    </div>
		    <div class="row p-0 m-0 col-12">
		    	<label class="col-lg-12 mt-4 animated fadeInRight">Taille du Groupe : </label> <input class="col-lg-2 p-2 animated fadeInLeft border" type="number" name="tailleGroupe" value="<?= $updateTailleGroupe ?>"/>
		    </div>
		    <div class="row p-0 m-0 col-12">
		    	<label class="col-lg-12 mt-4 animated fadeInRight">Date de début : </label><input class="col-lg-12 p-2 animated fadeInLeft border" type="datetime-local" name="dateDebut" value="<?= $updateDateDebut ?>"/>
		    </div>
		    <div class="row p-0 m-0 col-12">
		    	<label class="col-lg-12 mt-4 animated fadeInRight">Date de Fin : </label><input class="col-lg-12 p-2 animated fadeInLeft border" type="datetime-local" name="dateFin" value="<?= $updateDateFin ?>"/>
		    </div>
		    <div style="display: none;" class="text-danger" id="errorDate">
                * La date de début doit être antérieure à la date de fin !
			</div>
		    <input class="btn border-secondary col-6 offset-3 mt-4 animated fadeInRight rounded text-white" type="submit" name="valide" value="Valider">
	</form>
</div>

<?php if(isset($_GET['error']) && $_GET['error'] == 1) : ?>
	<script type="text/javascript">
		var errorDate = document.getElementById('errorDate');
		errorDate.style.display = "block";
	</script>
<?php endif ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>