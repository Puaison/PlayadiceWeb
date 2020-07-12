<?php
/*
 * La classe CAdmin implementa la funzionalità degli admin
 */

class CAdmin
{
    static function openAdminPanel()
    {
        $vAdmin=new VAdmin();
        $string= $vAdmin -> getUserFromForm();

        $utente=CSession::getUserFromSession();
            if(get_class($utente)==EAdmin::class) // se l'utente è admin
            {
                if($string == "default")
                {
                    $results=FPersistantManager::getInstance()->search('utente','All',"");
                }
                else
                {
                    $results=FPersistantManager::getInstance()->search('utente','UserNameLocate',"$string");
                }
                $vAdmin->ShowAdminPanel($utente,$results);
            }
            else
            {
                $vAdmin->showErrorPage($utente,"Devi essere Admin per accedere a questa pagina");
            }
    }

    static function Ban($Username = "")
    {
        $vAdmin=new VAdmin();
        $utente=CSession::getUserFromSession();

        if(get_class($utente)==EAdmin::class) // se l'utente è admin
        {
            if($Username)
            {
                $Banned=FPersistantManager::getInstance()->search('utente','UserName',$Username)[0];
                FPersistantManager::getInstance()->remove($Banned);
                CAdmin::openAdminPanel();
            }
            else
            {
                $vAdmin->showErrorPage($utente,"Errore, Username non esistente");
            }
        }
        else
        {
            $vAdmin->showErrorPage($utente,"Devi essere Admin per accedere a questa pagina");
        }
    }

    static function RendiAdmin($Username = "")
    {
        $vAdmin=new VAdmin();
        $utente=CSession::getUserFromSession();

        if(get_class($utente)==EAdmin::class) // se l'utente è admin
        {
            if($Username) // se ci sta il parametro
            {
                $NewAdmin = new EAdmin();
                $Promoted = FPersistantManager::getInstance()->search('utente','UserName',$Username)[0];
                $NewAdmin ->setNome($Promoted->getNome());
                $NewAdmin ->setCognome($Promoted->getCognome());
                $NewAdmin ->setUsername($Promoted->getUsername());
                $NewAdmin ->setPassword($Promoted->getPassword());
                $NewAdmin ->setEmail($Promoted->getmail());

                FPersistantManager::getInstance()->update($NewAdmin);
                CAdmin::openAdminPanel();
            }
            else
            {
                $vAdmin->showErrorPage($utente,"Errore, Username non esistente");
            }
        }
        else
        {
            $vAdmin->showErrorPage($utente,"Devi essere Admin per accedere a questa pagina");
        }
    }

    static function RevocaAdmin($Username = "")
    {
        $vAdmin=new VAdmin();
        $utente=CSession::getUserFromSession();

        if(get_class($utente)==EAdmin::class) // se l'utente è admin
        {
            if($Username != $utente->getUsername()) // se sto tentando di cancellarmi in quanto admin
            {
                if ($Username) // se ci sta il parametro
                {
                    $NewUtente = new EUtente();
                    $Revoked = FPersistantManager::getInstance()->search('utente', 'UserName', $Username)[0];
                    $NewUtente->setNome($Revoked->getNome());
                    $NewUtente->setCognome($Revoked->getCognome());
                    $NewUtente->setUsername($Revoked->getUsername());
                    $NewUtente->setPassword($Revoked->getPassword());
                    $NewUtente->setEmail($Revoked->getmail());

                    FPersistantManager::getInstance()->update($NewUtente);
                    CAdmin::openAdminPanel();
                } else {
                    $vAdmin->showErrorPage($utente, "Errore, Username non esistente");
                }
            }
            else
            {
                $vAdmin->showErrorPage($utente,"Non puoi rimuovere te stesso");
            }
        }
        else
        {
            $vAdmin->showErrorPage($utente,"Devi essere Admin per accedere a questa pagina");
        }
    }



}