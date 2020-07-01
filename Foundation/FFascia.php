<?php

/**
 * La classe FUser fornisce query per gli oggetti EUser
 * @author gruppo2
 * @package Foundation
 */
class FFascia
{
    static function searchFasciaByIdEvento() : string
    {
        return "SELECT *
                FROM fascia
                WHERE IdEvento = :IdEvento;";
    }
    static function searchFasciaById() : string
    {
        return "SELECT *
                FROM fascia
                WHERE Id = :Id;";
    }
    static function searchFasciaByData() : string
    {
        return "SELECT *
                FROM fascia
                WHERE DataInizio = :DataInizio;";
    }
    static function searchFasciaByDurata() : string
    {
        return "SELECT *
                FROM fascia
                WHERE Durata = :Durata;";
    }
    static function storeFascia() : string
    {
        return "INSERT INTO fascia(IdEvento, Durata, DataInizio)
				VALUES(:IdEvento, :Durata, :DataInizio);";
    }
    /**
     * Query che effettua l'aggiornamento di un utente nella table users
     * @return string contenente la query sql
     */
    static function updateFascia() : string
    {
        return "UPDATE fascia
                SET  Durata = :Durata, DataInizio = :DataInizio
                WHERE Id = :Id;";
    }
    /**
     * Elimina un utente dal db .
     *
     */
    static function removeFascia() : string
    {
        return "DELETE 
                FROM fascia
                WHERE Id = :Id;"; //query sql

    }


    static function bindValues(PDOStatement &$stmt, EFascia &$fascia)
    {

        $result = var_export($stmt, true);
        if (strpos($result, ":IdEvento") !== false)
            $stmt -> bindValue(':IdEvento', $fascia->getIdEvento(), PDO::PARAM_INT);
        if (strpos($result, ":Durata") !== false)
            $stmt -> bindValue(':Durata', date_interval_format($fascia -> getDurata(),"%Y,%M,%d,%H,%i,%s"), PDO::PARAM_STR);
        if (strpos($result, ":DataInizio") !== false)
            $stmt -> bindValue(':DataInizio', date_format($fascia -> getData(),"d/m/Y H:i:s"),PDO::PARAM_STR);

    }
    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EFascia
     */
    static function createObjectFromRow($row)
    {
        $fascia = new EFascia();
        $fascia->setId($row['Id']);
        $fascia->setIdEvento($row['IdEvento']);
        $data=(date_create_from_format("d/m/Y H:i:s",$row['DataInizio']));
        $fascia->setData($data);
        list($years,$month, $days, $hours, $minutes, $seconds) = sscanf($row['Durata'], '%d,%d,%d,%d,%d,%d');
        $interval = new DateInterval(sprintf('P%dY%dM%dDT%dH%dM%dS', $years,$month, $days, $hours, $minutes, $seconds));
        $iniziocopy= clone $data;
        $iniziocopy->add($interval);
        $fascia->setFine($iniziocopy);

        $fascia->setDurata($interval);
        return $fascia;
    }


}