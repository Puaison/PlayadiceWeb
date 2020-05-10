<?php
declare(strict_types=1);

class ELuogo
{
    public string $via;
    public string $citta;
    public string $cap; //controllo 5 numeri

    public function __construct(string $placeAddress, string $placeCity, string $placeCap)
    {
        $this->via=$placeAddress;
        $this->citta=$placeCity;
        $this->cap=$placeCap;
    }
    public function setVia($address){$this->via=$address;}
    public function setCitta($city){$this->citta=$city;}
    public function setCap($cap){$this->cap=$cap;}
    public function getVia(){return $this->via;}
    public function getCitta(){return $this->citta;}
    public function getCap(){return $this->cap;}
    public function __toString()
    {
        return $print= "VIA: " . $this->getVia() . " | CITTA': " . $this->getCitta() . " | CAP: ". $this->getCap();
    }

}