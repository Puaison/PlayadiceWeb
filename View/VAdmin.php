<?php


class VAdmin extends VObject
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Funzione che visualizza il pannello admin
     */
    function ShowAdminPanel(EUtente $utente, $results)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($utente), 1)));
        $this->smarty->registerObject('user', $utente);

        $this->smarty->assign('results', $results);

        $this->smarty->display('AdminPanel.tpl');
    }

    /**
     * Funzione che restituisce l'username di un utente a partire da una form
     * @return  string con l'username (parametro) inserito nella form
     */
    function getUserFromForm()
    {
        $string= "default";

        if (isset($_POST['Parametro']))
            $string=$_POST['Parametro'];

        return $string;
    }

}