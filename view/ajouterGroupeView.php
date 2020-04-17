<?php $title = 'web Projet'; ?>

<?php ob_start();
session_start();
require('adminAccess.php'); ?>

<div class="col-10 m-auto h-100 p-5 d-flex flex-column  animated fadeIn">
	<h2>Ajouter un Groupe à partir d'un projet existant</h1>
		<form action="index.php?action=ajouterGroupe" id="formRegistration" method="POST">
			<div class="row col-12 p-0 m-0">
				<div class="row p-0 m-0 col-12">
					<label class="col-lg-12 mt-4 animated fadeInRight">Projet existant:</label>
					<select id="monselect" class="col-lg-12 p-2 border animated fadeInLeft" name="pid">
						<?php foreach ($projets as $key => $projet) : ?>
							<option value="<?= $projet->pid(); ?>"><?= $projet->titre(); ?> / Du <?= $projet->dateDebut(); ?> au <?= $projet->dateFin(); ?></option>
						<?php endforeach ?>
					</select>
					<input id="submitFormRegistration" type="submit" name="valide" value="Valider" class="btn border-secondary col-6 offset-3 mt-4 animated fadeInRight rounded text-white" />
				</div>
			</div>
		</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>