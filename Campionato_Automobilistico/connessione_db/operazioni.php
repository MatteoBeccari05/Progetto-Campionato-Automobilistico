<?php
$config = require 'db_config.php';

require 'DB_Connect.php';
require_once 'functions.php';

$db = DataBase_Connect::getDB($config);


function inserimento($nome, $cognome, $nazionalita, $numero, $casa)
{
    $query = "INSERT INTO Piloti (nome, cognome, nazionalita, numero, id_casa) VALUES (:nome, :cognome, :nazionalita, :numero, :id_casa)";
    global $db;
    try
    {
        if ($nome != null && $cognome != null && $nazionalita != null)
        {
            $stm = $db->prepare($query);
            $stm->bindValue(':nome', $nome);
            $stm->bindValue(':cognome', $cognome);
            $stm->bindValue(':nazionalita', $nazionalita);
            $stm->bindValue(':numero', $numero);
            $stm->bindValue(':id_casa', $casa);

            if ($stm->execute())
            {
                $stm->closeCursor();  // chiudo la connessione
                header('Location:../redirect/confirm.html');  //per non avere problemi di scrittura doppia
            }
            else
            {
                throw new PDOException("Pilota non inserito correttamente");  // sollevo l'eccezione
            }
        }
        else
        {
            header('Location:../redirect/error.html');  //per non avere problemi di scrittura doppia
            throw new PDOException("Controlla i dati inseriti");  // sollevo l'eccezione
        }

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}

function inserimento_gara($nome, $data, $luogo)
{
    $query = "INSERT INTO Gare (nome, data, luogo_id) VALUES (:nome, :data, :luogo_id)";
    global $db;
    try
    {
        if ($nome != null && $luogo!= null)
        {
            $stm = $db->prepare($query);
            $stm->bindValue(':nome', $nome);
            $stm->bindValue(':data', $data);
            $stm->bindValue(':luogo_id', $luogo);

            if ($stm->execute())
            {
                $stm->closeCursor();  // chiudo la connessione
                header('Location:../redirect/confirm.html');  //per non avere problemi di scrittura doppia
            }
            else
            {
                throw new PDOException("Gara non inserita correttamente");  // sollevo l'eccezione
            }
        }
        else
        {
            header('Location:../redirect/error.html');  //per non avere problemi di scrittura doppia
            throw new PDOException("Controlla i dati inseriti");  // sollevo l'eccezione
        }

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}


function ritorno_luoghi()
{
    global $db;
    try
    {

        // Esegui la query per recuperare le case automobilistiche
        $sql = "SELECT id, luogo FROM luogo_gara";
        $stmt = $db->query($sql);

        // Variabile per contenere le opzioni HTML
        $options = '';

        // Controlla se ci sono risultati
        if ($stmt->rowCount() > 0)
        {
            // Aggiungi ogni casa automobilistica come opzione al select
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $options .= "<option value='" . $row['id'] . "'>" . $row['luogo'] . "</option>";
            }
        }
        else
        {
            $options .= "<option value=''>Nessuna casa automobilistica disponibile</option>";
        }

        // Ritorna le opzioni HTML
        return $options;

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}


function inserimento_scuderia($nome, $colore)
{
    $query = "INSERT INTO CaseAutomobilistiche (nome, colore_livrea) VALUES (:nome, :colore_livrea)";
    global $db;
    try
    {
        if ($nome != null && $colore!= null)
        {
            $stm = $db->prepare($query);
            $stm->bindValue(':nome', $nome);
            $stm->bindValue(':colore_livrea', $colore);

            if ($stm->execute())
            {
                $stm->closeCursor();  // chiudo la connessione
                header('Location:../redirect/confirm.html');  //per non avere problemi di scrittura doppia
            }
            else
            {
                throw new PDOException("Scuderia non inserita correttamente");  // sollevo l'eccezione
            }
        }
        else
        {
            header('Location:../redirect/error.html');  //per non avere problemi di scrittura doppia
            throw new PDOException("Controlla i dati inseriti");  // sollevo l'eccezione
        }

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}





function ritorno_case()
{
    global $db;
    try
    {

        // Esegui la query per recuperare le case automobilistiche
        $sql = "SELECT id, nome FROM CaseAutomobilistiche";
        $stmt = $db->query($sql);

        // Variabile per contenere le opzioni HTML
        $options = '';

        // Controlla se ci sono risultati
        if ($stmt->rowCount() > 0)
        {
            // Aggiungi ogni casa automobilistica come opzione al select
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $options .= "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
        }
        else
        {
            $options .= "<option value=''>Nessuna casa automobilistica disponibile</option>";
        }

        // Ritorna le opzioni HTML
        return $options;

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}



function visualizza_piloti()
{
    $query = "SELECT p.id, p.nome, p.cognome, p.nazionalita, p.numero, c.nome AS scuderia_nome 
          FROM Piloti p 
          JOIN CaseAutomobilistiche c ON p.id_casa = c.id";

    global $db;
    try
    {
        $stm = $db->prepare($query);
        $stm->execute(); // eseguo la query

        echo '<table>';
        echo '<tr><th>Nome</th><th>Cognome</th><th>Nazionalita</th><th>Numero</th><th>Scuderia</th></tr>';

        while ($pilota = $stm->fetch())
        {
            // Righe della tabella
            echo '<tr>';
            echo '<td>' . $pilota->nome . '</td>';
            echo '<td>' . $pilota->cognome . '</td>';
            echo '<td>' . $pilota->nazionalita . '</td>';
            echo '<td>' . $pilota->numero . '</td>';
            echo '<td>' . $pilota->scuderia_nome . '</td>'; // Qui viene visualizzato il nome della scuderia
            echo '</tr>';
        }

        echo '</table>'; // Fine della tabella

        $stm->closeCursor();  // chiudo la connessione
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }

}


function visualizza_scuderie()
{
    $query = "SELECT * FROM CaseAutomobilistiche";

    global $db;
    try
    {
        $stm = $db->prepare($query);
        $stm->execute(); // eseguo la query

        echo '<table>';
        echo '<tr><th>ID</th><th>Nome</th><th>Colore Livrea</th>';

        while ($casa = $stm->fetch())
        {
            // Righe della tabella
            echo '<tr>';
            echo '<td>' . $casa->id . '</td>';
            echo '<td>' . $casa->nome . '</td>';
            echo '<td>' . $casa->colore_livrea . '</td>';
            echo '</tr>';
        }

        echo '</table>'; // Fine della tabella

        $stm->closeCursor();  // chiudo la connessione
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }

}


function inserimento_risultati($pos, $tempo, $pilota, $gara)
{
    $query = "INSERT INTO Risultati (id_gara, id_pilota, posizione, tempo) VALUES (:id_gara, :id_pilota, :posizione, :tempo)";
    global $db;
    try
    {
        if ($tempo != null && $pos!= null)
        {
            $stm = $db->prepare($query);
            $stm->bindValue(':id_gara', $gara);
            $stm->bindValue(':id_pilota', $pilota);
            $stm->bindValue(':posizione', $pos);
            $stm->bindValue(':tempo', $tempo);

            if ($stm->execute())
            {
                $stm->closeCursor();  // chiudo la connessione
                header('Location:../redirect/confirm.html');  //per non avere problemi di scrittura doppia
            }
            else
            {
                throw new PDOException("Risultato non inserito correttamente");  // sollevo l'eccezione
            }
        }
        else
        {
            header('Location:../redirect/error.html');  //per non avere problemi di scrittura doppia
            throw new PDOException("Controlla i dati inseriti");  // sollevo l'eccezione
        }

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}

function ritorno_gare()
{
    global $db;
    try
    {

        // Esegui la query per recuperare le case automobilistiche
        $sql = "SELECT id, nome FROM Gare";
        $stmt = $db->query($sql);

        // Variabile per contenere le opzioni HTML
        $options = '';

        // Controlla se ci sono risultati
        if ($stmt->rowCount() > 0)
        {
            // Aggiungi ogni casa automobilistica come opzione al select
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $options .= "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
        }
        else
        {
            $options .= "<option value=''>Nessuna gara disponibile</option>";
        }

        // Ritorna le opzioni HTML
        return $options;

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}

function ritorno_piloti ()
{
    global $db;
    try
    {

        // Esegui la query per recuperare le case automobilistiche
        $sql = "SELECT id, cognome FROM Piloti";
        $stmt = $db->query($sql);

        // Variabile per contenere le opzioni HTML
        $options = '';

        // Controlla se ci sono risultati
        if ($stmt->rowCount() > 0)
        {
            // Aggiungi ogni casa automobilistica come opzione al select
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $options .= "<option value='" . $row['id'] . "'>" . $row['cognome'] . "</option>";
            }
        }
        else
        {
            $options .= "<option value=''>Nessuna pilota disponibile</option>";
        }

        // Ritorna le opzioni HTML
        return $options;

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}


function visualizza_gare()
{
    $query = "SELECT g.id, g.nome, g.data, lg.luogo as luogo_gara
                FROM campionato.Gare g
                JOIN campionato.luogo_gara lg ON g.luogo_id = lg.id";

    global $db;
    try
    {
        $stm = $db->prepare($query);
        $stm->execute(); // eseguo la query

        echo '<table>';
        echo '<tr><th>ID</th><th>Nome</th><th>Data</th><th>Luogo</th></tr>';

        while ($gara = $stm->fetch())
        {
            // Righe della tabella
            echo '<tr>';
            echo '<td>' . $gara->id . '</td>';
            echo '<td>' . $gara->nome . '</td>';
            echo '<td>' . $gara->data . '</td>';
            echo '<td>' . $gara->luogo_gara . '</td>';
            echo '</tr>';
        }

        echo '</table>'; // Fine della tabella

        $stm->closeCursor();  // chiudo la connessione
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }

}


?>

