<?php


class EDate
{
    public array $listofDay=array("Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica");
    public array $listofMonth=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
    private string $thisDay; //decidere come caricare l'oggetto
    private string $thisMonth;
    private string $thisYear;
    public int $positionDate;
    public DateTime $thisDate;




    public function __construct(int $inputDate,int $inputMonth,int $inputYear, int $inputHour, int $inputMinutes){
        $this->thisDate= date_create("$inputYear-$inputMonth-$inputDate-$inputHour-$inputMinutes");
        $today=date_create();
        $diff=date_diff($today,$this->thisDate);
        $this->positionDate=$diff->format("%Y%M%d%H%i");
        $this->thisMonth=$this->listofMonth[$inputMonth-1];
        $this->thisDay=$this->listofDay[date_format($this->thisDate,"N")-1];
        $this->thisYear=$inputYear;
        echo $this->positionDate;



    }
    public function getDistance(){}

}
$date =new EDate(30,04,2020,20,30);
var_dump($date);

