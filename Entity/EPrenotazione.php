<?php


/**
 * Class EPrenotazione Rappresenta la prenotazione che un utente può fare ad un evento
 */
class EPrenotazione extends EObject
{
    /**
     * @var DateTime Giorno in cui è stata effettuata la prenotazione
     */
    private $giornoPrenotazione;
    /**
     * @var EUtente Utente che ha effettuato la prenotazione
     */
    private  $utente;
    /**
     * @var int Evento al quale la prenotazione si riferisce
     */
    private  $idEvento;

    /**
     * EPrenotazione constructor.Inizializza un oggetto Prenotazione vuoro
     */
    function __construct()
    {
        $this->giornoPrenotazione = date_create();
        parent::__construct();
    }



     ///                                                  METODI SET
    ///
     /**
     * Metodo per impostare l'utente
     * @param EUtente $utente l'utente
     */
    function setUtente(EUtente $utente){$this->utente=$utente;}
    /**
     * Metodo per impostare l'evento associato'
     * @param int $idEvento l'evento a cui si riferisce
     */
    function setIdEvento(int $idEvento){$this->idEvento=$idEvento;}
    /**
     * Metodo per impostare la data di creazione della prenotazione
     * @param DateTime $date la data della prenotazione
     */
    function setData(DateTime $date){$this->giornoPrenotazione=$date;}

    /**
     * Metodo che restituisce l'utente che ha fatto la prenotazione
     * @return EUtente
     */
    function getUtente():EUtente{return $this->utente;}
    /**
     * Metodo per recuperare l'evento associato'
     * @param int $idEvento l'evento a cui si riferisce
     */
    function getIdEvento(): int {return $this->idEvento;}
    /**
     * Metodo che restituisce la data di creazione della prenotazione
     * @return DateTime
     */
    function getData(): DateTime {return $this->giornoPrenotazione;}

    /**
     * Metodo che restituisce la data in un formato viabile per visualizzazione
     * @return string
     */
    function getDataStr(): string {return date_format($this->giornoPrenotazione,"d/m/Y H:i:s");}

    /**
     * Metodo che restituisce le informazioni della prenotazione in forma di stringa
     * @return string
     */
    function __toString()
    {
        return $print= "NOME: " . $this->utente->getNome() . " | COGNOME: " . $this->utente->getCognome() . " | DATA DI PRENOTAZIONE: ". date_format($this->getData(),"d/m/Y H:i:s");
    }


}

