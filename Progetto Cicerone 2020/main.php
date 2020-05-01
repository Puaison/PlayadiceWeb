<?php
require('EBooking.php');
require('EDate.php');
echo "\n";
print ("Hello");
echo "\n";
$date=new EDate("01","05","2020","20","09");
echo ($date->__toString());
echo "\n";
echo ($date->getHour()." ".$date->getMinutes());
echo "\n";
echo ($date->getPosition());
echo "\n";
$booking=new EBooking($date, "Antonio Maria", "Marottoli");
echo($booking->__toString());
echo "\n";
$booking->validateState("true");
echo($booking->__toString());
?>