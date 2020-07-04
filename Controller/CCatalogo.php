<?php


class CCatalogo
{
    static function catalogo()
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();
        $objects = FPersistantManager::getInstance()->search("gioco", "BestRate" ,"");
        $vCatalogo->showCatalogo($user,$objects);
    }

    static function remove(int $id)
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();
        if($user->getModeratore())
        {
            $gioco=new EGioco();
            $gioco->setId($id);
            if($gioco->validateEsistenza())
            {
                $gioco = FPersistantManager::getInstance()->search("gioco", "Id" ,"$id")[0];
                FPersistantManager::getInstance()->remove($gioco);
                header('Location: /playadice/index/catalogo');
            }
            else
                $vCatalogo->showErrorPage($user,'Il gioco che vuoi eliminare non esiste');
        }
        else
        {
            $vCatalogo->showErrorPage($user, 'Non hai diritti per esguire questo comando');
        }
    }
}