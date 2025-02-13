<?php
require_once 'functions_active_navbar.php'
?>


<div class="navbar">
    <a href="home.php" class="<?= isActive('home.php') ?>"> Home</a>
    <a href="inserimento_pilota.php" class="<?= isActive('inserimento_pilota.php') ?>"> Inserimento Pilota</a>
    <a href="form_aggiorna.php" class="<?= isActive('form_aggiorna.php') ?>"> Gara</a>
    <a href="form_elimina.php" class="<?= isActive('form_elimina.php') ?>"> Modifica</a>
    <a href="visualizza_piloti.php" class="<?= isActive('visualizza_piloti.php') ?>"> Visualizza Piloti</a>
</div>



