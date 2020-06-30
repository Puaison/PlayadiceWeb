<?php
class SmartyConfig
{

    static function configure() : Smarty
    {
        require_once ('./Smarty/libs/Smarty.class.php');

        $smarty = new Smarty();

        $smarty -> setCompileDir('templates_c');
        $smarty -> setTemplateDir('templates');
        //$smarty->setCacheDir('Progetto Cicerone 2020/cache');
        //$smarty->setConfigDir('Progetto Cicerone 2020/configs');

        return $smarty;
    }
}