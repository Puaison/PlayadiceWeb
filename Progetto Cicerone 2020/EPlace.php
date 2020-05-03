<?php
declare(strict_types=1);

class EPlace
{
    public string $placeAddress;
    public string $placeCity;
    public string $placeCap;

    public function __construct($placeAddress, string $placeCity, string $placeCap)
    {
        $this->placeAddress=$placeAddress;
        $this->placeCity=$placeCity;
        $this->placeCap=$placeCap;
    }
    public function setAddress($address){$this->placeAddress=$address;}
    public function setCity($city){$this->placeCity=$city;}
    public function setCap($cap){$this->placeCap=$cap;}
    public function getAddress(){return $this->placeAddress;}
    public function getCity(){return $this->placeCity;}
    public function getCap(){return $this->placeCap;}
    public function __toString()
    {
        return $print= "VIA: " . $this->getAddress() . " | CITTA': " . $this->getCity() . " | CAP: ". $this->getCap();
    }

}