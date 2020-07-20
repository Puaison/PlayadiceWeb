<?php

/**
 *
 * Il Controller CEvento implementa le funzionalità  della sezione Calendario.
 * Permetta la visualizzazione totale degli eventi, del singolo evento, la creazione, modifica e cancellazione da parte
 * di un amministratore e la possibilità di prenotarsi da parte di un utente registrato e loggato
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
        $eventi=CEvento::sort($eventi, "date");
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
        else // se l'utente e' non admin, viene reindirizzato ad una pagina di errore
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
    }

    /**
     * Metodo che permette la modifica di un nuovo evento da parte dell'admin
     */
    static function modify($id)
    {
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
        if (get_class($user) == EAdmin::class)//  se l'utente e' admin
        {
            if ($evento)
                $vEvento -> modify($user, $evento);
            else //Se l'evento non esiste
                $vEvento -> showErrorPage($user, "L'evento che stai cercando non esiste");

        } // se l'utente non è un admin
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
                FPersistantManager ::getInstance() -> store($prenotazione);
                $evento[0] -> newPrenotazione($prenotazione);
                $vEvento -> show($user, $evento, $check);
            } else {
                $vEvento -> show($user, $evento, "", $error = true);
            }
        }
    }

    /**
     * Metodo che elimina la prenotazione ad un evento da parte di un utente registrato (Solo post)
     */
    static function delBooking($id, $evento)
    {
        $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $evento);
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prenotazione = FPersistantManager ::getInstance() -> search("Prenotazione", "Id", $id);
            if ($prenotazione) {
                FPersistantManager ::getInstance() -> remove($prenotazione[0]);
                $vEvento -> show($user, $evento, "", null, true);
            } else {
                $vEvento -> show($user, $evento, "", false, "");
            }
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
            if ($vEvento -> validateNuovoEvento($evento)) {
                FPersistantManager ::getInstance() -> update($luogo);
                FPersistantManager ::getInstance() -> update($evento);
                $fasceOld = $eventoOld[0] -> getFasce();
                for ($i = 0; $i < 10; $i++) {
                    if (!empty($fasceOld[$i]) and !empty($fasce[$i])) {
                        $fasce[$i] -> setId($fasceOld[$i] -> getId());
                        $fasce[$i] -> setIdEvento($fasceOld[$i] -> getIdEvento());
                        FPersistantManager ::getInstance() -> update($fasce[$i]);

                    } else if (empty($fasceOld[$i]) and !empty($fasce[$i])) {
                        $fasce[$i] -> setIdEvento($eventoOld[0] -> getId());
                        FPersistantManager ::getInstance() -> store($fasce[$i]);
                    } else if (!empty($fasceOld[$i]) and empty($fasce[$i])) {
                        FPersistantManager ::getInstance() -> remove($fasceOld[$i]);
                    }
                }
                $vEvento -> upload($user,$evento,"",true);
            } else {
                $array[] = $evento;
                $vEvento -> modify($user, $array);
            }

        }
    }

    /**
     * Metodo che permette il salvataggio nel db di un evento dopo la modifica da parte dell'admin
     *
     */
    static function store()
    {

        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $evento = $vEvento -> createEvento();
            if ($vEvento -> validateNuovoEvento($evento)) {
                $luogo = $evento -> getLuogo();
                FPersistantManager ::getInstance() -> store($luogo);
                FPersistantManager ::getInstance() -> store($evento);
                $fasce = $evento -> getFasce();
                foreach ($fasce as $value) {
                    $evento = FPersistantManager ::getInstance() -> search("Evento", "Last", "");
                    $value->setIdEvento($evento[0]->getId());
                    FPersistantManager ::getInstance() -> store($value);
                }
                $evento = FPersistantManager ::getInstance() -> search("Evento", "Last", "");
                $vEvento -> upload($user,$evento[0]);
            } else
                $vEvento -> create($user);
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
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (get_class($user) == EAdmin::class) {
                if (is_numeric($id)) {
                    $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
                    if ($evento) {
                        $luogo = $evento[0] -> getLuogo();
                        FPersistantManager ::getInstance() -> remove($evento[0]);
                        FPersistantManager ::getInstance() -> remove($luogo);
                        $fasce = $evento[0] -> getFasce();
                        foreach ($fasce as $value) {
                            FPersistantManager ::getInstance() -> remove($value);

                        }
                        if ($evento[0] -> getFlag()) {
                            $prenotazioni = $evento[0] -> getPrenotazioni();
                            foreach ($prenotazioni as $value) {
                                FPersistantManager ::getInstance() -> remove($value);
                            }

                        }
                        unlink("Resources/assets/EventImages/".$id.".png");
                        header('Location: /playadice/evento/showAll');

                    } else
                        header('Location: /playadice/evento/showAll');

                } else
                    header('Location: /playadice/evento/showAll');

            } else
                $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        }

    }

    /**
     * Metodo che permette l'ordinamento degli eventi da passare alla view
     */
    static function order()
    {
        $vEvento = new VEvento(); // crea la view
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $eventi = FPersistantManager ::getInstance() -> search("Evento", "All", ''); // carica tutti gli eventi
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['option'] == "Data") {
                $eventi=CEvento::sort($eventi, "date");
                $vEvento -> showAll($user, $eventi); // mostra la pagina degli eventi
            } else if ($_POST['option'] == "Luogo") {
                $eventi=CEvento::sort($eventi, "place");
                $vEvento -> showAll($user, $eventi); // mostra la pagina degli eventi
            }
        }
    }

    /**
     * Metodo che rimanda alla pagina delle prenotazioni
     */
    static function prenotazioni($id)
    {
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
            $vEvento -> prenotazioni($user, $evento[0]);
        }
    }

    /**
     * Metodo che rimanda alla pagina di upload delle immagini
     */
    static function upload($id)
    {
        $vEvento = new VEvento();
        $user = CSession ::getUserFromSession();
        $evento = FPersistantManager ::getInstance() -> search("Evento", "Id", $id);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $vEvento -> showErrorPage($user, 'Non puoi accedere in questa area');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty( $_FILES["fileToUpload"]["name"])){
                $target_dir = "Resources/assets/EventImages/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $_FILES["fileToUpload"]["name"] = $id. "." . $imageFileType;
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $error = '';
// Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $error = "File is not an image.";
                        $uploadOk = 0;
                    }
                }
