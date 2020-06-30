<?php

/**
 * La classe FUtente fornisce query per gli oggetti EUtente
 * @package Foundation
 */
class FUtente
{

    static function searchUtenteByNome() : string
    {
        return "SELECT *
                FROM Utente
                WHERE LOCATE( :Nome , Nome ) > 0;";
    }

    static function searchUtenteByUserName() : string
    {
        return "SELECT *
                FROM Utente
                WHERE :UserName = UserName";
    }

    static function storeUtente() : string
    {
        return "INSERT INTO utente(UserName, Nome , Cognome, Password, Email, Moderatore)
				VALUES(:Username, :Nome, :Cognome, :Password, :Email,  :Moderatore)";
    }
    /**
     * Query che effettua l'aggiornamento di un utente nella table users
     * @return string contenente la query sql
     */
    static function updateUtente() : string
    {
        return "UPDATE utente
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
        if( strpos( $result, ":Username" ) !== false)
            $stmt->bindValue(':Username', $user->getUsername(), PDO::PARAM_STR);
        if( strpos( $result, ":Nome" ) !== false)
            $stmt->bindValue(':Nome', $user->getNome(), PDO::PARAM_STR);
        if( strpos( $result, ":Cognome" ) !== false)
            $stmt->bindValue(':Cognome', $user->getCognome(), PDO::PARAM_STR);
        if( strpos( $result, ":Email" ) !== false)
            $stmt->bindValue(':Email', $user->getMail(), PDO::PARAM_STR);
        if( strpos( $result, ":Password" ) !== false)
            $stmt->bindValue(':Password', $user->getPassword(), PDO::PARAM_STR);
        if( strpos( $result, ":Moderatore" ) !== false)
            $stmt->bindValue(':Moderatore', $user->getModeratore(), PDO::PARAM_BOOL);
    }

    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EUtente | EAdmin
     */
    static function createObjectFromRow($row)
    {

        if(  ($row['Moderatore']) == true )
            $user = new EAdmin();
        else
            $user = new EUtente();

        $user->setNome($row['Nome']);
        $user->setCognome($row['Cognome']);
        $user->setPassword($row['Password']);
        $user->setEmail($row['Email']);
        $user->setUsername($row['UserName']);

        return $user;
    }


}