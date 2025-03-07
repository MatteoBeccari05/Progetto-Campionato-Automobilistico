<?php
$content = 'Inserimento Pilota';
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
    <title>Inserimento</title>
</head>
<body>
<h2 class="titolo"><?=$content?></h2>

<form action="../passaggio_dati/inserimento.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="cognome">Cognome:</label>
    <input type="text" id="cognome" name="cognome" required><br><br>

    <label for="nazionalita">Nazionalità:</label>
    <input type="text" id="nazionalita" name="nazionalita"><br><br>

    <label for="numero">Numero di Gara:</label>
    <input type="number" id="numero" name="numero" required><br><br>

    <label for="id_casa">Casa Automobilistica:</label>
    <select id="id_casa" name="id_casa" required>
        <?php echo ritorno_case(); ?>
    </select><br><br>

    <input type="submit" value="Inserisci Pilota">
</form>

<br>


<?php
require '../strutture_pagina/footer.php';
?>
