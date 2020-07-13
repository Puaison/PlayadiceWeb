<?php


/**
 *La classe FRecensione fornisce query per gli oggetti ERecensione
 */
class FRecensione
{

    /**
     * Query che ricerca tutte le recensioni associate ad un Gioco
     * @return stringstring contenente la query SQL
     */
    static function searchRecensioneByIdGioco() : string
    {
        return "SELECT *
                FROM recensione
                WHERE IdGioco=:IdGioco;";
    }

    /**
     * Query che ricerca tutte le recensioni associate ad un utente
     * @return stringstring contenente la query SQL
     */
    static function searchRecensioneByCreatore() : string
    {
        return "SELECT *
                FROM recensione
                WHERE Creatore=:Creatore;";
    }

    /**
     * Query che effettua il salvataggio di una recensione nella table "recensione" del DB
     * @return string string contenente la query SQL
     */
    static function storeRecensione() : string
    {
        return "INSERT INTO recensione(Creatore, IdGioco,Voto,Commento)
				VALUES(:Creatore, :IdGioco, :Voto, :Commento);";
    }

    /**
     * Query che permette la rimozione di una Recensione
     * di un utente associata ad un gioco
     * @return string string contenente la query SQL
     */
    static function removeRecensione() : string
    {
        return "DELETE 
                FROM recensione
                WHERE IdGioco = :IdGioco AND Creatore=:Creatore";

    }


    /**
     * Metodo che, partendo da un oggetto ERecensione,associa i suoi
     * attributi ai campi di una query sql per la table "recensione"
     * @param PDOStatement $stmt lo statement(query) contenente i campi da riempire
     * @param ERecensione $recensione L'oggetto da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, ERecensione $recensione)
    {
        $result = var_export($stmt, true);

        if( strpos( $result, ":Creatore" ) !== false)
            $stmt->bindValue(':Creatore', $recensione->getEUtente()->getUsername(), PDO::PARAM_STR);
        if( strpos( $result, ":IdGioco" ) !== false)
            $stmt->bindValue(':IdGioco', $recensione->getEGioco()->getId(), PDO::PARAM_INT);
        if( strpos( $result, ":Voto" ) !== false)
            $stmt->bindValue(':Voto', $recensione->getVoto(), PDO::PARAM_STR);
        if( strpos( $result, ":Commento" ) !== false)
            $stmt->bindValue(':Commento', $recensione->getCommento(), PDO::PARAM_STR);

    }

    /**
     * Metodo che partendo da ciò che è stato recuperato
     * dal database, crea un Oggetto ERecensione
     * @param array $row contenente le informazioni recuperate dal DB
     * attraverso una relazione chiave(il nome dei campi all'interno del db) - valore
     * @return ERecensione
     */
    static function createObjectFromRow($row)
    {


        $recensione = new ERecensione();

        if ( ($row['Creatore']) != null )
        {
            $Pippo = FPersistantManager::getInstance()->search("Utente","UserName",($row['Creatore']));
            $recensione->setEUtente($Pippo[0]);
        }
        $recensione->setVoto($row['Voto']);
        $recensione->setCommento($row['Commento']);

        /* Queste due righe permettono un Eager Loading
         dell'oggetto EGioco associata alla Recensione in questione.
        Noi invece facciamo Lazy Loading
        $Pippo = FPersistantManager::getInstance()->search("Gioco","Id",($row['IdGioco']));
        $recensione->setEGioco($Pippo[0]);
        */
        return $recensione;
    }
}