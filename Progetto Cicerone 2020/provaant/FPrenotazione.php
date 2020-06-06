<?php

/**
 * La classe FUser fornisce query per gli oggetti EUser
 * @author gruppo2
 * @package Foundation
 */
class FPrenotazione
{
    static function searchPrenotazionebyEvento() : string
    {
        return "SELECT *
                FROM prenotazione
                WHERE IdEvento = :IdEvento;";
    }
    static function searchPrenotazionebyUtente() : string
    {
        return "SELECT *
                FROM prenotazione
                WHERE UserName = :UserName;";

    }
    static function searchPrenotazionebyId() : string
    {
        return "SELECT *
                FROM prenotazione
                WHERE Id = :Id;";

    }

    static function storePrenotazione() : string
    {
        return "INSERT INTO luogo(UserName, IdEvento, Data)
				VALUES(:UserName, :IdEvento, :Data);";
    }
    static function removePrenotazione() : string
    {
        return "DELETE 
                FROM prenotazione
                WHERE Id = :Id;";

    }
    static function updatePrenotazione() : string
    {
        return "UPDATE prenotazione
                SET  UserName = :UserName, IdEvento = :IdEvento, Data = :Data
                WHERE Id = :Id ;";
    }

    /**
     * Query che effettua l'aggiornamento di un utente nella table users
     * @return string contenente la query sql
     */




    static function bindValues(PDOStatement &$stmt, EPrenotazione &$prenotazione)
    {
        $result = var_export($stmt, true);
        if (strpos($result, ":Id") !== false)
            $stmt -> bindValue(':Id',$prenotazione->getId(), PDO::PARAM_INT);
        if (strpos($result, ":UserName") !== false)
            $stmt -> bindValue(':UserName',$prenotazione->getUtente()->getUsername(), PDO::PARAM_STR);
        if (strpos($result, ":Data") !== false)
            $stmt -> bindValue(':Data', date_format($prenotazione -> getData(),"d/m/Y H:i:s"),PDO::PARAM_STR);

    }
    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EPrenotazione
     */
    static function createObjectFromRow($row)
    {
        $prenotazione = new EPrenotazione();
        $prenotazione->setId($row['Id']);
        $prenotazione->setUserName($row['UserName']);
        $prenotazione->setData((date_create($row['Data']));
        return $prenotazione;
    }


}