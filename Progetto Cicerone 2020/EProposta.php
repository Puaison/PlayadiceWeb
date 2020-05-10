<?php

/**
 * 
 */
class EProposta extends EObject {

    /**
     * Riferimento all'avatar della proposta
     */
    private EAvatar $Modificato;

    /**
     * Riferimento all'avatar proposto
     */
    private EAvatar $Proposto;

    /**
     * Tipo della proposta descritto da una stringa
     * Possibilita: Crea/Mod1ifica/Cancella
     * TODO:ENUM
     */
    private string $TipoProposta;

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
     * @return EAvatar
     */
    public function getModificato() : EAvatar
    {
        {
            return $this->Modificato;
        }
    }

    /**
     *
     * @return EAvatar
     */
    public function getProposto() : EAvatar
    {
        {
            return $this->Proposto;
        }
    }

    /**
     *
     * @return string
     */
    public function getTipoProposta() : string
    {
        {
            return $this->TipoProposta;
        }
    }

    /****************************************** SETTER **************************************************/

    /**
     * Imposta il livello dell'avatar
     * @param EAvatar $Mod livello dell'avatar
     */
    public function setModificato(EAvatar $Mod)
    {
        {
            $this->Modificato=$Mod;
        }
    }

    /**
     * Imposta il livello dell'avatar
     * @param EAvatar $Prop livello dell'avatar
     */
    public function setProposto(EAvatar $Prop)
    {
        {
            $this->Proposto=$Prop;
        }
    }

    /**
     * Imposta il livello dell'avatar
     * @param string $TipoProposta livello dell'avatar
     */
    public function setTipoProposta(string $TipoProposta)
    {
        {
            $this->TipoProposta=$TipoProposta;
        }
    }


    /**
     */
    public function ApprovaAvatar()
    {
        unset($this->Modificato);

    }

}