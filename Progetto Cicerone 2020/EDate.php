<?php


class EDate
{
    public array $listofDay=array("Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica");
    public array $listofMonth=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
    public string $thisDay;
    public string $thisDayNumb;
    public string $thisMonth;
    public string $thisYear;
    public int $positionDate;
    public DateTime $thisDate;

    public function __construct(string $inputDate,string $inputMonth,string $inputYear, string $inputHour, string $inputMinutes){
        $this->thisDate= date_create("$inputYear-$inputMonth-$inputDate"."$inputHour:$inputMinutes");
        $this->positionDate=EDate::getDistance($today=date_create());
        $this->thisMonth=$this->listofMonth[$inputMonth-1];
        $this->thisDayNumb=date_format($this->thisDate, "d");
        $this->thisDay=$this->listofDay[date_format($this->thisDate,"N")-1];
        $this->thisYear=$inputYear;
    }
    public function getDistance($date){
        $diff=date_diff($date,$this->thisDate);
        $diff=$diff->format("%Y%M%d%H%i%s");
        return $diff;
    }

}
$date =new EDate(28,04,2020,9,47);

var_dump($date);

