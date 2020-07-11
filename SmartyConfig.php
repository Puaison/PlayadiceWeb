<?php
class SmartyConfig
{
    static function configure() : Smarty
    {
        require_once('./Smarty/libs/Smarty.class.php');

        $smarty = new Smarty();

        $smarty -> setCompileDir('templates_c');
        $smarty -> setTemplateDir('templates');
        $smarty->setCacheDir('playadice/cache');
        $smarty->setConfigDir('playadice/configs');

        return $smarty;
    }
}