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
 var_dump($data);

echo "\n";
echo "\n";
$luogo= new ELuogo();
$luogo->setCap("67100");
$luogo->setCitta("L'Aquila");
$luogo->setVia("Via Brasile, 4");
var_dump($luogo);

$fascia = new EFascia();
$fascia->setDate($data);
$fascia ->setDurata($data2);
var_dump($fascia);
$fasci=array($fascia,$fascia);
echo ("prova\n");
var_dump($fasci);
$evento= new EEvento();
$evento->setEvento("1","Playadice","Fallimento","True",$luogo,  $fasci);
var_dump($evento);



