<?php
declare(strict_types=1);

class EPlace
{
    public string $placeAddress;
    public string $placeCity;
    public string $placeCap;

    public function __construct(string $placeAddress, string $placeCity, string $placeCap)
    {
        $this->placeAddress=$placeAddress;
        $this->placeCity=$placeCity;
        $this->placeCap=$placeCap;
    }

}