<?php


class VAvatar extends VObject
{
    function __construct()
    {
        parent::__construct();
        $this->check = array(
            'Nome' => true,
            'Classe' => true,
            'Razza' => true,
            'Livello' => true,
        );
    }

    /**
     * Funzione per la visualizzazione del template con i dettagli dell'avatar
     */
    function showdetails(EUtente &$user, $avatar)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('avatar', $avatar);

        //mostro il contenuto della pagine
        $this->smarty->display('TVGAvatarDetails.tpl');
    }

    /**
     * Funzione per la visualizzazione del template con il form di modifica dell'avatar
     */
    function showmodify(EUtente &$user, $avatar)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('avatar', $avatar);

        $this->smarty->assign('check', $this->check);

        $this->smarty->display('TVGAvatarModify.tpl');
    }

    /**
     * Funzione per la visualizzazione del template con il form di creazione dell'avatar
     */
    function showcreate(EUtente &$user, EAvatar $submittedavatar = null)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('avatar', $submittedavatar );

        $this->smarty->assign('check', $this->check);
        $this->smarty->display('TVGAvatarCreate.tpl');
    }

    /**
     * Funzione per la visualizzazione del template di una proposta
     */
    function showproposta(EUtente $user, $proposta )
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('proposta', $proposta);

        $this->smarty->display('TVGAvatarApprovazione.tpl');
    }

    /**
     * Funzione per la creazione di un avatar dal form di creazione
     */
    function CreateFromForm() : EAvatar
    {

        $avatar= new EAvatar();

        $user = CSession::getUserFromSession();

        if(isset($_POST['nome']))
            $avatar->setNome($_POST['nome']);
        if(isset($_POST['classe']))
            $avatar->setClasse($_POST['classe']);
        if(isset($_POST['razza']))
            $avatar->setRazza($_POST['razza']);
        if(isset($_POST['livello']))
            $avatar->setLivello($_POST['livello']);
        $avatar->setProprietario($user);

        return $avatar;
    }

    /**
     * Funzione per la creazione di un avatar dal form di modifica
     */
    function CreateFromModifyForm() : EAvatar
    {
        $avatar= new EAvatar();

        $user = CSession::getUserFromSession();

        if(isset($_POST['nome']))
            $avatar->setNome($_POST['nome']);
        if(isset($_POST['classe']))
            $avatar->setClasse($_POST['classe']);
        if(isset($_POST['razza']))
            $avatar->setRazza($_POST['razza']);
        if(isset($_POST['livello']))
            $avatar->setLivello($_POST['livello']);
        $avatar->setProprietario($user);

        return $avatar;
    }

    /**
     * Funzione per il controllo sui campi dell'avatar
     */
    function ValidateAvatar (EAvatar $Avatar): bool
    {
        $this->check['Nome']=$Avatar->validateNome();
        $this->check['Razza']=$Avatar->validateRazza();
        $this->check['Classe']=$Avatar->validateClasse();
        $this->check['Livello']=$Avatar->validateLivello();

        if($this->check['Nome'] && $this->check['Razza']
            && $this->check['Classe'] && $this->check['Livello'])
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}