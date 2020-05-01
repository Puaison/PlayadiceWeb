<?php
declare(strict_types=1);
const LIST_DATE=array("Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica");
CONST LIST_MONTH=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");

class EDate
{
    public string $thisDayName;
    public string $thisDayNumb;
    public string $thisMonth;
    public string $thisYear;
    public string $positionDate;
    public string $thisHour;
    public string $thisMinutes;
    public DateTime $thisDate;

    public function __construct(string $inputDate,string $inputMonth,string $inputYear, string $inputHour, string $inputMinutes){
        $this->thisDate= date_create("$inputYear-$inputMonth-$inputDate"."$inputHour:$inputMinutes");
        $this->positionDate=EDate::getDistance($today=date_create());
        $this->thisMonth=LIST_MONTH[$inputMonth-1];
        $this->thisDayNumb=date_format($this->thisDate, "j");
        $this->thisDayName=LIST_DATE[date_format($this->thisDate,"N")-1];
        $this->thisYear=$inputYear;
        $this->thisHour=$inputHour;
        $this->thisMinutes=$inputMinutes;
    }
    public function getDistance($date){
        $diff=date_diff($date,$this->thisDate);
        $diff=$diff->format("%Y%M%d%H%i%s");
        return $diff;
    }
    public function setDay(int $day){$this->thisDayName=LIST_DATE[$day];}
    public function setYear(string $year){$this->thisYear=$year;}
    public function setMonth(string $month){$this->thisMonth=$month;}
    public function setDayNum(int $day){$this->dateDayNumb=$day;}
    public function setHour(string $hour){$this->thisHour=$hour;}
    public function setMinutes(string $minutes){$this->thisMinutes=$minutes;}
    public function setDate(DateTime $day){$this->thisDate=$day;}
    public function getDayName(){return $this->thisDayName;}
    public function getDayNumb(){return $this->thisDayNumb;}
    public function getMonth(){return $this->thisMonth;}
    public function getYear(){return $this->thisYear;}
    public function getHour(){return $this->thisHour;}
    public function getMinutes(){return $this->thisMinutes;}
    public function getPosition(){return $this->positionDate;}
    public function __toString(){return $print= $this->getDayNumb()."-".$this->getMonth()."-".$this->getYear()."-".$this->getHour().":".$this->getMinutes();}

}
