<?php
require('Entity/EObject.php');
require('Entity/EGioco.php');
require('Entity/EGiocoCategoria.php');
require('Entity/ERecensione.php');
require('Entity/EUtente.php');
$s= new EGioco();
$s->setCategoria( EGiocoCategoria::Party);
$s->setNome("Monopoly");
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
$s->


$rec3=new ERecensione();
$rec3->setVoto(13);
$utente3=new EUtente();
$utente3->setUsername("papero");
$rec3->setEUtente($utente3);

$prova=$s->PossibileNuovaRecensione($rec3);
var_dump($s);

//$votomedio=$s->CalcolaVotoMedio();
//$s->setVotoMedio($votomedio);
//var_dump($s);

?>