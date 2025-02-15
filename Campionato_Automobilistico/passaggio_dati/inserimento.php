<?php

require_once "../connessione_db/operazioni.php";
// recupero dei dati dal form
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$nazionalita = $_POST['nazionalita'];
$numero = $_POST['numero'];
$casa = $_POST['id_casa'];

inserimento($nome, $cognome, $nazionalita, $numero, $casa);   //richiamo la funzione creata nel file operazioni

?>

