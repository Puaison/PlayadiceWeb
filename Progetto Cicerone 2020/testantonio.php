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
$data2= new EData();
$data2->setData("13","05","2020","20","00");
$data->setData("12","05","2020","20","00");
echo "\n";
echo "\n";
$luogo= new ELuogo();
$luogo->setCap("67100");
$luogo->setCitta("L'Aquila");
$luogo->setVia("Via Brasile, 4");

echo "\n";
$fascia = new EFascia();

$fascia->setDate($data);
$fascia ->setDurata($data2);
echo "\n";
echo "\n";
echo "\n";
echo "\n";
echo "\n";

$evento= new EEvento();
$evento->setEvento("1","Playadice","Fallimento","True",$luogo,  $fascia);
echo ($evento->__toString());


