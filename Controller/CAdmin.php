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
        $utente=FPersistantManager::getInstance()->search('utente','UserName',$utente->getUsername())[0];
        if(get_class($utente)==EAdmin::class) // se l'utente è admin
        {
            if($Username)
            {
                $Banned=FPersistantManager::getInstance()->search('utente','UserName',$Username)[0];
                FPersistantManager::getInstance()->remove($Banned);
            }
            CAdmin::openAdminPanel();
        }
        else
        {
            $vAdmin->showErrorPage($utente,"Devi essere Admin per accedere a questa pagina");
        }
    }

    static function removeUtente()
    {
        $user=CSession::getUserFromSession();
        CSession::destroySession();
        FPersistantManager::getInstance()->remove($user);
        header('Location: /playadice/index');
    }

}