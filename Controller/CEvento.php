<?php

/**
 *
 * Il Controller CEvento implementa le funzionalità  della sezione Calendario.
 * Permetta la visualizzazione totale degli eventi, del singolo evento, la creazione, modifica e cancellazione da parte
 * di un amministratore e la possibilità di prenotarsi da parte di un utente registrato e loggato
 *
 *
 * @author Gruppo DelSignore/Marottoli/Perozzi
 * @package Controller
 */
class CEvento
{
    /**
     * Metodo che permette la visualizzazione totale degli eventi
     */
    static function showAll()
    {
        $vEvento = new VEvento(); // crea la view
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $eventi = FPersistantManager ::getInstance() -> search("Evento", "All", ''); // carica tutti gli eventi
        $vEvento -> showAll($user, $eventi); // mostra la pagina degli eventi

    }

    /**
     * Metodo che permette la visualizzazione di un singolo evento.
     * Se l'evento non esiste, mostra un messaggio d'errore
     */

    static function show($id)
    {
        $vEvento = new VEvento(); // crea la view
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
        if ($evento)
            $vEvento -> show($user, $evento);
        else
            $vEvento -> showErrorPage($user, "L'evento che stai cercando non esiste");


    }

    /**
     * Metodo che permette la creazione di un nuovo evento da parte dell'admin
     *
     */
    static function create()
    {
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        if (get_class($user) == EAdmin::class) // se l'utente non e' ospite
            $vEvento -> create($user);
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
    }

    /**
     * Metodo che permette la modifica di un nuovo evento da parte dell'admin
     *
     */
    static function modify($id)
    {
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
        if (get_class($user) == EAdmin::class) {
            if ($evento)
                $vEvento -> modify($user, $evento);
            else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
                $vEvento -> showErrorPage($user, "L'evento che stai cercando non esiste");

        } // se l'utente è un admin
        else
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');


    }

    /**
     * Metodo che permette la prenotazione ad un evento da parte di un utente registrato
     *
     */

    static function booking($id)
    {
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $prenotazione = new EPrenotazione();
            $prenotazione -> setUtente($user);
            $prenotazione -> setIdEvento($id);
            $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
            $prenotazioni = $evento[0] -> getPrenotazioni();
            $check = true;
            foreach ($prenotazioni as $value) {
                if ($value -> getUtente() -> getUsername() == $user -> getUsername())
                    $check = false;
            }
            if ($check) {
                $fp = FPersistantManager ::getInstance() -> store($prenotazione);
                $evento[0] -> newPrenotazione($prenotazione);
                $vEvento -> show($user, $evento, $fp);
            } else {
                $vEvento -> show($user, $evento, "", $error = true);
            }

        }
    }
    static function delBooking($id){
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $prenotazione = FPersistantManager::getInstance() -> search("Prenotazione", "Id", $id);
            $str = $prenotazione[0] -> getIdEvento();
            FPersistantManager::getInstance() -> remove($prenotazione[0]);
            $evento= FPersistantManager::getInstance() -> search("Evento", "Id", $str);
            $vEvento -> show($user, $evento, "", "",true);
        }
        }


    /**
     * Metodo che permette l'update di un evento dopo la modifica da parte dell'admin
     *
     */

    static function updateEvento($id)
    {
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $evento = $vEvento -> createEvento();
            $fasce = $evento -> getFasce();
            $luogo = $evento -> getLuogo();
            $eventoOld = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
            $luogoOld = $eventoOld[0] -> getLuogo();
            $luogo -> setId($luogoOld -> getId());
            $evento -> setId($eventoOld[0] -> getId());
            FPersistantManager ::getInstance() -> update($luogo);

            FPersistantManager ::getInstance() -> update($evento);

            $fasceOld = $eventoOld[0] -> getFasce();
            for ($i = 0; $i < count($fasce); $i++) {
                if (isset($fasceOld[$i])) {
                    $fasce[$i] -> setId($fasceOld[$i] -> getId());
                    $fasce[$i] -> setIdEvento($fasceOld[$i] -> getIdEvento());
                    FPersistantManager ::getInstance() -> update($fasce[$i]);
                } else {
                    $fasce[$i] -> setIdEvento($eventoOld[0] -> getId());
                    FPersistantManager ::getInstance() -> store($fasce[$i]);
                }
            }
            $str = $evento -> getId();
            header("Location: /playadice/evento/show?$str");
        }
    }

    static function store()
    {
        /**
         * Metodo che permette il salvataggio nel db di un evento dopo la modifica da parte dell'admin
         *
         */
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $evento = $vEvento -> createEvento();
            if($vEvento->validateNuovoEvento($evento)){
                $luogo = $evento -> getLuogo();
                FPersistantManager ::getInstance() -> store($luogo);
                FPersistantManager ::getInstance() -> store($evento);
                $fasce = $evento -> getFasce();

                foreach ($fasce as $value) {
                    FPersistantManager ::getInstance() -> store($value);

                }
                header('Location: /playadice/evento/showAll');
            }
            else
                $vEvento->create($user);



        }
    }

    /**
     * Metodo che permette l'eliminazione  di un evento da parte dell'admin
     *
     */

    static function delete($id)
    {
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        if (get_class($user) == EAdmin::class) {
            if (is_numeric($id)) {
                $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
                if ($evento){
                    $luogo = $evento[0] -> getLuogo();
                    FPersistantManager ::getInstance() -> remove($evento[0]);
                    FPersistantManager ::getInstance() -> remove($luogo);
                    $fasce = $evento[0] -> getFasce();
                    foreach ($fasce as $value) {
                        FPersistantManager ::getInstance() -> remove($value);

                    }
                    if ($evento[0]->getFlag()){
                        $prenotazioni =$evento[0]->getPrenotazioni();
                        foreach ($prenotazioni as $value) {
                            FPersistantManager ::getInstance() -> remove($value);
                        }

                    }
                    header('Location: /playadice/evento/showAll');

                }
                else
                    header('Location: /playadice/evento/showAll');

            } else
                header('Location: /playadice/evento/showAll');

        } else
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');


    }
}


/*if(! $SelectedAvatar=FPersistantManager::getInstance()->exists("Avatar","IdAvatar","$id"))
    $vAvatar->showErrorPage($user, 'Stai smanettando con le url eh? Birichino!');
else
{
    $SelectedAvatar=FPersistantManager::getInstance()->search("Avatar","IdAvatar","$id");
    $vAvatar->showdetails($user, $SelectedAvatar[0]);
}
}*/