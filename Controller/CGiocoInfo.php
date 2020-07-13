<?php


/**
 * Il Controller CGiocoInfo implementa tutte le funzionalità del Caso D'Uso "Inserisci Recensione".
 * Un EUtente,EOspite o EAdmin può visionare le informazioni del gioco,
 * ma soltanto gli utenti registrati (EUtente, EAdmin) possono recensire UNA SOLA VOLTA;inoltre ogni Utente può cancellare la propria recensione.
 * Gli Admin possono eliminare tutte le recensioni.
 */
class CGiocoInfo
{
    /**
     * Metodo che permette di visionare le informazioni complete del gioco e
     * tutte le sue recensioni associate. Inoltre controlla che il gioco richiesto
     * tramite URL; altrimenti segnala il problema all'utente
     * @param int $id l'identificativo del gioco, specificato nell'URL
     */
    static function showGiocoInfo(int $id)
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


    /**
     * Metodo che gestisce la funzionalità di eliminazione della Recensione; in ordine:
     * 1)Si Verifica che chi ha richiesto la rimozione della recensione sia il suo creatore o un EAdmin;
     * 2)Si controlla che il gioco da cui si voglia effettivamente eliminare la recensione esista;
     * 3)Si controlla che la recensione che si vuole eliminare esista effettivamente;
     * Se tutto questi controlli sono andati a buon fine, viene eseguita la rimozione della recensione dal DB
     * e conseguentemente il ricalcolo del VotoMedio del gioco; altrimenti viene notificato l'utente del
     * problema a cui si è andati incontro
     * @param string $creatore Username dell'Utente che ha effettuato la recensione, specificato nell'URL
     * @param int $idgioco l'identificativo del gioco, specificato nell'URL
     */
    static function removeRecensione(string $creatore, int $idgioco)
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

    /**
     * Metodo che gestisce la funzionalità di inserimento di una nuova recensione. Se richiamato tramite GET, fornisce
     * la form(previa verifica che l'utente sia loggato,che non abbia ancora recensito quel gioco e che quest'ultimo
     * esista effettivamente); se richiamato tramite POST viene lasciato il comando alla funzione insertNewRecensione,
     * la quale si occupa di verificare la validità della recensione che si vuole inserire e di salvarla nel DB
     * @param int $IdGioco l'identificativo del gioco, specificato nell'URL
     */
    static function newRecensione(int $IdGioco)
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
                    header('Location: HTTP/1.1 Invalid HTTP method detected'); // TODO Luca sistema il redirect
            }
            else
                $vGiocoInfo->showErrorPage($user,'Il Gioco che vuoi recensire non esiste');
        }
        else
            $vGiocoInfo->showErrorPage($user,'Non puoi accedere a questa sezione. Devi prima loggare');
    }

    /**
     * Metodo che inserisce nel db la recensione effettuta; ma prima fa diversi controlli; in ordine:
     * 1)Si Verifica che chi ha richiesto la rimozione sia loggato(EUtente);
     * 2)Si controlla che il gioco su cui si voglia effettuare la recensione esista;
     * 3)Si controlla che l'utente in sessione non abbia già recensito;
     * 4)Si controlla che tutti i parametri inseriti sono corretti
     * Se tutto questi controlli sono andati a buon fine, viene effettuato l'inserimento della recensione
     * (creata con le informazioni passate tramite il metodo Post) nel DB
     * e conseguentemente il ricalcolo del VotoMedio del gioco; altrimenti viene notificato l'utente del
     * problema a cui si è andati incontro
     * @param int $IdGioco l'identificativo del gioco, specificato nell'URL
     */
    static function insertNewRecensione(int $IdGioco)
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