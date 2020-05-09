<?php


class EFascia
{
    public EDate $inizio;
    public DateInterval $durata;

    public function __construct(EDate $inizio, EDate $fine){
        $this->inizio=$inizio;
        $this->durata = $inizio->getIntervallo($fine);

    }
    public function setDate(EDate $date){$this->inizio=$date;}
    public function getDate(){return $this->inizio;}
    public function getIntervallo(){return $this->durata;}
    public function setIntervallo(EDate $date){$this->durata=date_diff($date,$this->inizio);}

}