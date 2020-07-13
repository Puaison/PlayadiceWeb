<?php


/**
 * La classe FGiocoInfo fornisce query per gli oggetti EGiocoInfo
 */
class FGiocoInfo
{

    /**
     * Query che effettua il salvataggio di un
     * giocoinfo nella table "giocoinfo" del DB
     * @return string contenente la query SQL
     */
    static function storeGiocoInfo() : string
    {
        return "INSERT INTO giocoinfo(IdGioco,Descrizione,NumeroMin,NumeroMax,CasaEditrice)
				VALUES( :IdGioco, :Descrizione, :NumeroMin, :NumeroMax, :CasaEditrice);";
    }

    /**
     * Query che permette di recuperare un giocoinfo
     * partendo dall'Id del gioco a cui è associato
     * @return string contenente la query SQL
     */
    static function searchGiocoInfoByIdGioco() : string
    {
        return "SELECT *
                FROM giocoinfo
                WHERE IdGioco=:IdGioco;";
    }

    /**
     * Query che permette di aggiornare un giocoinfo
     * nella table "giocoinfo"
     * @return string contenente la query SQL
     */
    static function updateGiocoInfo() : string
    {
        return "UPDATE giocoinfo
                SET  Descrizione = :Descrizione, NumeroMin = :NumeroMin, NumeroMax=:NumeroMax,CasaEditrice=:CasaEditrice
                WHERE IdGioco = :IdGioco ;";
    }


    /**
     * Metodo che, partendo da un oggetto EGiocoInfo,associa i suoi
     * attributi ai campi di una query sql per la table "giocoinfo"
     * @param PDOStatement $stmt lo statement(query) contenente i campi da riempire
     * @param EGiocoInfo $giocoInfo L'oggetto da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, EGiocoInfo $giocoInfo)
    {
        $result = var_export($stmt, true);

        if( strpos( $result, ":IdGioco" ) !== false)
            $stmt->bindValue(':IdGioco', $giocoInfo->getId(), PDO::PARAM_INT);
        if( strpos( $result, ":Descrizione" ) !== false)
            $stmt->bindValue(':Descrizione', $giocoInfo->getDescrizione(), PDO::PARAM_STR);
        if( strpos( $result, ":NumeroMin" ) !== false)
            $stmt->bindValue(':NumeroMin', $giocoInfo->getMin(), PDO::PARAM_INT);
        if( strpos( $result, ":NumeroMax" ) !== false)
            $stmt->bindValue(':NumeroMax', $giocoInfo->getMax(), PDO::PARAM_INT);
        if( strpos( $result, ":CasaEditrice" ) !== false)
            $stmt->bindValue(':CasaEditrice', $giocoInfo->getCasaEditrice(), PDO::PARAM_STR);


    }

    /**
     * Metodo che partendo da ciò che è stato recuperato
     * dal database, crea un Oggetto EGiocoInfo
     * @param array $row contenente le informazioni recuperate dal DB
     * attraverso una relazione chiave(il nome dei campi all'interno del db) - valore
     * @return EGiocoInfo
     */
    static function createObjectFromRow($row)
    {


        $giocoinfo = new EGiocoInfo();
        $giocoinfo->setId($row['IdGioco']);
        $giocoinfo->setDescrizione($row['Descrizione']);
        $giocoinfo->setMin($row['NumeroMin']);
        $giocoinfo->setMax($row['NumeroMax']);
        $giocoinfo->setCasaEditrice($row['CasaEditrice']);


        return $giocoinfo;
    }
}