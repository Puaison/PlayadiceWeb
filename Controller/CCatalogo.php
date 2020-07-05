<?php


class CCatalogo
{
    static function catalogocompleto()
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();
        $objects = FPersistantManager::getInstance()->search("gioco", "BestRate" ,"");
        $vCatalogo->showCatalogo($user,$objects);
    }

    /**
     * Metodo che implementa il caso d'uso di inserimento di un nuovo gioco. Se richiamato tramite GET, fornisce
     * la form, se richiamato tramite POST si verifica che le informazioni inserite siano giuste e lo si
     * salva nel catalogo
     */
    static function newgioco()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
        { //...carica la pagina per l'inserimento di un nuovo gioco(verificando che sia un admin)
            $vCatalogo = new VCatalogo();
            $user = CSession::getUserFromSession();
            if($user->getModeratore()) // se l'utente non è un Admin, non puo accedere a questa funzionalità
            {
                //Da cancellare
                $gioco=new EGioco();
                $gioco->setNome("agagaga");
                $vCatalogo->showFormNewGioco($user,$gioco);
            }
            else
                $vCatalogo->showErrorPage($user, 'Non hai i permessi per accedere a questa sezione!');
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CCatalogo::insertnewgioco();
        else
            header('Location: HTTP/1.1 Invalid HTTP method detected');
    }

    private function insertnewgioco()
    {
        $user=CSession::getUserFromSession();
        $vCatalogo = new VCatalogo();
        $newgioco = $vCatalogo->createGioco();

        if($vCatalogo->validateNuovoGioco($newgioco))
        {
            FPersistantManager::getInstance()->store($newgioco);
            $newGioco2=FPersistantManager::getInstance()->search("gioco","Last","")[0];
            $newgioco->getInfo()->setId($newGioco2->getId());
            FPersistantManager::getInstance()->store($newgioco->getInfo());
            header('Location: /playadice/catalogo/catalogocompleto');
        }
        else
            $vCatalogo->showFormNewGioco($user,$newgioco);
    }

    static function remove(int $id)
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();
        if($user->getModeratore())
        {
            $giocoExists = FPersistantManager::getInstance()->exists("gioco", "Id", $id); // si verifica che l'utente inserito matchi una entry nel db

            //$gioco=new EGioco();
            //$gioco->setId($id);
            if($giocoExists)
            {
                $gioco = FPersistantManager::getInstance()->search("gioco", "Id" ,"$id")[0];
                FPersistantManager::getInstance()->remove($gioco);
                header('Location: /playadice/catalogo/catalogocompleto');
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