<?php

require_once "../connessione_db/operazioni.php";
// recupero dei dati dal form
$nome = $_POST['nome'];
$luogo = $_POST['luogo'];
$data = $_POST['data'];

inserimento_gara($nome, $data, $luogo);   //richiamo la funzione creata nel file operazioni

?>