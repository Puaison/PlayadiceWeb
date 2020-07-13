<?php

/**
 * La classe CRicerca implementa la funzionalità di 'Ricerca Avatars'
 * @author Gruppo DelSignore/Marottoli/Perozzi
 * @package Controller
 */
class CRicerca
{
    /**
     * Un utente puo' ricercare avatar in base al nome dell'avatar o all'username del proprietario.
     * Questa ricerca e' possibile
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
                if ($objects != null )
                {
                    $objectspending = FPersistantManager::getInstance()->search("avatar", "AllProposed" , "");
                    if ($objectspending != null )
                    {
                        $intersect = array_uintersect($objects, $objectspending, function($a, $b) { return ($a < $b) ? -1 : (($a == $b) ? 0 : 1); });
                        $objects = array_udiff($objects, $intersect, function($a, $b) {if ($a==$b){ return 0;} return ($a>$b)?1:-1;});
                    }
                }
                $vRicerca->showSearchResult($user, $objects,null,null);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vRicerca->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

    /**
     * Funzione dedicata agli admin che mostra la pagina con tutti gli avatar
     */
    static function SearchAll()
    {
        $vRicerca = new VRicerca();
        $user = CSession::getUserFromSession();

        if (get_class($user) == EAdmin::class) // se l'utente e' admin
        {
            $objects = FPersistantManager::getInstance()->search("Avatar", "All" , "");
            $vRicerca->showSearchResult($user, $objects,null,null);
        }
        else // se l'utente e' non admin, viene reindirizzato ad una pagina di errore
            $vRicerca->showErrorPage($user, 'Non hai i permessi per fare questa azione');
    }

    /**
     * Funzione che mostra la pagina con i propri avatar. Situata in questa classe in quanto affine per funzionamento
     */
    static function ShowPersonal(string $notify = NULL)
    {
        $vRicerca = new VRicerca();
        $user = CSession::getUserFromSession();
        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            $string=$user->getUsername();
            $objects = FPersistantManager::getInstance()->search("Avatar", "UsernameUtente" , $string);

            if ($objects != null )
            {
                $objectspending = FPersistantManager::getInstance()->search("avatar", "AllProposed" , "");
                if ($objectspending != null )
                {
                $intersect = array_uintersect($objects, $objectspending, function($a, $b) { return ($a < $b) ? -1 : (($a == $b) ? 0 : 1); });
                $objects = array_udiff($objects, $intersect, function($a, $b) {if ($a==$b){ return 0;} return ($a>$b)?1:-1;});
                }
            }

            $proposte= FPersistantManager::getInstance()->search("Proposta", "All" , "");
            $vRicerca->showSearchResult($user, $objects,$proposte,$notify);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vRicerca->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }


}