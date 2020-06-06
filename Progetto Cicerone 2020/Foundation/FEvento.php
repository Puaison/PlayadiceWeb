
<?php

/**
 * La classe FUtente fornisce query per gli oggetti EEvento
 * @author Del Signore-Perozzi-Marottoli
 * @package Foundation
 */
class FEvento
{

    static function searchEventoById() : string
    {
        return "SELECT *
                FROM evento
                WHERE LOCATE( :id , id ) > 0;";
    }

    static function storeEvento() : string
    {
        return "INSERT INTO evento(Id, Nome, Flag, IdLuogo, Categoria)
				VALUES(:Id, :Nome, :Flag, :IdLuogo, :Categoria)";
    }
    /**
     * Query che effettua l'aggiornamento di un utente nella table users
     * @return string contenente la query sql
     */
    static function updateUtente() : string
    {
        return "UPDATE evento
                SET  Nome = :Nome, Cognome = :Cognome, Password = :Password, Email = :Email, Moderatore = :Moderatore
                WHERE UserName = :Username ;";
    }
    /**
     * Elimina un utente dal db .
     *
     */
    static function removeUtente() : string
    {
        return "DELETE 
                FROM utente
                WHERE UserName = :Username;"; //query sql

    }


    static function bindValues(PDOStatement &$stmt, EUtente &$user)
    {
        $result = var_export($stmt, true);
        if( strpos( $result, ":Id" ) !== false)
            $stmt->bindValue(':Id', $user->getUsername(), PDO::PARAM_INT);
        if( strpos( $result, ":Nome" ) !== false)
            $stmt->bindValue(':Nome', $user->getNome(), PDO::PARAM_STR);
        if( strpos( $result, ":Flag" ) !== false)
            $stmt->bindValue(':Flag', $user->getCognome(), PDO::PARAM_BOOL);
        if( strpos( $result, ":Id_Luogo" ) !== false)
            $stmt->bindValue(':Id_Luogo', $user->getMail(), PDO::PARAM_STR);
        if( strpos( $result, ":Categoria" ) !== false)
            $stmt->bindValue(':Categoria', $user->getModeratore(), PDO::PARAM_STR);
    }

    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EEvento
     */
    static function createObjectFromRow($row)
    {
        $evento= new EEvento();


        if(  ($row['Moderatore']) == true )
            $evento = new EAdmin();
        else
            $evento = new EUtente();

        $evento->setId($row['Id']);
        $evento->setNome($row['Nome']);
        $evento->setFlag($row['Flag']);
        $evento->setId($row['Id_Luogo']);
        $evento->setCategoria($row['Categoria']);

        return $evento;
    }


}