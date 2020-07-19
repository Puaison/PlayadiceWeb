<?php
/**
 * 
 */
class EAvatar extends EObject {

    /**
     * Stringa con nome dell'avatar
     */
    private $Nome;

    /**
     * Intero con il livello dell'avatar
     */
    private $Livello;

    /**
     * Stringa con la classe dell'avatar
     */
    private $Classe;

    /**
     * Stringa con la Razza dell'avatar
     */
    private $Razza;

    /**
     * EUser rappresentante la persona associata a questo avatar
     */
    private $Proprietario;

    /****************************************** CONSTRUCTORS **************************************************/
    /**
     * Default constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->Nome="Default";
        $this->Livello=-1;
        $this->Classe="Default";
        $this->Razza="Default";
        $this->Proprietario=null;
    }

    /****************************************** GETTER **************************************************/
    /**
     * @return string contenente il nome
     */
    public function getNome() : string
    {
        {
            return $this->Nome;
        }
    }

    /**
     *
     * @return int contenente il livello
     */
    public function getLivello() : int
    {
        {
            return $this->Livello;
        }
    }

    /**
     * @return string contenente la classe dell'avatar
     */
    public function getClasse() : string
    {
        {
            return $this->Classe;
        }
    }

    /**
     * @return string contenente la razza dell'avatar
     */
    public function getRazza() : string
    {
        {
            return $this->Razza;
        }
    }

    /**
     * @return EUtente che rappresenta il proprietario dell'avatar
     */
    public function getProprietario() : ?EUtente
    {
        {
            return $this->Proprietario;
        }
    }

    /********************************************** SETTER ************************************************/

    /**
     * Imposta il nome dell'avatar
     * @param string $Nome nome dell'avatar
     */
    public function setNome(string $Nome)
    {
        {
            $this->Nome=$Nome;
        }
    }

    /**
     * Imposta il livello dell'avatar
     * @param int $Liv livello dell'avatar
     */
    public function setLivello(int $Liv)
    {
        {
            $this->Livello=$Liv;
        }
    }

    /**
     * Imposta la classe dell'avatar
     * @param string $Classe classe dell'avatar
     */
    public function setClasse(string $Classe)
    {
        {
            $this->Classe=$Classe;
        }
    }

    /**
     * Imposta la razza dell'avatar
     * @param string razza dell'avatar
     */
    public function setRazza(string $raz)
    {
        {
            $this->Razza=$raz;
        }
    }

    /**
     * Imposta l'utente proprietario dell'avatar
     * @param EUtente $User proprietario dell'avatar
     */
    public function setProprietario(EUtente $User)
    {
        {
            $this->Proprietario=$User;
        }
    }
    /********************************************** Validazione ************************************************/
    /********* Metodi che usano espressioni regolari per controllare se i campi dell'avatar abbiano effettivamente senso in quanto tali *******/
    function validateNome() : bool
    {
        if ($this->Nome && strlen($this->Nome)<=40 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9])+$/ui', $this->Nome))
        {
            return true;
        }
        else
            return false;
    }

    function validateRazza() : bool
    {
        if ($this->Razza && strlen($this->Razza)<=40 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9 -])+$/ui', $this->Razza))
        {
            return true;
        }
        else
            return false;
    }

    function validateClasse() : bool
    {
        if ($this->Classe && strlen($this->Classe)<=40 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9 -])+$/ui', $this->Classe))
        {
            return true;
        }
        else
            return false;
    }

    function validateLivello() : bool
    {
        if ($this->Livello && $this->Livello<=60 && $this->Livello>=(-10))
        {
            return true;
        }
        else
            return false;
    }
    /********************************************** ALTRO ************************************************/
    public function tostring() :string
    {
        $s= "";
        if (isset($this->id))
            $s= $s. "ID:" . $this->id . "\n";
        if (isset($this->Proprietario))
            $s= $s. "Username Proprietario:" . $this->getProprietario()->getUsername() . "\n";
        $s= $s. "Classe:" . $this->getClasse() . "\n";
        $s= $s. "Razza:" . $this->getRazza(). "\n";
        $s= $s. "Nome:" . $this->getNome() . "\n";
        $s= $s. "Livello:" . $this->getLivello() . "\n";
        return $s;
    }

}