<?php

/**
 *
 * Il Controller CAvatar implementa le funzionalità  'Gestione Avatar'.
 * Un utente può, insieme agli admin, crearlo modificarlo o rimuoverlo.
 *
 * @author Gruppo DelSignore/Marottoli/Perozzi
 * @package Controller
 */
class CAvatar
{
    /**
     * Funzione che dato l'ID di un avatar, permette di visualizzarne i dettagli
     */
    static function details($id = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();
        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            if(! $SelectedAvatar=FPersistantManager::getInstance()->exists("Avatar","IdAvatar","$id"))
                $vAvatar->showErrorPage($user, 'Stai smanettando con le url eh? Birichino!');
            else
            {
            $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id");
            $vAvatar->showdetails($user, $SelectedAvatar[0]);
            }
        }
        else // se l'utente e' ospite, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

    /**
     * Funzione che dato l'ID di un avatar, permette di visualizzarne la pagina per la modifica
     */
    static function modify($id = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();
        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            if($SelectedAvatar=FPersistantManager::getInstance()->exists("Avatar","IdAvatar","$id")) //Se l'avatar esiste
            {
                if ( !(FPersistantManager::getInstance()->exists("Proposta","IDModificato","$id") ) && !(FPersistantManager::getInstance()->exists("Proposta","IDProposto","$id") ) ) //Se l'avatar non è in una proposta
                {
                    if (get_class($user) == EAdmin::class) // se l'utente e' Admin
                    {
                        $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id");
                        $vAvatar->showmodify($user, $SelectedAvatar[0]);
                    }
                    else
                    {
                        if ( (FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id"))[0]->getProprietario()->getUsername() == $user->getUsername()) //Se l'avatar è il tuo
                        {
                            $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id");
                            $vAvatar->showmodify($user, $SelectedAvatar[0]);
                        }
                        else
                        {
                            $vAvatar->showErrorPage($user, 'Avatar non tuo!');
                        }
                    }
                }
                else
                {
                    $vAvatar->showErrorPage($user, "Ehi! C'è già un'azione in sospeso per questo Avatar!");
                }
            }
            else
            {
                $vAvatar->showErrorPage($user, "Ehi! Questo avatar non esiste!");
            }
        }
        else // se l'utente e' ospite, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

    /**
     * Funzione che dato l'ID di un avatar e la compilazione di un form, permette la creazione di una proposta per la modifica dello stesso
     */
    static function submitchanges($id)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            $Modificato=(FPersistantManager::getInstance()->search("Avatar","IdAvatar",$id))[0];
            $SubmittedAvatar=$vAvatar->CreateFromModifyForm();

            if($vAvatar->ValidateAvatar($SubmittedAvatar))
            {
            $Proposta = new EProposta();
            $Proposta->setTipoProposta("Modifica");
            $Proposta->setProposto($SubmittedAvatar);
            $Proposta->setModificato($Modificato);

            FPersistantManager::getInstance()->store($SubmittedAvatar);
            FPersistantManager::getInstance()->store($Proposta);
            CRicerca::ShowPersonal("Proposta di modifica salvata con successo");
            }
            else
                $vAvatar->showmodify($user,(FPersistantManager::getInstance()->search("Avatar","IdAvatar",$id))[0]);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

    /**
     * Funzione che permette di visualizzare la pagina per la creazione di un nuovo avatar
     */
    static function create()
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
                $vAvatar->showcreate($user);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

    /**
     * Funzione che permette la creazione di una proposta per la nascita di un nuovo Avatar, con dati presi da form
     */
    static function submitnewavatar()
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            $SubmittedAvatar=$vAvatar->CreateFromForm();
            if($vAvatar->ValidateAvatar($SubmittedAvatar))
            {
            $Proposta = new EProposta();
            $Proposta->setTipoProposta("Creazione");
            $Proposta->setProposto($SubmittedAvatar);
            $Proposta->setModificato(null);

            FPersistantManager::getInstance()->store($SubmittedAvatar);
            FPersistantManager::getInstance()->store($Proposta);
            CRicerca::ShowPersonal("Proposta di creazione salvata con successo");
            }
            else
                $vAvatar->showcreate($user,$SubmittedAvatar);
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }


    /**
     * Funzione che permette la creazione di una proposta per la cancellazione di un Avatar esistente
     */
    static function delete($id = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();
        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            if (get_class($user) == EAdmin::class) // se l'utente  e' Admin
            {
                if($SelectedAvatar=FPersistantManager::getInstance()->exists("Avatar","IdAvatar","$id")) //Se l'avatar esiste
                {
                    if ( !(FPersistantManager::getInstance()->exists("Proposta","IDModificato","$id") ) && !(FPersistantManager::getInstance()->exists("Proposta","IDProposto","$id") ) ) //Se l'avatar non è in una proposta
                    {
                        $Proposta = new EProposta();
                        $Proposta->setTipoProposta("Cancellazione");
                        $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id");
                        $Proposta->setModificato($SelectedAvatar[0]);
                        $Proposta->setProposto(null);
                        FPersistantManager::getInstance()->store($Proposta);
                        CRicerca::ShowPersonal("Proposta salvata con successo");
                    }
                    else
                    {
                        $vAvatar->showErrorPage($user, "Ehi! C'è già un'azione in sospeso per questo Avatar!");
                    }
                }
                else
                {
                    $vAvatar->showErrorPage($user, 'Stai smanettando con le url eh? Birichino!');
                }
            }
            else // se l'utente  e' utente registrato
            {
                if($SelectedAvatar=FPersistantManager::getInstance()->exists("Avatar","IdAvatar","$id")) //Se l'avatar esiste
                {
                    if ( (FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id"))[0]->getProprietario()->getUsername() == $user->getUsername()) //Se l'avatar è il tuo
                    {
                        if ( !(FPersistantManager::getInstance()->exists("Proposta","IDModificato","$id") ) && !(FPersistantManager::getInstance()->exists("Proposta","IDProposto","$id") ) ) //Se l'avatar non è in una proposta
                        {
                                $Proposta = new EProposta();
                                $Proposta->setTipoProposta("Cancellazione");
                                $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id");
                                $Proposta->setModificato($SelectedAvatar[0]);
                                $Proposta->setProposto(null);
                                FPersistantManager::getInstance()->store($Proposta);
                                CRicerca::ShowPersonal("Proposta salvata con successo");
                        }
                        else
                        {
                            $vAvatar->showErrorPage($user, "Ehi! C'è già un'azione in sospeso per questo Avatar!");
                        }
                    }
                    else
                    {
                        $vAvatar->showErrorPage($user, 'Ehi! Non puoi cancellare avatar altrui!');
                    }
                }
                else
                {
                    $vAvatar->showErrorPage($user, 'Stai smanettando con le url eh? Birichino!');
                }
            }
        }
        else // se l'utente e' ospite, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

    /**
     * Funzione che permette la visualizzazione di una pagina con i dati di una specifica proposta
     */
    static function vediproposta($id = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) == EAdmin::class) // se l'utente non e' ospite
        {
            $proposta=FPersistantManager::getInstance()->search("Proposta","Id","$id");
            $vAvatar->showproposta($user,$proposta[0]);
        }
        else
            $vAvatar->showErrorPage($user, 'Non hai i permessi necessari per fare questa azione');
    }

}























