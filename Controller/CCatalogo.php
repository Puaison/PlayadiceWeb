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

    static function remove()
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();
        if($user->getModeratore())
        {
            $giocodaeliminare = FPersistantManager::getInstance()->search("gioco", "Id" ,"")[0];
            if(isset($giocodaeliminare))
                FPersistantManager::getInstance()->remove($giocodaeliminare);
        }

        CCatalogo::catalogo();
    }
}