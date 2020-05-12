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

        $this->NumeroMax=$min;

    }
    /**
     *
     * @param  string La Casa Editrice del gioco
     */
    public function setCasaEditrice(string $casa) {

        $this->CasaEditrice=$casa;

    }
    /********************************************** ALTRE FUNZIONI ************************************************/



}