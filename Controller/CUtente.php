<?php
/**
 * La classe CUser implementa tutte le funzionalità di 'Gestione Utenti'. I vari metodi permettono
 * la creazione, autenticazione e visualizzazione di un profilo di un utente.
 */

class CUtente
{
    /**
     * Metodo che implementa il caso d'uso di login. Se richiamato tramite GET, fornisce
     * la pagina di login, se richiamato tramite POST cerca di autenticare l'utente attraverso
     * i valori che quest'ultimo ha fornito
     */
    static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
        { //...carica la pagina del login, se l'utente e' effettivamente un guest
            $vUtente = new VUtente();
            $utente = CSession::getUserFromSession();
            if(get_class($utente)!=EOspite::class) // se l'utente non è ospite, non puo accedere al login
            {
                $vUtente->showErrorPage($utente, 'Why are you doing this? You\'re already logged!');
            }
            else
                $vUtente->showLogin();
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CUtente::authentication();
        else
            header('Location: playadice/index.php');
    }

    /**
     * Funzione che mostra la schermata di login con un messaggio di sessione scaduta
     */
    static function expiredSession()
    {
        $vUtente = new VUtente();
        $vUtente->showLogin(false,true);
    }
    /**
     * La funzione Authentication verifica che le credenziali di accesso inserite da un utente
     * siano corrette: in tal caso, l'applicazione lo riporterà verso la sua pagina, altrimenti
     * restituirà la schermata di login, con un messaggio di errore
     */
    static function authentication()
    {
        $vUser = new VUtente();
        $loggedUser = $vUser->createUser();

        if($vUser->validateLogin($loggedUser))
        {
            $authenticated = false; // bool per l'autenticazione

            $user = FPersistantManager::getInstance()->search("utente", "UserName", $loggedUser->getUsername());

            if($loggedUser->getPassword() == $user[0]->getPassword() ) // se la password e' corretta
            {
                unset($loggedUser); // l'istanza utilizzata per il login viene rimossa

                $authenticated = true; // l'utente e' autenticato

                CSession::startSession($user[0]);

                header('Location: /playadice/index');
            }
            if(!$authenticated)
                $vUser->showLogin(true);
        }
        else
            $vUser->showLogin();
    }

    /**
     * Metodo che implementa il caso d'uso di registrazione. Se richiamato a seguito di una richiesta
     * GET da parte del client, mostra la form di compilazione; altrimenti se richiamato tramite POST
     * viene lasciato il comando alla funzione regsiter, responsabile di
     * ricevere e validare i dati forniti dall'utente e procedere con la creazione di un nuovo utente.
     * Inoltre l'utente loggato non può accedere a questa funzionalità
     */
    static function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') //se il metodo http utilizzato e' GET...
        { //...visualizza la pagina di signup, controllando che l'utente sia effettivamente un guest
            $vUtente = new VUtente();
            $utente = CSession::getUserFromSession();
            if (get_class($utente)!=EOspite::class) // se l'utente non è guest, non puo accedere al login
                $vUtente->showErrorPage($utente, 'You\'re already logged!');
            else
                $vUtente->showSignUp();
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CUtente::register();
        else
            header('Location: playadice/index.php');
    }

    /**
     * Metodo che verifica se i dati inseriti per la registrazione tramite POST rispettino i vincoli. In caso affermativo
     * viene creato un nuovo Utente, salvato nel DB e inserito all'interno della sessione.
     * In caso negativo viene mostrata la form di registrazione con i campi errati evidenziati
     * Inoltre gli utenti loggati non possono accedere a questa funzionalità
     */
    static function register()
    {
        $vUser = new VUtente();
        $newUser = $vUser->createUser(); // viene creato un utente con i parametri della form
        $loggedUser=CSession::getUserFromSession();
        if(get_class($loggedUser)==EOspite::class) {
            if ($vUser->validateSignUp($newUser)) {
                FPersistantManager::getInstance()->store($newUser); // si salva l'utente
                CSession::startSession($newUser);
                header('Location: /playadice/index');
            } else
                $vUser->showSignUp(true,$newUser);
        }
        else
            $vUser->showErrorPage($loggedUser,'Sei già loggato. Non puoi creare un nuovo account');
    }

    /**
     * Effettua il logout distruggendo la sessione.
     */
    static function logout()
    {
        CSession::destroySession();
        header('Location: /playadice/index');
    }



    /**
     * Metodo che implementa la funzionalità di visualizzazione dei dati del proprio account. L'Utente non loggato (Ospite)
     * non può accedere a questa funzionalità
     */
    static function openProfile()
    {
        $vUtente=new VUtente();
        $user=CSession::getUserFromSession();
        if(get_class($user)!=EOspite::class) {
            $user = FPersistantManager::getInstance()->search('utente', 'UserName', $user->getUsername())[0];
            $vUtente->showProfile($user);
        }
        else
            $vUtente->showErrorPage($user,'Logga per accedere al tuo profilo');
    }

