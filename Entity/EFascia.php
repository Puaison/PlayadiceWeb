<?php
/**
 * Class EFascia Rappresenta la durata di un Evento.
 */
class EFascia extends EObject
{
    /**
     * @var DateTime Data di Inizio dell'Evento
     */
    private $idEvento;
    private $inizio;
    /**
     * @var DateInterval Durata dell'Evento
     */
    private $durata;
    private $fine;
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
    public function setFine(DateTime $data){
        $this->fine=$data;
    }
    public function setData(DateTime $date){
        $this->inizio=$date;}
    /**
     * Metodo per impostare la durata dell'evento
     * @param DateTime $date data di fine dell'evento per il calcolo della durata
     */
    public function setDuratafromDate(DateTime $date){$this->durata=date_diff($date,$this->inizio);}
    public function setDurata(DateInterval $dateinterval){$this->durata=$dateinterval;}
    public function setIdEvento(int $idevento){$this->idEvento=$idevento;}
    /**                                        METODI GET
     *
     * Metodo che restituisce la data di inizio
     * @return DateTime La data di inizio
     */

    public function getIdEvento(): int {return $this->idEvento;}
    public function getDataStr() : String {return date_format($this->inizio,"d/m/Y H:i:s");}
    public function getData() : DateTime {return $this->inizio;}
    public function getFine() : String {return date_format($this->fine,"d/m/Y H:i:s");}
    public function getDataFine(): String{
        $inizio=clone $this->inizio;
        $durata=clone $this->durata;
        $diff=date_format(date_add($inizio,$durata),"d/m/Y H:i:s");



        return $diff;
        }
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
        return $string="DATA DI INIZIO: ". date_format($this->inizio,"d/m/Y H:i:s")." | DURATA: ". $this->durata->format("%Y,%M,%d,%H,%i,%s");
        }

}