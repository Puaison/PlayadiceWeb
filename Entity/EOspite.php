<?php

/**
 * Classe che caratterizza un utente di tipo ospite in quanto tale
 */
class EOspite extends EUtente
{
    /****************************************** COSTRUTTORE **************************************************/

    /**
     * Costruttore specifico per utenti ospiti
     */
    public function __construct()
    {
        parent::__construct();

        /*
        unset($this->Mail);
        unset($this->Cognome);
        unset($this->Nome);
        unset($this->Password);
        unset($this->Username);
        */
        $this->Username="Ospite";
    }
}