    /**
     * Metodo che implementa la funzionalità di eliminazione del proprio utente di sessione,con conseguente rimozione dal DB
     *dell'utente e di tutti gli altri oggetti ad esso associato(recensioni, prenotazioni, avatar etc.).
     *L'Utente non loggato(Ospite) non può accedere a questa funzionalità
     */
    static function removeMyUtente()
    {
        $vUtente=new VUtente();
        $user=CSession::getUserFromSession();
        CSession::destroySession();
        if(get_class($user)!=EOspite::class) {
            FPersistantManager::getInstance()->remove($user);
            CCatalogo::utenteRemoved();
            header('Location: /playadice/index');
        }
        else
            $vUtente->showErrorPage($user,'Non puoi eliminare un account che non esiste');

    }

    /**
     * Metodo che implementa la funzionalità di modifica delle informazioni dell'Utente di sessione.
     * Se richiamato tramite GET, forniscela pagina di modifica, se richiamato tramite POST viene lasciato il comando
     * alla funzione executeModifyMyUtente, responsabile della modifica  dell'utente e della validazione dei
     *  valori che quest'ultimo ha fornito.
     * Se l'utente non è loggato (Ospite) non può accedere a questa sezione
     */
    static function modifyMyUtente()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
        { //...carica la pagina del login, se l'utente e' effettivamente un guest
            $vUtente = new VUtente();
            $utente = CSession::getUserFromSession();
            if(get_class($utente)!=EOspite::class) // se l'utente in sessione non è un ospite, accede alla form di modifica
            {
                $utente=FPersistantManager::getInstance()->search('utente','UserName', $utente->getUsername())[0];
                $vUtente->showFormModify($utente);
            }
            else
                $vUtente->showErrorPage($utente, 'Devi essere loggato per modificare i tuoi dati');
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CUtente::executeModifyMyUtente();
        else
            header('Location: /playadice/index');
    }

    /**
     * Metodo che esegue la modifica dei dati dell'Utente,prendendo le informazioni fornite tramite il metodo POST
     * e verificando che essi siano effettivamente validi. Successivamente viene aggiornato il DB.
     * Se l'utente non è loggato (Ospite) non può accedere a questa sezione
     */
    static function executeModifyMyUtente()
    {
        $user=CSession::getUserFromSession();
        $vUtente = new VUtente();
        if(get_class($user)!=EOspite::class) {

            $user = FPersistantManager::getInstance()->search('utente', 'UserName', $user->getUsername())[0];
            $userModified = $vUtente->createUser();
            if ($vUtente->validateModify($userModified)) {
                $user->setNome($userModified->getNome());
                $user->setCognome($userModified->getCognome());
                $user->setEmail($userModified->getMail());
                FPersistantManager::getInstance()->update($user);
                $vUtente->showProfile($user);
            } else
                $vUtente->showFormModify($user);
        }
        else
            $vUtente->showErrorPage($user,'Logga per cambiare i tuoi dati');

    }

    /**
     * Metodo che implementa la funzionalità di modifica della password. Se richiamato tramite GET, fornisce
     * la pagina di modifica, se richiamato tramite POST si lascia la chiamata alla funzione executeModifyPassword,
     * responsabile di verificare la validità della nuova password e il match della password attuale; dopodichè aggiorna il DB
     * Inoltre non si può accedere a questa funzionalità se non si è loggati(Ospite)
     */
    static function modifyMyPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') // se il metodo e' get...
        { //...carica la pagina del login, se l'utente e' effettivamente un ospite
            $vUtente = new VUtente();
            $utente = CSession::getUserFromSession();
            if(get_class($utente)!=EOspite::class) // se l'utente in sessione non è un ospite, accede alla form di modifica
            {
                $utente=FPersistantManager::getInstance()->search('utente','UserName', $utente->getUsername())[0];
                $vUtente->showFormModifyPassword($utente);
            }
            else
                $vUtente->showErrorPage($utente, 'Devi essere loggato per modificare la tua password');
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
            CUtente::executeModifyMyPassword();
        else
            header('Location: /playadice/index');
    }

    /**
     * Metodo che controlla se la password attuale inserita corrisponda a quella situata nel DB; verifica che la
     * nuova password rispetti tutti i vincoli. Dopodichè si aggiorna il DB.
     * Non si può accedere a questa funzionalità se non si è loggati(Ospite)
     */
    static function executeModifyMyPassword()
    {
        $user=CSession::getUserFromSession();
        $vUtente = new VUtente();
        if(get_class($user)!=EOspite::class) {

            $user = FPersistantManager::getInstance()->search('utente', 'UserName', $user->getUsername())[0];
            $NewPassword = $vUtente->createNewPassword();
            $newUser = new EUtente();
            $newUser->setUsername($user->getUsername());
            $newUser->setPassword($NewPassword['Password']);
            $oldUser = new EUtente();
            $oldUser->setUsername($user->getUsername());
            $oldUser->setPassword($NewPassword['OldPassword']);
            if ($vUtente->validateNewPassword($newUser, $oldUser)) {
                $user->setPassword($newUser->getPassword());
                FPersistantManager::getInstance()->update($user);
                $vUtente->showLogin();
            } else
                $vUtente->showFormModifyPassword($user);
        }
        else
            $vUtente->showErrorPage($user,'Devi loggare per cambiare la tua Password');

    }



}