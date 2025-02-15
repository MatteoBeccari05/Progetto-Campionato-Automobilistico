<?php
$content = 'Inserimento Gara';
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
    <title>Inserimento Gara</title>
</head>
<body>
<h2 class="titolo"><?=$content?></h2>

<form action="../passaggio_dati/gara.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="data">Inserisci la data della gara:</label>
    <input type="date" id="data" name="data" required>
    <br> <br>

    <label for="luogo">Luogo:</label>
    <select id="luogo" name="luogo" required>
        <?php echo ritorno_luoghi(); ?>
    </select><br><br>

    <input type="submit" value="Inserisci Gara">
</form>

<br>


<?php
require '../strutture_pagina/footer.php';
?>
