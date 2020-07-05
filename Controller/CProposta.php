<?php


class CProposta
{
    static function approva($PropostaId = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) == EAdmin::class) // se l'utente non e' ospite
        {
            $Proposta=FPersistantManager::getInstance()->search("Proposta","Id","$PropostaId")[0];
            if ($Proposta->getTipoProposta() == "Creazione")
            {
                FPersistantManager::getInstance()->remove($Proposta);
            }
            if ($Proposta->getTipoProposta() == "Cancellazione")
            {
                FPersistantManager::getInstance()->remove($Proposta->getModificato());
            }
            if ($Proposta->getTipoProposta() == "Modifica")
            {
                $Proposta->approvaProposta();
                $DaRimuovere = $Proposta->getProposto();

                FPersistantManager::getInstance()->update($Proposta->getModificato());
                FPersistantManager::getInstance()->remove($DaRimuovere);
            }
            CRicerca::ShowPersonal("Proposta Accettata con successo");
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, "Non hai i privilegi di amministratore per visualizzare quest'area");
    }

    static function rifiuta($PropostaId = 0)
    {
        $vAvatar = new VAvatar();
        $user = CSession::getUserFromSession();

        if (get_class($user) == EAdmin::class) // se l'utente e' admin
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
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vAvatar->showErrorPage($user, "Non hai i privilegi di amministratore per visualizzare quest'area");
    }
}