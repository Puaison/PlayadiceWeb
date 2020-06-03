<?php

$newGioco=new EGioco();

/**
 * INSERIMENTO DI UN NUOVO GIOCO E L'AGGIUNTA DI INFORMAZIONI
 */
//Riprendo il gioco appena inserito nel db per caricare l'id
$newGioco=FPersistantManager::getInstance()->search("gioco","Last","")[0];

// Creazione delle informazioni aggiuntive del nuovo gioco aggiunto

$newGiocoInfo=new EGiocoInfo();
$newGiocoInfo->setId($newGioco->getId());
$newGiocoInfo->setDescrizione("Gioco Che Giuseppe odia con tutto il cuore");
$newGiocoInfo->setMin(2);
$newGiocoInfo->setMax(6);
$newGiocoInfo->setCasaEditrice("Cranium");
$Pippo1 = FPersistantManager::getInstance()->store($newGiocoInfo);



/**
 * RIMOZIONE DI UN GIOCO E LE SUE INFORMAZIONI DETTAGLIE
 */
$pippo=FPersistantManager::getInstance()->remove($newGioco);