<?php


/**
 * Class EPrenotazione Rappresenta la prenotazione che un utante può fare ad un evento
 */
class EPrenotazione extends EObject
{
    /**
     * @var EData Giorno in cui è stata effettuata la prenotazione
     */
    private $giornoPrenotazione;
    /**
     * @var EUtente Utente che ha effettuato la prenotazione
     */
    private EUtente $utente;

    /**
     * EPrenotazione constructor.Inizializza un oggetto Prenotazione vuoro
     */
    function __construct()
    {
        parent::__construct();
        $this->giornoPrenotazione= new EData();
        $this->utente= new EUtente();
    }


    /**
     *
     *                                                   METODI SET
     * Metodo per impostare l'utente
     * @param EUtente $utente l'utente
     */
    function setUtente(EUtente $utente){$this->utente=$utente;}

    /**
     * Metodo per impostare la data di creazione della prenotazione
     * @param EData $date la data della prenotazione
     */
    function setDate(EData $date){$this->giornoPrenotazione=$date;}

    /**
     * Metodo che restituisce l'utente che ha fatto la prenotazione
     * @return EUtente
     */
    function getUtente(){return $this->utente;}

    /**
     * Metodo che restituisce la data di creazione della prenotazione
     * @return EData
     */
    function getDate(){return $this->giornoPrenotazione;}

    /**
     * Metodo che restituisce le informazioni della prenotazione in forma di stringa
     * @return string
     */
    function __toString()
    {
        return $print= "NOME: " . $this->utente->getName() . " | COGNOME: " . $this->utente->getSurname() . " | DATA DI PRENOTAZIONE: ". $this->getDate();
    }


}

