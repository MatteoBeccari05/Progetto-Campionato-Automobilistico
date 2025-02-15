<?php

require_once "../connessione_db/operazioni.php";
// recupero dei dati dal form
$nome = $_POST['nome'];
$colore = $_POST['color'];

inserimento_scuderia($nome, $colore);   //richiamo la funzione creata nel file operazioni

?>

