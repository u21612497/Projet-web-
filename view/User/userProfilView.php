<?php $title = 'Mon site'; ?>

<?php
ob_start();
session_start();
require('view/userAccess.php');
//Vue d'un article
?>
<div class="container-fluid white">
    <div class="col-10 m-auto h-75 p-5 d-flex flex-column">
        <h2 class="text-center border-bottom border-secondary p-2 animated zoomIn">Profil</h2>
        <a class="btn mx-auto my-auto col-4" href="index.php?action=modifierUserView&id=<?= $user->uid() ?>"> Modifier son Profil </a>
        <div class="col-lg-12 p-2 mt-2 text-justify animated fadeIn delay-1s">
            <?= $user->nom(); ?>
        </div>
        <div> <?= $user->prenom(); ?></div>
        <div class="p-3 text-success">
            <?= $user->login(); ?> <?= $user->role(); ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?> 

<?php require('view/template.php'); ?>