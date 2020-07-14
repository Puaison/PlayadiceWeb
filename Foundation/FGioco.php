<?php

/**
 * La classe FGioco fornisce query per gli oggetti EGioco
 */

class FGioco
{

    /**
     * Query che effettua il salvataggio di un gioco nella table "gioco" del DB
     * @return string contenente la query SQL
     */
    static function storeGioco() : string
    {
        return "INSERT INTO gioco(Nome, Categoria)
				VALUES(:Nome, :Categoria);";
    }

    /**
     * Query che permette la ricerca(per corrispondenza)
     * di giochi usando come chiave di ricerca il Nome
     * @return string contenente la query SQL
     */
    static function searchGiocoByNome() : string
    {
        return "SELECT *
                FROM gioco
                WHERE LOCATE( :Nome , Nome ) > 0
                ORDER BY VotoMedio DESC;";
    }

    /**
     * Query che permette la ricerca di un gioco usando il suo Id
     * @return string contenente la query SQL
     */
    static function searchGiocoById() : string
    {
        return "SELECT *
                FROM gioco
                WHERE LOCATE( :Id , Id ) > 0;";
    }

    /**
     * Query che permette di ricercare giochi a
     * partire dalla Categoria
     * @return string contenente la query SQL
     */
    static function searchGiocoByCategoria() : string
    {
        return "SELECT *
                FROM gioco
                WHERE LOCATE( :Categoria , Categoria ) > 0;";
    }

    /**
     * Query che permette di avere il gioco inserito per ultimo nel DB
     * @return string contenente la query SQL
     */
    static function searchGiocoByLast() : string
    {
        return "SELECT *
                FROM gioco
                ORDER BY Id DESC limit 1;";
    }

    /**
     * Query che permette di ottenere tutti i giochi ordinati
     * decrescentemente per voto medio
     * @return string contenente la query SQL
     */
    static function searchGiocoByBestRate() : string
    {
        return "SELECT *
                FROM gioco
                ORDER BY VotoMedio DESC;";
    }

    /**
     * Query che restituisce i 5 Giochi con
     * il voto più alto(sempre in ordine decrescente)
     * @return string contenente la query SQL
     */
    static function searchGiocoByBestFive() : string
    {
        return "SELECT *
                FROM gioco
                ORDER BY VotoMedio DESC limit 5;";
    }

    /**
     * Query che restituisce tutti i giochi ordinati alfabeticamente
     * @return string contenente la query SQL
     */
    static function searchGiocoByAlphabeticOrder() : string
    {
        return "SELECT *
                FROM gioco
                ORDER BY Nome;";
    }

    /**
     * Query che rimuove un gioco(identificato dal suo id)
     * dalla table "gioco"
     * @return string contenente la query SQL
     */
    static function removeGioco() : string
    {
        return "DELETE 
                FROM gioco
                WHERE Id = :Id;";

    }

    /**
     * Query che effettua l'aggiornamento di un gioco nella table "gioco"
     * @return string contenente la query SQL
     */
    static function updateGioco() : string
    {
        return "UPDATE gioco
                SET  Nome = :Nome, Categoria = :Categoria, VotoMedio=:VotoMedio
                WHERE Id = :Id ;";
    }

    /**
     * Metodo che, partendo da un oggetto EGioco,associa i suoi
     * attributi ai campi di una query sql per la table "gioco"
     * @param PDOStatement $stmt lo statement(query) contenente i campi da riempire
     * @param EGioco $gioco L'oggetto da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, EGioco $gioco)
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

    /**
     * Metodo che partendo da ciò che è stato recuperato
     * dal database, crea un Oggetto EGioco
     * @param array $row contenente le informazioni recuperate dal DB
     * attraverso una relazione chiave(il nome dei campi all'interno del db) - valore
     * @return EGioco
     */
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

        return $gioco;
    }
}