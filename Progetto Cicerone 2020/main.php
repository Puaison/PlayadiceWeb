<?php
require('EBooking.php');
require('EDate.php');
echo "\n";
print ("Hello");
echo "\n";
$date=new EDate(01,05,2020,19,42);
echo ($date->__toString());
echo "\n";
$booking=new EBooking($date, "Antonio Maria", "Marottoli");
echo($booking->__toString());
echo "\n";
$booking->validateState("true");
echo($booking->__toString());
?>