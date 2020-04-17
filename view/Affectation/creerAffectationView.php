<?php $title = 'web Projet'; ?>

<?php
ob_start();
session_start();
require('view/adminAccess.php');
?>

<div class="col-10 m-auto h-100 p-5 d-flex flex-column  animated fadeIn">
    <?= $_SESSION['role'] ?>
    <h2>Creer une Association</h2>
    <form action="index.php?action=creerAffectation" id="formRegistration" method="POST">
        <div class="row col-12 p-0 m-0">
            <div class="row p-0 m-0 col-12">
                <label class="col-lg-12 mt-4 animated fadeInRight">Groupes :</label>
                <select id="monselect" class="col-lg-12 p-2 border animated fadeInLeft" name="gid">
                    <?php foreach ($groupes as $key => $groupe) : ?>
                        <option value="<?= $groupe->gid(); ?>"> N°<?= $groupe->gid(); ?> projet=><?= $groupe->pid()->titre(); ?>=>N°<?= $groupe->pid()->pid(); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="row p-0 m-0 col-12">
                <label class="col-lg-12 mt-4 animated fadeInRight">Choix :</label>
                <select id="monselect" class="col-lg-12 p-2 border animated fadeInLeft" name="cid">
                    <?php foreach ($aChoix as $key => $choix) : ?>
                        <option value="<?= $choix->cid(); ?>"><?= $choix->nom(); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <input id="submitFormRegistration" type="submit" name="valide" value="Valider" class="btn border-secondary col-6 offset-3 mt-4 animated fadeInRight rounded text-white" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>