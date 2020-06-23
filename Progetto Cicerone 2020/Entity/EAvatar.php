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
     *
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
     *
     * @return string
     */
    public function getNome() : string
    {
        {
            return $this->Nome;
        }
    }

    /**
     *
     * @return int
     */
    public function getLivello() : int
    {
        {
            return $this->Livello;
        }
    }

    /**
     *
     * @return string
     */
    public function getClasse() : string
    {
        {
            return $this->Classe;
        }
    }

    /**
     *
     * @return array
     */
    public function getRazza() : string
    {
        {
            return $this->Razza;
        }
    }

    /**
     *
     * @return EUtente
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
     * Imposta l'inventario dell'avatar
     * @param string raz array contenente oggetti di tipo VoceInventario
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