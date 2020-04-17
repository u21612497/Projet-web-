<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
<div class="container-fluid row align-items-center h-75 m-0 p-0">
	<div class="col-md-8 m-auto h-50 aqua-gradient shadow d-flex pr-5">
		<img src="public/upload/MyBlog.png" class=" h-50  m-auto d-none d-xl-block">
		<div class="col-xl-4 shadow h-110 p-4 mt-n3 white">
			<div class="text-center">
				<h2>Connexion</h2>
			</div>
			<form class="h-100" action="index.php?action=connexion" id="login" method="POST">
			    <p>
				    <input class="col-12 mt-4 rounded border p-2" type="text" name="login" placeholder="Login" />
				    </br>
				    <input class="col-12 mt-4 rounded border p-2" type="password" name="mdp" placeholder="Mot de Passe" />
				    </br>
				    <input class="btn border-secondary col-6 offset-3 mt-4 rounded text-white" type="submit" name="valide">  
					<div class="text-danger" style="display: none;" id="errorLogin">
						* Login Incorrect
					</div>
					<div class="text-danger" style="display: none;" id="errorMpd">
						* Mot de passe Incorrect
					</div>
				</p>
			</form>
		</div>
	</div>
</div>
<?php if(isset($_GET['error']) && $_GET['error'] == 1) : ?>
	<script type="text/javascript"> 
		var errorLogin = document.getElementById('errorLogin');
		errorLogin.style.display = "block";
	</script>
<?php elseif(isset($_GET['error']) && $_GET['error'] == 2) : ?>
	<script type="text/javascript">
		var errorMpd = document.getElementById('errorMpd');
		errorMpd.style.display = "block";
	</script>
<?php endif ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>