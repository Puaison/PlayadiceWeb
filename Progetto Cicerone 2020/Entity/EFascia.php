<?php


/**
 * Class EFascia Rappresenta la durata di un Evento.
 */
class EFascia extends EObject
{
    /**
     * @var EData Data di Inizio dell'Evento
     */
    private $inizio;
    /**
     * @var DateInterval Durata dell'Evento
     */
    private $durata;

    /**
     * EFascia constructor. Inizializza un oggetto EFascia vuoto
     *
     */
    public function __construct(){
        parent::__construct();

    }

    /**
     *                                            METODI SET
     *
     * Metodo per impostare la data di inizio
     * @param EData $date
     */
    public function setDate(EData $date){$this->inizio=$date;}
    /**
     * Metodo per impostare la durata dell'evento
     * @param EData $date data di fine dell'evento per il calcolo della durata
     */
    public function setDurata(EData $date){$this->durata=date_diff($date->getDateTime(),$this->inizio->getDateTime());}

    /**                                        METODI GET
     *
     * Metodo che restituisce la data di inizio
     * @return EData La data di inizio
     */

    public function getData() : EData {return $this->inizio;}

    /**
     *
     * Metodo che restituisce la durata dell'evento
     * @return DateInterval la durata
     */
    public function getIntervallo(): DateInterval{return $this->durata;}


    /**
     *
     * Metodo che restituisce la fascia oraria in formato stringa
     * @return string
     */
    public function __toString(){
        return $string="DATA DI INIZIO: ". $this->inizio->__toString()." | DURATA: ". $this->durata->format("%Y%M%d%H%i%s");
        }
}