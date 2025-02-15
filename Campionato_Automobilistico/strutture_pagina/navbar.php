<?php
require_once 'functions_active_navbar.php'
?>


<div class="navbar">
    <a href="home.php" class="<?= isActive('home.php') ?>"> Home</a>
    <a href="inserimento_pilota.php" class="<?= isActive('inserimento_pilota.php') ?>"> Inserimento Pilota</a>
    <a href="inserimento_casa.php" class="<?= isActive('inserimento_casa.php') ?>"> Inserimento Scuderia</a>
    <a href="crea_gara.php" class="<?= isActive('crea_gara.php') ?>"> Inserisci Gara</a>
    <a href="inserimento_risultati.php" class="<?= isActive('inserimento_risultati.php') ?>"> Inserimento Risultati</a>
    <a href="visualizza_piloti.php" class="<?= isActive('visualizza_piloti.php') ?>"> Visualizza Piloti</a>
    <a href="visualizza_scuderie.php" class="<?= isActive('visualizza_scuderie.php') ?>"> Visualizza Scuderie</a>
    <a href="visualizza_gare.php" class="<?= isActive('visualizza_gare.php') ?>"> Visualizza Gare</a>
</div>



