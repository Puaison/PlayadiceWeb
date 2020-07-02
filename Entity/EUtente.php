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


    function validateEsistenza() : bool
    {
        if (!FPersistantManager::getInstance()->exists("utente", "UserName", $this->getUsername()))
        {
            return true;
        }
        else
            return false;
    }

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
     * Metodo che verifica se l'email dell'istanza sia corretta. Una password corretta
     * deve contenere almeno un numero, almeno una lettera minuscola e almeno una lettera maiuscola
     * @return bool true se la password e' corretta, false altrimenti
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

    function validateUsername() : bool
    {
        if ($this->Username && preg_match('/^[a-zA-Z0-9_-]{6,20}$/', $this->Username))
        {
            return true;
        }
        else
            return false;
    }

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