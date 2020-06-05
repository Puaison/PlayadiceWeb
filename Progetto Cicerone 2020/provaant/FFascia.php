<?php

/**
 * La classe FUser fornisce query per gli oggetti EUser
 * @author gruppo2
 * @package Foundation
 */
class FFascia
{
    static function searchFasciabyId() : string
    {
        return "SELECT *
                FROM fascia
                WHERE IdEvento = :IdEvento;";
    }
    static function storeFascia() : string
    {
        return "INSERT INTO fascia(IdEvento, durata, data_inizio)
				VALUES(:IdEvento, :durata, :data_inizio);";
    }
    /**
     * Query che effettua l'aggiornamento di un utente nella table users
     * @return string contenente la query sql
     */
    static function updateFascia($id) : string
    {
        return "UPDATE fascia
                SET  durata = :durata, data_inizio = :data_inizio
                WHERE IdEvento = $id ;";
    }
    /**
     * Elimina un utente dal db .
     *
     */
    static function removeAvatar() : string
    {
        return "DELETE 
                FROM avatar
                WHERE IdAvatar = :IdAvatar;"; //query sql

    }


    static function bindValues(PDOStatement &$stmt, EFascia &$fascia)
    {
        $result = var_export($stmt, true);
        if (strpos($result, ":IdEvento") !== false)
            $stmt -> bindValue(':IdEvento', null, PDO::PARAM_INT);
        if (strpos($result, ":durata") !== false)
            $stmt -> bindValue(':durata', date_interval_format($fascia -> getDurata(),"%Y%M%d%H%i%s"), PDO::PARAM_INT);
        if (strpos($result, ":data_inizio") !== false)
            $stmt -> bindValue(':data_inizio', date_format($fascia -> getData(),"d/m/Y H:i:s"),PDO::PARAM_STR);

    }
    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EFascia
     */
    static function createObjectFromRow($row)
    {
        $fascia = new EFascia();
        $fascia->setData(date_create($row['data_inizio']));
        $fascia->setDurata(date_interval_create_from_date_string($row['durata']));
        return $fascia;
    }


}