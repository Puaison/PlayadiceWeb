<?php


class VAvatar extends VObject
{
    function __construct()
    {
        parent::__construct();
    }

    function showdetails(EUtente &$user, $avatar)
    {
        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('avatar', $avatar);

        //mostro il contenuto della pagine
        $this->smarty->display('TVGAvatarDetails.tpl');
    }

    function showmodify(EUtente &$user, $avatar)
    {
        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('avatar', $avatar);

        //mostro il contenuto della pagine
        $this->smarty->display('TVGAvatarModify.tpl');
    }

    function showcreate(EUtente &$user)
    {
        $this->smarty->registerObject('user', $user);

        $this->smarty->display('TVGAvatarCreate.tpl');
    }

    function showproposta(EUtente $user, $proposta )
    {
        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('proposta', $proposta);

        $this->smarty->display('TVGAvatarApprovazione.tpl');
    }

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

}