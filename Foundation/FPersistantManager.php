<?php

/**
 * Lo scopo di questa classe e' quello di fornire un accesso unico al DBMS, recuperando le query e generando oggetti attraverso
 * metodi statici di tutte le altre classi Foundation, cosi che l'accesso
 * ai dati persistenti da parte degli strati superiore dell'applicazione sia piu' intuitivo.
 */
class FPersistantManager
{

    /** l'unica istanza della classe */
    private static $instance = null;
    /** oggetto PDO che effettua la connessione al dbms */
    private $db;

    /***********************************    METODI DI INIZIALIZZAZIONE     *********************************/

    /**
     * Inizializza un oggetto FPersistantManager. Metodo privato per evitare
     * duplicazioni dell'oggetto.
     */
    private function __construct()
    {
        try {
            global $address, $admin, $pass, $database;
                $this->db = new PDO ("mysql:host=$address;dbname=$database", $admin, $pass);


        } catch (PDOException $e) {
            echo "Errore : " . $e->getMessage();
            die;
        }
    }

    /**
     * Metodo che chiude la connessione al dbms.
     */
    function __destruct()
    {
        $this->db = null;
        static::$instance = null;
    }

    /**
     * Metodo reso privato per evitare la clonazione dell'oggetto. (Rottura Singleton)
     */
    private function __clone()
    {
    }

    /**
     * Metodo che restituisce l'unica istanza dell'oggetto.
     * @return FPersistantManager l'istanza dell'oggetto.
     */
    static function getInstance(): FPersistantManager
    {
        if (static::$instance == null) {
            static::$instance = new FPersistantManager();
        }
        return static::$instance;
    }

    /****************************************** SEARCH **************************************************/

    /**
     * Effettua una ricerca sul database secondo vari parametri.
     * @param string $key la table da cui prelevare i dati
     * @param string $value il metodo da richiamare nelle classi foundation
     * @param string $str il dato secondo cui fare la search
     * @return array|NULL i risultati ottenuti dalla ricerca. Se la richiesta non ha match, ritorna NULL.
     */
    function search(string $key, string $value, string $str)
    {
        $sql = '';
        $className = 'F'.$key;

        if(class_exists($className))
        {
            $method = 'search'.$key.'By'.$value;
            if(method_exists($className, $method))
                $sql = $className::$method();

        }

        if($sql)
            return $this->execSearch('F'.$key, $value, $str, $sql);
        else return NULL;
    }

    private function execSearch(string $className, string $value, string $str, string $sql)
    {
        try
        {
            $stmt = $this->db->prepare($sql); // creo PDOStatement
            $stmt->bindValue(":".$value, $str, PDO::PARAM_STR);
            $stmt->execute();   //viene eseguita la query
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del db verranno salvati in un array con indici le colonne della table
            $obj = NULL; // l'oggetto di ritorno viene definito come NULL
            while($row = $stmt->fetch())
            { // per ogni tupla restituita dal db...
                $obj[] = FPersistantManager::createObjectFromRow($className, $row); //...istanzio l'oggetto
            }
            //$this->__destruct(); // chiude la connessione

            return $obj;
        }
        catch (PDOException $e)
        {
            //$this->__destruct(); // chiude la connessione
            return null; // ritorna null se ci sono errori
        }
    }

    /****************************************** Exists(?) **************************************************/

    /**
     * Effettua un controllo di esistenza sul database secondo vari parametri.
     * @param string $key la table da cui prelevare i dati
     * @param string $value il valore per cui cercare i valori
     * @param string $str il dato richiesto dall'utente
     * @return boolean True se esiste almeno una corrispondenza. Se la richiesta non ha match, ritorna false.
     */
    function exists(string $key, string $value, string $str)
    {
        $sql = '';
        $className = 'F'.$key;

        if(class_exists($className))
        {
            $method = 'search'.$key.'By'.$value;
            if(method_exists($className, $method))
                $sql = $className::$method();
        }


        if($sql)
            return $this->execExists($value, $str, $sql);
        else return NULL;
    }

