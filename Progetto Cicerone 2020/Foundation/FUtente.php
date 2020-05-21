<?php

/**
 * La classe FUser fornisce query per gli oggetti EUser
 * @author gruppo2
 * @package Foundation
 */
class FUtente
{

    static function searchUtenteByNome() : string
    {
        return "SELECT *
                FROM users
                WHERE LOCATE( :Nome , Nome ) > 0;";
    }


    static function bindValues(PDOStatement &$stmt, EUtente &$user)
    {
        $stmt->bindValue(':Username', $user->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':Nome', $user->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':Cognome', $user->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':EMail', $user->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':Password', $user->getPassword(), PDO::PARAM_STR);
    }

    /**
     * Crea una Entity da una row del database
     * @param array $row avente come indici i campi della table da cui e' stata prelevata l'entry
     * @return EUtente | EAdmin
     */
    static function createObjectFromRow($row)
    {

        if ( ($row['UserName']) == "Ospite" )
            return new EOspite();

        if(  ($row['Moderatore']) == true )
            $user = new EAdmin();
        else
            $user = new EUtente();

        $user->setNome($row['Nome']);
        $user->setCognome($row['Cognome']);
        $user->setPassword($row['Password']);
        $user->setEmail($row['EMail']);
        $user->setUsername($row['UserName']);

        return $user;
    }


}