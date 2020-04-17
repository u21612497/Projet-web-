<?php
ob_start();
session_start();
require('view/adminAccess.php');
?>
<div class="h-100 m-auto h-100 p-5 d-flex flex-column animated fadeIn">
    <h2>Modifier une association</h1>
        <form action="index.php?action=associationModifier&amp;id=<?= $updateGid ?>" id="formModifierAssociation" method="POST">
            <div class="row col-12 p-0 m-0">
                <select id="monselect" class="col-lg-12 p-2 border animated fadeInLeft" name="gid">
                    <option value="<?= $groupe->gid(); ?>">Groupe N°<?= $groupe->gid(); ?> Relié au Projet N°<?= $groupe->gid(); ?> 
                        <?php foreach ($groupes as $key => $groupe) : ?>
                    <option value="<?= $groupe->gid(); ?>"><?= $groupe->gid(); ?>
                    <?php endforeach ?>
                </select>
                <select id="monselect" class="col-lg-12 p-2 border animated fadeInLeft" name="uid">
                    <option value="<?= $user->uid(); ?>"><?= $user->nom(); ?> <?= $user->prenom(); ?> <?= $user->login(); ?></option>
                    <?php foreach ($users as $key => $user) : ?>
                        <option value="<?= $user->uid(); ?>"><?= $user->nom(); ?> <?= $user->prenom(); ?> <?= $user->login(); ?></option>
                    <?php endforeach ?>
                </select>
                <input class="btn border-secondary col-6 offset-3 mt-4 animated fadeInRight rounded text-white" type="submit" name="valide" value="Valider">
            </div>
        </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>