<?php


class FRecensione
{
    static function searchRecensioneByIdGioco() : string
    {
        return "SELECT *
                FROM recensione
                WHERE Id_Gioco=:Id_Gioco;";
    }


    static function bindValues(PDOStatement &$stmt, EGiocoInfo &$giocoInfo)
    {
        $result = var_export($stmt, true);

        if( strpos( $result, ":Creatore" ) !== false)
            $stmt->bindValue(':Creatore', $giocoInfo->getId(), PDO::PARAM_STR);
        if( strpos( $result, ":Id_Gioco" ) !== false)
            $stmt->bindValue(':Id_Gioco', $giocoInfo->getDescrizione(), PDO::PARAM_INT);
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