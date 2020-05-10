<?php


class EPrenotazione extends EObject
{
    public EData $giornoPrenotazione;
    public EUtente $utente;

    public function __construct()
    {
        $this->giornoPrenotazione= new EData();
        $this->utente= new EUtente();

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
    public function setDate(EData $date){$this->giornoPrenotazione=$date;}
    public function getUtente(){return $this->utente;}
    public function getDate(){return $this->giornoPrenotazione;}
    public function __toString()
    {
        return $print= "NOME: " . $this->utente->getName() . " | COGNOME: " . $this->utente->getSurname() . " | DATA DI PRENOTAZIONE: ". $this->getDate();
    }


}

