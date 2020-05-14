<?php
/**
 * 
 */
class EAvatar extends EObject {

    /**
     * Stringa con nome dell'avatar
     */
    private string $Nome;

    /**
     * Intero con il livello dell'avatar
     */
    private int $Livello;

    /**
     * Stringa con la classe dell'avatar
     */
    private string $Classe;

    /**
     * Array rappresentante l'inventario con oggetti di tipo VoceInventario
     */
    private array $Inventario;

    /**
     * EUser rappresentante la persona associata a questo avatar
     */
    private EUtente $Proprietario;

    /****************************************** CONSTRUCTORS **************************************************/
    /**
     * Default constructor
     */
    public function __construct()
    {
        parent::__construct();
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
    public function getInventario() : array
    {
        {
            return $this->Inventario;
        }
    }

    /**
     *
     * @return EUtente
     */
    public function getProprietario() : EUtente
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
     * @param array $Inv array contenente oggetti di tipo VoceInventario
     */
    public function setInventario(array $Inv)
    {
        {
            $this->Inventario=$Inv;
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
    /**
     * Tostring manuale per semplice comprensione
     */

}