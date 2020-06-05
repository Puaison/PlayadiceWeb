<?php
/**
 * Class EFascia Rappresenta la durata di un Evento.
 */
class EFascia extends EObject
{
    /**
     * @var DateTime Data di Inizio dell'Evento
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
     * @param DateTime $date
     */
    public function setData(DateTime $date){
        $this->inizio=$date;}
    /**
     * Metodo per impostare la durata dell'evento
     * @param DateTime $date data di fine dell'evento per il calcolo della durata
     */
    public function setDurata(DateTime $date){$this->durata=date_diff($date,$this->inizio);}
    /**                                        METODI GET
     *
     * Metodo che restituisce la data di inizio
     * @return DateTime La data di inizio
     */
    public function getData() : DateTime {return $this->inizio;}
    /**
     *
     * Metodo che restituisce la durata dell'evento
     * @return DateInterval la durata
     */
    public function getDurata(): DateInterval{return $this->durata;}

    /**
     *
     * Metodo che restituisce la fascia oraria in formato stringa
     * @return string
     */
    public function __toString(){
        return $string="DATA DI INIZIO: ". date_format($this->inizio,"d/m/Y H:i:s")." | DURATA: ". $this->durata->format("%Y%M%d%H%i%s");
        }
}