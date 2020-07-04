<?php


class VRicerca extends VObject
{
    function __construct()
    {
        parent::__construct();
    }


    /**
     * Ritorna la coppia chiave-valore scelta dall'utente nella ricerca avanzata. Tale coppia
     * e' contenuta nell'array globale $_GET.
     * @return array avente come valori la chiave e il valore
     */
    function getStringAndKey(): array
    {
        $string =($_POST['Parametro']);
        $key =($_POST['TipoRicerca']);

        if ($key=="Autore")
            $key="UsernameUtente";
        if ($key=="Nome")
            $key="Nome";

        if (($_POST['Parametro'])=="")
            $string="Default";

        return array($string,$key);
    }

    /**
     */
    function showSearchResult(EUtente &$user, $array, $Notify)
    {
        if(!$Notify)
            $Notify = "NoNotify";

        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('results', $array);
        $this->smarty->assign('notify', $Notify);

        //mostro il contenuto della pagine
        $this->smarty->display('TVGMainpage.tpl');
    }

}

