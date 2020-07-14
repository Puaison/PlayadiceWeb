<?php

/**
 * Classe che implementa il caso d'uso di Installazione
 */
class Installation
{
    /**
     * Stringa contenente l'eccezzione che potrebbe essere generata dal PDO
     */
    private $PDOException;
    /**
     * Metodo che gestisce la funzionalità di Installazione, mostrando la form per creare un nuovo database
     * se il metodo di richiesta è GET;se POST, esegue l'installazione, che verrà interrotta se
     * si presenta qualche errore, inoltre segnaalndolo
     */
    function makeInstallation()
    {
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $this->showForm();
            return false;
        }
        else{
            $installed = $this->install();
            if(!$installed)
                $this->showForm($this->PDOException);
            return $installed;
        }

    }

    /**
     * Funzione che mostra la form per inserire i dati per l'installazione, ovvero i parametri di
     * configurazione del dbms locale per la creazione del database. Se la versione di PHP installata
     * sulla macchina e' minore della 7.4.0 , verrà visualizzato un messaggio di errore.
     * @param string $errorMessage eventuali errori da segnalare durante l'installazione
     */
    private function showForm(string $errorMessage=null)
    {
        $smarty = SmartyConfig::configure();
        $version = true; // variabile booleana che verifica se la versione di php installata sulla macchina e' sufficiente
        if(version_compare(PHP_VERSION, '7.4.0', '<'))
            $version = false;
        $smarty->assign('errorMessage', $errorMessage);
        $smarty->assign('version', $version);
        $smarty->display('install.tpl');
    }


    /**
     * Funzione che, prendendo dalla richiesta POST i dati necessari,
     * verifica che siano corretti ed esegue l'installazione. Se si viene a creare qualche errore,
     * questo viene salvato nell'attributo $PDOException
     * @return true se l'installazione è andata a buon fine, false altrimenti
     */
    private function install()
    {
        try
        {
            $address = 'localhost'; // l'installazione e' in default in localhost
            // costruzione parametri di accesso

            $admin = $_POST['admin'];
            $pass = $_POST['pwd'];
            $database = $_POST['database'];
            if(strlen($database)!=0){
            $db = new PDO("mysql:host=$address;", $admin, $pass); // tentativo di connessione al dbms (default: mysql)
            $db->beginTransaction(); // inizia la transazione


                $query = 'DROP DATABASE IF EXISTS ' . $database . ';
                      CREATE DATABASE ' . $database . ' ;
                      USE ' . $database . ';'; // costruisce il database

                $query = $query . file_get_contents('CreateTables.txt'); // aggiunge tables alla query
                $db->exec($query);
                $db->commit();

                //costruisce il file config.inc.php
                $file = fopen('config.inc.php', 'w');
                $script = '<?php $address= \'localhost\'; $database= \'' . $database . '\'; $admin= \'' . $admin . '\';$pass= \'' . $pass . '\'; ?>';
                fwrite($file, $script);
                fclose($file);
                $db = null;
                return true;
            }
            else {
                $this->PDOException="Inserisci un nome al database";
                return false;
            }
        }
        catch (PDOException $e)
        {
            //echo "Errore : " . $e->getMessage();
            $this->PDOException=$e->getMessage();
            //$db->rollBack();
            //die;
            return false;
        }
    }
}