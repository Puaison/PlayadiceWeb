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
        $recensione=new ERecensione();
        $recensione->getEGioco()->setId($idgioco);
        $recensione->getEUtente()->setUsername($creatore);
        FPersistantManager::getInstance()->remove($recensione);

        header("Location: /playadice/giocoinfo/showgiocoinfo?$idgioco");

    }
    static function newrecensione()
    {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
            { //...carica la pagina per l'inserimento di una nuova recensione(verificando che non abbia già recensito)
                $vGiocoInfo = new VGiocoInfo();
                $user = CSession::getUserFromSession();
                //if di controllo

                    $vGiocoInfo->showFormNewRecensione($user);

                //else
                    //$vCatalogo->showErrorPage($user, 'Non hai i permessi per accedere a questa sezione!');
            }
            else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                CCatalogo::insertnewrecensione();
            else
                header('Location: HTTP/1.1 Invalid HTTP method detected');
    }

    private function insertnewrecensione()
    {
        $user=CSession::getUserFromSession();
        $vCatalogo = new VCatalogo();
        $newgioco = $vCatalogo->createGioco();

        // TODO  SERVE CONTROLLARE queSTO? if($user->getModeratore())
        if($vCatalogo->validateNuovoGioco($newgioco))
        {
            FPersistantManager::getInstance()->store($newgioco);
            $newGioco2=FPersistantManager::getInstance()->search("gioco","Last","")[0];
            $newgioco->getInfo()->setId($newGioco2->getId());
            FPersistantManager::getInstance()->store($newgioco->getInfo());
            header('Location: /playadice/catalogo/catalogocompleto');
        }
        else
            $vCatalogo->showFormNewGioco($user,$newgioco);
    }
}