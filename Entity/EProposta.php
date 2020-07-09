<?php

/**
 * La classe proposta ha la funzione di mantenere in modo compatto le informazioni per la
 * gestione di un avatar che è rimasta sospesa a tempo indeterminato
 */
class EProposta extends EObject {

    /**
     * Riferimento all'avatar che va a essere modificato
     */
    private ?EAvatar $Modificato;

    /**
     * Riferimento all'avatar proposto per la modifica
     */
    private ?EAvatar $Proposto;

    /**
     * Tipo della proposta descritto da una stringa
     * Possibilita: Crea/Mod1ifica/Cancella
     */
    private string $TipoProposta;

    /**
     * Costruttore di default
     */
    public function __construct()
    {
        parent::__construct();
    }

    /****************************************** GETTER **************************************************/

    /**
     * @return EAvatar che va a essere modificato
     */
    public function getModificato() : ?EAvatar
    {
        {
            return $this->Modificato;
        }
    }

    /**
     *
     * @return EAvatar proposto per la modifica
     */
    public function getProposto() : ?EAvatar
    {
        {
            return $this->Proposto;
        }
    }

    /**
     * @return string Tipo della proposta (Possibilita: Crea/Mod1ifica/Cancella)
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
    public function setModificato(?EAvatar $Mod)
    {
        {
            $this->Modificato=$Mod;
        }
    }

    /**
     * Imposta Il personaggio che viene proposto
     * @param EAvatar $Prop livello dell'avatar
     */
    public function setProposto(?EAvatar $Prop)
    {
        {
            $this->Proposto=$Prop;
        }
    }

    /**
     * Imposta Il tipo di proposta
     * @param string $TipoProposta Stringa del tipo: "Creazione" "Modifica" "Cancellazione"
     */
    public function setTipoProposta(string $TipoProposta)
    {
        {
            $this->TipoProposta=$TipoProposta;
        }
    }

    /**
     * Funzione che cambia l'avatar iniziale affinchè i suoi valori corrispondano all'avatar proposto
     */
    public function approvaProposta()
    {
        $this->Modificato->setNome($this->Proposto->getNome());
        $this->Modificato->setClasse($this->Proposto->getClasse());
        $this->Modificato->setLivello($this->Proposto->getLivello());
        $this->Modificato->setRazza($this->Proposto->getRazza());
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