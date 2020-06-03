<?php


class FGiocoInfo
{

    static function storeGiocoInfo() : string
    {
        return "INSERT INTO giocoinfo(Id,Descrizione,NumeroMin,NumeroMax,CasaEditrice)
				VALUES( :IdGioco, :Descrizione, :NumeroMin, :NumeroMax, :CasaEditrice);";
    }



    static function bindValues(PDOStatement &$stmt, EGiocoInfo &$giocoInfo)
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
    static function createObjectFromRow($row)
    {


        $gioco = new EGiocoInfo();


        return $gioco;
    }
}