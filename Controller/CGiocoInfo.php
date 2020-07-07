<?php


class CGiocoInfo
{
    static function showgiocoinfo(int $id)
    {
        $vGiocoinfo = new VGiocoInfo();
        $user = CSession::getUserFromSession();

            $giocoExists = FPersistantManager::getInstance()->exists("gioco", "Id", $id); // si verifica che il gioco inserito matchi una entry nel db
            if($giocoExists)
            {
                $gioco = FPersistantManager::getInstance()->search("gioco", "Id" ,$id)[0];
                $gioco->setInfo(FPersistantManager::getInstance()->search("giocoinfo", "IdGioco" ,$gioco->getId())[0]);
                $recensioni=FPersistantManager::getInstance()->search("recensione","IdGioco",$gioco->getId());
                $gioco->setRecensioni($recensioni);
                $vGiocoinfo->showinfo($user,$gioco);

            }
            else
                $vGiocoinfo->showErrorPage($user,'Il gioco che vuoi visualizzare non esiste');
    }
    static function removerecensione(string $creatore, int $idgioco)
    {
        $vGiocoinfo = new VGiocoInfo();
        $user = CSession::getUserFromSession();
        $gioco=FPersistantManager::getInstance()->search("gioco","Id",$idgioco)[0];
        $recensione=new ERecensione();
        $recensione->getEGioco()->setId($idgioco);
        $recensione->getEUtente()->setUsername($creatore);
        FPersistantManager::getInstance()->remove($recensione);
        $allrec=FPersistantManager::getInstance()->search("recensione", "IdGioco",$idgioco);
        $gioco->setRecensioni($allrec);
        $gioco->CalcolaVotoMedio();
        FPersistantManager::getInstance()->update($gioco);


        header("Location: /playadice/giocoinfo/showgiocoinfo?$idgioco");

    }
    static function newrecensione(int $IdGioco)
    {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
            { //...carica la pagina per l'inserimento di una nuova recensione(verificando che non abbia già recensito)
                $vGiocoInfo = new VGiocoInfo();
                $user = CSession::getUserFromSession();
                //if di controllo
                //Il gioco richiesto non esiste

                $gioco=FPersistantManager::getInstance()->search("gioco","Id",$IdGioco)[0];
                    $vGiocoInfo->showFormNewRecensione($user,$gioco);

                //else
                    //$vCatalogo->showErrorPage($user, 'Non hai i permessi per accedere a questa sezione!');
            }
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                CGiocoInfo::insertnewrecensione();
            else
                header('Location: HTTP/1.1 Invalid HTTP method detected');
    }

    private function insertnewrecensione()
    {
        $user=CSession::getUserFromSession();
        $vGiocoInfo = new VGiocoInfo();
        $newrecensione = $vGiocoInfo->createRecensione();

        // TODO  SERVE CONTROLLARE queSTO? if($user->getModeratore())
        //if($vCatalogo->validateNuovoGioco($newgioco)) vari controlli di validazione
        //{
            FPersistantManager::getInstance()->store($newrecensione);
            $allrec=FPersistantManager::getInstance()->search("recensione", "IdGioco",$newrecensione->getEGioco()->getId());
            $gioco=FPersistantManager::getInstance()->search("gioco","Id",$newrecensione->getEGioco()->getId())[0];
            $gioco->setRecensioni($allrec);
            $gioco->CalcolaVotoMedio();
            FPersistantManager::getInstance()->update($gioco);
            $idgioco=$gioco->getId();

        header("Location: /playadice/giocoinfo/showgiocoinfo?$idgioco");
        //}
        //else
            //$vCatalogo->showFormNewGioco($user,$newgioco);
    }
}