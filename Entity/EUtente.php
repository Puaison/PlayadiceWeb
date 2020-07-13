<?php


class EUtente
{
    /** Il Nome dell'utente */
    protected string $Nome;

    /** Il Cognome dell'utente */
    protected string $Cognome;

    /** La Mail dell'utente */
    protected string $Mail;

    /** La password dell'utente */
    protected string $Password;

    /** L'username dell'utente' */
    protected string $Username;

    /****************************************** COSTRUTTORE **************************************************/

    /**
     * Default constructor
     */
    public function __construct()
    {
    }

    /****************************************** GETTER **************************************************/
    /**
     * @return string Il Nome dell'utente
     */
    function getNome() : string
    {
        return $this->Nome;
    }

    /**
     * @return string Il Cognome dell'utente
     */
    function getCognome() : string
    {
        return $this->Cognome;
    }

    /**
     * @return string La Mail dell'utente
     */
    function getMail() : string
    {
        return $this->Mail;
    }

    /**
     * @return string La Password dell'utente
     */
    function getPassword() : string
    {
       return $this->Password;
    }

    /**
     * @return string L' Username dell'utente
     */
    function getUsername() : string
    {
        return $this->Username;
    }

    /**
     * @return bool 0 poichè non è moderatore
     */
    static function getModeratore() : bool
    {
        return false;
    }

    /****************************************** SETTER **************************************************/

    /**
     * @param string $nome il nome dell'Utente
     */
    function setNome(string $nome) {
        $this->Nome=$nome;
    }

    /**
     * @param string $cognome il cognome dell'Utente
     */
    function setCognome(string $cognome) {
        $this->Cognome=$cognome;
    }

    /**
     * @param string $email il email dell'Utente
     */
    function setEmail(string $email) {
        $this->Mail=$email;
    }

    /**
     * @param string $password La password dell'Utente
     */
    function setPassword(string $password) {
        $this->Password=$password;
    }

    /**
     * @param string $username L' username dell'Utente
     */
    function setUsername(string $username) {
        $this->Username=$username;
    }

    /********************************************** ALTRE FUNZIONI ************************************************/


    /**Funzione che verifica se un dato Username è nel db
     * @return bool true se si è trovato
     */
    function validateEsistenza() : bool
    {
        if (FPersistantManager::getInstance()->exists("utente", "UserName", $this->getUsername()))
        {
            return true;
        }
        else
            return false;
    }

    /**
     * Metodo che verifica se l'email dell'istanza sia corretta. Una password corretta
     * deve contenere almeno un numero, almeno una lettera minuscola e almeno una lettera maiuscola
     * @return bool true se la mail e' corretta, false altrimenti
     */
    function validateMail() : bool
    {
        if($this->Mail && filter_var($this->Mail, FILTER_VALIDATE_EMAIL) && strlen($this->Mail)<=40)
        {
            return true;
        }
        else
            return false;
    }

    /**
     * Metodo che verifica se la password dell'istanza sia corretta. Una password corretta
     * deve contenere almeno 6 caratteri tutti ALFAnumerici
     * @return true se la password e' corretta
     */
    function validatePassword() : bool
    {
        if($this->Password && preg_match('/^[[:alnum:]]{6,20}$/', $this->Password)) // solo numeri-lettere da 6 a 20
        {
            return true;
        }
        else
            return false;
    }

    /**
     * Metodo che controlla la coerenza della password con il database
     * @return true se corrispondono
     */
    function checkPassword(): bool
    {
        $user = FPersistantManager::getInstance()->search("utente", "UserName", $this->getUsername());
        if($this->getPassword() == $user[0]->getPassword())
            return true;
        else
            return false;
    }


    /**
     * Metodo che controlla se lo username dell'utente inserito è lungo meno di 20 (più di 6) caratteri alfanumerici
     * @return true se le condizioni sono rispettate
     */
    function validateUsername() : bool
    {
        if ($this->Username && preg_match('/^[a-zA-Z0-9_-]{6,20}$/', $this->Username))
        {
            return true;
        }
        else
            return false;
    }

    /**
     * Metodo che controlla se il nome dell'utente inserito è lungo meno di 20 caratteri alfanumerici
     * @return true se le condizioni sono rispettate
     */
    function validateNome() : bool
    {
        if (ctype_alpha($this->Nome) && strlen($this->Nome)<=20)
        {
            strtolower($this->Nome);
            ucfirst($this->Nome);
            return true;
        }
        else
            return false;
    }

    /**
     * Metodo che controlla se il cognome dell'utente inserito è lungo meno di 30 caratteri alfanumerici
     * @return true se le condizioni sono rispettate
     */
    function validateCognome() : bool
    {
        if (ctype_alpha($this->Cognome) && strlen($this->Cognome)<=30)
        {
            strtolower($this->Cognome);
            ucfirst($this->Cognome);
            return true;
        }
        else
            return false;
    }



}