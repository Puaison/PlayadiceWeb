<?php


/**
 * Il Controller CGiocoInfo implementa tutte le funzionalità del Caso D'Uso "Recensisci Gioco".
 * Un EUtente,EOspite o EAdmin può visionare le informazioni del gioco,
 * ma soltanto gli utenti registrati (EUtente, EAdmin) possono recensire UNA SOLA VOLTA ogni gioco;
 * inoltre ogni Utente può cancellare la propria recensione.
 * Gli Admin possono eliminare tutte le recensioni.
 */
class CGiocoInfo
{
    /**
     * Metodo che implementa la funzionalità di visionare le informazioni complete del gioco e
     * tutte le sue recensioni associate. Inoltre controlla che il gioco che si vuole visionare
     * esista; altrimenti si notifica l'utente
     * @param int $id l'identificativo del gioco, specificato nell'URL
     */
    static function showGiocoInfo(int $id)
    {
        $vGiocoinfo = new VGiocoInfo();
        $user = CSession::getUserFromSession();
        if(FPersistantManager::getInstance()->exists("gioco", "Id", $id))// si verifica che il gioco inserito matchi una entry nel db
        {
            $gioco = EGioco::getGiocoCompleto($id);
            $recensito = !$gioco->possibileNuovaRecensione($user);
            $vGiocoinfo->showInfo($user, $gioco, $recensito);
        }
        else
            $vGiocoinfo->showErrorPage($user,'Il gioco che vuoi visualizzare non esiste');
    }


    /**
     * Metodo che implementa la funzionalità di eliminazione della Recensione; in ordine:
     * 1)Si Verifica che chi ha richiesto la rimozione della recensione sia il suo creatore o un EAdmin;
     * 2)Si controlla che il gioco da cui si vuole eliminare la recensione esista effettivamente;
     * 3)Si controlla che la recensione che si vuole eliminare esista effettivamente;
     * Se tutto questi controlli sono andati a buon fine, viene eseguita la rimozione della recensione dal DB
     * e conseguentemente avviene il ricalcolo del VotoMedio del gioco; altrimenti viene notificato l'utente del
     * problema che si è riscontrato
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
                $allGiocoRec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $idgioco);
                $gioco->setRecensioni($allGiocoRec);
                $esiste=!$gioco->possibileNuovaRecensione();
                if($esiste) {
                    FPersistantManager::getInstance()->remove($recensione);
                    $allGiocoRec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $idgioco);
                    $gioco->setRecensioni($allGiocoRec);
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
     * Metodo che implementa la funzionalità di inserimento di una nuova recensione. Se richiamato tramite GET, fornisce
     * la form(previa verifica che l'utente sia loggato e che non abbia ancora recensito il gioco in questione e che quest'ultimo
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
                    $gioco = FPersistantManager::getInstance()->search("gioco", "Id", $IdGioco)[0];
                    $allGiocoRec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $IdGioco);
                    $gioco->setRecensioni($allGiocoRec);
                    if($gioco->possibileNuovaRecensione($user)) {
                        $vGiocoInfo->showFormNewRecensione($user, $gioco);
                    }
                    else
                        $vGiocoInfo->showErrorPage($user,'Hai già recensito questo gioco');
                } else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    CGiocoInfo::insertnewrecensione($IdGioco);
                else
                    header("Location: /playadice/giocoinfo/showgiocoinfo?$IdGioco");
            }
            else
                $vGiocoInfo->showErrorPage($user,'Il Gioco che vuoi recensire non esiste');
        }
        else
            $vGiocoInfo->showErrorPage($user,'Non puoi accedere a questa sezione. Devi prima loggare');
    }

    /**
     * Metodo che inserisce nel db la recensione effettuta; ma prima fa diversi controlli; in ordine:
     * 1)Si Verifica che chi ha richiesto la rimozione sia loggato(Utente Registrato);
     * 2)Si controlla che il gioco su cui si voglia effettuare la recensione esista effettivamente;
     * 3)Si controlla che l'utente in sessione non abbia già recensito il gioco in questione;
     * 4)Si controlla che tutti i parametri inseriti sono corretti
     * Se tutto questi controlli sono andati a buon fine, viene effettuato l'inserimento della recensione
     * (creata con le informazioni passate tramite il metodo POST) nel DB
     * e conseguentemente avviene il ricalcolo del VotoMedio del gioco; altrimenti viene notificato l'utente del
     * problema che si è riscontrato
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
                $allGiocoRec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $IdGioco);
                $gioco->setRecensioni($allGiocoRec);
                if($gioco->possibileNuovaRecensione($user)) {
                    if ($vGiocoInfo->validateRecensione($newrecensione)) {
                        FPersistantManager::getInstance()->store($newrecensione);
                        $allGiocoRec = FPersistantManager::getInstance()->search("recensione", "IdGioco", $newrecensione->getEGioco()->getId());
                        $gioco->setRecensioni($allGiocoRec);
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