<?php


/**
 * Class CCatalogo
 */
class CCatalogo
{
    /**
     *
     */
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
                //$gioco=new EGioco();
                //$gioco->setNome("agagaga");
                $vCatalogo->showFormNewGioco($user);
            }
            else
                $vCatalogo->showErrorPage($user, 'Non hai i permessi per accedere a questa sezione!');
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CCatalogo::insertnewgioco();
        else
            header('Location: HTTP/1.1 Invalid HTTP method detected');
    }

    /**
     *
     */
    static function insertnewgioco()
    {
        $user=CSession::getUserFromSession();
        $vCatalogo = new VCatalogo();
        $newgioco = $vCatalogo->createGioco();

        // TODO  SERVE CONTROLLARE queSTO? if($user->getModeratore())
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

    /**
     * @param int $id
     */
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
                $gioco = FPersistantManager::getInstance()->search("gioco", "Id" ,$id)[0];
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

    /**
     * @param $IdGioco
     */
    static function modificagioco($IdGioco)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
        {
            $vCatalogo = new VCatalogo();
            $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
            $gioco = FPersistantManager ::getInstance() -> search("gioco", "Id", $IdGioco)[0];
            if (get_class($user) == EAdmin::class) {
                if ($gioco) {
                    $gioco->setInfo(FPersistantManager::getInstance()->search("giocoinfo", "IdGioco" ,$gioco->getId())[0]);
                    $vCatalogo->showFormModificaGioco($user, $gioco);
                }
                else // se il gioco cercato non esiste, si viene reindirizzati ad una pagina di errore
                    $vCatalogo -> showErrorPage($user, "Il Gioco che stai cercando non esiste");

            }
            else // se l'utente non è un admin
                $vCatalogo -> showErrorPage($user, 'Non hai i poteri per accedere a questa sezione');
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CGiocoInfo::eseguimodifica($IdGioco);
        else
            header('Location: HTTP/1.1 Invalid HTTP method detected');
    }

    /**
     *
     */
    static function eseguimodifica()
    {
        $vCatalogo=new VCatalogo();
        $gioco=$vCatalogo->createGioco();
        $giocodb= FPersistantManager::getInstance()->search("gioco", "Id" ,$gioco->getId())[0];
        $gioco->setVotoMedio($giocodb->getVotoMedio());
        FPersistantManager::getInstance()->update($gioco);
        FPersistantManager::getInstance()->update($gioco->getInfo());
        $IdGioco=$gioco->getId();
        header("Location: /playadice/giocoinfo/showgiocoinfo?$IdGioco");

    }

    /**
     * Un utente puo' ricercare avatar in base al nome o all'username del proprietario.
     * Questa ricerca e' possibile
     * solo per gli utenti che sono registrati.
     */
    static function search()
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();

            list($string,$key)=$vCatalogo->getStringAndKey();
            if(strlen($string)==0)
            {
                $objects = FPersistantManager::getInstance()->search("gioco", "BestRate" ,"");
            }
            else
                $objects = FPersistantManager::getInstance()->search("gioco", $key , $string);
            $vCatalogo->showCatalogo($user,$objects);


    }

}