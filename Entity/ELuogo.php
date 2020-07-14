<?php

/**
 * Class ELuogo caratterizza un luogo.
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
    private $cap;

    /**
     * Nome del Luogo
     */
    private $nome;

    /**
     * ELuogo constructor. Instanzia un oggetto ELuogo vuoto
     */
    public function __construct()
    {
        parent::__construct();
    }

   ///                                           METODI SET

    /**
     * Metodo che imposta la Via dove si terrà l'Evento
     * @param String $address L'indirizzo
     */

    public function setVia(string $address){$this->via=$address;}
    public function setNome(string $nome){$this->nome=$nome;}
    /**
     * Metodo che imposta la città dove si terrà l'evento
     * @param string $city la Città
     */
    public function setCitta($city){$this->citta=$city;}

    /**
     * Metodo che imposta il CAP della Cittò
     * @param int $cap il Cap
     */
    public function setCap($cap){$this->cap=$cap;}


     //                                              METODI GET
    /**
     * Metodo che fornisce la Via del Luogo
     * @return string la via
     */
    public  function getVia():string {return $this->via;}

    /**
     * Metodo che fornisce il Nome del Luogo
     * @return string il nome
     */
    public function getNome():string {return $this->nome;}
    /**
     * Metodo che fornisce la città del Luogo
     * @return string la cittò
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
        return $string= $this->getNome(). " "."<br> VIA: " . $this->getVia() . " | CITTA': " . $this->getCitta() . " | CAP: ". $this->getCap()."</<br>";
    }
    /**
     * Metodo che controlla se la via del luogo inserita è lungo meno di 45  caratteri e ha solo numeri, lettere e spazi
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
    function validateVia() : bool
    {
        if ($this->via && strlen($this->via)<=40 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9 -])+$/ui', $this->via))
        {
            return true;
        }
        else
            return false;
    }
    /**
     * Metodo che controlla se il nome del luogo inserito è lungo meno di 45  caratteri e ha solo numeri, lettere e spazi
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
    function validateNome() : bool
    {
        if ($this->nome && strlen($this->nome)<=40 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9 -])+$/ui', $this->nome))
        {
            return true;
        }
        else
            return false;
    }
    /**
     * Metodo che controlla se la città del luogo inserito è lungo meno di 45  caratteri e ha solo numeri, lettere e spazi
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
    function validateCitta() : bool
    {
        if ($this->via && strlen($this->via)<=40 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9 -])+$/ui', $this->via))
        {
            return true;
        }
        else
            return false;
    }
    /**
     * Metodo che controlla se il cap del luogo inserito è lungo  5  caratteri e ha solo numeri
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
   function validateCap() : bool
    {

        if($this->cap && strlen($this->cap)==5 && is_numeric($this->cap))
        {
            return true;
        }
        else
            return false;
    }


}