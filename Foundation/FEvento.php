
<?php

/**
 * La classe FEvento fornisce query per gli oggetti EEvento
 * @author Del Signore-Perozzi-Marottoli
 * @package Foundation
 */
class FEvento
{
    static function searchEventoByAll() : string
    {
        return "SELECT *
                FROM evento";

    }

    static function searchEventoById() : string
    {
        return "SELECT *
                FROM evento
                WHERE LOCATE( :Id, Id ) > 0;";
    }
    static function searchEventoByNome() : string
    {
        return "SELECT *
                FROM evento
                WHERE LOCATE( :Nome, Nome ) > 0;";
    }
    static function searchEventoByCategoria() : string
    {
        return "SELECT *
                FROM evento
                WHERE LOCATE( :Categoria, Categoria ) > 0;";
    }

    static function storeEvento() : string
    {

        return "INSERT INTO evento(Id, Nome, Flag, IdLuogo, Categoria, Testo)
				VALUES(:Id, :Nome, :Flag, :IdLuogo, :Categoria, :Testo)";
    }
    /**
     * Query che effettua l'aggiornamento di un utente nella table users
     * @return string contenente la query sql
     */
    static function updateEvento() : string
    {
        return "UPDATE evento
                SET  Nome = :Nome, Flag = :Flag, IdLuogo = :IdLuogo, Categoria = :Categoria, Testo = :Testo
                WHERE Id = :Id ;";
    }
    /**
     * Elimina un utente dal db .
     *
     */
    static function removeEvento() : string
    {
        return "DELETE 
                FROM evento
                WHERE Id = :Id;"; //query sql

    }


    static function bindValues(PDOStatement &$stmt, EEvento &$evento)
    {
        $result = var_export($stmt, true);
        if( strpos( $result, ":Id" ) !== false)
            $stmt->bindValue(':Id', $evento->getId(), PDO::PARAM_INT);
        if( strpos( $result, ":Nome" ) !== false)
            $stmt->bindValue(':Nome', $evento->getNome(), PDO::PARAM_STR);
        if( strpos( $result, ":Flag" ) !== false)
            $stmt->bindValue(':Flag', $evento->getFlag(), PDO::PARAM_INT);
        if( strpos( $result, ":IdLuogo" ) !== false)
            $stmt->bindValue(':IdLuogo', $evento->getLuogo()->getId(), PDO::PARAM_STR);
        if( strpos( $result, ":Categoria" ) !== false)
            $stmt->bindValue(':Categoria', $evento->getCategoria(), PDO::PARAM_STR);
        if( strpos( $result, ":Testo" ) !== false)
            $stmt->bindValue(':Testo', $evento->getTesto(), PDO::PARAM_STR);
    }

    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EEvento
     */
    static function createObjectFromRow($row)
    {
        $evento= new EEvento();
        $evento->setId($row['Id']);
        $evento->setNome($row['Nome']);
        $evento->setFlag($row['Flag']);
        $evento->setLuogo(FPersistantManager::getInstance()->search("Luogo","Id",($row['IdLuogo']))[0]);
        $evento->setCategoria($row['Categoria']);
        $evento->setTesto(($row['Testo']));
        $fasce=FPersistantManager::getInstance()->search("Fascia","IdEvento",($row['Id']));
        if (!empty($fasce))
        {
         foreach($fasce as $value){
            $evento->newFascia($value);
        }
        }

        if ($evento->getFlag()!==0){
            $prenotazioni= FPersistantManager::getInstance()->search("prenotazione","IdEvento",($row['Id']));
            if (!empty($prenotazioni)){
                foreach ($prenotazioni as $value){
                    $evento->newPrenotazione($value);
            }
            }
        }
        return $evento;
    }


}