<?php


class FRecensione
{
    
    static function searchRecensioneByIdGioco() : string
    {
        return "SELECT *
                FROM recensione
                WHERE IdGioco=:IdGioco;";
    }


    static function bindValues(PDOStatement &$stmt, EGiocoInfo &$giocoInfo)
    {
        $result = var_export($stmt, true);

        if( strpos( $result, ":Creatore" ) !== false)
            $stmt->bindValue(':Creatore', $giocoInfo->getId(), PDO::PARAM_STR);
        if( strpos( $result, ":IdGioco" ) !== false)
            $stmt->bindValue(':IdGioco', $giocoInfo->getDescrizione(), PDO::PARAM_INT);
        if( strpos( $result, ":Voto" ) !== false)
            $stmt->bindValue(':Voto', $giocoInfo->getMin(), PDO::PARAM_STR);
        if( strpos( $result, ":Commento" ) !== false)
            $stmt->bindValue(':Commento', $giocoInfo->getMax(), PDO::PARAM_STR);

    }

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
        return $recensione;
    }
}