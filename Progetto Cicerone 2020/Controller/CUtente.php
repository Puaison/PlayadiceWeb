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
            CUser::authentication();
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
            CUser::register();
        else
            header('Location: Invalid HTTP method detected');
    }

    /**
     * Effettua il logout.
     */
    static function logout()
    {
        CSession::destroySession();
        header('Location: /deepmusic/home');
    }

}