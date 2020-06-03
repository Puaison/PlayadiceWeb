<?php
require('autoload.php');
////////////////////////////SEEDER///////////////////////////////
/*
//Caricamento di un nuovo gioco

$newGioco=new EGioco();
$newGioco->setNome("Happy Salmon");
$newGioco->setCategoria(EGiocoCategoria::Party);
$Pippo = FPersistantManager::getInstance()->store($newGioco);

$newGioco->setNome("Scotland Yard");
$newGioco->setCategoria(EGiocoCategoria::Strategia);
$Pippo = FPersistantManager::getInstance()->store($newGioco);

$newGioco->setNome("Taboo");
$newGioco->setCategoria(EGiocoCategoria::Party);
$Pippo = FPersistantManager::getInstance()->store($newGioco);

$newGioco->setNome("Just One");
$newGioco->setCategoria(EGiocoCategoria::Party);
$Pippo = FPersistantManager::getInstance()->store($newGioco);

$newGioco->setNome("Monopoly");
$newGioco->setCategoria(EGiocoCategoria::Strategia);
$Pippo = FPersistantManager::getInstance()->store($newGioco);
*/
////////////////////////////FINE SEEDER///////////////////////////////


//Riprendo il gioco appena inserito nel db per caricare l'id
$recensioni=FPersistantManager::getInstance()->search("Recensione","IdGioco","6");
var_dump($recensioni);



//var_dump($newGioco);
//var_dump($newGioco->getId());







//$gioco=FPersistantManager::getInstance()->search("gioco","Nome","Lupus");
