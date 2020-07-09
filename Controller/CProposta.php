<?php


class CProposta
{
    /**
     * Funzione che permette solo agli admin l'approvazione di una determinata proposta
     */
    static function approva($PropostaId = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) == EAdmin::class) // se l'utente non e' ospite
        {
            if (FPersistantManager::getInstance()->search("Proposta","Id","$PropostaId") != null)
            {
                $Proposta=FPersistantManager::getInstance()->search("Proposta","Id","$PropostaId")[0];
                if ($Proposta->getTipoProposta() == "Creazione") {
                    FPersistantManager::getInstance()->remove($Proposta);
                }
                if ($Proposta->getTipoProposta() == "Cancellazione") {
                    FPersistantManager::getInstance()->remove($Proposta->getModificato());
                }
                if ($Proposta->getTipoProposta() == "Modifica") {
                    $Proposta->approvaProposta();
                    $DaRimuovere = $Proposta->getProposto();

                    FPersistantManager::getInstance()->update($Proposta->getModificato());
                    FPersistantManager::getInstance()->remove($DaRimuovere);
                }
                CRicerca::ShowPersonal("Proposta Accettata con successo");
            }
            else
                $vAvatar->showErrorPage($user, "Strano, la proposta che stavi Accettando non esiste più");
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, "Non hai i privilegi di amministratore per visualizzare quest'area");
    }

    /**
     * Funzione che permette solo agli admin il rifiuto di una determinata proposta
     */
    static function rifiuta($PropostaId = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) == EAdmin::class) // se l'utente e' admin
        {
            if (FPersistantManager::getInstance()->search("Proposta","Id","$PropostaId") != null)
            {
                $Proposta=FPersistantManager::getInstance()->search("Proposta","Id","$PropostaId")[0];
                if ($Proposta->getTipoProposta() == "Creazione")
                {
                    FPersistantManager::getInstance()->remove($Proposta->getProposto());
                }
                if ($Proposta->getTipoProposta() == "Cancellazione")
                {
                    FPersistantManager::getInstance()->remove($Proposta);
                }
                if ($Proposta->getTipoProposta() == "Modifica")
                {
                    $DaRimuovere = $Proposta->getProposto();
                    FPersistantManager::getInstance()->remove($DaRimuovere);
                }
                CRicerca::ShowPersonal("Proposta Rifiutata con successo");
            }
            else
                $vAvatar->showErrorPage($user, "Strano, la proposta che stavi rifiutando non esiste più");
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, "Non hai i privilegi di amministratore per visualizzare quest'area");
    }
}