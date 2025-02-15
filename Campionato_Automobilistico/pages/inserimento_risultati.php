<?php
$content = 'Inserimento Risultati';
require_once '../strutture_pagina/functions_active_navbar.php';
require '../strutture_pagina/navbar.php';
require_once '../connessione_db/operazioni.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Inserimento Risultati</title>
</head>
<body>
<h2 class="titolo"><?=$content?></h2>

<form action="../passaggio_dati/inserimento_risultati.php" method="POST">


    <!-- Posizione -->
    <label for="pos">Posizione:</label>
    <input type="number" id="pos" name="pos" required min="1" step="1" placeholder="Inserisci la posizione"><br><br>

    <!-- Tempo -->
    <label for="time">Tempo:</label>
    <input type="time" id="time" name="time" required><br><br>


    <label for="pilota">Pilota:</label>
    <select id="pilota" name="pilota" required>
        <?php echo ritorno_piloti(); ?>
    </select><br><br>

    <label for="gara">Gara:</label>
    <select id="gara" name="gara" required>
        <?php echo ritorno_gare(); ?>
    </select><br><br>


    <!-- Pulsante di submit -->
    <input type="submit" value="Inserisci Risultato">

</form>




<?php
require '../strutture_pagina/footer.php';
?>
