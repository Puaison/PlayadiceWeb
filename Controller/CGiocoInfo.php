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
                // Se recupero tutto insieme oopure no sostituisce le due righe subito successive$gioco=FPersistantManager::getInstance()->search("gioco", "Id" ,$id)[0];

                $gioco = FPersistantManager::getInstance()->search("gioco", "Id" ,$id)[0];
                $gioco->setInfo(FPersistantManager::getInstance()->search("giocoinfo", "IdGioco" ,$gioco->getId())[0]);

                $recensioni=FPersistantManager::getInstance()->search("recensione","IdGioco",$gioco->getId());
                $recensito=false;
                if($recensioni)//Se c'è almeno una recensione TODO chi deve avere la responsabilità di controllare questo?
                {
                    $gioco->setRecensioni($recensioni);
                    foreach ($recensioni as $recensione)
                    {
                        if($user->getUsername()==$recensione->getEUtente()->getUsername())
                            $recensito=true;
                    }

                }
                $vGiocoinfo->showInfo($user,$gioco,$recensito);

            }
            else
                $vGiocoinfo->showErrorPage($user,'Il gioco che vuoi visualizzare non esiste');
    }


    static function removerecensione(string $creatore, int $idgioco)
    {
        $vGiocoinfo = new VGiocoInfo();
        $user = CSession::getUserFromSession();
        if(get_class($user) == EAdmin::class || $user->getUsername()==$creatore) {// se l'utente che ha richiesto la cancellazione è un admin o il creatore della recensione

            if(FPersistantManager::getInstance()->search("gioco","Id",$idgioco)) {//verifico che esista il gioco
                $gioco = FPersistantManager::getInstance()->search("gioco", "Id", $idgioco)[0];
                $recensione = new ERecensione();
                $recensione->getEGioco()->setId($idgioco);
                $recensione->getEUtente()->setUsername($creatore);
                $allrec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $idgioco);
                $esiste=false;
                if($allrec) {
                    foreach ($allrec as $rec) {
                        if ($rec->getEUtente()->getUsername() == $creatore)
                            $esiste = true;
                    }
                }
                if($esiste) {
                    FPersistantManager::getInstance()->remove($recensione);
                    $allrec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $idgioco);
                    //NON SERVEif($allrec!=NULL)
                    $gioco->setRecensioni($allrec);
                    $gioco->CalcolaVotoMedio();
                    FPersistantManager::getInstance()->update($gioco);
                    header("Location: /playadice/giocoinfo/showgiocoinfo?$idgioco");
                }
                else
                    $vGiocoinfo->showErrorPage($user,'La recensione che vuoi eliminare non esiste');
            }
            else
                $vGiocoinfo->showErrorPage($user,'Non esiste il gioco dove vuoi eliminare la recensione');

        }
        else
            $vGiocoinfo->showErrorPage($user,'Non hai i permessi per rimuovere questa recensione');

    }
    static function newrecensione(int $IdGioco)
    {
        $user=CSession::getUserFromSession();
        $vGiocoInfo = new VGiocoInfo();
        if(get_class($user) != EOspite::class) {
            if(FPersistantManager::getInstance()->exists("gioco","Id",$IdGioco)) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
                { //...carica la pagina per l'inserimento di una nuova recensione(verificando che non abbia già recensito)

                    $allrec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $IdGioco);
                    $esiste=false;
                    if($allrec) {
                        foreach ($allrec as $rec) {
                            if ($rec->getEUtente()->getUsername() == $user->getUsername())
                                $esiste = true;
                        }
                    }
                    if(!$esiste) {
                        $gioco = FPersistantManager::getInstance()->search("gioco", "Id", $IdGioco)[0];
                        $vGiocoInfo->showFormNewRecensione($user, $gioco);
                    }
                    else
                        $vGiocoInfo->showErrorPage($user,'Hai già recensito questo gioco');
                } else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    CGiocoInfo::insertnewrecensione($IdGioco);
                else
                    header('Location: HTTP/1.1 Invalid HTTP method detected');
            }
            else
                $vGiocoInfo->showErrorPage($user,'Il Gioco che vuoi recensire non esiste');
        }
        else
            $vGiocoInfo->showErrorPage($user,'Non puoi accedere a questa sezione. Devi prima loggare');
    }

    static function insertnewrecensione(int $IdGioco)
    {
        $user=CSession::getUserFromSession();
        $vGiocoInfo = new VGiocoInfo();
        $newrecensione = $vGiocoInfo->createRecensione();
        $newrecensione->getEGioco()->setId($IdGioco);
        if(get_class($user) != EOspite::class) {
            if(FPersistantManager::getInstance()->exists("gioco", "Id", $newrecensione->getEGioco()->getId() )) {
                $gioco = FPersistantManager::getInstance()->search("gioco", "Id", $newrecensione->getEGioco()->getId())[0];
                $allrec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $IdGioco);
                $esiste=false;
                if($allrec) {
                    foreach ($allrec as $rec) {
                        if ($rec->getEUtente()->getUsername() == $user->getUsername())
                            $esiste = true;
                    }
                }
                if(!$esiste) {
                    if ($vGiocoInfo->validateRecensione($newrecensione)) {
                        FPersistantManager::getInstance()->store($newrecensione);
                        $allrec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $newrecensione->getEGioco()->getId());
                        $gioco->setRecensioni($allrec);
                        $gioco->CalcolaVotoMedio();
                        FPersistantManager::getInstance()->update($gioco);
                        $idgioco = $gioco->getId();
                        header("Location: /playadice/giocoinfo/showgiocoinfo?$idgioco");
                    } else
                        $vGiocoInfo->showFormNewRecensione($user, $gioco);
                }
                else
                    $vGiocoInfo->showErrorPage($user,'Hai già recensito questo gioco');
            }
            else
                $vGiocoInfo->showErrorPage($user,'Il gioco che vuoi recensire non esiste');
        }
        else
            $vGiocoInfo->showErrorPage($user,'Non hai i permessi per recensire;per favore logga');
    }
}