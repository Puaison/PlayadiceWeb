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
            if(! $SelectedAvatar=FPersistantManager::getInstance()->exists("Avatar","IdAvatar","$id"))
                $vAvatar->showErrorPage($user, 'Stai smanettando con le url eh? Birichino!');
            else
            {
            $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id");
            $vAvatar->showdetails($user, $SelectedAvatar[0]);
            }
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

    static function submitchanges($id)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            $Modificato=(FPersistantManager::getInstance()->search("Avatar","IdAvatar",$id))[0];
            $SubmittedAvatar=$vAvatar->CreateFromModifyForm();
            $Proposta = new EProposta();

            $Proposta->setTipoProposta("Modifica");
            $Proposta->setProposto($SubmittedAvatar);
            $Proposta->setModificato($Modificato);

            FPersistantManager::getInstance()->store($SubmittedAvatar);
            FPersistantManager::getInstance()->store($Proposta);
            CRicerca::ShowPersonal("Proposta di modifica salvata con successo");
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

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

    static function submitnewavatar()
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) != EOspite::class) // se l'utente non e' ospite
        {
            $SubmittedAvatar=$vAvatar->CreateFromForm();
            $Proposta = new EProposta();
            $Proposta->setTipoProposta("Creazione");
            $Proposta->setProposto($SubmittedAvatar);
            $Proposta->setModificato(null);

            FPersistantManager::getInstance()->store($SubmittedAvatar);
            FPersistantManager::getInstance()->store($Proposta);
            CRicerca::ShowPersonal("Proposta di creazione salvata con successo");

        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, 'Devi essere loggato per entrare in questa area');
    }

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























