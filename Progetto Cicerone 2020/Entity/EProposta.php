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
     * Imposta Il personaggio che presumibilmente andrà modificato
     * @param EAvatar $Mod livello dell'avatar
     */
    public function setModificato(EAvatar $Mod)
    {
        {
            $this->Modificato=$Mod;
        }
    }

    /**
     * Imposta Il personaggio che viene proposto
     * @param EAvatar $Prop livello dell'avatar
     */
    public function setProposto(EAvatar $Prop)
    {
        {
            $this->Proposto=$Prop;
        }
    }

    /**
     * Imposta Il tipo di proposta
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
    public function approvaProposta()
    {
        $this->Modificato=$this->Proposto;
    }

    public function tostring() :string
    {
        $s= "";
        if (isset($this->id))
            $s= $s. "ID:" . $this->id . "\n";
        if (isset($this->Modificato))
            $s= $s. "Modificato:" . $this->getModificato()->tostring() . "\n";
        if (isset($this->Proposto))
            $s= $s. "Proposto:" . $this->getProposto()->tostring() . "\n";
        $s= $s. "Tipo:" . $this->getTipoProposta() . "\n";
        return $s;
    }

}