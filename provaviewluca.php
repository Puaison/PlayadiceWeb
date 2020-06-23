<?php
require_once ('./Smarty/libs/Smarty.class.php');

$smarty = new Smarty;
$smarty -> caching= true;
$smarty -> cache_lifetime = 120;


$smarty -> setCompileDir('templates_c');
$smarty -> setTemplateDir('templates');
$smarty->display("home.tpl");