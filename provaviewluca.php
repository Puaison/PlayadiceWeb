<?php
require('autoload.php');
require_once('./Smarty/libs/Smarty.class.php');

$smarty = new Smarty;



$smarty -> setCompileDir('templates_c');
$smarty -> setTemplateDir('templates');


$gioco=new EGioco();
$gioco->setNome("Happy Salmon");
$gioco->setVotoMedio(5);
$gioco->setCategoria(EGiocoCategoria::Party);

$gioco2=new EGioco();
$gioco2->setNome("White Chapel");
$gioco2->setVotoMedio(5);
$gioco2->setCategoria(EGiocoCategoria::Strategia);

$array = array($gioco,$gioco2);

$smarty ->assign('array',$array);
//$smarty->display("home.tpl");
$smarty->display("GiochiMainPage.tpl");