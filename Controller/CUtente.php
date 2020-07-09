<?php
/**
 * La classe CUser implementa la funzionalità 'Gestione Utenti'. I vari metodi permettono
 * la creazione, autenticazione e visualizzazione di un profilo di un utente.
 */

class CUtente
{
    /**
     * Metodo che implementa il caso d'uso di login. Se richiamato tramite GET, fornisce
     * la pagina di login, se richiamato tramite POST cerca di autenticare l'utente attraverso
     * i valori che quest'ultimo ha fornito
     */
    static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
        { //...carica la pagina del login, se l'utente e' effettivamente un guest
            $vUtente = new VUtente();
            $utente = CSession::getUserFromSession();
            if(get_class($utente)!=EOspite::class) // se l'utente non è ospite, non puo accedere al login
            {
                $vUtente->showErrorPage($utente, 'Why are you doing this? Yuo\'re already logged!');
            }
            else
                $vUtente->showLogin();
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CUtente::authentication();
        else
            header('Location: HTTP/1.1 Invalid HTTP method detected');
    }

    /**
     * Metodo che implementa il caso d'uso di registrazione. Se richiamato a seguito di una richiesta
     * GET da parte del client, mostra la form di compilazione; altrimenti se richiamato tramite POST
     * riceve i dati forniti dall'utente e procede con la creazione di un nuovo utente.
     */
    static function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') //se il metodo http utilizzato e' GET...
        { //...visualizza la pagina di signup, controllando che l'utente sia effettivamente un guest
            $vUtente = new VUtente();
            $utente = CSession::getUserFromSession();
            if (get_class($utente)!=EOspite::class) // se l'utente non è guest, non puo accedere al login
                $vUtente->showErrorPage($utente, 'Yuo\'re already logged!');
            else
                $vUtente->showSignUp();
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CUtente::register();
        else
            header('Location: Invalid HTTP method detected');
    }

    static function register()
    {
        $vUser = new VUtente();
        $loggedUser = $vUser->createUser(); // viene creato un utente con i parametri della form

        if($vUser->validateSignUp($loggedUser))
        {
            FPersistantManager::getInstance()->store($loggedUser); // si salva l'utente
            CSession::startSession($loggedUser);
            header('Location: /playadice/index');
        }
        else
            $vUser->showSignUp();
    }

    /**
     * Effettua il logout.
     */
    static function logout()
    {
        CSession::destroySession();
        header('Location: /playadice/home');
    }

    /**
     * La funzione Authentication verifica che le credenziali di accesso inserite da un utente
     * siano corrette: in tal caso, l'applicazione lo riporterà verso la sua pagina, altrimenti
     * restituirà la schermata di login, con un messaggio di errore
     */
    private function authentication()
    {
        $vUser = new VUtente();
        $loggedUser = $vUser->createUser();

        if($vUser->validateLogin($loggedUser))
        {
            $authenticated = false; // bool per l'autenticazione

            $user = FPersistantManager::getInstance()->search("utente", "UserName", $loggedUser->getUsername());

            if($loggedUser->getPassword() == $user[0]->getPassword() ) // se la password e' corretta
                {
                    unset($loggedUser); // l'istanza utilizzata per il login viene rimossa

                    $authenticated = true; // l'utente e' autenticato

                    CSession::startSession($user[0]);

                    header('Location: /playadice/index');
                }
            if(!$authenticated)
                $vUser->showLogin(true);
        }
        else
            $vUser->showLogin();
    }

}