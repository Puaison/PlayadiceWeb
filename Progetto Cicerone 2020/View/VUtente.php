<?php




/**
 * La classe VUtente si occupa dell'input-output per quanto riguarda la gestione di un utente. In particolare:
 * - Costruisce da una form un oggetto EUtente e ne verifica la validità
 * - Permette al client di visualizzare pagine relative all'utente (login-signup-profilo)
 */
class VUtente extends VObject
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

    /**
     * Funzione che permette la creazione di utente con i valori prelevati da una form
     * @return EUtente l'utente ottenuto dai campi della form
     */
    function createUser(): EUtente
    {
        $utente;
        if (isset($_POST['type'])) {
            $type = 'E' . ucfirst($_POST['type']);
            $user = new $type();
        } else
            $user = new EUtente();

        if (isset($_POST['name']))
            $user->setNickName($_POST['name']);
        if (isset($_POST['mail']))
            $user->setMail($_POST['mail']);
        if (isset($_POST['pwd']))
            $user->setPassword($_POST['pwd']);

        return $user;
    }

    /**
     * Verifica che un utente abbia rispettato i vincoli per l'inserimento dei parametri di login
     *
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateLogin(EUtente $utente): bool
    {
        if ($this->check['name'] = $utente->validateNickName() && $this->check['pwd'] = $utente->validatePassword()) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Verifica che un utente abbia inserito i
     *
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateSignUp(EUtente $utente): bool
    {
        if ($this->check['name'] = $utente->validateNickName() && $this->check['pwd'] = $utente->validatePassword() && $this->check['mail'] = $utente->validateMail()) {
            return true;
        } else
            return false;
    }

    /**
     * Mostra la pagina di login
     *
     * @param bool $error
     *            facoltativo se è stato rilevato un errore
     */
    function showLogin(bool $error = NULL)
    {
        if (!$error)
            $error = false;

        $utente = new EOspite();

        $this->smarty->registerObject('user', $utente);
        $this->smarty->assign('uType', lcfirst(substr(get_class($utente), 1)));

        $this->smarty->assign('error', $error);
        $this->smarty->assign('check', $this->check);

        $this->smarty->display('user/login.tpl');
    }

    /**
     * Mostra la pagina di signup
     *
     * @param bool $error
     *            facoltativo se e' stato rilevato un errore
     */
    function showSignUp(bool $error = NULL)
    {
        if (!$error)
            $error = false;

        $utente = new EOspite();

        $this->smarty->registerObject('user', $utente);
        $this->smarty->assign('uType', lcfirst(substr(get_class($utente), 1)));

        $this->smarty->assign('error', $error);
        $this->smarty->assign('check', $this->check);

        $this->smarty->display('user/register.tpl');
    }
}