<?php
require('autoload.php');
require_once ('./Smarty/libs/Smarty.class.php');

$smarty = new Smarty;



$smarty -> setCompileDir('templates_c');
$smarty -> setTemplateDir('templates');
$smarty->display("home.tpl");