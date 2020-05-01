<?php


class EBooking
{
    public EDate $dateBooking;
    public string $userName;
    public string $userSurname;
    public bool $bookState=false;

    public function __construct(Edate $date, string $name, string $surname)
    {
        $this->dateBooking=$date;
        $this->userName=$name;
        $this->userSurname=$surname;
    }
    public function setName($name){$this->userName=$name;}
    public function setSurname($surname){$this->userSurname=$surname;}
    public function validateState(){$this->bookState=true;}
    public function setDate(EDate $date){$this->dateBooking=$date;}
    public function getName(){return $this->userName;}
    public function getSurname(){return $this->userSurname;}
    public function getDate(){return $this->dateBooking;}
    public function getState(){return $this->bookState;}
    public function __toString()
    {
        if ($this->bookState){
            $state = "APPROVATA";}
        else{
            $state ="NON APPROVATA";}

        return $print= "NOME: " . $this->getName() . " | COGNOME: " . $this->getSurname() . " | DATA DI PRENOTAZIONE: ". $this->getDate() . " | STATO PRENOTAZIONE: " . $state;
    }


}

