<?php
ob_start();
session_start();
require('view/adminAccess.php');
?>
<div class="h-100 m-auto h-100 p-5 d-flex flex-column animated fadeIn">
    <h2>Modifier un choix</h1>
        <form action="index.php?action=choixModifier&amp;id=<?= $updateGid ?>" id="formModifierProjet" method="POST">
            <div class="row col-12 p-0 m-0">
                <div class="row p-0 m-0 col-12">
                    <label class="col-lg-12 mt-4 animated fadeInRight">Nom du choix : </label> <input class="col-lg-12 p-2 animated fadeInLeft border" type="text" name="nom" value="<?= $updateNom ?>" />
                </div>
                <select id="monselect" class="col-lg-12 p-2 border animated fadeInLeft" name="pid">
                    <option value="<?= $projet->pid(); ?>"><?= $projet->titre(); ?> / Du <?= $projet->dateDebut(); ?> au <?= $projet->dateFin(); ?></option>
                    <?php foreach ($projets as $key => $projet) : ?>
                        <option value="<?= $projet->pid(); ?>"><?= $projet->titre(); ?> / Du <?= $projet->dateDebut(); ?> au <?= $projet->dateFin(); ?></option>
                    <?php endforeach ?>
                </select>
                <input class="btn border-secondary col-6 offset-3 mt-4 animated fadeInRight rounded text-white" type="submit" name="valide" value="Valider">
            </div>
        </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>