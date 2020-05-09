<?php
declare(strict_types=1);
const LIST_DATE=array("Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica"); //non va qui
CONST LIST_MONTH=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");// non va qui  (andrebbe nella view)

class EDate
{
    public string $nomeGiorno;
    public string $numGiorno;
    public string $nomeMese;
    public string $anno;
    public string $posizioneOdierna;
    public DateInterval $intervallo;
    public string $ore;
    public string $minuti;
    public DateTime $dateTime;

    public function __construct(string $inputDate,string $inputMonth,string $inputYear, string $inputHour, string $inputMinutes){
        $this->dateTime= date_create("$inputYear-$inputMonth-$inputDate"."$inputHour:$inputMinutes");
        $this->posizioneOdierna=EDate::getDistance($today=date_create());

        $this->nomeMese=LIST_MONTH[$inputMonth-1];
        $this->numGiorno=date_format($this->dateTime, "j");
        $this->nomeGiorno=LIST_DATE[date_format($this->dateTime,"N")-1];
        $this->anno=$inputYear;
        $this->ore=$inputHour;
        $this->minuti=$inputMinutes;
    }
    public function getDistance($date){
        $diff=date_diff($date,$this->dateTime);
        $diff=$diff->format("%Y%M%d%H%i%s");
        return $diff;
    }
    public function setDay(int $day){$this->nomeGiorno=LIST_DATE[$day];}
    public function setYear(string $year){$this->anno=$year;}
    public function setMonth(string $month){$this->nomeMese=$month;}
    public function setDayNum(int $day){$this->dateDayNumb=$day;}
    public function setHour(string $hour){$this->ore=$hour;}
    public function setMinutes(string $minutes){$this->minuti=$minutes;}
    public function setDate(DateTime $day){$this->dateTime=$day;}
    public function getDayName(){return $this->nomeGiorno;}
    public function getDayNumb(){return $this->numGiorno;}
    public function getMonth(){return $this->nomeMese;}
    public function getYear(){return $this->anno;}
    public function getHour(){return $this->ore;}
    public function getMinutes(){return $this->minuti;}
    public function getPosition(){return $this->posizioneOdierna;}
    public function getDate(){return $this->dateTime;}
    public function getIntervallo(EDate $date){
        $intervallo=date_diff($date->getDate(),$this->dateTime);
        return $intervallo;}
    public function __toString(){return $print= $this->getDayNumb()."-".$this->getMonth()."-".$this->getYear()."-".$this->getHour().":".$this->getMinutes();}

}
