<?php
require('EBooking.php');
require('EDate.php');
require('ELuogo.php');
echo "\n";
print ("Hello");
echo "\n";
$date=new EDate("03","05","2020","16","30");
echo ($date->__toString());
echo "\n";
echo ($date->getOra()." ".$date->getMinuti());
echo "\n";
echo ($date->getPosizione());
echo "\n";
$booking=new EBooking($date, "Antonio Maria", "Marottoli");
echo($booking->__toString());
echo "\n";
$booking->validateState("true");
echo($booking->__toString());
$place= new ELuogo ("Via Brasile, 4", "L'Aquila", "67100");
echo "\n";
echo ($place->__toString());

var_dump($date->getDistanza());
?>