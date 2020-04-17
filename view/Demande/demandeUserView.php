<?php $title = 'Web'; ?>

<?php
ob_start();
session_start();
require('view/userAccess.php');
//Vue de tous les demandes
?>
<div class="container-fluid min-h-100 p-5 grey lighten-3">
<a class="btn mx-auto my-auto col-4" href="index.php?action=faireDemandeView"> Faire une Demande </a>
    <h2 class="border-bottom col-12 animated fadeInLeft">Vos demandes</h2>
    <?php if ($demandes != null) : ?> 
	<div class="d-flex justify-content-around flex-wrap">
		<?php foreach ($demandes as $key => $demande) : ?>
			<div class="col-md-3 m-1 mt-5 animated fadeInDown">
				<div class="col-md-12 border border-green white p-2 text-center">
					<div class=" font-weight-bold">
                        Groupe N°<?= $demande->gid(); ?>
					</div>
					<div class="text-success text-left">
						User N°<?= $demande->uid(); ?> 
					</div>
					<div class="">
						Source : <?= $demande->source() ?>
					</div>
				</div>
			</div>
		<?php endforeach  ?>
    </div>
    <?php else : ?>
        <div>Vous n'avez pas de demande de Groupe en cours</div>
    <?php endif ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>