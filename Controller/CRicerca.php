<?php

/**
 * La classe CSearch implementa la funzionalità di 'Ricerca'. Al suo interno presenta inoltre delle
 * costanti che definiscono chiavi (ovvero risorse da ricercare) e valori (ovvero indici rispetto a cui cercare)
 * di default e avanzati.
 * @author gruppo2
 * @package Controller
 */
class CRicerca
{
    /** Chiave di default: Ricerca di canzoni */
    const KEY_DEFAULT = 'Song';
    /** Chiave avanzata: Ricerca di utenti */
    const KEY_ADVANCED = 'User';
    /** Valore base: Ricerca per genere */
    const VALUE_DEFAULT = 'Genre';
    /** Valore avanzato: Ricerca per nome */
    const VALUE_ADVANCED = 'Name';

    /**
     * Questo metodo implementa il caso d'uso 'Ricerca Semplice' e fornisce una ricerca delle
     * canzoni rispetto al genere musicale. Tale ricerca puo' essere effettuata da qualunque tipologia
     * di utente.
     */
    static function simple()
    {
        $vSearch = new VSearch();
        $user = CSession::getUserFromSession();


        $string = $vSearch->getSearchValue();

        if($string /*&& $vSearch->validateSearch()*/)
        { // se l'utente ha inviato tramite GET un valore, si cerca nel DB
            $objects = FPersistantManager::getInstance()->search(CSearch::KEY_DEFAULT, CSearch::VALUE_DEFAULT, $string);
            $vSearch->showSearchResult($user, $objects, CSearch::KEY_DEFAULT, CSearch::VALUE_DEFAULT, $string);
        }
        else
            header('Location: /deepmusic/index');

    }

    /**
     * Questo metodo implementa il caso d'uso 'Ricerca Avanzata'. Un utente puo' infatti ricercare
     * canzoni o utenti in base al nome o al genere musicale. Questo tipo di ricerca e' possibile
     * solo per gli utenti che sono registrati.
     */
    static function Search()
    {
        $vRicerca = new VRicerca();
        $user = CSession::getUserFromSession();

        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
                list($string,$key)=$vRicerca->getStringAndKey();
                $objects = FPersistantManager::getInstance()->search("Avatar", $key , $string);
                $vRicerca->showSearchResult($user, $objects);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vRicerca->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

    static function ShowPersonal()
    {
        $vRicerca = new VRicerca();
        $user = CSession::getUserFromSession();

        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            $string=$user->getUsername();
            $objects = FPersistantManager::getInstance()->search("Avatar", "UsernameUtente" , $string);
            $vRicerca->showSearchResult($user, $objects);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vRicerca->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }


}