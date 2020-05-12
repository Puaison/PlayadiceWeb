<?php
require('Entity/EObject.php');
require('Entity/EGioco.php');
require('Entity/EGiocoCategoria.php');
require('Entity/ERecensione.php');
require('Entity/EUtente.php');
require('Entity/EGiocoInfo.php');
$s= new EGioco();
$s->setCategoria( EGiocoCategoria::Party);
$s->setNome("Monopoly");
$info=new EGiocoInfo();
$info->setMin(1);
$info->setMax(4);
$info->setCasaEditrice("Cranium");
$info->setDescrizione("Gioco basato sull'economia");
$s->setInfo($info);

$rectot=array();
$rec1= new ERecensione();
$rec1->setVoto(65);

$utente1=new EUtente();
$utente1->setUsername("pippo");
$rec1->setEUtente($utente1);
$rectot[]=$rec1;

$rec2=new ERecensione();
$rec2->setVoto(4);
$utente2=new EUtente();
$utente2->setUsername("pluto");
$rec2->setEUtente($utente2);
$rectot[]=$rec2;
$s->setRecensioni($rectot);


$rec3=new ERecensione();
$rec3->setVoto(13);
$utente3=new EUtente();
$utente3->setUsername("papero");
$rec3->setEUtente($utente3);


$prova=$s->PossibileNuovaRecensione($rec3);
var_dump($s);
$gg=$s->getRecensioni();
var_dump($gg);

//$votomedio=$s->CalcolaVotoMedio();
//$s->setVotoMedio($votomedio);
//var_dump($s);

?>