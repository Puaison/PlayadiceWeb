<?php

/**
 * La classe EGiocoInfo e' pensata per contenere tutte le informazioni sul Gioco che non
 * sono necessarie in fase di Preview e Selezione. Proprio per questo, estende
 * la classe EObject avendo come id lo stesso identificativo del EGioco a cui appartiene.
 * @package Entity
 */

class EGiocoInfo extends EObject
{
    /** La descrizione del gioco */
    private $Descrizione;

    /** Il numero massimo di giocatori che possono partecipare a quel gioco */
    private $NumeroMax;

    /** Il numero minimo di giocatori che possono partecipare a quel gioco */
    private $NumeroMin;

    /** La Casa Editrice che ha prodotto/pubblicato quel Gioco */
    private $CasaEditrice;

    function __construct()
    {
        parent::__construct();
    }


    /****************************************** GETTER **************************************************/
    /**
     *
     * @return string La Descrizione del gioco
     */
    public function getDescrizione() : string {

        return $this->Descrizione;

    }

    /**
     *
     * @return int Il numero massimo di giocatori del gioco
     */
    public function getMax() : int {

        return $this->NumeroMax;

    }

    /**
     *
     * @return int Il numero minimo di giocatori del gioco
     */
    public function getMin() : int {

        return $this->NumeroMin;

    }
    /**
     *
     * @return string La Casa Editrice del gioco
     */
    public function getCasaEditrice() : string {

        return $this->CasaEditrice;

    }

    /********************************************** SETTER ************************************************/

    /**
     *
     * @param  string La Descrizione del gioco
     */
    public function setDescrizione(string $desc) {

        $this->Descrizione=$desc;

    }

    /**
     *
     * @param  int Il numero massimo di giocatori del gioco
     */
    public function setMax(int $max)  {

        $this->NumeroMax=$max;

    }

    /**
     *
     * @param  int Il numero minimo di giocatori del gioco
     */
    public function setMin(int $min)  {

        $this->NumeroMin=$min;

    }
    /**
     *
     * @param  string La Casa Editrice del gioco
     */
    public function setCasaEditrice(string $casa) {

        $this->CasaEditrice=$casa;

    }
    /********************************************** ALTRE FUNZIONI ************************************************/


    /**
     * Metodo che controlla se la descrizione del gioco inserito è lungo meno di 3000 caratteri,
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
    function validateDescrizione() : bool
    {
        if ($this->Descrizione && strlen($this->Descrizione)<=3000 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9 -])+$/ui', $this->Descrizione))
        {
            return true;
        }
        else
            return false;
    }
    /**
     * Metodo che controlla se il numero massimo di giocatori è minore di 100,
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
    function validateNumMax() : bool
    {

        if ($this->NumeroMax<=99)
        {
            return true;
        }
        else
            return false;
    }
    /**
     * Metodo che controlla se il numero massimo di giocatori è maggiore di 0,
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
    function validateNumMin() : bool
    {

        if ($this->NumeroMax>=1)
        {
            return true;
        }
        else
            return false;
    }
    /**
     * Metodo che controlla se la casa editrice inserita sia lungo meno di 40 caratteri,
     * e che contenga solo lettere, numeri e spazi
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
    function validateCasaEditrice() : bool
    {
        if ($this->CasaEditrice && strlen($this->CasaEditrice)<=40 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9 -])+$/ui', $this->CasaEditrice))
        {
            return true;
        }
        else
            return false;
    }

}