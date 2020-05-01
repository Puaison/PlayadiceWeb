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


}