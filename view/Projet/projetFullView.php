<?php $title = 'Mon site'; ?>

<?php
ob_start();
session_start();
require('view/userAccess.php');
//Vue d'un article
?>
<div class="container-fluid white">
    <div class="col-10 m-auto h-75 p-5 d-flex flex-column">
        <?php if ($_SESSION['role'] == 'admin') : ?>
            <a class="btn mx-auto my-auto col-4" href="index.php?action=projetAll"> Liste des Projets </a>
        <?php endif ?>
        <?php if ($projet->pid() == null) : ?>
            <div>Vous n'avez été affecté a aucun projet, veuillez contacter un administrateur</div>
        <?php else :  ?>
            <h2 class="text-center border-bottom border-secondary p-2 animated zoomIn">Projet N°<?= $projet->pid(); ?> <?= $projet->titre(); ?></h2>
            <div class="col-lg-12 p-2 mt-2 text-justify animated fadeIn delay-1s">
                <?php echo nl2br($projet->description()); ?>
            </div>
            <div> Taille du groupe : <?= $projet->tailleGroupe(); ?></div>
            <div class="p-3 text-success">
                Du <?= $projet->dateDebut(); ?> Au <?= $projet->dateFin(); ?>
            </div>
            <div class="mt-5">
                <div style="display: none;" id="comments">
                    <?php foreach ($commentsprojetost as $key => $commentprojetost) : ?>
                        <div class="col-lg-8 offset-lg-2 d-flex flex-wrap border p-3 mt-1 animated zoomIn">
                            <div class="col-lg-12 border border-white  font-weight-bold">
                                <?= htmlspecialchars($commentprojetost->pseudo()); ?>
                            </div>
                            <div class="col-lg-12 border border-white ">
                                <?php
                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $commentprojetost->dateCreated());
                                ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?> <?php require('view/template.php'); ?>