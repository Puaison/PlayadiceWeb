<?php

const LIST_DATE=array("Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato","Domenica"); //non va qui
CONST LIST_MONTH=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");// non va qui  (andrebbe nella view)

/**
 * Class EData Classe utilizzata per realizzare le date da usare negli eventi e nelle prenotazioni
 */
class EData extends EObject
{
    /**
     * @var string Nome del Giorno
     */
    private $nomeGiorno;
    /**
     * @var string Numero del Giorno
     */
    private $numGiorno;
    /**
     * @var string Nome del Mese
     */
    private  $nomeMese;
    /**
     * @var string Nome dell'Anno
     */
    private $anno;
    /**
     * @var string Rappresenta la distanza di questa data dal momento di creazione dell'oggetto. Utilizzata per calolare la posizione dell'evento
     */
    private $posizioneOdierna;
    /**
     * @var string Ora
     */
    private  $ore;
    /**
     * @var string Minuti
     */
    private $minuti;
    /**
     * @var DateTime Classe DateTime corrispondente alla classe giorno creata
     */
    private $dateTime;


    /**
     * EData constructor. Inizializza un oggetto EData vuoto
     */
    function  __construct(){
        parent::__construct();
        $this->dateTime= date_create();
        $this->posizioneOdierna=EData::newPosizione(date_create());
        $this->nomeMese='';
        $this->numGiorno='';
        $this->nomeGiorno='';
        $this->anno='';
        $this->ore='';
        $this->minuti='';
    }

    /**
     *                                                    METODI SET
     *
     * Metodo per settare interamente la data inserendo il Giorno, il Mese, l'Anno, l'Ora e i Minuti
     * @param string $inputDate Il giorno
     * @param string $inputMonth Il mese
     * @param string $inputYear L'anno
     * @param string $inputHour L'ora
     * @param string $inputMinutes I minuti
     */
    function setData(string $inputDate, string $inputMonth, string $inputYear, string $inputHour, string $inputMinutes){
        $this->dateTime= date_create("$inputYear-$inputMonth-$inputDate"."$inputHour:$inputMinutes");
        $this->posizioneOdierna=EData::newPosizione($today=date_create());
        $this->nomeMese=LIST_MONTH[$inputMonth-1];
        $this->numGiorno=date_format($this->dateTime, "j");
        $this->nomeGiorno=LIST_DATE[date_format($this->dateTime,"N")-1];
        $this->anno=$inputYear;
        $this->ore=$inputHour;
        $this->minuti=$inputMinutes;
    }

    /**
     * Metodo per impostare il nome del giorno
     * @param int $day Numero da 0 a 6 che rappresenta il giorno della settimana
     */
    function setNomeGiorno(int $day){$this->nomeGiorno=LIST_DATE[$day];}

    /**
     * Metodo per impostare l'anno
     * @param string $year L'anno
     */
    function setAnno(string $year){$this->anno=$year;}

    /**
     * Metodo per impostare il Mese
     * @param string $month il mese
     */
     function setMese(string $month){$this->nomeMese=$month;}

    /**
     * Metodo per impostare il numero del giorno
     * @param int $day il numero del giorno
     */
    function setNumeroGiorno(int $day){$this->dateDayNumb=$day;}

    /**
     * Metodo per impostare le ore
     * @param string $hour le ore
     */
    function setOre(string $hour){$this->ore=$hour;}

    /**
     * Metodo per impostare i minuti
     * @param string $minutes i minuti
     */
    function setMinuti(string $minutes){$this->minuti=$minutes;}

    /**
     * Metodo per settare il corrispondente oggetto DateTime del Giorno
     * @param string $inputDate Il giorno
     * @param string $inputMonth Il mese
     * @param string $inputYear L'anno
     * @param string $inputHour L'ora
     * @param string $inputMinutes I minuti
     *
     */
    function setDateTime(string $inputDate, string $inputMonth, string $inputYear, string $inputHour, string $inputMinutes)
    {
        $this->dateTime= date_create("$inputYear-$inputMonth-$inputDate"."$inputHour:$inputMinutes");
    }

    /**
     *                                         METODI GET
     *
     * Metodo che restituisce il nome del giorno
     * @return string il nome del giorno
     */
    function getNomeGiorno():string {return $this->nomeGiorno;}

    /**
     * Metodo che restituisce il numero del giorno
     * @return string il numero del giorno
     */
    function getNumGiorno():string {return $this->numGiorno;}

    /**
     * Metodo che restituisce il mese
     * @return string il mese
     */
    function getMese():string {return $this->nomeMese;}

    /**
     * Metodo che restituiscel l'anno
     * @return string l'anno
     */
    function getAnno():string {return $this->anno;}

    /**
     * Metodo che restituisce l'ora
     * @return string l'ora
     */
    function getOra():string {return $this->ore;}

    /**
     *  Metodo che restituisce i minuti
     * @return string i minuti
     */
    function getMinuti():string {return $this->minuti;}

    /**
     *  Metodo che restituisce la distanza di questa data dal momento di creazione dell'oggetto.
     * @return string la distanza
     */
    function getPosizione():string {return $this->posizioneOdierna;}

    /**
     * Metodo che restituisce la data come oggetto DateTime
     * @return DateTime la data
     */
    function getDateTime():DateTime {return $this->dateTime;}

    /**
     * Funzione per calcolare la differenza tra questa data e un'altro oggetto EData sotto forma di oggetto DateInterval
     * @param EData $date data con cui fare la differenza
     * @return DateInterval intervallo tra le due date
     */
    function getIntervallo(EData $date):DateInterval{
        $intervallo=date_diff($date->getDateTime(),$this->dateTime);
        return $intervallo;
    }

    /**
     * Metodo per calcolare la differenza tra questa data e un'altro oggetto EData sotto forma di stringa
     * @param $date
     * @return string
     */
     function getIntervalloStr(EData $date):string {
         $diff=date_diff($date->getDateTime(),$this->dateTime);
         $diff=$diff->format("%Y%M%d%H%i%s");
         return $diff;
    }

    /**
     * MEtodo che restituisce il giorno in formato strinaa
     * @return string
     */
    function __toString(){
        $print=$this->getNumGiorno()."-".$this->getMese()."-".$this->getAnno()."-".$this->getOra().":".$this->getMinuti();
        return $print;}

}
