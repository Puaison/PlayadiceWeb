<?php
/**
 * La classe VObject contiene gli attributi e le funzioni base adoperati in tutto il package View.
 * Oltre ad un metodo per la visualizzazione di una pagina di errore, il costruttore istanzia l'oggetto
 * Smarty adoperato alla visualizzazione dei template
 * @author Gruppo DelSignore/Marottoli/Perozzi
 * @package View
 *
 */
class VObject
{
    /** l'oggetto smarty incaricato di visualizzare i template */
    protected $smarty;

    /** un array avente come indice i campi delle form di cui controllare gli errori. Ogni classe lo definira' secondo le sue esigenze se necessario */
    protected $check;

    public function __construct()
    {
        $this->smarty = SmartyConfig::configure();
    }

    /**
     * Mostra una pagina di errore, funzione da richiamare se un utente sta visualizzando una pagina
     * che non risulta essere di sua competenza
     * @param EUtente $utente l'utente della sessione
     * @param string $error il messaggio di errore da visualizzare
     */
    function showErrorPage(EUtente $utente=null, string $error)
    {
        if($utente)
        {
            $this->smarty->registerObject('user', $utente);
            $this->smarty->assign('uType', lcfirst(substr(get_class($utente), 1)));
        }

        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($utente), 1)));
        $this->smarty->assign('error', $error);
        $this->smarty->display('errorPage.tpl');
    }

    function showIndex(EUtente $user, $giochi, $evento, $cookieEnabled=null)
    {
        $this->smarty->assign('cookieEnabled',$cookieEnabled);
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->assign('giochi',$giochi);
        $this->smarty->assign('evento',$evento);
        $this->smarty->registerObject('user', $user);
        $this->smarty->display('index.tpl');
    }
}