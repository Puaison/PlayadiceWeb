<?php
declare(strict_types=1);

class EDate
{
    public string $thisDayName;
    public string $thisDayNumb;
    public string $thisMonth;
    public string $thisYear;
    public string $positionDate;
    public DateTime $thisDate;

    public function __construct(string $inputDate,string $inputMonth,string $inputYear, string $inputHour, string $inputMinutes){
        array $listofDay=array("Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica");
        array $listofMonth=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
        $this->thisDate= date_create("$inputYear-$inputMonth-$inputDate"."$inputHour:$inputMinutes");
        $this->positionDate=EDate::getDistance($today=date_create());
        $this->thisMonth=$listofMonth[$inputMonth-1];
        $this->thisDayNumb=date_format($this->thisDate, "j");
        $this->thisDayName=$listofDay[date_format($this->thisDate,"N")-1];
        $this->thisYear=$inputYear;
    }
    public function getDistance($date){
        $diff=date_diff($date,$this->thisDate);
        $diff=$diff->format("%Y%M%d%H%i%s");
        return $diff;
    }

}

