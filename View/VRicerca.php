<?php


class VRicerca extends VObject
{
    function __construct()
    {
        parent::__construct();
    }


    /**
     * Ritorna la coppia valore-chiave scelta dall'utente nella ricerca
     * Tale coppia e' contenuta nell'array globale $_POST
     * @return array avente come valori il Valore e la Chiave di ricerca
     */
    function getStringAndKey(): array
    {
        $string =($_POST['Parametro']);
        $key =($_POST['TipoRicerca']);

        if ($key=="Autore")
            $key="OrderingUsernameUtente";
        if ($key=="Nome")
            $key="Nome";

        if (($_POST['Parametro'])=="")
            $string="Default";

        return array($string,$key);
    }

    /**
     * Funzione che mostra il template con i risultati della ricerca effettuata
     */
    function showSearchResult(EUtente &$user, $array, $array2, $Notify)
    {
        if(!$Notify)
            $Notify = "NoNotify";

        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));

        $this->smarty->assign('results', $array);

        $this->smarty->assign('proposte', $array2);

        $this->smarty->assign('notify', $Notify);

        //mostro il contenuto della pagine
        $this->smarty->display('TVGMainpage.tpl');
    }

}

