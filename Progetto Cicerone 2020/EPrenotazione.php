<?php


class EPrenotazione
{
    public int $id;
    public EDate $giornoPrenotazione;
    public EUtente $utente;

    public function __construct(Edate $date, EUtente $user, int $id)
    {
        $this->giornoPrenotazione=$date;
        $this->utente=$user;
        $this->id=$id;

    }

    public function getId(): int
    {
        return $this -> id;
    }

    public function setId(int $id): void
    {
        $this -> id = $id;
    }
    public function setUtente(EUtente $utente){$this->utente=$utente;}
    public function setDate(EDate $date){$this->giornoPrenotazione=$date;}
    public function getUtente(){return $this->utente;}
    public function getDate(){return $this->dateBooking;}
    public function __toString()
    {
        return $print= "NOME: " . $this->utente->getName() . " | COGNOME: " . $this->utente->getSurname() . " | DATA DI PRENOTAZIONE: ". $this->getDate();
    }


}

