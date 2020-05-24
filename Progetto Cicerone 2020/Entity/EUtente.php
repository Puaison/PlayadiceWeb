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
    function getModeratore() : bool
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

    /**
     * Funzione che controlla se tutti i parametri dell'utente registrato sono istanziati e validi
     */
    function isValid() : bool
    {
        //TODO CODE
        return true;
    }

}