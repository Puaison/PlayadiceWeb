<?php


class EPlace
{
    public string $placeAddress;
    public string $placeCity;
    public string $placeCap;

    public function __construct($placeAddress,$placeCity,$placeCap)
    {
        $this->placeAddress=$placeAddress;
        $this->placeCity=$placeCity;
        $this->placeCap=$placeCap;
    }

}