<?php

/**
 *
 */
class EVoceInventario extends EObject {

    /**
     * Nome della voce inventario
     */
    private string $Nome;

    /**
     * Quantità della voce
     */
    private string $Quantita;

    /****************************************** COSTRUTTORE **************************************************/

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
     * @return string
     */
    public function getQuantita() : string
    {
        {
            return $this->Quantita;
        }
    }

    /****************************************** SETTER **************************************************/

    /**
     * Imposta il nome della voce
     * @param string $Nome nome dell'oggetto
     */
    public function setNome(string $Nome)
    {
        {
            $this->Nome=$Nome;
        }
    }
    /**
     * Imposta la quantità della voce sotto forma di stringa
     * @param string $Qnt Quantità dell'oggetto
     */
    public function setQuantita(string $Qnt)
    {
        {
            $this->Nome=$Qnt;
        }
    }

}