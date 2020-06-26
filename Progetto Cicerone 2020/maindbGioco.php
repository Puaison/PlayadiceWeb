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
/*$gioco=FPersistantManager::getInstance()->search("gioco", "Id","9")[0];


$utente=FPersistantManager::getInstance()->search("utente", "UserName", "Puaison")[0];
$newrecensione=new ERecensione();
$newrecensione->setEUtente($utente);
$newrecensione->setEGioco($gioco);
//$newrecensione->setVoto(0);
//$newrecensione->setCommento("Gioco per capitalisti");
//$recensioni=FPersistantManager::getInstance()->search("Recensione","IdGioco","16");
//var_dump($recensioni);
FPersistantManager::getInstance()->remove($newrecensione);




//var_dump($newGioco);
//var_dump($newGioco->getId());







//$gioco=FPersistantManager::getInstance()->search("gioco","Nome","Lupus");*/
$newGioco=new EGioco();
$newGioco->setNome("Happy Salmon");
$newGioco->setCategoria(EGiocoCategoria::Party);
$Pippo = FPersistantManager::getInstance()->store($newGioco);