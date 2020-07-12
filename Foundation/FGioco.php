<?php

/**
 * La classe FGioco fornisce query per gli oggetti EGioco
 * @package Foundation
 */

class FGioco
{

    static function storeGioco() : string
    {
        return "INSERT INTO gioco(Nome, Categoria)
				VALUES(:Nome, :Categoria);";
    }

    static function searchGiocoByNome() : string
    {
        return "SELECT *
                FROM gioco
                WHERE LOCATE( :Nome , Nome ) > 0;";
    }

    static function searchGiocoById() : string
    {
        return "SELECT *
                FROM gioco
                WHERE LOCATE( :Id , Id ) > 0;";
    }

    static function searchGiocoByCategoria() : string
    {
        return "SELECT *
                FROM gioco
                WHERE LOCATE( :Categoria , Categoria ) > 0;";
    }

    static function searchGiocoByLast() : string
    {
        return "SELECT *
                FROM gioco
                ORDER BY Id DESC limit 1;";
    }

    static function searchGiocoByBestRate() : string
    {
        return "SELECT *
                FROM gioco
                ORDER BY VotoMedio DESC;";
    }

    static function searchGiocoByBestFive() : string
    {
        return "SELECT *
                FROM gioco
                ORDER BY VotoMedio DESC limit 5;";
    }

    static function searchGiocoByAlphabeticOrder() : string
    {
        return "SELECT *
                FROM gioco
                ORDER BY Nome;";
    }

    static function removeGioco() : string
    {
        return "DELETE 
                FROM gioco
                WHERE Id = :Id;";

    }

    static function updateGioco() : string
    {
        return "UPDATE gioco
                SET  Nome = :Nome, Categoria = :Categoria, VotoMedio=:VotoMedio
                WHERE Id = :Id ;";
    }

    static function bindValues(PDOStatement &$stmt, EGioco &$gioco)
    {
        $result = var_export($stmt, true);

        if( strpos( $result, ":Id" ) !== false)
            $stmt->bindValue(':Id', $gioco->getId(), PDO::PARAM_INT);
        if( strpos( $result, ":Nome" ) !== false)
            $stmt->bindValue(':Nome', $gioco->getNome(), PDO::PARAM_STR);
        if( strpos( $result, ":Categoria" ) !== false)
            $stmt->bindValue(':Categoria', $gioco->getCategoria(), PDO::PARAM_STR);
        if( strpos( $result, ":VotoMedio" ) !== false)
            $stmt->bindValue(':VotoMedio', $gioco->getVotoMedio(), PDO::PARAM_STR);


    }
    static function createObjectFromRow($row)
    {


        $gioco = new EGioco();
        $gioco->setNome($row['Nome']);
        $gioco->setCategoria($row['Categoria']);
        $gioco->setId($row["Id"]);
        if($row['VotoMedio']!=null)
            $gioco->setVotoMedio($row['VotoMedio']);
        else
            $gioco->setVotoMedio(0);
        //if(FPersistantManager::getInstance()->exists("giocoinfo", "IdGioco",$gioco->getId()))
            //$gioco->setInfo(FPersistantManager::getInstance()->search("giocoinfo", "IdGioco",$gioco->getId())[0]);

        return $gioco;
    }
}