// Check if file already exists
                if (file_exists($target_file)) {
                    unlink($target_file);
                    $uploadOk = 1;
                }
// Check file size
                if ($_FILES["fileToUpload"]["size"] > 2000000000) {
                    $error = $error . "\n" . "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
// Allow certain file formats
                if ($imageFileType != "png") {
                    $error = $error . "\n" . "Sorry, only PNG are allowed.";
                    $uploadOk = 0;
                }
// Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $error = $error . "\n" . "Sorry, your file was not uploaded.";
                    $vEvento -> upload($user, $evento[0], $error);
// if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            header('Location: /playadice/evento/showAll');

                    } else {
                        $error = "Sorry, there was an error uploading your file.";
                        $vEvento -> upload($user,$evento[0], $error,true);
                    }
                }
            }
            else{
                $error="Devi inserire un'immagine";
                $vEvento -> upload($user, $evento[0], $error,true);
            }

            }


    }
    static function sort($eventi, $var)
    {
        foreach ($eventi as $value){

            if(empty($value->getFasce())){
                $array[]=$value;
                unset($eventi[array_search($value,$eventi)]);
                $eventi=array_values($eventi);
            }
        }
        usort($eventi, "EEvento::"."$var"."Sorter");
        if (!empty($array)){
            foreach ($array as $value){
                array_push($eventi,$value);
            }

        }
        return $eventi;

    }
    static function dropOld($eventi){
        foreach($eventi as $value){
            if (!(($value->getFasce()[0]->validateStart()))){
                unset($eventi[array_search($value,$eventi)]);
                $eventi=array_values($eventi);
            }
        }
        return $eventi;
    }
}