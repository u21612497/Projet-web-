<?php
ob_start(); ?>

<div class="m-auto pt-5 col-6">
	<a class="btn col-12" href="index.php?action=dashboard&amp;id=1">Dashboard</a>
	echo('<img style="width: 50px;height: 50px;border-radius: 500px;">')
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>