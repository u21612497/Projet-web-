<?php $title = 'web Projet'; ?>

<?php ob_start(); ?>
<div class="col-10 m-auto h-100 p-5 d-flex flex-column  animated fadeIn">
	<h2>Ajouter un utilisateur</h1>
	<form action="index.php?action=inscription" id="formRegistration" method="POST">
		<div class="row col-12 p-0 m-0">
			<div class="row p-0 m-0 col-12">
			<label class="col-lg-12 mt-4 animated fadeInRight">Login</label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="login" required="required" />
			</div>
			<div  style="display: none;" class="text-danger" id="errorLogin">
				* L'adresse Mail existe déja !
			</div>
			<div class="row p-0 m-0 col-12">
			<label class="col-lg-12 mt-4 animated fadeInRight">Nom : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="nom" required="required" />
			</div>
			<div class="row p-0 m-0 col-12">
			<label class="col-lg-12 mt-4 animated fadeInRight">Prénom : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="prenom" required="required" />
			</div>
			<div class="row p-0 m-0 col-12">
			<label class="col-lg-12 mt-4 animated fadeInRight">Mot de Passe : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" id="pass" type="password" name="mdp" required="required" />
			</div>	
			<div class="row p-0 m-0 col-12">
			<label class="col-lg-12 mt-4 animated fadeInRight">Confirmer le Mot de Passe : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" id="pass" type="password" name="mdpConfirm" required="required" />
			</div>	
			<div style="display: none;" class="text-danger" id="errorMdp">
				* Les mots de passe sont différents !
			</div>
			<input id="submitFormRegistration" type="submit" name="valide" value="Valider" class="btn border-secondary col-6 offset-3 mt-4 animated fadeInRight rounded text-white" />
		</div>
	</form>
</div>
<?php if(isset($_GET['error']) && $_GET['error'] == 1) : ?>
	<script type="text/javascript">
		var errorLogin = document.getElementById('errorLogin');
		errorLogin.style.display = "block";
	</script>
<?php elseif(isset($_GET['error']) && $_GET['error'] == 2) : ?>
	<script type="text/javascript">
		var errorMdp = document.getElementById('errorMdp');
		errorMdp.style.display = "block";
	</script>
<?php endif ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>