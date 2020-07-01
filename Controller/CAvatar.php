<?php

/**
 *
 * Il Controller CSong implementa le funzionalitÃ  'Gestione Brano'.
 * Un musicista puÃ² creare un brano, ed insieme ai moderatori puÃ² modificarlo o rimuoverlo.
 *
 * @author Gruppo DelSignore/Marottoli/Perozzi
 * @package Controller
 */
class CAvatar
{
    static function details($id = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();
        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","2");  //TODO ADD ID VERO
            $vAvatar->showdetails($user, $SelectedAvatar[0]);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

    static function modify($id = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();
        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","2");  //TODO ADD ID VERO E CHECK SULLA PROPRIETà
            $vAvatar->showmodify($user, $SelectedAvatar[0]);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

}