<?php

/**
 * La classe FUtente fornisce query per gli oggetti EUtente
 * @package Foundation
 */
class FUtente
{
    /**
     * Query che restituisce tutti gli utenti nella table "utente"
     * @return string contenente la query SQL
     */
    static function searchUtenteByAll() : string
    {
        return "SELECT *
                FROM Utente;";
    }

    /**
     * Query che restituisce tutti gli utenti nella table "utente"
     * @return string contenente la query SQL
     */
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

    static function searchUtenteByUserNameLocate() : string
    {
        return "SELECT *
                FROM Utente
                WHERE LOCATE( :UserNameLocate , UserName ) > 0;";
    }

    /**
     * Query che effettua il salvataggio di un utente nella table "utente" del DB
     * @return string contenente la query SQL
     */
    static function storeUtente() : string
    {
        return "INSERT INTO utente(UserName, Nome , Cognome, Password, Email, Moderatore)
				VALUES(:Username, :Nome, :Cognome, :Password, :Email,  :Moderatore)";
    }
    /**
     * Query che effettua l'aggiornamento di un utente nella table utente
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
     * @return string contente la query sql
     */
    static function removeUtente() : string
    {
        return "DELETE 
                FROM utente
                WHERE UserName = :Username;"; //query sql

    }


    /**
     * Metodo che, partendo da un oggetto EUtente,associa i suoi
     * attributi ai campi di una query sql per la table "utente"
     * @param PDOStatement $stmt lo statement(query) contenente i campi da riempire
     * @param EUtente $user L'oggetto da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, EUtente $user)
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
     * Metodo che partendo da ciò che è stato recuperato
     * dal database, crea un Oggetto EUtente/EAdmin
     * @param array $row contenente le informazioni recuperate dal DB
     * attraverso una relazione chiave(il nome dei campi all'interno del db) - valore
     * @return EUtente|EAdmin
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