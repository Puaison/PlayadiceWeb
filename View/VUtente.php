<?php
include_once 'View/VObject.php';

/**
 * La classe VUtente si occupa dell'input-output per quanto riguarda la gestione di un utente. In particolare:
 * - Costruisce da una form un oggetto EUtente e ne verifica la validità
 * - Permette di visualizzare pagine relative all'utente (login-signup)
 * @author Gruppo DelSignore/Marottoli/Perozzi
 * @package View
 */
class VUtente extends VObject
{
    function __construct()
    {
        parent::__construct();

        $this->check = array(
            'Esistente' => true,
            'Username' => true,
            'Mail' => true,
            'Password' => true,
            'Nome' => true,
            'Cognome' => true,
            'OldPassword'=>true
        );
    }

    /**
     * Funzione che permette la creazione di utente con i valori prelevati da una form
     * @return EUtente l'utente ottenuto dai campi della form
     */
    function createUser() : EUtente
    {

            $user = new EUtente();

        if(isset($_POST['Username']))
            $user->setUsername($_POST['Username']);
        if(isset($_POST['Mail']))
            $user->setEmail($_POST['Mail']);
        if(isset($_POST['Password']))
            $user->setPassword($_POST['Password']);
        if(isset($_POST['Nome']))
            $user->setNome($_POST['Nome']);
        if(isset($_POST['Cognome']))
            $user->setCognome($_POST['Cognome']);

        return $user;
    }

    /**
     * Funzione che ritorna un array (A partire da form) contenente vecchia e nuova password
     */
    function createNewPassword()
    {
        $array=array();

        if(isset($_POST['OldPassword']))
            $array['OldPassword']=($_POST['OldPassword']);
        if(isset($_POST['Password']))
            $array['Password']=($_POST['Password']);
        return $array;
    }

    /**
     * Funzione che controlla la validità della password vecchia coincide con quella nuova
     */
    function validateNewPassword(EUtente $newUser,EUtente $oldUser)
    {
        //Se la password vecchia non è corretta, devo notificarlo
        $this->check['OldPassword']=$oldUser->checkPassword();
        $this->check['Password']=$newUser->validatePassword();
        if($this->check['Password'] && $this->check['Password'] )
            return true;
        else
            return false;
    }

    /**
     * Verifica che un utente abbia rispettato i vincoli per l'inserimento dei parametri di login
     * @param EUtente $user l'oggetto Utente da controllare
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateLogin(EUtente $user): bool
    {
        $this->check['Esistente']=$user->validateEsistenza();
        if($this->check['Esistente'])
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Verifica che un utente abbia rispettato i vincoli per l'inserimento dei parametri di login
     * @param EUtente $user l'oggetto Utente da controllare
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateModify(EUtente $user): bool
    {
        $this->check['Nome']=$user->validateNome();
        $this->check['Cognome']=$user->validateCognome();
        $this->check['Mail']=$user->validateMail();
        if($this->check['Nome'] && $this->check['Cognome'] && $this->check['Mail'])
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Verifica che un utente abbia inserito valori validi per nomi e cognomi
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateSignUp(EUtente $user): bool
    {
        $this->check['Esistente']=!($user->validateEsistenza());
        $this->check['Username']=$user->validateUsername();
        $this->check['Password']=$user->validatePassword();
        $this->check['Mail']=$user->validateMail();
        $this->check['Nome']=$user->validateNome();
        $this->check['Cognome']=$user->validateCognome();
        if($this->check['Username'] && $this->check['Password'] &&
            $this->check['Mail'] && $this->check['Nome']
            && $this->check['Cognome'] && $this->check['Esistente'])
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

        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('check', $this->check);

        $this->smarty->display('Login.tpl');
    }

    /**
     * Mostra la pagina di signup
     * @param bool $error
     *            facoltativo se e' stato rilevato un errore
     */
    function showSignUp(bool $error = NULL)
    {
        if (! $error)
            $error = false;

        $user = new EOspite();

        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        //TODO DA LEVARE $this->smarty->assign('error', $error);
        $this->smarty->assign('check', $this->check);
        $this->smarty->display('Register.tpl');
    }

    /**
     * Funzione che visualizza il pannello profilo privato
     */
    function showProfile(EUtente $user)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('utente',$user);
        $this->smarty->display('Profile.tpl');
    }

    /**
     * Funzione che visualizza il pannello modifica profilo
     */
    function showFormModify(EUtente $user)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('utente',$user);
        $this->smarty->assign('check', $this->check);
        $this->smarty->display('ModificaUtente.tpl');
    }

    /**
     * Funzione che visualizza il pannello modifica profilo (password)
     */
    function showFormModifyPassword(EUtente $user)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('utente',$user);
        $this->smarty->assign('check', $this->check);
        $this->smarty->display('ModificaPassword.tpl');
    }
}