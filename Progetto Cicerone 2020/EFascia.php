<?php


class EFascia extends EObject
{
    public EData $inizio;
    public DateInterval $durata;

    public function __construct(EData $inizio, EData $fine){
        $this->inizio=$inizio;
        $this->durata = $inizio->getIntervallo($fine);

    }
    public function setDate(EData $date){$this->inizio=$date;}
    public function getDate(){return $this->inizio;}
    public function getIntervallo(){return $this->durata;}
    public function setIntervallo(EData $date){$this->durata=date_diff($date->getDateTime(),$this->inizio->getDateTime());}
    public function __toString(){return $print="DATA DI INIZIO: ". $this->inizio->__toString()." | DURATA: ". $this->durata->format("%Y%M%d%H%i%s");}
}