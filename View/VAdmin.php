<?php


class VAdmin extends VObject
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     */
    function ShowAdminPanel(EUtente $utente, $results)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($utente), 1)));
        $this->smarty->registerObject('user', $utente);

        $this->smarty->assign('results', $results);

        $this->smarty->display('AdminPanel.tpl');
    }
    function getUserFromForm()
    {
        $string= "default";

        if (isset($_POST['Parametro']))
            $string=$_POST['Parametro'];

        return $string;
    }

}