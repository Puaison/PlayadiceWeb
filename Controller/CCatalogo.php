<?php


/**
 * Il Controller CCatalogo implementa tutte le funzionalità del Caso D'Uso "Visualizzazione Catalogo Giochi".
 * Un EUtente,EOspite o EAdmin può visionare il catalogo, ricercare giochi e visualizzarne i dettagli,
 * ma soltanto un EAdmin può eliminare,modificare o creare un nuovo Gioco
 */
class CCatalogo
{
    /**
     * Metodo che gestisce la funzionalità di esposizione dell'intero catalogo di Giochi
     * (che verranno presentati in ordine decrescente secondo il VotoMedio registrato)
     */
    static function catalogoCompleto()
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();
        $giochi = FPersistantManager::getInstance()->search("gioco", "BestRate" ,"");
        $vCatalogo->showCatalogo($user,$giochi);
    }

    /**
     * Metodo che gestisce la funzionalità di inserimento di un nuovo gioco. Se richiamato tramite GET, fornisce
     * la form(previa verifica che l'utente richiedente sia del tipo EAdmin), se richiamato tramite POST viene richiamata
     * la funzione insertNewGioco responsabile
     */
    static function newGioco()
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
            CCatalogo::insertNewGioco();
        else
            header('Location: HTTP/1.1 Invalid HTTP method detected');
    }

    /**
     * Metodo che prende i dati passati via POST per la creazione di un nuovo Gioco
     * e li salva nel DB. Controlla se l'utente che sta effettuando la richiesta sia un
     * EAdmin e che tutti i campi siano stati inviati(e inseriti) correttamente;
     * Altrimenti notifica l'Utente del problema
     */
    static function insertNewGioco()
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
     * Metodo che esegue la cancellazione dal catalogo(e quindi anche dal DB)
     * di un gioco. Si controlla che l'utente che ha richiesto la cancellazione sia un EAdmin,
     * altrimenti si invia un messaggio d'errore; inoltre si verifica che il gioco che si vuole
     * cancellare effettivamente esista, altrimenti si notifica l'utente che il gioco che vuole
     * cancellare non esiste
     * @param int $id l'identificativo del gioco, specificato nell'URL
     */
    static function removeGioco(int $id)
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
     * Metodo che gestisce la funzionalità di modifica di un gioco. Se richiamato tramite GET, fornisce
     * la form per la modifica (previa verifica che l'utente richiedente sia del tipo EAdmin) e che
     * il gioco da modificare effettivamente esista(altrimenti vengono inviati messaggi di errore);
     * se richiamato tramite POST viene passato il comando alla funzione eseguiModificaGioco responsabile
     * di controllare e eseguire il cambiamento
     */
    static function modificaGioco($IdGioco)
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
                    $vCatalogo -> showErrorPage($user, "Il Gioco che vuoi modificare non esiste");

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
     * Metodo che prende i dati passati via POST per la modifica del gioco,esegue la modifica
     * e controlla se l'utente che sta effettuando la richiesta sia un
     * EAdmin, che ilgioco esista e che tutti i campi siano stati inviati(e inseriti) correttamente;
     * Altrimenti notifica l'Utente del problema
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
     * Questo metodo gestisce la funzionalità di ricerca dei giochi;
     * è possibile ricercare i giochi per Nome e Categoria
     */
    static function search()
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();

        list($string,$key)=$vCatalogo->getStringAndKey();
        if(strlen($string)==0)
        {
            $objects = FPersistantManager::getInstance()->search("gioco", "AlphabeticOrder" ,"");
        }
        else
            $objects = FPersistantManager::getInstance()->search("gioco", $key , $string);
        $vCatalogo->showCatalogo($user,$objects);
    }

    /**
     * Funzione che deve essere richiamata ogni volta che un oggetto EUtente viene eliminato dal DB.
     * Permette il ricalcolo del voto medio di ogni Gioco, poichè quando l'utente viene cancellato,
     * anche le sue recensioni vengono eliminate senza che il Voto Medio venga aggiornato.
     *
     */
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