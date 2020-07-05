<?php

/**
 * La classe FUser fornisce query per gli oggetti EUser
 * @author gruppo2
 * @package Foundation
 */
class FProposta
{

    static function searchPropostaByAll() : string
    {
        return "SELECT *
                FROM proposta
                ORDER BY Tipo";
    }

    static function searchPropostaById() : string
    {
        return "SELECT *
                FROM proposta
                WHERE Id = :Id ;";
    }

    static function searchPropostaByIDModificato() : string
    {
        return "SELECT *
                FROM proposta
                WHERE IDModificato = :IDModificato;";
    }

    static function searchPropostaByIDProposto() : string
    {
        return "SELECT *
                FROM proposta
                WHERE IDProposto = :IDProposto;";
    }

    static function storeProposta() : string
    {
        return "INSERT INTO proposta(Tipo, Id , IDModificato,IDProposto)
				VALUES(:Tipo, :Id , :IDModificato, :IDProposto)";
    }


    static function updateProposta() : string
    {
        return "UPDATE proposta
                SET  Tipo = :Tipo, Id = :Id, IDModificato = :IDModificato, IDProposto = :IDProposto
                WHERE Id = :Id ;";
    }


    static function removeProposta() : string
    {
        return "DELETE 
                FROM proposta
                WHERE Id = :Id;"; //query sql

    }


    static function bindValues(PDOStatement &$stmt, EProposta &$Proposta)
    {
        $result = var_export($stmt, true);
        if( strpos( $result, ":Tipo" ) !== false)
            $stmt->bindValue(':Tipo', $Proposta->getTipoProposta(), PDO::PARAM_STR);

        if( strpos( $result, ":Id" ) !== false)
            $stmt->bindValue(':Id', $Proposta->getId(), PDO::PARAM_STR);

        if( strpos( $result, ":IDModificato" ) !== false)
            if ($Proposta->getModificato() != null)
                $stmt->bindValue(':IDModificato', $Proposta->getModificato()->getId(), PDO::PARAM_STR);
            else
                $stmt->bindValue(':IDModificato', null, PDO::PARAM_STR);

        if( strpos( $result, ":IDProposto" ) !== false)
            if ($Proposta->getProposto() != null)
                $stmt->bindValue(':IDProposto', $Proposta->getProposto()->getId(), PDO::PARAM_STR);
            else
                $stmt->bindValue(':IDProposto', null, PDO::PARAM_STR);

    }

    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EProposta
     */
    static function createObjectFromRow($row)
    {
        $Proposta = new EProposta();

        $Proposta->setId($row['Id']);
        $Proposta->setTipoProposta($row['Tipo']);

        if ( ($row['IDModificato']) != null )
        {
            $Pippo = FPersistantManager::getInstance()->search("Avatar","IdAvatar",($row['IDModificato']));
            $Proposta->setModificato($Pippo[0]);
        }

        if ( ($row['IDProposto']) != null )
        {
            $Pippo = FPersistantManager::getInstance()->search("Avatar","IdAvatar",($row['IDProposto']));
            $Proposta->setProposto($Pippo[0]);
        }

        return $Proposta;
    }


}