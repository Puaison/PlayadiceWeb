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
                FROM fascia
                WHERE IdEvento = :IdEvento;";
    }
    static function storeLuogo() : string
    {
        return "INSERT INTO luogo(nome, città, via, cap)
				VALUES(:nome, :città, :via, :cap);";
    }
    /**
     * Query che effettua l'aggiornamento di un utente nella table users
     * @return string contenente la query sql
     */




    static function bindValues(PDOStatement &$stmt, ELuogo &$luogo)
    {
        $result = var_export($stmt, true);
        if (strpos($result, ":id") !== false)
            $stmt -> bindValue(':id', null, PDO::PARAM_INT);
        if (strpos($result, ":nome") !== false)
            $stmt -> bindValue(':nome',$luogo->getNome(), PDO::PARAM_STR);
        if (strpos($result, ":città") !== false)
            $stmt -> bindValue(':città', $luogo->getCitta(),PDO::PARAM_STR);
        if (strpos($result, ":via") !== false)
            $stmt -> bindValue(':via', $luogo->getVia(),PDO::PARAM_STR);
        if (strpos($result, ":cap") !== false)
            $stmt -> bindValue(':cap',$luogo->getCap(),PDO::PARAM_INT);

    }
    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EFascia
     */
    static function createObjectFromRow($row)
    {
        $luogo = new ELuogo();
        $luogo->setId($row['id']);
        $luogo->setNome($row['nome']);
        $luogo->setCitta($row['città']);
        $luogo->setVia($row['via']);
        $luogo->setCap($row['cap']);
        return $luogo;
    }


}