    private function execExists(string $value, string $str, string $sql)
    {
        try
        {
            $stmt = $this->db->prepare($sql); // creo PDOStatement
            $stmt->bindValue(":".$value, $str, PDO::PARAM_STR);
            $stmt->execute();   //viene eseguita la query
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del db verranno salvati in un array con indici le colonne della table

            $found = 0;
            while($row = $stmt->fetch())
            { // per ogni tupla restituita dal db...
                $found = $found + 1;
            }

            //$this->__destruct(); // chiude la connessione

            return $found;
        }
        catch (PDOException $e)
        {
            //$this->__destruct(); // chiude la connessione
            return null; // ritorna null se ci sono errori
        }
    }

    /****************************************** STORE ********************************************/

    /**
     * Metodo che permette di salvare informazioni contenute in un oggetto
     * Entity sul database.
     * @param object $obj l'oggetto da salvare
     * @return bool $result il risultato dell'elaborazione
     */
    function store(&$obj) : bool
    {

        $result = false;
        $sql = '';
        $class = '';
        if(is_a($obj, EAdmin::class) ) // se l'oggetto e' una tipologia Utente
            $class = get_parent_class($obj); // si considera la classe padre, EUtente
        else
            $class = get_class($obj); // restituisce il nome della classe dall'oggetto

        $resource = substr($class,1); // nome della risorsa (Utente, Avatar, Gioco ...)
        $foundClass = 'F'.$resource; // nome della rispettiva classe Foundation
        $method = 'store'.$resource; // nome del metodo store+nome_risorsa

        if(class_exists($foundClass) && method_exists($foundClass, $method))  // se la classe esiste e il metodo pure...
            $sql = $foundClass::$method($obj); //ottieni la stringa sql

        if($sql) //se la stringa sql esiste...
            $result = $this->execStore($obj, $sql); // ... esegui la query

        return $result;
    }

    private function execStore(&$obj, string $sql)
    {

        $this->db->beginTransaction(); //inizio della transazione
        $stmt = $this->db->prepare($sql);


        // si prepara la query facendo un bind tra parametri e variabili dell'oggetto
        try
        {
            FPersistantManager::bindValues($stmt, $obj); // si associano i valori dell'oggetto alle entry della query

            $stmt->execute();

            if ($stmt->rowCount()) // si esegue la query
            {
                if (method_exists($obj, 'getId') && $obj->getId() == 0){ // ...se il valore e' di default si assegna l'id
                    $obj->setId($this->db->lastInsertId()); // assegna all'oggetto l'ultimo id dato dal dbms
                }
                $commit = $this->db->commit(); // effettua il commit

                //$this->__destruct(); // chiude la connessione

                return $commit; // ritorna il risultato del commit
            }
            else
            {
                // ...altrimenti si effettua il rollback e si ritorna false
                $this->db->rollBack();
                //$this->__destruct(); // chiude la connessione

                return false;
            }
        }
        catch (PDOException $e)
        {  // errore: rollback e return false

            $this->db->rollBack();
            //$this->__destruct(); // chiude la connessione

            return false;
        }
    }
    /******************************************* UPDATE *******************************************/

    /**
     * Metodo che permette di aggiornare informazioni sul database,
     * relative ad un oggetto;
     * @param $obj l'oggetto da aggiornare
     * @return true se l'update ha avuto successo, false altrimenti
     */
    function update($obj) : bool
    {
        $sql='';
        $class = '';
        if(is_a($obj, EAdmin::class) ) // se l'oggetto e' una tipologia Utente
            $class = get_parent_class($obj); // si considera la classe padre, EUtente
        else
            $class = get_class($obj); // restituisce il nome della classe dall'oggetto

        $resource = substr($class,1); // nome della risorsa (User, Song, UserInfo, ...)
        $foundClass = 'F'.$resource; // nome della rispettiva classe Foundation
        $method = 'update'.$resource; // nome del metodo update+nome_risorsa

        $sql = $foundClass::$method();

        $result = $this->execUpdate($obj, $sql); // ... esegui la query

        return $result;
    }

