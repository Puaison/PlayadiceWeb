<?php

/**
 * Class ELuogo caratterizza i luoghi dove si tengono gli Eventi (rappresentati da
 * EEvento.
 */
class ELuogo extends EObject
{
    /**
     * Indirizzo del luogo
     */
    private  $via;
    /**
     * Città del Luogo
     */
    private $citta;
    /**
     * Cap del Luogo
     */
    private $cap; //controllo 5 numeri

    /**
     * ELuogo constructor. Instanzia un oggetto ELuogo vuoto
     */
    public function __construct()
    {
        $this->via='';
        $this->citta='';
        $this->cap='';
    }

    /**                                               METODI SET
     *
     *
     * Metodo che imposta la Via dove si terrà l'Evento
     * @param String $address L'indirizzo
     */
    public function setVia(string $address){$this->via=$address;}

    /**
     * Metodo che imposta la città dove si terrà l'evento
     * @param $city La Città
     */
    public function setCitta($city){$this->citta=$city;}

    /**
     * Metodo che imposta il CAP della Cittò
     * @param $cap Il Cap
     */
    public function setCap($cap){$this->cap=$cap;}

    /**
     *
     *
     *                                                 METODI GET
     *
     * Metodo che fornisce la Via del Luogo
     * @return string la via
     */
    function getVia():string {return $this->via;}

    /**
     * Metodo che fornisce la città del Luogo
     * @return string la cittò
     *
     */
    public function getCitta():string {return $this->citta;}

    /**
     * Metodo che fornisce il cap della città
     * @return string il cap
     */
    public function getCap():string {return $this->cap;}

    /**
     * Funzione che trasforma in una stringa l'oggetto
     * @return string stringa rappresentante le informazioni sull'oggetto
     */
    public function __toString() : string
    {
        $string= "VIA: " . $this->getVia() . " | CITTA': " . $this->getCitta() . " | CAP: ". $this->getCap();
        return $string;
    }

}