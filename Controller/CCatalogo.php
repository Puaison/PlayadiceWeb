<?php


/**
 * Il Controller CCatalogo implementa tutte le funzionalità del Caso D'Uso "Visualizza il Catalogo Di Giochi".
 * Un EUtente,EOspite o EAdmin può visionare il catalogo, ricercare giochi e visualizzarne i dettagli,
 * ma soltanto un EAdmin può eliminare,modificare o creare un nuovo Gioco
 */
class CCatalogo
{
    /**
     * Metodo che gestisce la funzionalità di esposizione dell'intero catalogo di Giochi
     * (che verranno presentati in ordine decrescente di VotoMedio)
     */
    static function catalogoCompleto()
    {
        $vCatalogo = new VCatalogo();
        $user = CSession::getUserFromSession();
        $giochi = FPersistantManager::getInstance()->search("gioco", "BestRate" ,"");
        $vCatalogo->showCatalogo($user,$giochi);
    }

    /**
     * Metodo che implementa la funzionalità di inserimento di un nuovo gioco. Se richiamato tramite GET, fornisce
     * la form(previa verifica che l'utente richiedente sia un EAdmin), se richiamato tramite POST viene lasciato il comando
     * alla funzione insertNewGioco, responsabile di verificare la validità dei dati e di salvare il nuovo gioco nel DB
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
            header('Location: /playadice/catalogo/catalogocompleto');
    }

    /**
     * Metodo che prende i dati passati via POST per la creazione di un nuovo Gioco.
     * Controlla se l'utente che sta effettuando la richiesta sia un
     * EAdmin e che tutti i campi siano stati inviati(e inseriti) correttamente, notificando l'utente di eventuali errori.
     * Se tutti i vincoli sono stati rispettati, salva il Gioco nel DB
     */
    static function insertNewGioco()
    {
        $user = CSession::getUserFromSession();
        $vCatalogo = new VCatalogo();
        $newgioco = $vCatalogo->createGioco();

        if (get_class($user) == EAdmin::class) {
            if ($vCatalogo->validateGioco($newgioco)) {
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
     * Metodo che implementa la funzionalità di cancellazione dal catalogo(e quindi anche dal DB)
     * di un gioco. Si controlla che l'utente richiedente sia un EAdmin,
     * altrimenti si invia un messaggio d'errore; inoltre si verifica che il gioco che si vuole
     * cancellare esista effettivamente, altrimenti si notifica l'utente che il gioco non esiste
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
     * Metodo che implementa la funzionalità di modifica di un gioco. Se richiamato tramite GET, fornisce
     * la form per la modifica (previa verifica che l'utente richiedente sia un EAdmin) e che
     * il gioco da modificare esista effettivamente (altrimenti vengono inviati messaggi di errore);
     * se richiamato tramite POST viene passato il comando alla funzione eseguiModificaGioco responsabile
     * di controllare e eseguire il cambiamento aggiornando il DB
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
            header('Location: /playadice/catalogo/catalogocompleto');
    }

    /**
     * Metodo che prende i dati passati via POST per la modifica del gioco; controlla se l'utente che sta effettuando
     * la richiesta sia un EAdmin, che il gioco esista e che tutti i campi siano stati inviati(e inseriti) correttamente;
     * Dopodichè aggiorna il DB
     */
    static function eseguiModifica()
    {
        $vCatalogo=new VCatalogo();
        $user=CSession::getUserFromSession();
        if(get_class($user) == EAdmin::class) {
            $gioco = $vCatalogo->createGioco();
            if (FPersistantManager::getInstance()->exists('gioco', 'Id', $gioco->getId())) {
                if($vCatalogo->validateGioco($gioco)) {
                    $giocodb = FPersistantManager::getInstance()->search("gioco", "Id", $gioco->getId())[0];
                    $gioco->setVotoMedio($giocodb->getVotoMedio());
                    FPersistantManager::getInstance()->update($gioco);
                    FPersistantManager::getInstance()->update($gioco->getInfo());
                    $IdGioco = $gioco->getId();
                    header("Location: /playadice/giocoinfo/showgiocoinfo?$IdGioco");
                } else
                        $vCatalogo->showFormModificaGioco($user,$gioco);
            }
            else
                $vCatalogo->showErrorPage($user, 'Non esiste il gioco che vuoi modificare');
        }
        else
            $vCatalogo->showErrorPage($user, 'Non hai i permessi per farlo');

    }

    /**
     * Questo metodo implementa la funzionalità di ricerca dei giochi;
     * è possibile ricercare i giochi per Nome e Categoria
     */
    static function searchGioco()
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
     * anche le sue recensioni vengono eliminate senza che il Voto Medio venga aggiornato automaticamente.
     */
    static function utenteRemoved()
    {
        $giochi=FPersistantManager::getInstance()->search("gioco","BestRate","");
        if($giochi) {//se ci sono dei giochi
            foreach ($giochi as $gioco) {
                $recensioni = FPersistantManager::getInstance()->search("recensione", "IdGioco", $gioco->getId());
                if ($recensioni)//Se c'è almeno una recensione
                {
                    $gioco->setRecensioni($recensioni);
                    $gioco->CalcolaVotoMedio();
                    FPersistantManager::getInstance()->update($gioco);
                } else {
                    $gioco->setVotoMedio(0);
                    FPersistantManager::getInstance()->update($gioco);
                }
            }
        }
    }

}