<?php ob_start(); ?>

<p>Test essayes de comprendre le fonctionnement des 2 pages</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
