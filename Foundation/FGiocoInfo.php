<?php


class FGiocoInfo
{

    static function storeGiocoInfo() : string
    {
        return "INSERT INTO giocoinfo(IdGioco,Descrizione,NumeroMin,NumeroMax,CasaEditrice)
				VALUES( :IdGioco, :Descrizione, :NumeroMin, :NumeroMax, :CasaEditrice);";
    }
    static function searchGiocoInfoByIdGioco() : string
    {
        return "SELECT *
                FROM giocoinfo
                WHERE IdGioco=:IdGioco;";
    }
    static function updateGiocoInfo() : string
    {
        return "UPDATE giocoinfo
                SET  Descrizione = :Descrizione, NumeroMin = :NumeroMin, NumeroMax=:NumeroMax,CasaEditrice=:CasaEditrice
                WHERE IdGioco = :IdGioco ;";
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


        $giocoinfo = new EGiocoInfo();
        $giocoinfo->setId($row['IdGioco']);
        $giocoinfo->setDescrizione($row['Descrizione']);
        $giocoinfo->setMin($row['NumeroMin']);
        $giocoinfo->setMax($row['NumeroMax']);
        $giocoinfo->setCasaEditrice($row['CasaEditrice']);


        return $giocoinfo;
    }
}