<?php
require ("entity/EEvento.php");
require ("entity/ELuogo.php");
require ("entity/EFascia.php");
require ("entity/EData.php");
require ("entity/EUtente.php");


echo "\n";
print ("Hello");
echo "\n";

$User=new EUtente();

$User->setNome("Alessio");
$User->setCognome("Perozzi");
$User->setEmail("Test@Gmail.com");
$User->setUsername("Pantaleone");
$User->setPassword("1234");

$data= new EData();
echo ("prova");
$data=$data->setData("12","05","2020","17","41");
echo var_dump($data);
$luogo= new ELuogo();
$luogo->setCap("67100");
$luogo->setCitta("L'Aquila");
$luogo->setVia("Via Brasile, 4");

$fascia = new EFascia();
$fascia-> setDate("$data");
$fascia -> setDurata("$data");

$evento= new EEvento();
$evento->setEvento("1","Playadice","Fallimento","True","$fascia");
echo ("$evento->__toString()");


