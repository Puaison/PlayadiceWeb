<?php
declare(strict_types=1);
const LIST_DATE=array("Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica"); //non va qui
CONST LIST_MONTH=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");// non va qui  (andrebbe nella view)

class EData
{
    public string $nomeGiorno;
    public string $numGiorno;
    public string $nomeMese;
    public string $anno;
    public string $posizioneOdierna;
    public string $ore;
    public string $minuti;
    public DateTime $dateTime;

    public function __construct(string $inputDate,string $inputMonth,string $inputYear, string $inputHour, string $inputMinutes){
        $this->dateTime= date_create("$inputYear-$inputMonth-$inputDate"."$inputHour:$inputMinutes");
        $this->posizioneOdierna=EData::newPosizione($today=date_create());
        $this->nomeMese=LIST_MONTH[$inputMonth-1];
        $this->numGiorno=date_format($this->dateTime, "j");
        $this->nomeGiorno=LIST_DATE[date_format($this->dateTime,"N")-1];
        $this->anno=$inputYear;
        $this->ore=$inputHour;
        $this->minuti=$inputMinutes;
    }

    public function setNomeGiorno(int $day){$this->nomeGiorno=LIST_DATE[$day];}
    public function setAnno(string $year){$this->anno=$year;}
    public function setMese(string $month){$this->nomeMese=$month;}
    public function setNumeroGiorno(int $day){$this->dateDayNumb=$day;}
    public function setOre(string $hour){$this->ore=$hour;}
    public function setMinuti(string $minutes){$this->minuti=$minutes;}
    public function setDateTime(DateTime $day){$this->dateTime=$day;}
    public function getNomeGiorno(){return $this->nomeGiorno;}
    public function getNumGiorno(){return $this->numGiorno;}
    public function getMese(){return $this->nomeMese;}
    public function getAnno(){return $this->anno;}
    public function getOra(){return $this->ore;}
    public function getMinuti(){return $this->minuti;}
    public function getPosizione(){return $this->posizioneOdierna;}
    public function getDateTime(){return $this->dateTime;}
    public function getIntervallo(EData $date){
        $intervallo=date_diff($date->getDateTime(),$this->dateTime);
        return $intervallo;
    }
    public function newPosizione($date){
        $diff=date_diff($date,$this->dateTime);
        $diff=$diff->format("%Y%M%d%H%i%s");
        return $diff;
    }
    public function __toString(){return $print= $this->getNumGiorno()."-".$this->getMese()."-".$this->getAnno()."-".$this->getOra().":".$this->getMinuti();}

}
