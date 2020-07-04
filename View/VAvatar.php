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

}