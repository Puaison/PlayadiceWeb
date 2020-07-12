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
        $giochi = FPersistantManager::getInstance()->search("gioco", "BestRate" ,"");
        $vCatalogo->showCatalogo($user,$giochi);
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
            if(get_class($user) == EAdmin::class) // se l'utente non è un Admin, non puo accedere a questa funzionalità
            {
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
        $user = CSession::getUserFromSession();
        $vCatalogo = new VCatalogo();
        $newgioco = $vCatalogo->createGioco();

        if (get_class($user) == EAdmin::class) {
            if ($vCatalogo->validateNuovoGioco($newgioco)) {
                FPersistantManager::getInstance()->store($newgioco);
                $newGioco2 = FPersistantManager::getInstance()->search("gioco", "Last", "")[0];
                $newgioco->getInfo()->setId($newGioco2->getId());
                FPersistantManager::getInstance()->store($newgioco->getInfo());
                header('Location: /playadice/catalogo/catalogocompleto');
            } else
                $vCatalogo->showFormNewGioco($user, $newgioco);
        } else
            $vCatalogo->showErrorPage($user, 'Non hai i poteri per accedere a questa sezione');
    }

    /**
     * @param int $id
     */
    static function remove(int $id)
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();
        if(get_class($user) == EAdmin::class)
        {
            $giocoExists = FPersistantManager::getInstance()->exists("gioco", "Id", $id); // si verifica che l'utente inserito matchi una entry nel db
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
                if ($gioco) { //se il gioco esiste
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
            CGiocoInfo::eseguiModifica($IdGioco);
        else
            header('Location: HTTP/1.1 Invalid HTTP method detected');
    }

    /**
     *
     */
    static function eseguiModifica()
    {
        $vCatalogo=new VCatalogo();
        $user=CSession::getUserFromSession();
        if(get_class($user) == EAdmin::class) {
            $gioco = $vCatalogo->createGioco();//TODO fare i controlli per la modifica?
            if(FPersistantManager::getInstance()->exists('gioco','Id',$gioco->getId())) {
                $giocodb = FPersistantManager::getInstance()->search("gioco", "Id", $gioco->getId())[0];
                $gioco->setVotoMedio($giocodb->getVotoMedio());
                FPersistantManager::getInstance()->update($gioco);
                FPersistantManager::getInstance()->update($gioco->getInfo());
                $IdGioco = $gioco->getId();
                header("Location: /playadice/giocoinfo/showgiocoinfo?$IdGioco");
            }
            else
                $vCatalogo->showErrorPage($user, 'Non esiste il gioco che vuoi modificare');
        }
        else
            $vCatalogo->showErrorPage($user, 'Non hai i permessi per farlo');

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
    static function utenteRemoved()
    {//TODO COME VIETO L'ACCESSO A QUESTA FUNZIONE?
        $giochi=FPersistantManager::getInstance()->search("gioco","BestRate","");
        if($giochi) {//se ci sono dei giochi
            foreach ($giochi as $gioco) {
                $recensioni = FPersistantManager::getInstance()->search("recensione", "IdGioco", $gioco->getId());
                if ($recensioni)//Se c'è almeno una recensione
                {
                    $gioco->setRecensioni($recensioni);
                    $gioco->CalcolaVotoMedio();
                    FPersistantManager::getInstance()->update($gioco);
                    //$gioco->setRecensioni($recensioni);
                } else {
                    $gioco->setVotoMedio(0);
                    FPersistantManager::getInstance()->update($gioco);
                }

            }
        }
    }

}