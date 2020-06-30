<?php
class SmartyConfig
{

    static function configure() : Smarty
    {
        require('lib/Smarty/Smarty.class.php');

        $smarty = new Smarty();

        $smarty->setTemplateDir('Progetto Cicerone 2020/templates');
        $smarty->setCompileDir('Progetto Cicerone 2020/templates_c');
        $smarty->setCacheDir('Progetto Cicerone 2020/cache');
        $smarty->setConfigDir('Progetto Cicerone 2020/configs');

        return $smarty;
    }
}