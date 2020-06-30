<?php


class VEvento extends VObject
{
    function __construct()
    {
        parent::__construct();

        $this->check = array(
            'name' => true,
            'mail' => true,
            'pwd' => true,
            'type' => true
        );
    }
    function showAll(EUtente &$user, $eventi)
    {

        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results', $eventi);
        $this->smarty->display('PLDCalendario.tpl');

    }


}