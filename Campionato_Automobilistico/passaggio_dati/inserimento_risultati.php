<?php

require_once "../connessione_db/operazioni.php";
// recupero dei dati dal form
$pos = $_POST['pos'];
$tempo = $_POST['time'];
$pilota = $_POST['pilota'];
$gara = $_POST['gara'];

inserimento_risultati($pos, $tempo, $pilota, $gara);   //richiamo la funzione creata nel file operazioni

?>
