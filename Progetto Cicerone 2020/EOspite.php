<?php


class EOspite extends EUtente
{
    /****************************************** COSTRUTTORE **************************************************/

    /**
     * Costruttore specifico per utenti ospiti
     */
    public function __construct()
    {
        parent::__construct();

        unset($this->Mail);
        unset($this->Cognome);
        unset($this->Nome);
        unset($this->Password);

        $this->id=0;
        $this->Username="Ospite";
    }
}