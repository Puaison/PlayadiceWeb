<?php


class EDate
{
    public array $listofDay=array("Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica");
    public array $listofMonth=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
    private string $currentDay; //decidere come caricare l'oggetto
    private string $currentMonth;
    private string $currentYear;
    public array $thisDate;


    public function __construct($inputDate,$inputMonth,$inputYear){

        $this->thisDate=array($this->listofDay[($inputDate)-1],$inputDate,$this->listofMonth[($inputMonth)-1],$inputYear);

        $this->currentDay=date("w");
        $this->currentMonth=date("n");
        $this->currentYear=date("Y");

    }
    public function getDistance(){}

}

$today=new EDate(1,4,1993);
var_dump($today);
