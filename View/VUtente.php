<?php
include_once 'View/VObject.php';

/**
 * La classe VUtente si occupa dell'input-output per quanto riguarda la gestione di un utente. In particolare:
 * - Costruisce da una form un oggetto EUtente e ne verifica la validità
 * - Permette al client di visualizzare pagine relative all'utente (login-signup-profilo)
 * @author gruppo2
 * @package View
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
    function createUser() : EUtente
    {
        $user = null;
        if(isset($_POST['type']))
        {
            $type = 'E'.ucfirst($_POST['type']);
            $user = new $type();
        }
        else
            $user = new Eutente();

        if(isset($_POST['name']))
            $user->setUsername($_POST['name']);
        if(isset($_POST['mail']))
            $user->setEmail($_POST['mail']);
        if(isset($_POST['pwd']))
            $user->setPassword($_POST['pwd']);

        return $user;
    }
    /**
     * Verifica che un utente abbia rispettato i vincoli per l'inserimento dei parametri di login
     *
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateLogin(EUtente $user): bool
    {
        if($this->check['name']=$user->validateUsername() && $this->check['pwd']=$user->validatePassword())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    /**
     * Verifica che un utente abbia inserito i
     *
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateSignUp(EUtente $user): bool
    {
        if($this->check['name']=$user->validateUsername() && $this->check['pwd']=$user->validatePassword() && $this->check['mail']=$user->validateMail())
        {
            return true;
        }
        else
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
        if(!$error)
            $error = false;

        $user = new EOspite();

        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('error', $error);

        $this->smarty->display('Login.tpl');
    }

    /**
     * Mostra la pagina di signup
     *
     * @param bool $error
     *            facoltativo se e' stato rilevato un errore
     */
    function showSignUp(bool $error = NULL)
    {
        if (! $error)
            $error = false;

        $user = new EOspite();

        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('error', $error);

        $this->smarty->display('user/register.tpl');
    }

    /**
     * Mostra la pagina che consente la rimozione di un utente
     *
     * @param EUser $user
     *            l'utente della sessione
     * @param EUser $removed
     *            se l'utente che ha richiesto la rimozione e' un moderatore

    function showRemoveForm(EUser &$user, EUser &$removed = null)
    {
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('uType', lcfirst(substr(get_class($user), 1)));
        if($removed)
        {
            $setRemovedUser = true;
            $this->smarty->assign('rName', $removed->getNickName());
            $this->smarty->assign('rId', $removed->getId());
        }
        else
        {
            $this->smarty->assign('rName', NULL);
            $this->smarty->assign('rId', NULL);
        }

        $this->smarty->display('user/removeUser.tpl');
    }
     * */
}