    private function execUpdate(&$obj, string $sql) : bool
    {
        $this->db->beginTransaction(); //inizio della transazione
        $stmt = $this->db->prepare($sql);
        //si prepara la query facendo un bind tra parametri e variabili dell'oggetto
        try
        {
            FPersistantManager::bindValues($stmt, $obj); //si associano i valori dell'oggetto alle entry della query
            if($stmt->execute()) //se la tupla e' alterata...
            {
                $commit = $this->db->commit(); // effettua il commit

                //$this->__destruct(); // chiude la connessione

                return $commit; //...ritorna il risultato del commit
            }
            else //altrimenti l'update non ha avuto successo...
            {
                $this->db->rollBack();
                //$this->__destruct(); // chiude la connessione
                return false; //...annulla la transazione e ritorna false
            }
        }
        catch (PDOException $e)
        {
            echo('Errore: '.$e->getMessage());
            $this->db->rollBack();
            //$this->__destruct(); // chiude la connessione

            return false;
        }
    }
    /************************************** REMOVE ************************************************/

    /**
     * Metodo che cancella dal database una entry di un particolare
     * oggetto Entity.
     * @param $obj l'oggetto da rimuovere
     * @return bool se l'operazione ha avuto successo o meno.
     */
    function remove($obj) : bool
    {
        $class='';
        $sql = '';
        if(is_a($obj, EAdmin::class) ) // se l'oggetto e' una tipologia Utente
            $class = get_parent_class($obj); // si considera la classe padre, EUtente
        else
            $class = get_class($obj); // restituisce il nome della classe dall'oggetto
        {
            $resource = substr($class, 1);
            $foundClass = 'F' . $resource;
            $method = 'remove' . $resource;

            $sql = $foundClass::$method();
        }
        if ($sql)
        {
            return $result = $this->execRemove($obj, $sql); // ... esegui la query
        }
        else
            return null;

    }

    private function execRemove(&$obj, string $sql) : bool {
        $stmt = $this->db->prepare($sql); //a partire dalla stringa sql viene creato uno statement
        try
        {
            //$Nick="badibba";
            //$stmt->bindValue(":Username", $Nick, PDO::PARAM_STR);
            //FUtente::removeUtente();
            FPersistantManager::bindValues($stmt, $obj); //si associano i valori dell'oggetto alle entry della query
            $result = $stmt->execute(); //esegue lo statement
            //$this->__destruct(); // chiude la connessione
            return $result; //ritorna il risultato

        }
        catch (PDOException $e)
        {
            //$this->__destruct();// chiude la connessione
            return FALSE;
            //ritorna false se ci sono errori
        }
    }

    /*****************************   ASSOCIAZIONI ENTITY - DB    *********************************/

    /**
     * Associa ai campi della query i corrispondenti valori dell'oggetto
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param mixed $obj L'oggetto con cui fare il BindValues
     */
    private function bindValues(PDOStatement &$stmt, &$obj)
    {
        $class = '';
        if(is_a($obj, EAdmin::class))
            $class = get_parent_class($obj);
        else
            $class = get_class($obj); // restituisce il nome della classe dall'oggetto

        $resource = substr($class,1); // nome della risorsa (User, Song, UserInfo, ...)
        $foundClass = 'F'.$resource; // nome della rispettiva classe Foundation

        $foundClass::bindValues($stmt, $obj); // associazione statement - EObject
    }

    /**
     * Da una tupla ricevuta da una query istanzia l'oggetto corrispondente
     * @param string $class il nome della classe (ottenibile tramite EClass::name )
     * @param $row array la tupla restituita dal dbms
     * @return mixed l'oggetto risultato dell'elaborazione
     */
    private function createObjectFromRow(string $class, $row)
    {
        $obj = NULL; //oggetto che conterra' l'istanza dell'elaborazione

        if ( class_exists( $class ) )
        {
            $foundClass = 'F'.substr($class,1);

            $obj = $foundClass::createObjectFromRow($row);
        }

        return $obj;
    }
}
