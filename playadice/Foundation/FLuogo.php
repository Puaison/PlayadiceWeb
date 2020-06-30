<?php

/**
 * La classe FUser fornisce query per gli oggetti EUser
 * @author gruppo2
 * @package Foundation
 */
class FLuogo
{
    static function searchLuogobyId() : string
    {
        return "SELECT *
                FROM luogo
                WHERE Id = :Id;";
    }
    static function searchLuogobyNome() : string
    {
        return "SELECT *
                FROM luogo
                WHERE Nome = :Nome;";

    }
    static function searchLuogobyCitta() : string
    {
        return "SELECT *
                FROM luogo
                WHERE Citta = :Citta;";

    }
    static function searchLuogobyVia() : string
    {
        return "SELECT *
                FROM luogo
                WHERE Via= :Via;";

    }
    static function searchLuogobyCap() : string
    {
        return "SELECT *
                FROM luogo
                WHERE Cap = :Cap;";

    }

    static function storeLuogo() : string
    {
        return "INSERT INTO luogo(Nome, Citta, Via, Cap)
				VALUES(:Nome, :Citta, :Via, :Cap);";
    }
    static function removeLuogo() : string
    {
        return "DELETE 
                FROM luogo
                WHERE Id = :Id;";

    }
    static function updateLuogo() : string
    {
        return "UPDATE luogo
                SET  Nome = :Nome, Citta = :Citta, Via = :Via, Cap = :Cap
                WHERE Id = :Id ;";
    }

    /**
     * Query che effettua l'aggiornamento di un utente nella table users
     * @return string contenente la query sql
     */




    static function bindValues(PDOStatement &$stmt, ELuogo &$luogo)
    {
        $result = var_export($stmt, true);
        if (strpos($result, ":Id") !== false)
            $stmt -> bindValue(':Id', $luogo->getId(), PDO::PARAM_STR);
        if (strpos($result, ":Nome") !== false)
            $stmt -> bindValue(':Nome',$luogo->getNome(), PDO::PARAM_STR);
        if (strpos($result, ":Citta") !== false)
            $stmt -> bindValue(':Citta', $luogo->getCitta(),PDO::PARAM_STR);
        if (strpos($result, ":Via") !== false)
            $stmt -> bindValue(':Via', $luogo->getVia(),PDO::PARAM_STR);
        if (strpos($result, ":Cap") !== false)
            $stmt -> bindValue(':Cap',$luogo->getCap(),PDO::PARAM_STR);

    }
    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EFascia
     */
    static function createObjectFromRow($row)
    {
        $luogo = new ELuogo();
        $luogo->setId($row['Id']);
        $luogo->setNome($row['Nome']);
        $luogo->setCitta($row['Citta']);
        $luogo->setVia($row['Via']);
        $luogo->setCap($row['Cap']);
        return $luogo;
    }


}