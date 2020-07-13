<?php
/**
 * Class EFascia Rappresenta la durata di un Evento.
 */
class EFascia extends EObject
{
    /**
     * @var int Id dell'evento
     */
    private $idEvento;
    /**
     * @var DateTime Data di Inizio dell'Evento
     */
    private $inizio;
    /**
     * @var DateInterval Durata dell'Evento
     */
    private $durata;
    /**
     * @var DateTime Data di fine
     */
    private $fine;

    /**
     * EFascia constructor. Inizializza un oggetto EFascia vuoto
     */
    public function __construct()
    {
        parent::__construct();
    }


     //////////                  METODI SET
    /**
     * Metodo per impostare la data di fine
     * @param DateTime $date
     */
    public function setFine($data){
        $this->fine=$data;
    }

    /**
     * Metodo per impostare la data di inizio
     * @param DateTime|Bool $date
     */
    public function setData($date){
        $this->inizio=$date;}

    /**
     * Metodo per impostare la durata dell'evento
     * @param DateTime $date data di fine dell'evento per il calcolo della durata
     */
    public function setDuratafromDate($date)
    {
        if (is_bool($date))
        {
            $this->durata=$date;
        }
        else
        {
            $this->durata=date_diff($date,$this->inizio);
        }
    }

    /**
     * Per il set della durata della fascia
     * @param DateInterval $dateinterval
     */
    public function setDurata(DateInterval $dateinterval){$this->durata=$dateinterval;}

    /**
     * Set dell'ID dell'evento associato
     * @param int $idevento
     */
    public function setIdEvento(int $idevento){$this->idEvento=$idevento;}
           ////                             METODI GET
    ///
    ///
    ///
    /**
     * Metodo che restituisce l'id dell'evento
     * @return int l'id dell'evento
     */
    public function getIdEvento(): int {return $this->idEvento;}

    /**
     * @return string La data di inizio
     */
    public function getDataStr() : String {return date_format($this->inizio,"d/m/Y H:i:s");}

    /**
     * @return DateTime La data di inizio
     */
    public function getData() : DateTime {return $this->inizio;}

    /**
     * @return String Stringa con la data di fine
     */
    public function getFine() : String {return date_format($this->fine,"d/m/Y H:i:s");}

    /**
     * @return String Data di fine come stringa
     */
    public function getDataFine(): String
        {
        $inizio=clone $this->inizio;
        $durata=clone $this->durata;
        $diff=date_format(date_add($inizio,$durata),"d/m/Y H:i:s");
        return $diff;
        }

    /**
     * Metodo che restituisce la durata dell'evento
     * @return DateInterval la durata
     */
    public function getDurata(): DateInterval{return $this->durata;}

    /**
     * Metodo che restituisce la fascia oraria in formato stringa
     * @return string
     */
    public function __toString(){
        return $string="DATA DI INIZIO: ". date_format($this->inizio,"d/m/Y H:i:s")." | DURATA: ". $this->durata->format("%Y,%M,%d,%H,%i,%s");
        }

    /**
     * Metodo per la validazione della data di inizio
     * @return boolean
     */
    public function validateStart(){
        $oggi=date_create();

        if (is_bool($this->inizio) or $this->inizio<$oggi or $this->inizio>$this->fine){
            return false;
        }
        else
            return true;

    }
    /**
     * Metodo per la validazione della data di fine
     * @return boolean
     */
    public function validateEnd(){
        $oggi=date_create();
        if (is_bool($this->fine) or $this->fine<$oggi or $this->fine<$this->inizio){
            return false;
        }
        else
            return true;

    }


}